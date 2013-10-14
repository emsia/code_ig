<?php
class FormSave extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		date_default_timezone_set("Asia/Manila");
		include($_SERVER['DOCUMENT_ROOT'] .'/code_ig/application/controllers/welcome.php');
	}
	
	function saveForms($names){
		$date = date('Y-m-d G:i:s');
		$userDetail = $this->getUid();
		$dataWC = array(
			'user_id' 		  => $userDetail['user_id'],
			'quantity' 		  => $_POST[$names[0]],
			'quality' 		  => $_POST[$names[1]],
			'knowledge' 	  => $_POST[$names[2]],
			'reliability'	  => $_POST[$names[3]],
			'leaning_ability' => $_POST[$names[4]],	
			'date_answered'	  => $date	
		);
		$this->db->insert('work_competency', $dataWC);

		$dataBC = array(
			'user_id' 		  => $userDetail['user_id'],
			'attendance' 	  => $_POST[$names[5]],
			'job_attitude' 	  => $_POST[$names[6]],
			'initiative' 	  => $_POST[$names[7]],
			'customer_service'	  => $_POST[$names[8]],
			'cooperation_temWorl' => $_POST[$names[9]],	
			'honesty_integrity'	  => $_POST[$names[10]],
			'date_answered'	  => $date	
		);
		$this->db->insert('behavior_competency', $dataBC);

		if(!empty($_POST['field'])){
			$dataComment = array(
				'user_id'	=> $userDetail['user_id'],
				
			);
		}	
	}

	function getUid(){
		$me = new welcome;
		return $me->detals_of_users();
	}
}	
?>