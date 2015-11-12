<?php

class ProjectsController extends ControllerBase
{		
	public function initialize(){
		$this->model = "Projet";
		$this->title = 'Projets';
		$this->icon = "book";
	}

}

