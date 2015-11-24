<?php

use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    public function indexAction($msg){
    	$this->view->setVar("msg", $msg);
    	$this->jquery->getOnClick("a.btn","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->session->__unset("bread");
    }
    
    public function displayUserAction(){
    	$user=User::find();
    }
    
    public function indexAjaxAction($msg){
   		$this->indexAction();
   		$this->view->pick("index/index");
		$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
}

