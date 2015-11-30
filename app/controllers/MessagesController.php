<?php
class MessagesController extends DefaultController{
	public function initialize(){
		$this->model="Message";
		$this->icon="comment";
		$this->title="Messages";
		parent::initialize();
	}
	
	public function frmAction($id = NULL){
		$message = $this->getInstance($id);
		$projects = Projet::find();
		$users = User::find();
		
		$this->view->setVars(array("message"=>$message, "users"=>$users, "projects"=>$projects));
		
		parent::frmAction($id);
	}
}