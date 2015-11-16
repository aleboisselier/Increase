<?php
class TachesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Tache";
	}
}