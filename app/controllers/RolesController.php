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
		
		$this->view->setVars(array("role"=>$role,"acls"=>$acls, "controllers"=> $controllers,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		$_SESSION['bread']['object'] = $role;
		
		parent::frmAction($id);
	}
	
	
}

