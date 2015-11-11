<?php

use Ajax\bootstrap\html\base\CssRef;
class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$bs=$this->jquery->bootstrap();
    	$button = $bs->htmlButton("bt-1", "Utilisateurs");
    	$button->onClick($this->jquery->getDeferred("users", "#panelClient"));
    	$panel = $bs->htmlPanel("#panelClient", 'Utilsateurs');
    	$panel->addHeader("Utilisateurs");
    	$panel->setStyle(CssRef::CSS_WARNING);
    	
    	$split = $bs->htmlSplitbutton("splitBtn", "Test", array("Ajouter", "Sélectionner"));
    	$this->jquery->getOnClick("#a-splitBtn-dropdown-item-1", "users/index", "#panelClient");
    			
    	$modal = $bs->htmlModal("modal1", "Mon modal de OUF");
    	echo $modal->compile();
    	
    	echo $split->onClick($modal->jsShow());
    	   
    	$this->jquery->compile($this->view);
       
    }

    public function usecasesAction(){
    	$usecases=Usecase::find();
    	foreach ($usecases as $usecase){
    		echo $usecase->getNom()." ".$usecase->getDeveloppeur()->getIdentite()."<br>";
    	}
    }

    public function autreAction(){
    	$ids = $this->modelsManager->createBuilder()->columns('idProjet')
    	->from('Usecase')
    	->groupBy('Usecase.idProjet')
    	->where("idDev=5")
    	->getQuery()
    	->execute();
        	foreach ($ids as $id){
    		echo $id->idProjet."<br>";
    	}
    }

}

