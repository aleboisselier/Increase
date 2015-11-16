<?php
class UseCasesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Usecase";
	}
}