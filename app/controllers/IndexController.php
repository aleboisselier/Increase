<?php

use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    public function indexAction($msg=""){
	
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

