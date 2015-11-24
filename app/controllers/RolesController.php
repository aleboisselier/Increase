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
				), 
				"Roles" => array(
					"name" => "Rôles",
				),
				"Taches"=>array(
					"name" => "Tâches",
				),
				"Messages"=>array(
					"name" => "Messages",
				),
				"UseCases" => array(
					"name" => "Use Cases",
				),
				"Users" => array(
					"name" => "Utilisateurs",
				)
		);

		$acls = Acl::find("idRole=".$role->getId());
		
		$this->view->setVars(array("role"=>$role,"acls"=>$acls, "controllers"=> $controllers,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		$_SESSION['bread']['object'] = $role;
		
		parent::frmAction($id);
	}
	
	
}

