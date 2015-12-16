<?php
class TachesController extends DefaultController{
	public function initialize(){
		$this->model="Tache";
		$this->icon="tasks";
		$this->title="Tâches";
		parent::initialize();
	}
	
	public function frmAction($id = NULL){
		$tache = $this->getInstance($id);
		$usecases = Usecase::find();
		$users = User::find("idRole<>3");
	
		$this->view->setVars(array("tache"=>$tache, "users"=>$users, "usecases"=>$usecases));
		$_SESSION['bread']['object'] = $tache;
		
		$this->jquery->exec("$('input[type=\"range\"]').rangeslider({
  								polyfill: false,
								onSlide: function(position, value) {
									$('.avancement').html(value.toString()+'%');
								},
							});", true);
		parent::frmAction($id);
	}
	
	public function updateAction() {
		if($this->request->isPost()){
			$this->_updateAction(@$_POST);
			$this->dispatcher->forward(array("controller"=>$this->dispatcher->getControllerName(),"action"=>"index","params"=>array($msg)));
		}
	}
	
	public function _updateAction($post){
		$object=$this->getInstance($post["id"]);
		$this->setValuesToObject($object);
		if($post["id"]){
			try{
				$object->save();
				$msg=new DisplayedMessage($this->model." `{$object}` mis à jour");
			}catch(\Exception $e){
				$msg=new DisplayedMessage("Impossible de modifier l'instance de ".$this->model,"danger");
			}
		}else{
			try{
				$object->save();
				$msg=new DisplayedMessage("Instance de ".$this->model." `{$object}` ajoutée");
			}catch(\Exception $e){
				$msg=new DisplayedMessage("Impossible d'ajouter l'instance de ".$this->model,"danger");
			}
		}
			
		try {
			$a = 0;
			$usecase = Usecase::findFirst("code='".$object->getCodeUseCase()."'");
			$taches = Tache::find("codeUseCase LIKE '".$object->getCodeUseCase()."'");
			foreach ($taches as $tache){
				$a += $tache->getAvancement();
			}
			$a = $a/count($taches);
			$usecase->setAvancement($a);
			$usecase->save();
		}catch (\Exception $e){
			$msg=new DisplayedMessage("Impossible de modifier l'avancement de la  UseCase ".$usecase,"danger");
		}
	}
}

	