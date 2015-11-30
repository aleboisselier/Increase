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
		$fin=$projet->getDateFinPrevue();
		$date=date("d-m-Y");
		return $pourcentJour=(($fin-$date)/$date)*100;
	}

	public function showAction($id=NULL){

		$ucs=Usecase::find("idProjet=".$id);
		$poidTotal=$this->totalPoidsUcs($id);
		$avancement = 0;
		foreach ($ucs as $uc){
			$poidRel=($uc->getPoids()/$poidTotal)*100;
			$avancement+=$poidRel*($uc->getAvancement()/100);			
		}
		$this->view->pick("projects/show");
		$projet=$this->getInstance($id);
		$tmpEcoule= $this->tmpEcoule($id);
		$this->view->setVars(
				array(
						"projet"=>$projet,
						"ucs"=>$ucs,
						"avancement"=>round($avancement),
						"tmpEcoule"=>$tmpEcoule,
						
				));
		$_SESSION['bread']['object'] = $projet;
		//parent::frmAction($id);
	}
	
	public function frmAction($id=null){
		$projet=$this->getInstance($id);
		$this->view->setVar("project", $projet);
		
		$clients = User::find("idRole=3");
		$this->view->setVar("clients", $clients);
		
		parent::frmAction($id);
		
	}
}

