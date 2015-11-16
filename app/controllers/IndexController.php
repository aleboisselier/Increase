<?php


class IndexController extends ControllerBase
{

    public function indexAction(){
    	$this->jquery->getOnClick("a.btn","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->session->__unset("bread");
    }
}

