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
	 	
	 	$this->breadCrumbsAction();
	 }
	 
	 public function breadCrumbsAction(){
	 	$controller = $this->dispatcher->getControllerName();
	 	$url = $this->url->getBaseUri();
		$bread = $this->session->get("bread");
		
    	$breadStr = "<li><a href='".$url."'><span class='glyphicon glyphicon-home' aria-hidden='true'></span>&nbsp;Accueil</a></li>";
    	if($bread != null){
    		if($bread['controllerName'] != ""){
    			$this->view->setVar("title", $bread['controllerTitle']);
    			$this->view->setVar("ControllerName", $bread['controllerName']);
    			$this->view->setVar("controllerIcon", $bread['controllerIcon']);
    			 
    			$breadStr .= "<li><a href='".$url.$bread['controllerName']."'><span class='glyphicon glyphicon-".$bread['controllerIcon']."'></span>&nbsp; ".$bread['controllerTitle']."</a></li>";
    		}
    		if(isset($bread['object'])){
    			$this->view->setVar("ObjectName", $bread['object']);
    			$breadStr .= "<li class='active'>".$bread['object']."</li>";
    		}

    		$this->view->setVar("siteUrl", $this->url->getBaseUri());
   			
   			
   		}

    	
    	$this->jquery->exec('$(".breadcrumb").html("'.$breadStr.'");', true);
    	$this->jquery->compile($this->view);
	 }
	 
}
