<?
require_once 'php/Utils.php';
require_once 'php/conf.php';

class Paginator {
	private $searchTag="";
	private $itemsQuantity=0;
	private $delta=0;
	private $currentPageNumber=0;
	function Paginator($delta,$page,$size,$searchTag){
		$this->delta = $delta;
		$this->currentPageNumber = $page;
		$this->itemsQuantity = $size;
		$this->searchTag = $searchTag;
	}
	
	function getSearchTag(){
		return $this->searchTag;
	}
	function getItemsQuantity(){
		return $this->itemsQuantity;
	}
	function getDelta(){
		return $this->delta;
	}
	function getCurrentPageNumber(){
		return $this->currentPageNumber;
	}
}
?>