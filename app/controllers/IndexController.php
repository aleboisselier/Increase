<?php

use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    public function indexAction($msg=""){
    	$this->view->setVar("msg", $msg);
    	$this->session->__unset("bread");
    	if (AuthController::isAuth()){
    		$user = $this->session->get('user');
    		switch ($user->getIdRole()) {
    			case 1:
    				$this->adminIndex($msg);
    				break;
				case 2:
					$this->dvlpIndex($msg);
					break;
				case 3:
					break;
				case 4:
				break;
    		}
    	}
    }
    
    public function displayUserAction(){
    	$user=User::find();
    }
    
    public function indexAjaxAction($msg){
    	$this->view->pick("index/index");
    	$this->indexAction();
		$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
    
    public function adminIndex(){	    	
    	$this->jquery->getOnClick("a.btn","","#content",array("attr"=>"data-ajax"));
		$this->jquery->compile($this->view); 	
    }
    public function dvlpIndex(){
    	$user=$this->session->get("user");
    	$user=$user->getId();
    	
    	$projects = $this->modelsManager->createBuilder()
		   ->from('Projet')
		   ->join('Usecase', 'Usecase.idProjet = Projet.id')
		   ->where("Usecase.idDev = ".$user)
		   ->groupBy("Projet.id")
		   ->getQuery()
		   ->execute();
    	
    	$this->view->pick("index/dvlp");
    	//$this->jquery->exec("$('[data-toggle=\"tooltip\"]').tooltip()", true);
    	
    	$this->jquery->getOnClick("a.list-group-item","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->view->setVars(array("projets"=>$projects, "id"=>$id, "av"=>$av));
    }
}

