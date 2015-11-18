<?php


class IndexController extends ControllerBase
{

    public function indexAction(){
    	$this->jquery->getOnClick("a.btn","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->session->__unset("bread");
    	$this->jquery->getOnClick(".display-user","Index/displayUser",".display",array("user"=>$user));
    }
    
    public function displayUser(){
    	$user=User::find();
    	echo"pouet";
    }
}

