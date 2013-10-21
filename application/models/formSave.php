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
	
	function saveForms($names, $user_id){
		$date = date('Y-m-d G:i:s');;
		$evaluator = $this->getUid();
		
		for($i=0; $i<5;$i++)
			$totalWC = $totalWC + $_POST[$names[$i]] ;
		$totalWC /= 5;
		
		$dataWC = array(
			'quantity' 		  => $_POST[$names[0]],
			'quality' 		  => $_POST[$names[1]],
			'knowledge' 	  => $_POST[$names[2]],
			'reliability'	  => $_POST[$names[3]],
			'leaning_ability' => $_POST[$names[4]],	
		);
		$this->db->insert('work_competency', $dataWC);
		$WC_id = $this->db->insert_id();
	
		for($i=5; $i<11;$i++)
			$totalBC = $totalBC + $_POST[$names[$i]] ;
		$totalBC /= 6;
		
		$dataBC = array(
			'attendance' 	  => $_POST[$names[5]],
			'job_attitude' 	  => $_POST[$names[6]],
			'initiative' 	  => $_POST[$names[7]],
			'customer_service'	  => $_POST[$names[8]],
			'cooperation_temWorl' => $_POST[$names[9]],	
			'honesty_integrity'	  => $_POST[$names[10]],
		);
		$this->db->insert('behavior_competency', $dataBC);
		$BC_id = $this->db->insert_id();
		$C_id = 0;
		
		$dataComment = array(
			'field' => $_POST['field']
		);
		$this->db->insert('comments', $dataComment);
		$C_id = $this->db->insert_id();
		
	  $dataE_Results = array(
	  	'user_id' 					=> $user_id,
	  	'work_competency_id' 		=> $WC_id,
	  	'behavior_competency_id'	=> $BC_id,
	  	'comments_id'				=> $C_id,
	  	'date_answered'				=> $date,
		'evaluator' => $evaluator['user_id'],
		'work_rate'	=> $totalWC,
		'behavior_rate' => $totalBC
	  );
		$this->db->insert('evaluation_results', $dataE_Results);
		
	}

	function getUid(){
		$me = new welcome;
		return $me->detals_of_users();
	}
}	
?>