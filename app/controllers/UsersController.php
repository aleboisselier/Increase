<?php

use Phalcon\Mvc\View;
class UsersController extends ControllerBase
{
	protected $model = "User";
	protected $title = "Utilisateurs";


    public function indexAction()
    {
    	parent::indexAction();
    	$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

