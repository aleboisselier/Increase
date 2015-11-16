<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller
{
	 public function beforeExecuteRoute(){
	 	$this->view->setVar("siteUrl", $this->url->getBaseUri());
	 }
	 
	 public function afterExecuteRoute(){
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
