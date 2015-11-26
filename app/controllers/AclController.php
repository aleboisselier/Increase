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
	
	public function toArray($acls){
		$finalAcls = array();
		
		foreach ($acls as $acl){
			if (!array_key_exists($acl->getController(), $finalAcls)){
		
				$finalAcls[$acl->getController()] = array();
			}
			$finalAcls[$acl->getController()][$acl->getAction()] = 1;
		}
		return $finalAcls;
	}


}

