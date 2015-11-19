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
	
	public function signinAction($isAjax){
		$this->jquery->postFormOnClick(".validate", "Auth/login", "frmLogin","#content");
		$this->jquery->getOnClick(".fastConnect", "Auth/fastConnect", "#content");
		$this->jquery->compile($this->view);
		
		if ($isAjax){
			$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
		}
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
				if (password_verify(@$_POST['pass'], $user->getPassword())){
					$this->session->set("user", $user);
					$msg = new DisplayedMessage("Bienvenue ".$user);
					$this->dispatcher->forward(array("controller"=>"Index","action"=>"indexAjax","params"=>array($msg)));
				}
				else{
					$this->dispatcher->forward(array("controller"=>"Auth","action"=>"signin","params"=>array(true, $msg)));
				}
			}else{
				$this->dispatcher->forward(array("controller"=>"Auth","action"=>"signin","params"=>array(true, $msg)));
			}
		}
	}
	
	public function fastConnectAction($role){
		$user = User::findFirst("role LIKE '".$role."'");
		if($user != null){
			$this->session->set("user", $user);
			$msg = new DisplayedMessage("Bienvenue ".$user);
			$this->dispatcher->forward(array("controller"=>"Index","action"=>"indexAjax","params"=>array($msg)));
		}else{
			$this->dispatcher->forward(array("controller"=>"Auth","action"=>"signin","params"=>array(true)));
		}
	}
	
	public function resetPassAction(){
		$users = User::find();
		foreach ($users as $user){
			$user->setPassword(password_hash("test", PASSWORD_BCRYPT));
			$user->save();
		}
	}

}
