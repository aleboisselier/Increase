<?php
class JsonController extends ControllerBase{
	
	public function testAction(){
		$users = User::find();
		$ar = $users->toArray();
		print_r(json_encode($ar));
		$this->view->disable();
	}
	
	public function getActions(){
		
	}
}