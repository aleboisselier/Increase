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
	
	public function showAction($id=NULL){
	    
		$this->view->pick("projects/show");
		$projet=$this->getInstance($id);
		
		//poid uc
		$ucs=Usecase::find("idProjet=".$id);
		$poidTotal=$this->totalPoidsUcs($id);		
		$avancement = 0;
		foreach ($ucs as $uc){
			$poidRel=($uc->getPoids()/$poidTotal)*100;
			$avancement+=$poidRel*($uc->getAvancement()/100);	
			ceil($avancement);
		}
		
		//recupere le pourcentage de temps écoulé
		$tmpEcoule=$this->tmpEcoule($id);
		
		//messages
		$messages=Message::find("idProjet=".$id);
		
		//users
		$users=User::find();
		$count = count(Message::find("idProjet=".$id));
		
		//recupere les taches
		$tachesUcs=$this->listAction($id);
		$listTachesUcs = explode("/", $tachesUcs);
		
		$this->view->setVars(
			array(
					"projet"=>$projet,
					"ucs"=>$ucs,
					"avancement"=>round($avancement),
					"tmpEcoule"=>$tmpEcoule,
					"messages"=>$messages,
					"users"=>$users,
					"tachesUcs"=>$listTachesUcs,
					"nbMessages"=>$count,
			));
		$_SESSION['bread']['object'] = $projet;
		
		$this->jquery->jsonArrayOn("click",".loadTasks",".taskRepeat > *", "", 
				array(
						"context"=>"$('table[id=\"'+self.attr('id')+'\"]')",
						"attr"=>"data-ajax",
						"jsCallback"=>"
							$('.chevron[id=\"'+self.attr('id')+'\"]').show();
							$('.viewUc[id=\"'+self.attr('id')+'\"]').show();
							$('.table[id=\"'+self.attr('id')+'\"]').show();"
				));
		$this->jquery->execOn("click", ".chevron", 
				"$('.viewUc').hide();$('chevron').addClass('glyphicon-menu-down');$('.chevron').hide();
				");
		$this->jquery->execOn("click", ".displayUcs","$('.ucs').show();$('.hideUcs').show();$('.displayUcs').hide();");
		$this->jquery->execOn("click", ".hideUcs","$('.ucs').hide();$('.displayUcs').show();$('.hideUcs').hide();");
		
		$_SESSION['bread']['object'] = $projet;
		
		$this->jquery->jsonArrayOn("click", ".loadMessages", ".msgTemplate", "", array("attr"=>"data-ajax", "jsCallback"=>"$('.messages').show();$('.loadMessages').hide();"));
		$this->jquery->execOn("click", ".hideMessages", "$('.messages').hide();$('.loadMessages').show();");
		$this->jquery->compile($this->view);
		//table[id=\"'+$(self).attr('id')+'\"]
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
			$tachesUcs=substr($tachesUcs,0,-1);
			return $tachesUcs;
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

