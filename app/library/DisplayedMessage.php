<?php
/**
 * Représente un message à afficher dans une alert Bootstrap
* @author jcheron
* @version 1.1
*/
class DisplayedMessage {
	private $content;
	private $type;
	private $timerInterval;
	private $dismissable;
	private $visible;

	public function DisplayedMessage($content,$type="success",$timerInterval=0,$dismissable=true,$visible=true){
		$this->content=$content;
		$this->type=$type;
		$this->dismissable=$dismissable;
		$this->timerInterval=$timerInterval;
		$this->visible=$visible;
	}

	public function getContent() {
		return $this->content;
	}

	public function setContent($content) {
		$this->content=$content;
		return $this;
	}

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type=$type;
		return $this;
	}

	public function getTimerInterval() {
		return $this->timerInterval;
	}

	public function setTimerInterval($timerInterval) {
		$this->timerInterval=$timerInterval;
		return $this;
	}

	public function getDismissable() {
		return $this->dismissable;
	}

	public function setDismissable($dismissable) {
		$this->dismissable=$dismissable;
		return $this;
	}
	public function compile($jquery){
		$alert=$jquery->bootstrap()->htmlAlert("message",$this->content,$this->type);
		if($this->visible==false){
			$alert->setProperty("style","display:none;");
		}
		$alert->setCloseable($this->dismissable);
		if(isset($this->timerInterval) && $this->timerInterval>0){
			$jquery->hide(".alert",$this->timerInterval,'',true);
		}
		return $alert->compile($jquery);
	}
}