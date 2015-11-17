<?php
use Phalcon\Mvc\Controller;
use AuthController as Auth;
use Phalcon\Mvc\View;

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
		$this->dispatcher->forward(array("controller"=>"Auth", "action"=>"signin"));
		$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
	}
	
	public function getUser(){
		return $this->session->get("user");
	}
	
	public static function isAuth(){
		
		if (isset($_SESSION['user'])) return true;
		return false;
	}
	
	public function signinAction(){
		$this->jquery->postFormOnClick(".validate", "Auth/login", "frmLogin","#content");
		$this->jquery->compile($this->view);
	}
	
	public function initialize() {
		if(Auth::isAuth()){
			$this->dispatcher->forward(array("controller" => "Index", "action" => "index"));
		}
	}
	
	public function loginAction(){
		if($this->request->isPost()){
			$user = User::findFirst("mail = '".@$_POST['mail']."'");
			if($user != null){
				if (password_verify(@$_POST['pass'], $user->getPassword()))
					$this->session->set("user", $user);
			}
			$this->dispatcher->forward(array("controller"=>"Index","action"=>"index","params"=>array($msg)));
		}
	}

}

