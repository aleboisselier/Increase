<?php

use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    public function indexAction($msg=""){
	
    	$this->view->setVar("msg", $msg);
    	$this->session->__unset("bread");
    	if (AuthController::isAuth()){
    		$user = $this->session->get('user');
    		switch ($user->getIdRole()) {
    			case 1:
    				$this->adminIndex($msg);
    				break;
    		
    			default:
    				;
    				break;
    		}
    	}

    }
    
    public function displayUserAction(){
    	$user=User::find();
    }
    
    public function indexAjaxAction($msg){
   		$this->indexAction();
   		$this->view->pick("index/index");
		$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
    
    public function adminIndex(){	    	
    	$this->jquery->getOnClick("a.btn","","#content",array("attr"=>"data-ajax"));
		$this->jquery->compile($this->view); 	
    }
}

