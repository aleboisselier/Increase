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
	 	$object = $this->session->get("object");
	 	
	 	$this->view->setVar("ObjectName", $object);
		$this->view->setVar("ControllerName", $controller);
		$this->view->setVar("siteUrl", $this->url->getBaseUri());
		$this->view->setVar("controllerIcon", $this->icon);
		$this->view->setVar("title", $this->title);
		$this->view->pick("main/breadcrumbs");
		$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
	 }
	 
}
