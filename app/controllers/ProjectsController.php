<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		$this->model="Projet";
		$this->icon="book";
		$this->title="Projets";
		parent::initialize();
	}
	
	public function indexAction($message=NULL){
		parent::indexAction($message);
		$this->view->pick("projects/index");
		$this->jquery->exec("$('[data-toggle=\"tooltip\"]').tooltip()", true);
		$this->jquery->getOnClick(".update, .add","","#content",array("attr"=>"data-ajax"));
		$this->jquery->compile($this->view);
	}
	
	public function totalPoidsUcs($id=NULL){
		$ucs=Usecase::find("idProjet=".$id);
		$ucTotal = 0;
		foreach ($ucs as $uc){
			$ucTotal+=$uc->getPoids();
		}
		return $ucTotal;
	}
	public function tmpEcoule($id){
		$projet=$this->getInstance($id);
		
		//date begin project
		$dateBegin=$projet->getDateLancement();
		
		//date end project
		$dateEnd=$projet->getDateFinPrevue();
		
		//return result in day of project duration
		$dureeProjet = ceil((strtotime($dateEnd) - strtotime($dateBegin))/86400);
		
		//return result in day of number elapsed days
		$nowDaysProject = ceil((strtotime($dateEnd) - strtotime(date("Y-m-d")))/86400);
		if($nowDaysProject<=0){
			return "100%";
		}else{
			return ceil(($nowDaysProject*100)/$dureeProjet)."%";
		}
	}
	
	public function avancement($idProjet){
		//poid uc
		$ucs=Usecase::find("idProjet=".$idProjet);
		$poidTotal=$this->totalPoidsUcs($idProjet);
		$avancement = 0;
		foreach ($ucs as $uc){
			$poidRel=($uc->getPoids()/$poidTotal)*100;
			$avancement+=$poidRel*($uc->getAvancement()/100);
			ceil($avancement);
		}
		
		return round($avancement);
	}
	
	public function showAction($id=NULL){
	    
		$this->view->pick("projects/show");
		$projet=$this->getInstance($id);
		
		$avancement = $this->avancement($id);
		$ucs=Usecase::find("idProjet=".$id);
		
		//avancement global des taches pour un uc
		foreach ($ucs as $uc){
			$taches=Tache::find("codeUseCase='".$uc->getCode()."'");
			foreach($taches as $tache){
				if($uc->getCode()==$tache->getCodeUseCase()){
					$poids += $tache->getAvancement();
				}
			}
		}
		
		//recupere le pourcentage de temps écoulé
		$tmpEcoule=$this->tmpEcoule($id);
		
		//messages
		$messages=Message::find("idProjet=".$id);
		
		//users
		$users=User::find();
		$count = count(Message::find("idProjet=".$id." AND idFil IS NULL"));
		
		//recupere les taches
		$tachesUcs=$this->listAction($id);
		
		$this->view->setVars(
			array(
					"projet"=>$projet,
					"ucs"=>$ucs,
					"avancement"=>round($avancement),
					//"poids"=>$poids,
					"tmpEcoule"=>$tmpEcoule,
					"messages"=>$messages,
					"users"=>$users,
					"tachesUcs"=>$tachesUcs,
					"nbMessages"=>$count,
			));
		$_SESSION['bread']['object'] = $projet;
		
		$this->jquery->jsonArrayOn("click",".loadTasks",".taskRepeat > *", "", 
				array(
						"context"=>"$('table[id=\"'+self.attr('id')+'\"]')",
						"attr"=>"data-ajax",
						"jsCallback"=>"
							$('table[id=\"'+self.attr('id')+'\"]').show();
							self.hide();
							self.parent().parent().find('.hideTasks').show();
						"
				));
		$this->jquery->execOn("click", ".hideTasks", "
				$(this).hide();
				$(this).parent().parent().find('.loadTasks').show();
				$(this).parent().parent().parent().find('table').hide();
				");
		$this->jquery->execOn("click", ".displayUcs","$('.ucs').show();$('.hideUcs').show();$('.displayUcs').hide();");
		$this->jquery->execOn("click", ".hideUcs","$('.ucs').hide();$('.displayUcs').show();$('.hideUcs').hide();");
		
		$_SESSION['bread']['object'] = $projet;
		
		$event = "function loadResponses(){";
		$event .= $this->jquery->jsonArrayOn("click", ".loadReponses", ".msgTemplate", "", array("immediatly"=>true, "attr"=>"data-ajax", "jsCallback"=>"loadResponses()", "context"=>"$('.responses.'+self.attr('id'))"));
		$event .= "}";
		
		$this->jquery->jsonArrayOn("click", ".loadMessages", ".msgTemplate", "", array( "attr"=>"data-ajax", "jsCallback"=>"$('.messages').show();$('.loadMessages').hide();loadResponses()"));
		
		$this->jquery->exec($event, true);
		$this->jquery->execOn("click", ".hideMessages", "$('.messages').hide();$('.loadMessages').show();");
		$this->jquery->compile($this->view);
	}
	public function listAction($id=Null){
			$ucs=Usecase::find("idProjet=".$id);
			$tachesUcs = '';
			foreach ($ucs as $uc){
				$ucCode=$uc->getCode();
				$taches=Tache::find("codeUseCase='".$ucCode."'");
				foreach($taches as $tache){
					$tachesUcs .= $ucCode."/";			
				}
			}
			$list = explode("/", $tachesUcs);
			/*$length=count($listTachesUcs);
			for($i = 0; $i < $length-1; $i++){
				if($list[i]==$list[i+1]){
					$pouet="pouet";
				}
			}*/
			
			$tasks = array();
			foreach ($ucs as $uc){
				$ucCode=$uc->getCode();
				$taches=Tache::find("codeUseCase='".$ucCode."'");
				$tasks[$ucCode] = $taches->toArray();
			}
			return $tasks;
	}
	public function frmAction($id=null){
		$projet=$this->getInstance($id);
		$this->view->setVar("project", $projet);
		
		$clients = User::find("idRole=3");
		$this->view->setVar("clients", $clients);
		
		parent::frmAction($id);
		$_SESSION['bread']['object'] = $projet;

	}
}

