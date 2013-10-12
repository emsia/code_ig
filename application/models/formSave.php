<?php
class FormSave extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		date_default_timezone_set("Asia/Manila");
	}
	
	function saveForms($names){
		$date = date('Y-m-d G:i:s');
		$dataWC = array(
			'quantity' 		  => $_POST[$names[0]],
			'quality' 		  => $_POST[$names[1]],
			'knowledge' 	  => $_POST[$names[2]],
			'reliability'	  => $_POST[$names[3]],
			'leaning_ability' => $_POST[$names[4]],		
		);
		$this->db->insert('work_competency', $dataWC);
	}
}	
?>