<?php
namespace Ajax\bootstrap\html\content;

use Ajax\bootstrap\html\base\HtmlDoubleElement;
use Ajax\bootstrap\html\base\CssSize;
use Ajax\JsUtils;
use Phalcon\Mvc\View;

/**
 * Inner element for Twitter Bootstrap Grid row
 * @see http://getbootstrap.com/css/#grid
 * @author jc
 * @version 1.001
 */
class HtmlGridRow extends HtmlDoubleElement {
	private $cols;
	public function __construct($identifier){
		parent::__construct($identifier,"div");
		$this->setProperty("class", "row");
		$this->cols=array();
	}
	
	public function addCol($size=CssSize::SIZE_MD,$width=1){
		$col=new HtmlGridCol($this->identifier."-col-".(sizeof($this->cols)+1),$size,$width);
		$this->row[]=$col;
		return $col;
	}
	
	public function addColAt($size=CssSize::SIZE_MD,$width=1,$offset=1){
		$col=$this->addCol($size,$width);
		return $col->setOffset($size, max($offset,sizeof($this->cols)+1));
	}
	
	public function getCol($index,$force=true){
		if($index<sizeof($this->cols)+1){
			$result=$this->cols[$index-1];
		}else if ($force){
			$result=$this->addColAt(CssSize::SIZE_MD,1,$index);
			$this->cols[]=$result;
		}
		return $result;
	}
	
	public function getColAt($offset,$force=true){
		$result=null;
		foreach ($this->cols as $col){
			$offsets=$col->getOffsets();
			if($result=array_search($offset, $offsets)){
				break;
			}
		}
		if(!isset($result)){
			$result=$this->getCol($offset,$force);
		}
		return $result;
	}
	
	public function compile(JsUtils $js=NULL, View $view=NULL) {
	
		foreach ($this->cols as $col){
			$this->addContent($col);
		}
		return parent::compile($js,$view);
	}
}