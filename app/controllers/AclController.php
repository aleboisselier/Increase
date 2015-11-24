<?php

class AclController extends DefaultController{

	public function initialize(){
		$this->model="Acl";
		$this->icon = "lock";
		$this->title = "Droits D'Accès";
		parent::initialize();
	}

	public function frmAction($id=NULL){
		$acl=$this->getInstance($id);
		$_SESSION['bread']['object'] = $acl;

		parent::frmAction($id);
	}


}

