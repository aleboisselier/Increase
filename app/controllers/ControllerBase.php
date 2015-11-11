<?php

use Phalcon\Mvc\Controller;
use Ajax\bootstrap\html\base\CssRef;

class ControllerBase extends Controller
{
	public function indexAction()
    {
		$controller = substr($this->dispatcher->getControllerClass(), 0, -10);
		
    	$this->view->setVar("objects", $this->findObjects());
    	$this->view->setVar("title", $this->title);
    	$this->view->setVar("ControllerName", $controller);
    	
    	$this->view->pick('default/index');
    	
    	$this->jquery->getOnClick(".editBtn", $controller."/edit", ".content");
    	    	
    	$this->jquery->exec('$(function () {$(\'[data-toggle="tooltip"]\').tooltip()});', true);
    	$this->jquery->compile($this->view);
    	
    }
    
    public function editAction($id=null){
    	echo "Non implémenté";
    }
    
    protected function setBreadObject($object=null){
    	$this->jquery->exec('$(function () {$(\'.objectBreadcrumb\').text("'.$object.'")});', true);
    	$this->jquery->compile($this->view);
    }
    
    public function deleteAction($id){
    	$object = $this->findFirstObject($id);
    	echo $object;
    	if ($object != false) {
    		if ($object->delete() == false) {
    			$alert = $this->jquery->bootstrap()->htmlAlert("alertResult", $object." n'a pas pu être supprimé.", CssRef::CSS_SUCCESS);
    		} else {
    			$alert = $this->jquery->bootstrap()->htmlAlert("alertResult", $object." a correctement été supprimé.", CssRef::CSS_SUCCESS);
    		}
    		$alert->addCloseButton();
    		$alert->compile(null, $this->view);
    	}
    	$this->setBreadObject(null);
  		$this->indexAction();
    	$this->view->setRenderLevel(Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    }
    	
    protected function findObjects($args = ""){
    	return call_user_func($this->model.'::find', $args);
    }
    
    protected function findFirstObject($args = ""){
    	return call_user_func($this->model.'::findFirst', $args);
    }
    
    

}
