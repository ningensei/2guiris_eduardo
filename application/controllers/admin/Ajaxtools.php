<?php
class AjaxTools extends CI_Controller{

	function AjaxTools () {
		parent::__construct();
	}
	
	function deletefile() {
		$filename = ".".$_POST['filename'];
		if(!file_exists($filename)) {
			echo json_encode( array('status' => 'error', 'msg' => 'El archivo no existe') );
		} else {
			unlink($filename);
			echo json_encode( array('status' => 'success', 'rel' => $_POST['rel']) );
		}
		
	}
	
	
}
