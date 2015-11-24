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
		$this->jquery->exec("$('[data-toggle=\"tooltip\"]').tooltip()", true);
		$this->jquery->compile($this->view);
	}
	public function showAction($id=NULL){
		$this->view->pick("projects/show");
		$projet=$this->getInstance($id);
		$sourceImage=$this->jquery->exec("$('.img-circle').att('id)",true);
		$this->view->setVars(array("projet"=>$projet,"sourceImage"=>$img));
		$_SESSION['bread']['object'] = $projet;

		//parent::frmAction($id);
	}
}

