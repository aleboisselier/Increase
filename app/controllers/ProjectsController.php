<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Projet";
		$this->icon="book";
		$this->title="Projets";
	}
}

