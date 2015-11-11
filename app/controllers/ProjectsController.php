<?php

class ProjectsController extends ControllerBase
{	
	protected $model = "Projet";
	protected $title = '<span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp;Projets';

    public function indexAction()
    {
    	parent::indexAction();
    }

}

