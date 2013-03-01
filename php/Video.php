<?
require_once 'DataBase.php';
require_once 'Utils.php';
class Video {
	private $info;
	private $videoTypeName;
	private $data;		// included full video frame
	private $userName;
	private $userUrl;
	
	private $artistName;
	private $artistUrl;
	private $songName;
	private $songUrl;
	
	
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
		$this->songName = $row["name"];
		$this->songUrl = $row["songUrl"];
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
	}
	
	function initAll($row){
	/*
		@row - array, params for constructor
	*/
		$this->data = str_replace("URL", $row["videoUrl"], $row["data"]);
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
	function getArtistName() {
		return $this->artistName;
	}
	function getArtistUrl() {
		return $this->artistUrl;
	}
	function getSongName() {
		return $this->songName;
	}
	function getSongUrl() {
		return $this->songUrl;
	}
}
?>