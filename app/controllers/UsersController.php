<?php
use Phalcon\Mvc\View;
use Ajax\bootstrap\html\base\CssRef;

class UsersController extends ControllerBase
{
	protected $model = "User";
	protected $title = '<span class="glyphicon glyphicon-user" ></span>&nbsp;Utilisateurs';


    public function indexAction()
    {
    	parent::indexAction();
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
    	
    	
    	$this->jquery->getOnClick(".delUser", "Users/delete", ".content");
    	 
    	$this->jquery->bootstrap()->htmlAlert("info", "TSET", CssRef::CSS_INFO);
    	$this->jquery->compile($this->view);
    	$this->view->setRenderLevel(Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    	 
    }

}

