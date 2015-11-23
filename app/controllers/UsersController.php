<?php


class UsersController extends DefaultController{
	
	public function initialize(){
		$this->model="User";
		$this->icon = "user";
		$this->title = "Utilisateurs";
		parent::initialize();
	}

	public function frmAction($id=NULL){
		$user=$this->getInstance($id);
		$roles = Role::find();
		$this->view->setVars(array("user"=>$user,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName(), "roles"=>$roles));
		$this->view->pick("users/edit");
		$_SESSION['bread']['object'] = $user;
		
		parent::frmAction($id);
	}
	
	public function setValuesToObject(&$object){
		parent::setValuesToObject($object);
		
	}
	
	
}

