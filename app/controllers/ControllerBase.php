<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use AuthController as Auth;

class ControllerBase extends Controller
{
	 public function afterExecuteRoute(){
	 	$this->view->setVar("siteUrl", $this->url->getBaseUri());
	 	
	 	if(!Auth::isAuth()){
	 		$this->dispatcher->forward(array("controller" => "Auth", "action" => "signin"));
	 	}
	 	
	 	$this->jquery->get("Index/breadCrumbs", ".bread");
	 	$this->jquery->compile($this->view);
	 }
	 
	 public function breadCrumbsAction(){
	 	$controller = $this->dispatcher->getControllerName();
	 	$bread = $this->session->get("bread");
	 	if(isset($bread['object']))
	 		$this->view->setVar("ObjectName", $bread['object']);
		$this->view->setVar("ControllerName", $bread['controllerName']);
		$this->view->setVar("siteUrl", $this->url->getBaseUri());
		$this->view->setVar("controllerIcon", $bread['controllerIcon']);
		$this->view->setVar("title", $bread['controllerTitle']);
		$this->view->pick("main/breadcrumbs");
		$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
	 }
	 
}
