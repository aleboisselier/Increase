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
		
		//recupere les taches
		$taches=$this->listAction($id);
		
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
		
		$this->view->setVars(
			array(
					"projet"=>$projet,
					"ucs"=>$ucs,
					"avancement"=>round($avancement),
					"tmpEcoule"=>$tmpEcoule,
					"taches"=>$taches,
			));
		$_SESSION['bread']['object'] = $projet;
		
		$this->jquery->jsonArrayOn("click",".panel-heading",".taskRepeat > *", "", array("context"=>"$('table[id=\"'+self.attr('id')+'\"]')","attr"=>"data-ajax"));
		$this->jquery->compile($this->view);
		//table[id=\"'+$(self).attr('id')+'\"]
	}

	public function listAction($id=Null){
		$ucs=Usecase::find("idProjet=".$id);
		$arrayTaches = '';
		foreach ($ucs as $uc){
			$ucCode=$uc->getCode();
			$arrayTaches .= "<br>".$ucCode." =>";
			$taches=Tache::find("codeUseCase='".$ucCode."'");
			foreach($taches as $tache){
				$arrayTaches.=$tache."-";
			}
		}
		return $arrayTaches;
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

