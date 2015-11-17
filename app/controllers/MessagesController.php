<?php
class MessagesController extends DefaultController{
	public function initialize(){
		$this->model="Message";
		$this->icon="comment";
		$this->title="Messages";
		parent::initialize();
	}
}