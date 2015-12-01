<?php

use Phalcon\Mvc\Controller;
use AuthController as Auth;

class ControllerBase extends Controller
{
	 public function afterExecuteRoute(){
	 	$this->view->setVar("siteUrl", $this->url->getBaseUri());
	 	
	 	if(!Auth::isAuth()){
	 		$this->dispatcher->forward(array("controller" => "Auth", "action" => "signin"));
	 		$this->jquery->exec('$(".breadcrumb").hide();$(".menuItem").hide();$(".nomUser").hide()', true);
    		$this->jquery->compile($this->view);
	 	}else{
	 		$this->breadCrumbsAction();
	 		$this->menuAction();
	 		$this->userAction();
	 	}
	 	
	 }
	 
	 public function menuAction(){
	 	$this->jquery->getOnClick(".menuItem","","#content",array("attr"=>"data-ajax"));
	 	$this->jquery->compile($this->view);
	 }
	 
	 public function userAction(){
	 	$user=$this->session->get("user");
	 	//$this->jquery->doJqueryOn("click",".display-user",".infoUser","html",$user."<br>".$user->getMail());
	 	//$this->jquery->compile($this->view);
	 	$this->view->setVars(array("viewUser"=>$user."<br>".$user->getMail()));
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

   		$this->jquery->exec('$(".breadcrumb").show();$(".menuItem").show()', true);
    	$this->jquery->exec('$(".breadcrumb").html("'.$breadStr.'");', true);
    	$this->jquery->compile($this->view);
	 }
	 
}
