<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function indexAction()
    {
    	$this->view->setVar("objects", call_user_func(array(__NAMESPACE__ .$this->model, 'find')));
    	$this->view->setVar("title", $this->title);
    	$this->view->pick('default/index');
    	
    }
}
