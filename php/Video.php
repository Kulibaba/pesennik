<?
require_once 'DataBase.php';
require_once 'Utils.php';
class Video {
	var $videoTypeName;
	var $data;		// included full video frame
	
	function Video($newData, $newVideoTypeName){
		$this->data = $newData;
		$this->videoTypeName = $newVideoTypeName;
	}
	function getData() {
		return $this->data;
	}
	
	function getVideoTypeName() {
		return $this->videoTypeName;
	}
	
}
?>