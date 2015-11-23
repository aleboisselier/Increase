<?php

use Ajax\bootstrap\html\html5\HtmlSelect;

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
		$r = array();
		foreach ($roles as $role){
			array_push($r, array($role->getId() => $role->getLibelle()));
		}
		$select=new HtmlSelect("role","Rôle","Sélectionnez un rôle...");
		$select->setOptions($r);
		$select->setValue($user->getRole());
		$select->compile($this->jquery,$this->view);
		$this->view->setVars(array("user"=>$user,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		//$this->view->pick("users/edit");
		$_SESSION['bread']['object'] = $user;
		
		parent::frmAction($id);
	}
	
	public function setValuesToObject($object){
		parent::setValuesToObject($object);
		
	}
	
	
}

