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
}