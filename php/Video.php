<?
require_once 'DataBase.php';
require_once 'Utils.php';
class Video {
	private $videoTypeName;
	private $data;		// included full video frame
	private $userName;
	private $userUrl;
	
	function Video(){}
	function setWidth($x){
		$this->data = str_replace("XXX", $x, $this->getData());
	}
	function setHeight($y){
		$this->data = str_replace("YYY", $y, $this->getData());
	}
	function setXY($x, $y){
		$this->setWidth($x);
		$this->setHeight($y);
	}
	function initListItem($row){
	/*
		@row - array, params for constructor
	*/
		$this->data = str_replace("URL", $row["videoUrl"], $row["data"]);
		$this->videoTypeName = $row["videoTypeName"];
		$this->userName = $row["userName"];
		$this->userUrl = $row["userUrl"];
		$this->info = $row["info"];
	}
	
	function initAll($row){
	/*
		@row - array, params for constructor
	*/
		$this->data = str_replace("URL", $row["videoUrl"], $row["data"]);
		$this->data = str_replace("XXX", "240", $row["data"]);
		$this->data = str_replace("YYY", "320", $row["data"]);
		$this->videoTypeName = $row["videoTypeName"];
		$this->userName = $row["userName"];
		$this->userUrl = $row["userUrl"];
		$this->info = $row["info"];
	}
	
	
	function getData() {
		return $this->data;
	}
	function getVideoTypeName() {
		return $this->videoTypeName;
	}
	function getUserName() {
		return $this->userName;
	}
	function getUserUrl() {
		return $this->userUrl;
	}
	function getInfo() {
		return $this->info;
	}
}
?>