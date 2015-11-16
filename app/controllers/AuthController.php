<?php
use Phalcon\Mvc\Controller;

class AuthController extends Controller
{

	public function indexAction()
	{
		
	}

	public function asUserAction(){
		$user = User::findFirst();
		$this->session->set("user", $user);
		$this->dispatcher->forward(array("controller"=>"Index", "action"=>"index"));
	}
	
	public function logoutAction(){
		$this->session->destroy(true);
		$this->cookies->delete('user');
		$this->dispatcher->forward(array("controller"=>"Index", "action"=>"index"));
	}
	
	public function getUser(){
		return $this->session->get("user");
	}
	
	public function isAuth(){
		if ($this->session->get("user") != null) return true;
		return false;
	}


}

