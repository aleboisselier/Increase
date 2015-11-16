<?php
class TachesController extends DefaultController{
	public function initialize(){
		$this->model="Tache";
		$this->icon="tasks";
		$this->title="Tâches";
		parent::initialize();
	}
}