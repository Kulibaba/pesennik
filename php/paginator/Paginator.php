<?
require_once '../Utils.php';
require_once '../conf.php';

class Paginator {
	private $searchTag="";
	private $itemsQuantity=0;
	private $delta=0;
	private $currentPageNumber=0;
	function Paginator(){}
	
	function getSearchTag(){
		return $this->searchTag;
	}
	function getItemsQuantity(){
		return $this->searchTag;
	}
	function getDelta(){
		return $this->delta;
	}
	function getCurrentPageNumber(){
		return $this->currentPageNumber;
	}
}
?>