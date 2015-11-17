<?php
class UseCasesController extends DefaultController{
	public function initialize(){
		$this->model="Usecase";
		$this->icon = "briefcase";
		$this->title = "Cas d'Utilisation";
		parent::initialize();
	}
}