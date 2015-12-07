<?php
class JsonController extends ControllerBase{
	
	public function testAction(){
		$users = User::find();
		$ar = $users->toArray();
		print_r(json_encode($ar));
		$this->view->disable();
	}
	
	public function listTachesAction($codeUseCase){
		$taches = Tache::find('codeUseCase LIKE "'.$codeUseCase.'"');
		$ar = $taches->toArray();
		print_r(json_encode($ar));
		$this->view->disable();
	}
	
	public function loadMessagesAction($idProjet, $idFil=NULL){
		$sql = "idProjet=".$idProjet;
		
		if($idFil == null){
			$sql .= " AND idFil IS NULL";
		}else{
			$sql .= " AND idFil=".$idFil;
		}
	
		$messages = Message::find($sql);
		
		$result = array();
		foreach ($messages as $message){
			$responses = count(Message::find("idFil=".$message->getId()));
			array_push($result, array(
					"id"=>$message->getId(),
					"objet"=>$message->getObjet(),
					"content"=> $message->getContent(),
					"author"=> $message->getUser()->__toString(),
					"responses"=> $responses
			));
		}
		print_r(json_encode($result));
	
		$this->view->disable();
	}
}