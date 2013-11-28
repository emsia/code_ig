<?php
class User_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("Asia/Manila");
	}
	
	function verifynameAndPass($uname,$pword, $num = 0){
		$query = $this->db->get_where('users',array('username' => $uname));
		foreach($query->result() as $row){
			$hash = sha1($pword);
			if( !$num )
				if(($uname === $row->username && $hash === $row->password)) 
					return true;
			if(($uname === $row->username && $hash === $row->password && $row->verified)) 
					return true;
		}
		return false;
	}
	
	function getuid($name){
		$query = $this->db->get_where('users',array('username' => $name));
		return $query->row_array();
	}
	
	function getName($uname){
		$query = $this->db->get_where('users',array('username' => $uname));
		return $query->row_array();
	}	
	
	function teamAssoc($team_id, $user_id){
		$data = array(
			'team_id' => $team_id,
			'user_id' => $user_id
		);
		$sql = "select * from team_member TM where TM.team_id=$team_id AND TM.user_id=$user_id";
		$test = $this->db->query($sql);		
		if(!count($test->result_array())){
			$this->db->insert('team_member', $data);
		}
	}
	
	function insertData($slug){
		$data = array(
			'username'	=> $_POST['username'],
			'email'			=> $_POST['email'],
			'password'	=> sha1($_POST['password']),
			'middle'		=> ucwords($_POST['middleName']),
			'firstname'	=> ucwords($_POST['firtsName']),
			'lastname'	=> ucwords($_POST['lastName']),
			'role'			=> 2,
			'verified'		=> 0,
			'slug'			=> $slug,
		);
		$this->db->insert('users', $data);
	}
	
	function insertDateRange($start, $end){
		$data = array(
			'startDate' => $start,
			'endDate' => $end
		);
		$this->db->insert('dateRange', $data);
	}
	
	function exists(){
		$dateMe = date('Y-m-d').PHP_EOL;
		$sql = "SELECT * from dateRange DR WHERE '". $dateMe."' BETWEEN DR.startDate AND DR.endDate";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getDataBase($tableName, $getId, $evaluator, $where_to_get){
		$this->db->order_by($where_to_get, 'ASC');
		if( empty($evaluator) ) $query = $this->db->get_where($tableName, array($where_to_get => $getId));
		else	$query = $this->db->get_where($tableName, array($where_to_get => $getId, 'evaluator' => $evaluator));
		return $query->result_array();
	}
	
	function getLeaders(){
		$sql = "select * from users U where U.role=1 OR U.role=4 OR U.role=5 OR U.role=6 ORDER BY U.lastname ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getTeamPass($team_id, $team_key){
		$query = $this->db->get_where('team', array('id'=>$team_id, 'slug'=>$team_key) );
		return $query->result_array();
	}

	function getAllUsers(){
		/*$this->db->order_by('lastname', 'ASC');
		$this->db->from('users');
		$query = $this->db->get();*/
		$sql = 'select * from users U order by U.lastname ASC';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getAllUsers_evaluationResults($start, $end){
			$sql = "select distinct U.slug as user_id, E.work_rate, E.behavior_rate, U.lastname, U.firstname, U.middle, TM.team_id, T.team_name, U.role, R.role as role_ev, R.slug as evaluator_id
					from evaluation_results E, users U, team T, team_member TM
					join users R
					where (((E.user_id=U.id AND E.user_id=TM.user_id) AND TM.team_id=T.id ) AND E.evaluator=R.id) AND ( E.date_answered BETWEEN '".$start."' AND '".$end."' ) order by U.lastname ASC, U.slug";
		
		
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function collate($start, $end){
		$sql = "select distinct U.slug as user_id
					from evaluation_results E, users U, team T, team_member TM
					where ((E.user_id=U.id AND E.user_id=TM.user_id) AND TM.team_id=T.id) AND ( E.date_answered BETWEEN '".$start."' AND '".$end."' ) order by U.slug";
		
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function leadersMembersResults($team_id){
		$sql = "select distinct U.slug as user_id, E.work_rate, E.behavior_rate, R.role as role_ev
					from evaluation_results E, users U, team T, team_member TM
					join users R
					where ((TM.team_id=$team_id AND TM.user_id=E.user_id AND E.user_id=U.id)) AND R.id=E.evaluator order by U.slug";
		$query = $this->db->query($sql);
		return $query->result_array();			
	}
	
	function specialResults($team_id){
		$sql = "select distinct U.slug as user_id, E.work_rate, E.behavior_rate, R.role as role_ev
					from evaluation_results E, users U, team T, team_member TM
					join users R
					where ((TM.team_id=$team_id AND TM.user_id=E.user_id AND E.user_id=U.id)) AND R.id=E.evaluator
				UNION

				select distinct U.slug as user_id, E.work_rate, E.behavior_rate, R.role as role_ev
					from evaluation_results E, users U, team T, team_member TM
					join users R
					where ((TM.team_id=1 AND TM.user_id=E.user_id AND E.user_id=U.id)) AND R.id=E.evaluator
				
				ORDER BY user_id";
		$query = $this->db->query($sql);
		return $query->result_array();			
	}

	function countMembers($team_id){
		$sql = "select COUNT( distinct U.slug ) as totalNumber
					from evaluation_results E, users U, team T, team_member TM
					join users R
					where ((TM.team_id=$team_id AND TM.user_id=E.user_id AND E.user_id=U.id)) AND R.id=E.evaluator order by U.slug";
		$query = $this->db->query($sql);
		return $query->result_array();			
	}	
	
	function getME( $user_id ){
		$sql = "select distinct E.user_id, E.work_rate, E.behavior_rate, U.lastname AS evaluatorLast, U.firstname AS evaluatorFirst, U.middle AS evaluatorMiddle, C.field as comment, B.attendance, B.job_attitude, B.initiative, B.customer_service, B.cooperation_temWorl, B.honesty_integrity,
					W.quantity, W.quality, W.knowledge, W.reliability, W.leaning_ability, TM.team_id
					from evaluation_results E, users U, team_member TM, comments C, work_competency W, behavior_competency B
					where E.user_id=$user_id AND E.evaluator=U.id AND C.id=E.comments_id AND E.work_competency_id=W.id AND E.behavior_competency_id=B.id AND TM.user_id=E.user_id
					ORDER BY evaluatorLast ASC";
		
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getTeams(){
		$query = $this->db->get('team');
		return $query->result_array();
	}
	
	function setValidation($ident){
		$this->db->where('slug',$ident);
		$this->db->update('users',array('verified' => 1));
		$query = $this->db->get_where('users',array('slug' => $ident));
		return $query->row_array();
	}
	
	function checkExistence($slug){
		$email = $_POST['credentials'];
		$query = $this->db->get_where('users',array('email' => $email));
		$row = $query->row_array();
		
		if( empty($row['id']) ) return FALSE;
		$true = $this->sendvalid($slug,$email, $row['firstname']);
		if( $true ){
			$hpass = sha1($slug);
			$data = array(
				'slug' => $slug,
				'password' => $hpass
			);
			$this->db->where('id', $row['id']);
			$this->db->update('users', $data);
			return TRUE;
		}
		return FALSE;
	}
	
	function sendvalid($slug, $email,$name){
		$this->load->library('email');
		$this->email->from('eupeval@gmail.com', 'eUP Admin');
		$this->email->to($email);
		
		$data['old'] = sha1($slug);
		$data['key'] = $slug;
		$data['firstname'] = $name;
		
		$this->email->subject('Password Reset | eUP Evaluation');
		$this->email->message($this->load->view( 'templates/passwordReset', $data, true ));
		if( !$this->email->send() ) return 0;
		return 1;
	}
	
	function getAllTeams($i){
		$where = "WHERE (U.id=TM.user_id AND T.id=TM.team_id) AND T.slug='$i'";
		if($i=='5f74g6514rf1sd3fsd')
			$where = "WHERE (U.id=TM.user_id AND T.id=TM.team_id) AND (T.slug='$i' OR T.id=12)";
		$sql = "SELECT DISTINCT U.lastname, U.firstname, U.middle, U.slug as user_id, T.team_name, T.short_name, U.email, U.role, T.slug
				FROM users U, team_member TM, team T
				$where
				ORDER BY T.team_name, U.lastname";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function getTeamName(){
		$query = $this->db->get('team');
		return $query->result_array();	
	}

	function remove($team_id, $personnel_slug){
		$this->db->delete('team_member', array('team_id' => $team_id, 'user_id' => $personnel_slug));
	}

}
?>