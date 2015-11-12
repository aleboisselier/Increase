<?php
use Phalcon\Mvc\View;
use Ajax\bootstrap\html\base\CssRef;

class UsersController extends ControllerBase
{

	public function initialize(){
		$this->model = "User";
		$this->title = 'Utilisateurs';
		$this->icon = "user";
	}
    
    public function editAction($id=0, $message = null){
    	if ($id == 0){
    		$user = new User();
    		$user->setIdentite("Nouvel Utilisateur");
    	}else{
    		$user = User::findFirst("id=".$id);
    	}
    	
    	$this->view->setVar("user", $user);
    	
    	$this->setBreadObject($user);
    	$this->url->getBaseUri();
    	
    	
    	$this->jquery->getOnClick(".delUser", "delete", ".content");
    	$this->jquery->getOnClick(".cancelUser", "edit", ".content");
    	//$this->jquery->postFormOnClick("updateUser", "update", "#userForm");
    	 
    	$this->jquery->bootstrap()->htmlAlert("info", "TSET", CssRef::CSS_INFO);
    	$this->jquery->compile($this->view);
    	$this->view->setRenderLevel(Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    	 
    }

}

