<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		$this->model="Projet";
		$this->icon="book";
		$this->title="Projets";
		parent::initialize();
	}
	
	public function indexAction($message=NULL){
		parent::indexAction($message);
		$this->view->pick("projects/index");
		$this->jquery->exec("$('[data-toggle=\"tooltip\"]').tooltip()", true);
		$this->jquery->getOnClick(".update, .add","","#content",array("attr"=>"data-ajax"));
		$this->jquery->compile($this->view);
	}
	
	public function totalPoidsUcs($id=NULL){
		$ucs=Usecase::find("idProjet=".$id);
		$ucTotal = 0;
		foreach ($ucs as $uc){
			$ucTotal+=$uc->getPoids();
		}
		return $ucTotal;
	}
	public function tmpEcoule($id){
		$projet=$this->getInstance($id);
		
		//date begin project
		$dateBegin=$projet->getDateLancement();
		
		//date end project
		$dateEnd=$projet->getDateFinPrevue();
		
		//return result in day of project duration
		$dureeProjet = ceil((strtotime($dateEnd) - strtotime($dateBegin))/86400);
		
		//return result in day of number elapsed days
		$nowDaysProject = ceil((strtotime($dateEnd) - strtotime(date("Y-m-d")))/86400);
		if($nowDaysProject<=0){
			return "100%";
		}else{
			return ceil(($nowDaysProject*100)/$dureeProjet)."%";
		}
	}
	
	public function showAction($id=NULL){
	    
		$this->view->pick("projects/show");
		$projet=$this->getInstance($id);
		
		$ucs=Usecase::find("idProjet=".$id);
		
		//recupere le pourcentage de temps écoulé
		$tmpEcoule=$this->tmpEcoule($id);
		
		//messages
		$messages=Message::find("idProjet=".$id);
		
		//users
		$users=User::find();
		$count = count(Message::find("idProjet=".$id." AND idFil IS NULL"));
		
		//recupere les taches
		$tachesUcs=$this->listAction($id);
				
		$this->view->setVars(
			array(
					"baseHref"=>$this->url->getBaseUri(),
					"currUser"=>$this->session->get("user"),
					"projet"=>$projet,
					"ucs"=>$ucs,
					//"poids"=>$poids,
					"tmpEcoule"=>$tmpEcoule,
					"messages"=>$messages,
					"users"=>$users,
					"tachesUcs"=>$tachesUcs,
					"nbMessages"=>$count,
					"rights"=>$this->session->get("rights"),
			));
		$_SESSION['bread']['object'] = $projet;
		
		$this->jquery->jsonArrayOn("click",".loadTasks",".taskRepeat > *", "", 
				array(
						"context"=>"$('table[id=\"'+self.attr('id')+'\"]')",
						"attr"=>"data-ajax",
						"jsCallback"=>"
							$('table[id=\"'+self.attr('id')+'\"]').show();
							self.hide();
							self.parent().parent().find('.hideTasks').show();
							$('.ticket').css('height', $('.projectContent').height());
						"
				));
		$this->jquery->execOn("click", ".hideTasks", "
				$(this).hide();
				$(this).parent().parent().find('.loadTasks').show();
				$(this).parent().parent().parent().find('table').hide();
				");
		$this->jquery->execOn("click", ".displayUcs","$('.ucs').show();$('.hideUcs').show();$('.displayUcs').hide();$('.ticket').css('height', $('.projectContent').height());");
		$this->jquery->execOn("click", ".hideUcs","$('.ucs').hide();$('.displayUcs').show();$('.hideUcs').hide();$('.ticket').css('height', $('.projectContent').height());");
		
		$_SESSION['bread']['object'] = $projet;
		
		$event = "function loadResponses(){";
		$event .= $this->jquery->jsonArrayOn("click", ".loadReponses", ".msgTemplate", "", array("immediatly"=>true, "attr"=>"data-ajax", "jsCallback"=>"loadResponses()", "context"=>"$('.responses.'+self.attr('id'))"));

		$event.= $this->jquery->execOn("click", ".newMessage", "loadMsgForm($(this), false)", array("immediatly"=>true));
		$event.= $this->jquery->execOn("click", ".newResponse", "loadMsgForm($(this), true)", array("immediatly"=>true));
		$event.= $this->jquery->execOn("click", ".cancel", "
				$('.msgForm:not(.model)').empty();
				$('.newResponse').removeClass('disabled');
				$('.ticket').css('height', $('.projectContent').height());
				", array("immediatly"=>true));
		$event .= "}";
		$event.="$('.ticket').css('height', $('.projectContent').height());";
		
		$this->jquery->exec("
				function loadMsgForm(elt, response){
					$('.msgForm:not(.model)').empty();
					$('.newResponse').removeClass('disabled');
					var newMsg = $('.msgForm').clone(true, true);
					newMsg.removeClass('model');
					
					if(response){
						newMsg.appendTo($('.responses.'+elt.attr('id')));
					}else{
						newMsg.appendTo($('.messages'));
					}
				
					elt.addClass('disabled');
					newMsg.show(true);
					newMsg.find('#idFil').attr('value', elt.attr('id'));
					newMsg.attr('id', 'sendMessage');
					$('.ticket').css('height', $('.projectContent').height());
				}
				", true);
		
		$this->jquery->jsonArrayOn("click", ".loadMessages", ".msgTemplate", "", array( "attr"=>"data-ajax", "jsCallback"=>"$('.messages').show();$('.loadMessages').hide();loadResponses();$('.ticket').css('height', $('.projectContent').height());"));
		$this->jquery->postFormOn('click', ".validate", "Messages/updateProject", 'sendMessage',"#content");
		
		$this->jquery->exec($event, true);
		$this->jquery->execOn("click", ".hideMessages", "$('.messages').hide();$('.loadMessages').show();$('.ticket').css('height', $('.projectContent').height());");
		$this->jquery->compile($this->view);
	}
	public function listAction($id=Null){
			$ucs=Usecase::find("idProjet=".$id);
			$tasks = array();
			foreach ($ucs as $uc){
				$ucCode=$uc->getCode();
				$taches=Tache::find("codeUseCase='".$ucCode."'");
				$tasks[$ucCode] = $taches->toArray();
			}
			return $tasks;
	}
	
	public function manageAction($id=Null){
		$this->view->pick("projects/manage");
		$projet=$this->getInstance($id);
		$ucs=Usecase::find("idProjet=".$id);
		$this->jquery->getOn("click",".optionUc","",".infoUc",
				array("attr"=>"data-ajax", "jsCallback"=>"$('.infoUc').show();"));
		$this->view->setVars(array("project"=> $projet, "baseHref"=>$this->url->getBaseUri(), "ucs"=>$ucs));
	}
	
	public function manageUcAction($id=Null){
		$uc=Usecase::findFirst("code='".$id."'");
		$users=User::find("idRole <> 3 ORDER BY idRole");
		$this->jquery->postFormOnClick(".validateUpUc", "Usecases/updateFromProject", "frmObject","");
    	$this->jquery->getOnClick(".cancel","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->exec("$('input[type=\"range\"]').rangeslider({
  								polyfill: false,
								onSlide: function(position, value) {
									$('.avancement').html(value.toString()+'%');
								},
							});", true);
    	$this->jquery->compile($this->view);
		$this->view->setVars(array("usecase"=>$uc,"users"=>$users, "baseHref"=>$this->url->getBaseUri()));
	}
	
	public function frmAction($id=null){
		$projet=$this->getInstance($id);
		$this->view->setVar("project", $projet);
		
		$clients = User::find("idRole=3");
		$this->view->setVar("clients", $clients);
		
		parent::frmAction($id);
		$_SESSION['bread']['object'] = $projet;

	}
}

