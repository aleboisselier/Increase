<?php



class RolesController extends DefaultController{
	
	public function initialize(){
		$this->model="Role";
		$this->icon = "tags";
		$this->title = "Rôles";
		parent::initialize();
	}

	public function frmAction($id=NULL){
		$role=$this->getInstance($id);
		
		
		$controllers = array("Projects" => "Projets", "Roles" => "Rôles","Taches"=>"Tâches","Messages"=>"Messages","UseCases" => "Use Cases","Users" => "Utilisateurs");
		$controllers = array(
				"Default" => array(
					"name" => "Tous",
					"actions" => array(
						"index" => "Lister",
						"frm" => "Afficher les détails",
						"update" => "Modifier/Ajouter",
						"delete" => "Supprimer"
					)
				),
				"Projects" => array(
					"name" => "Projets",
					"actions" => array()
				), 
				"Roles" => array(
					"name" => "Rôles",
					"actions" => array()
				),
				"Taches"=>array(
					"name" => "Tâches",
					"actions" => array()
				),
				"Messages"=>array(
					"name" => "Messages",
					"actions" => array()
				),
				"UseCases" => array(
					"name" => "Use Cases",
					"actions" => array()
				),
				"Users" => array(
					"name" => "Utilisateurs",
					"actions" => array()
				)
		);

		$acls = Acl::find("idRole=".$role->getId());
		$finalAcls = array();
		
		foreach ($acls as $acl){
			if (!array_key_exists($acl->getController(), $finalAcls)){
				
				$finalAcls[$acl->getController()] = array();		
			}
			$finalAcls[$acl->getController()][$acl->getAction()] = 1;
		}		
		$this->view->setVars(array("role"=>$role,"acls"=>$finalAcls, "controllers"=> $controllers,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		$_SESSION['bread']['object'] = $role;
		
		$this->jquery->postFormOnClick(".validateACL", $this->dispatcher->getControllerName()."/updateACL", "frmObject","#content");
		
		parent::frmAction($id);
	}
	
	public function updateACLAction(){
		if($this->request->isPost()){
			$object=$this->getInstance(@$_POST["idRole"]);
    		if(@$_POST["idRole"]){
    			try{
    				$acls = Acl::find("idRole=".@$_POST["idRole"]);
    				foreach ($acls as $a){
    					$a->delete();
    				}
    				foreach ($_POST['acl'] as $acl){
    					$acl = explode("/", $acl);
    					$dbAcl = new Acl();
    					$dbAcl->setIdRole(@$_POST["idRole"]);
    					$dbAcl->setController($acl[0]);
    					$dbAcl->setAction($acl[1]);
    					$dbAcl->save();
    				}
    				$msg=new DisplayedMessage("Droits de  `{$object}` mis à jour");
    			}catch(\Exception $e){
    				$msg=new DisplayedMessage("Impossible de mettre à jour les droits de `{$object}`","danger");
    			}
    		}else{
    			try{
    				$object->save();
    				foreach ($_POST['acl'] as $acl){
    					$acl = explode("/", $acl);
    					$dbAcl = new Acl();
    					$dbAcl->setIdRole(@$_POST["idRole"]);
    					$dbAcl->setController($acl[0]);
    					$dbAcl->setAction($acl[1]);
    					$dbAcl->save();
    				}
    				$msg=new DisplayedMessage("Instance de ".$this->model." `{$object}` ajoutée");
    			}catch(\Exception $e){
    				$msg=new DisplayedMessage("Impossible d'ajouter l'instance de ".$this->model,"danger");
    			}
    		}
    		
    	$this->dispatcher->forward(array("controller"=>$this->dispatcher->getControllerName(),"action"=>"index","params"=>array($msg)));
    	}
	}	
	
}

