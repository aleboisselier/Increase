<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		$this->model="Projet";
		$this->icon="book";
		$this->title="Projets";
		
		parent::initialize();
	}
	public function indexAction($message=NULL){
		parent::indexAction($message=NULL);
		$this->view->pick("projects/index");
	}
	public function showAction($id=NULL){
		$this->view->pick("projects/show");
		$projet=$this->getInstance($id);
		$this->view->setVars(array("projet"=>$projet));
		$_SESSION['bread']['object'] = $projet;
		
		//parent::frmAction($id);
	}
}

