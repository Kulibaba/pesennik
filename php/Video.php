<?
require_once 'DataBase.php';
require_once 'Utils.php';
class Video {
	private $videoTypeName;
	private $data;		// included full video frame
	private $userName;
	private $userUrl;
	
	function Video($row){
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
}
?>