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
	
	public function updateProjectAction(){
    	$object=$this->getInstance(@$_POST["id"]);
    	$this->setValuesToObject($object);
    	$object->setDate(date("Y-m-d H:i:s"));
    	if(@$_POST["id"]){
    		try{
    			$object->save();
    			$msg=new DisplayedMessage($this->model." `{$object}` mis à jour");
    		}catch(\Exception $e){
    			$msg=new DisplayedMessage("Impossible de modifier l'instance de ".$this->model,"danger");
    		}
    	}else{
    		try{
    			$object->save();
    			$msg=new DisplayedMessage("Instance de ".$this->model." `{$object}` ajoutée");
    		}catch(\Exception $e){
    			$msg=new DisplayedMessage("Impossible d'ajouter l'instance de ".$this->model,"danger");
    		}
    	}
    	$this->loadMessagesAction($object->getIdProjet(), $object->getIdFil());
  
		
    }

    public function loadMessagesAction($idProjet, $idFil=NULL){
		$sql = "idProjet=".$idProjet;
		
		if($idFil == null){
			$sql .= " AND idFil IS NULL";
		}else{
			$sql .= " AND idFil=".$idFil;
		}
	
		$messages = Message::find($sql);

		foreach ($messages as $msg) {
			$reponses[$msg->getId()] = $responses = count(Message::find("idFil=".$msg->getId()));
		}
		
		$this->view->setVars(array("messages"=>$messages, "responses" => $responses));
    	$this->view->pick("messages/main");
	}
}
