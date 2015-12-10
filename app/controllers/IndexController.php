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
					$this->clientIndex($msg);
					break;
				case 4:
					$this->managerIndex($msg);
				break;
    		}
    	}
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

    	$projects = $this->modelsManager->createBuilder()
		   ->from('Projet')
		   ->join('Usecase', 'Usecase.idProjet = Projet.id')
		   ->where("Usecase.idDev = ".$user->getId())
		   ->groupBy("Projet.id")
		   ->getQuery()
		   ->execute();
    	
    	$this->view->pick("index/dvlp");
    	
    	$this->jquery->getOnClick("a.list-group-item","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);

    	$this->view->setVars(array("projets"=>$projects, "user"=>$user));
    }
    
    public function clientIndex(){
    	$user=$this->session->get("user");
    	$idUser=$user->getId();
    	 
    	$projects = Projet::find("idClient=".$idUser);
    	 
    	$this->view->pick("index/client");
    	 
    	$this->jquery->getOnClick("a.list-group-item","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->view->setVars(array("projects"=>$projects, "user"=>$user->getIdentite()));
    }
    public function managerIndex(){
    	$user=$this->session->get("user");
    	$idUser=$user->getId();
    
    	$projectsManager = Projet::find("idManager=".$idUser);
    	
    	$projectsDvlp = $this->modelsManager->createBuilder()
    	->from('Projet')
    	->join('Usecase', 'Usecase.idProjet = Projet.id')
    	->where("Usecase.idDev = ".$idUser)
    	->groupBy("Projet.id")
    	->getQuery()
    	->execute();
    
    	$this->view->pick("index/manager");
    
    	$this->jquery->getOnClick("a.list-group-item","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->view->setVars(array("projectsManager"=>$projectsManager, "projectsDvlp"=>$projectsDvlp, "user"=>$user->getIdentite()));
    }
}

