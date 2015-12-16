<?php
class UseCasesController extends DefaultController{
	public function initialize(){
		$this->model="Usecase";
		$this->icon = "briefcase";
		$this->title = "Cas d'Utilisation";
		parent::initialize();
	}
	
	public function frmAction($id = NULL){
		$usecase = Usecase::findFirst("code='".$id."'");
		$projects = Projet::find();
		$users = User::find("idRole=2");
	
		$this->view->setVars(array("usecase"=>$usecase, "users"=>$users, "projects"=>$projects));
		$_SESSION['bread']['object'] = $usecase;
		
		$this->jquery->exec("$('input[type=\"range\"]').rangeslider({
  								polyfill: false,
								onSlide: function(position, value) {
									$('.avancement').html(value.toString()+'%');
								},
							});", true);
	
		parent::frmAction($id);
	}
	
	public function getInstance($id=NULL){
    	if($id != NULL){
    		return parent::getInstance("code='".$id."'");
    	}else{
    		$uc = new Usecase();
    		$uc->setAvancement(0);
    		return $uc;
    	}
	}
	
	public function updateFromProjectAction(){
		if($this->request->isPost()){
			$this->_updateAction(@$_POST);
		}
		$msg=new DisplayedMessage("L'Use Case a bien été modifié.");
		$this->dispatcher->forward(
				array("controller"=>"Projects",
						"action"=>"manage",
						"params"=>array(@$_POST["idProjet"], $msg)));
	}
}