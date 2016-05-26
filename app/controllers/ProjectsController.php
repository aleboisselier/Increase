<?php

use Ajax\Jquery;
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
		$event .= $this->jquery->jsonArrayOn("click", ".loadReponses", ".msgTemplate", "", array("immediatly"=>true, "attr"=>"data-ajax", "jsCallback"=>"loadResponses(); $('.unloadResponses.'+self.attr('id')).show();self.hide();", "context"=>"$('.responses.'+self.attr('id'))"));

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
		$this->jquery->getOnClick(".manageBtn", "", ".content", array("attr"=>"data-ajax"));
		
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
		$this->jquery->getOn("change",".selectUc","",".infoUc",
				array("attr"=>"data-ajax", "jsCallback"=>"$('.infoUc').show();"));
		$this->view->setVars(array("project"=> $projet, "baseHref"=>$this->url->getBaseUri(), "ucs"=>$ucs));
		$_SESSION['bread']['object'] = Projet::findFirst($id);
		
	}
	
	public function manageUcAction($id=Null, $idProject=null){
		$uc=Usecase::findFirst("code='".$id."'");
		if(!$uc){
			$uc= new Usecase();
			$uc->setIdProjet($idProject);
			$uc->setAvancement(0);
		}
		
		$tasks = Tache::find("codeUseCase LIKE '".$uc->getCode()."'");
		$users=User::find("idRole <> 3 ORDER BY idRole");
		
    	$this->jquery->exec("$('input[type=\"range\"]').rangeslider({
  								polyfill: false,
								onSlide: function(position, value) {
									$('.avancement').html(value.toString()+'%');
								},
							});
    						//jQuery('#code').on('input', function() {
								//$('#id').attr('value', $('#code').val());
							//});
    					", true);
    	$this->jquery->postFormOnClick(".validateUpUc", "Usecases/updateFromProject", "frmObject",".content");
    	$this->jquery->execOn("click",".cancel","$('.infoUc').hide(); $('.selectUc > option:first').attr('selected', 'selected');");
    	$this->jquery->getOn("change",".selectTasks","",".tasks",
    			array("attr"=>"data-ajax", "jsCallback"=>"$('.tasks').show();"));
    	 
    	$this->jquery->compile($this->view);
		$this->view->setVars(array("usecase"=>$uc, "users"=>$users, "baseHref"=>$this->url->getBaseUri(), "tasks"=>$tasks));
		$_SESSION['bread']['object'] = Projet::findFirst($uc->getIdProjet());
		
	}
	
	public function manageTasksAction($id=null, $idUc=null){
		$tache = Tache::findFirst($id);
		if(!$tache){
			$tache = new Tache();
			$tache->setAvancement(0);
			$tache->setCodeUseCase($idUc);
		}
		$users = User::find("idRole<>3");
		
		$this->view->setVars(array("tache"=>$tache, "users"=>$users, "baseHref"=>$this->url->getBaseUri()));
		$_SESSION['bread']['object'] = $tache;
		
		$this->jquery->exec("$('input[type=\"range\"]').rangeslider({
  								polyfill: false,
								onSlide: function(position, value) {
									$('.avancementTasks').html(value.toString()+'%');
								},
							});", true);
		$this->view->pick("projects/manageTasks");
		
		$this->jquery->postFormOnClick(".validateTasks", "Taches/updateFromProject", "frmTasks",".content");
		$this->jquery->execOn("click",".cancel","$('.infoUc').hide(); $('.selectUc > option:first').attr('selected', 'selected');");
		$this->jquery->compile($this->view);
		$uc = Usecase::findFirst("code='".$tache->getCodeUseCase()."'");
		$_SESSION['bread']['object'] = Projet::findFirst($uc->getIdProjet());
		
	}
	
	public function frmAction($id=null){
		$projet=$this->getInstance($id);
		$this->view->setVar("project", $projet);
		if ($projet->getNom() == ""){
			$projet->setNom("Nouveau Projet");
		}
		
		$managers = User::find('idRole=4');
		
		$clients = User::find("idRole=3");
		$this->view->setVars(array("clients" => $clients, "managers"=>$managers));
		
		parent::frmAction($id);
		$_SESSION['bread']['object'] = $projet;

	}
}

