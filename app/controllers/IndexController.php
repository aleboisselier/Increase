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
    	if($this->session->get("user")==!null){
    		$user=$this->session->get("user");
    		$user=$user->getId();
    		$ucs=Usecase::find("idDev=".$user);
    		$list=array();
    		foreach($ucs as $uc){
    			$idProjet=$uc->getIdProjet();
    			$projets=Projet::find("id=".$idProjet);
    			foreach($projets as $projet){
    				$list[]= $projet->getNom()."/".$projet->getId();
    			}
    		}
    		$listTri=array();
    		for($i = 0; $i < count($list); ++$i) {
    			if($list[$i] != $list[$i+1]){
    				$listTri[]=$list[$i];
    			}
    		};
    		$id=array();
    		$listP=array();
    		foreach($listTri as $data){
    			$id[]=substr($data, -1);
    			$listP[]=substr($data,0, -2);
    			
    		};
    	}
    	$this->view->pick("index/dvlp");
    	$this->jquery->exec("$('[data-toggle=\"tooltip\"]').tooltip()", true);
    	$this->jquery->getOnClick("a.btn","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    	$this->view->setVars(array("listP"=>$listP,"projets"=>$projets, "id"=>$id));
    }
}

