<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('user_model', 'FormSave'));
	}
	
	public function results(){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Results";
		$data['active_nav'] = 'RESULT';
		
		$allUsers = $this->user_model->getAllUsers_evaluationResults();
		//var_dump($allUsers);
		$b = array();
		
		$director_score = 0; $team_score = 0; $leader_score = 0; $director_count = 0; $team_count = 0; $leader_count = 0;
		$b['countLeader'] = 0; $b['countmembers'] = 0; 
		
		if(!empty($allUsers)){
			$first_id = $allUsers[0]['user_id']; 
			$old_role = $allUsers[0]['role'];
			foreach( $allUsers as $data_users ){
				if( $first_id != $data_users['user_id'] ){
					//print($data_users['user_id']);
					$first_id = $data_users['user_id'];
					if(!$team_count) $team_count = 1;
					if(!$director_count) $director_count = 1;
					if(!$leader_count) $leader_count = 1;
					
					$team_score /= $team_count;
					$director_score /= $director_count;
					$leader_score /= $leader_count;
					
					if( $old_role==1 ){
						$team_score *= 0.2;
						$leader_score *= 0.3;
						$director_score *= 0.4;
						$members = $this->members( $old_tem_id, $data['user_id'] );
						$members *= 0.1;
						
						$b['user_idOther'][] = $old_user_id;
						$b['team_nameOthers'][] = $old_tem_name;
						$b['result_of_members'][] = $members;
						$b['perrLeader'][] = $team_score;
						$b['leaderLeader'][] = $leader_score;
						$b['directorLeader'][] = $director_score;
						$b['overallLeader'][] = $team_score + $leader_score + $director_score + $members;
						$b['countLeader']++;
						
						$b['lastnameOther'][] = $old_lastname;
						$b['firstnameOther'][] = $old_firstname;
						$b['middleOther'][] = $old_middle;
					}else{
						$team_score *= 0.25;
						$leader_score *= 0.3;
						$director_score *= 0.45;
						$b['peer'][] = $team_score;
						$b['leader'][] = $leader_score;
						$b['director'][] = $director_score;
						$b['overall'][] = $team_score + $leader_score + $director_score;
						$b['countmembers']++;
						
						$b['user_id'][] = $old_user_id;
						$b['team_name'][] = $old_tem_name;
						$b['lastname'][] = $old_lastname;
						$b['firstname'][] = $old_firstname;
						$b['middle'][] = $old_middle;
					}
					$director_score = 0; $team_score = 0; $leader_score = 0; $director_count = 0; $team_count = 0; $leader_count = 0;
				}
				if( $data_users['role_ev']==0 ){
					$director_score += (($data_users['work_rate'] + $data_users['behavior_rate'])/2);
					$director_count++;
				}else if( $data_users['role_ev']==1 ){
					$leader_score += (($data_users['work_rate'] + $data_users['behavior_rate'])/2);
					$leader_count++;
				}else{
					$team_score += (($data_users['work_rate'] + $data_users['behavior_rate'])/2);
					$team_count++;
				}
				$old_user_id = $data_users['user_id'];
				$old_role = $data_users['role'];
				$old_tem_id = $data_users['team_id'];
				$old_tem_name = $data_users['team_name'];
				$old_lastname = $data_users['lastname'];
				$old_firstname = $data_users['firstname'];
				$old_middle = $data_users['middle'];
			}
			
			//if(!$insert){
			if(!$team_count) $team_count = 1;
			if(!$director_count) $director_count = 1;
			if(!$leader_count) $leader_count = 1;
			
			$team_score /= $team_count;
			$director_score /= $director_count;
			$leader_score /= $leader_count;
			//print($leader_score);
			
			if( $old_role==1 ){
				$team_score *= 0.2;
				$leader_score *= 0.3;
				$director_score *= 0.4;
				$members = $this->members( $old_tem_id, $data['user_id'] );
				$members *= 0.1;
				
				$b['user_idOther'][] = $old_user_id;
				$b['team_nameOthers'][] = $old_tem_name;
				$b['result_of_members'][] = $members;
				$b['perrLeader'][] = $team_score;
				$b['leaderLeader'][] = $leader_score;
				$b['directorLeader'][] = $director_score;
				$b['overallLeader'][] = $team_score + $leader_score + $director_score + $members;
				$b['countLeader']++;
				
				$b['lastnameOther'][] = $old_lastname;
				$b['firstnameOther'][] = $old_firstname;
				$b['middleOther'][] = $old_middle;
			}else{
				$team_score *= 0.25;
				$leader_score *= 0.3;
				$director_score *= 0.45;
				$b['peer'][] = $team_score;
				$b['leader'][] = $leader_score;
				$b['director'][] = $director_score;
				$b['overall'][] = $team_score + $leader_score + $director_score;
				$b['countmembers']++;
				
				$b['user_id'][] = $old_user_id;
				$b['team_name'][] = $old_tem_name;
				$b['lastname'][] = $old_lastname;
				$b['firstname'][] = $old_firstname;
				$b['middle'][] = $old_middle;
			}
		}
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/resultForm', $b);
		$this->load->view('templates/footer');
	}
	
	function members( $old_tem_id, $myId ){
		$list_of_members = $this->user_model->leadersMembersResults($old_tem_id);
		$director_score = 0; $team_score = 0; $leader_score = 0; $director_count = 0; $team_count = 0; $leader_count = 0;
		$first_id = $list_of_members[0]['user_id']; $sumAll = 0; $countAll = 0;
		foreach( $list_of_members as $data_users ){
			if($myId != $data_users['user_id']){
				if( $first_id != $data_users['user_id'] ){
					$first_id = $data_users['user_id'];
					if(!$team_count) $team_count = 1;
					if(!$director_count) $director_count = 1;
					if(!$leader_count) $leader_count = 1;
				
					$team_score /= $team_count;
					$director_score /= $director_count;
					$leader_score /= $leader_count;
						
					$team_score *= 0.25;
					$leader_score *= 0.3;
					$director_score *= 0.45;
					$sumAll += $team_score + $leader_score + $director_score;
					$countAll++;
					$director_score = 0; $team_score = 0; $leader_score = 0; $director_count = 0; $team_count = 0; $leader_count = 0;
				}
				if( $data_users['role_ev']==0 ){
					$director_score += (($data_users['work_rate'] + $data_users['behavior_rate'])/2);
					$director_count++;
				}else if( $data_users['role_ev']==1 ){
					$leader_score += (($data_users['work_rate'] + $data_users['behavior_rate'])/2);
					$leader_count++;
				}else{
					$team_score += (($data_users['work_rate'] + $data_users['behavior_rate'])/2);
					$team_count++;
				}
			}
		}
		if(!$team_count) $team_count = 1;
		if(!$director_count) $director_count = 1;
		if(!$leader_count) $leader_count = 1;
		
		$team_score /= $team_count;
		$director_score /= $director_count;
		$leader_score /= $leader_count;
			
		$team_score *= 0.25;
		$leader_score *= 0.3;
		$director_score *= 0.45;
		$sumAll += $team_score + $leader_score + $director_score;
		
		if(!$countAll) $countAll = 1;
		//print($countAll);
		$sumAll /= $countAll;
		return $sumAll;
	}
	
	public function evaluationDetails($num){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Details";
		$data['active_nav'] = 'RESULT';
		
		$user_slug = $this->user_model->getDataBase('users',$num, '','slug');
		if(empty($user_slug)){
			$this->load->view('templates/head', $data);
			//$this->load->view('templates/body');
			$this->load->view('templates/errors');
			$this->load->view('templates/footer');
			return;
		}
		
		$list = $this->user_model->getME($user_slug[0]['id']);
		//var_dump($list);		
		$b = array();
		$b['count'] = 0;
		$b['lastname_of_cliked'] = $user_slug[0]['lastname'];
		$b['firstname_of_cliked'] = $user_slug[0]['firstname'];
		$b['middlename_of_cliked'] = $user_slug[0]['middle'];
		
		foreach($list as $listData){
			$b['lastName'][] = $listData['evaluatorLast'];
			$b['firstName'][] = $listData['evaluatorFirst'];
			$b['middleName'][] = $listData['evaluatorMiddle'];
			
			//WC
			$b['quantity'][] = $listData['quantity'];
			$b['quality'][] = $listData['quality'];
			$b['knowledge'][] = $listData['knowledge'];
			$b['reliability'][] = $listData['reliability'];
			$b['leaning_ability'][] = $listData['leaning_ability'];
			
			//BC
			$b['attendance'][] = $listData['attendance'];
			$b['job_attitude'][] = $listData['job_attitude'];
			$b['initiative'][] = $listData['initiative'];
			$b['customer_service'][] = $listData['customer_service'];
			$b['cooperation_temWorl'][] = $listData['cooperation_temWorl'];
			$b['honesty_integrity'][] = $listData['honesty_integrity'];
			
			$b['comments'][] = $listData['comment'];
			$b['work_rate'][] = $listData['work_rate'];
			$b['behavior_rate'][] = $listData['behavior_rate'];
			$b['count']++;
		}
		
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/resultEval', $b);
		$this->load->view('templates/footer');
	}
	
	public function postTeam(){
		$names = $_POST['id_select'];
		//print($name[1]);
		foreach($names as $name){
			print($name);
		}
	}
	
	public function people($message=Null){
		$data = $this->getInfo();
		$teams = $this->getTeams();
		foreach( $teams as $team ){
			$data['teams'][] = $team['team_name'];
		}
		
		$data['title'] = "eUP Performance Evaluation | Evaluate";
		$data['active_nav'] = 'ANSWERFORM';
		$data['count'] = 0; $data['countOtherTeam'] = 0;
		$b = array(); $c = array();
		
		if($data['role']==0){
			$all = $this->user_model->getAllUsers();
			foreach( $all as $array_data ){		
				if( $array_data['id'] != $data['user_id'] ){
					$OtherTeam = $this->user_model->getDataBase('team_member',$array_data['id'], '', 'user_id');					
					$teamForm = $this->user_model->getDataBase('evaluation_results',$array_data['id'], $data['user_id'], 'user_id');
					$teamName = $this->user_model->getDataBase('team',$OtherTeam[0]['team_id'], '', 'id');
					
					if($array_data['role']==1){					
						if( !empty($teamForm) ) $b['doneOther'][] = 1;
						else $b['doneOther'][] = 0;
						
						$b['team_nameOther'][] = $teamName[0]['team_name'];
						$b['lastnameOther'][] = $array_data['lastname'];
						$b['firstnameOther'][] = $array_data['firstname'];
						$b['middlenameOther'][] = $array_data['middle'];
						$b['slugOther'][] = $array_data['slug'];
						$data['countOtherTeam']++;
					}else{
						if( !empty($teamForm) ) $b['done'][] = 1;
						else $b['done'][] = 0;
						
						$b['team_name'][] = $teamName[0]['team_name'];
						$b['lastname'][] = $array_data['lastname'];
						$b['firstname'][] = $array_data['firstname'];
						$b['middlename'][] = $array_data['middle'];
						$b['slug'][] = $array_data['slug'];
						$data['count']++;
					}
				}
			}
			//seperate users from team leaders and members
		} else{
			$user_teamId = $this->user_model->getDataBase('team_member',$data['user_id'], '', 'user_id');
			//var_dump($user_teamId);
			//print($user_teamId['team_id']); 
			
			//var_dump($teamName);
			//print($data['team_name']);
			if(!empty($user_teamId)){
			$team = $this->user_model->getDataBase('team_member',$user_teamId[0]['team_id'], '', 'team_id');
			//print($team);
			//var_dump($team);
			foreach( $team as $array_data ){
				//print($array_data['user_id']."<br/>");
				if( $array_data['user_id'] != $data['user_id'] ){
					$teamMembers = $this->user_model->getDataBase('users',$array_data['user_id'], '', 'id');
					$teamForm = $this->user_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
					$teamName = $this->user_model->getDataBase('team',$user_teamId[0]['team_id'], '', 'id');
					//print($teamMembers[0]['lastname']);
					if( !empty($teamForm) ) $b['done'][] = 1;
					else $b['done'][] = 0;
					
					$b['team_name'][] = $teamName[0]['team_name'];
					$b['lastname'][] = $teamMembers[0]['lastname'];
					$b['firstname'][] = $teamMembers[0]['firstname'];
					$b['middlename'][] = $teamMembers[0]['middle'];
					$b['slug'][] = $teamMembers[0]['slug'];
					$data['count']++;
				}
			}	
			
			if( $user_teamId[0]['team_id'] != 1 ){
				$team = $this->user_model->getDataBase('team_member',1, '', 'team_id');
				foreach( $team as $array_data ){
					$teamMembers = $this->user_model->getDataBase('users',$array_data['user_id'], '','id');
					if( $data['role']==1 && $teamMembers[0]['role']==1 ) continue;
					$teamForm = $this->user_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
					$teamName = $this->user_model->getDataBase('team',1, '', 'id');
					//print($teamMembers[0]['lastname']);
					if( !empty($teamForm) ) $b['done'][] = 1;
					else $b['done'][] = 0;
					
					$b['team_name'][] = $teamName[0]['team_name'];
					$b['lastname'][] = $teamMembers[0]['lastname'];
					$b['firstname'][] = $teamMembers[0]['firstname'];
					$b['middlename'][] = $teamMembers[0]['middle'];
					$b['slug'][] = $teamMembers[0]['slug'];
					$data['count']++;
				}
			}
			
			if( $user_teamId[0]['team_id'] != 10 ){
				$team = $this->user_model->getDataBase('team_member',10, '', 'team_id');
				foreach( $team as $array_data ){
					$teamMembers = $this->user_model->getDataBase('users',$array_data['user_id'], '', 'id');
					if( $data['role']==1 && $teamMembers[0]['role']==1 ) continue;
					$teamForm = $this->user_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
					$teamName = $this->user_model->getDataBase('team',10, '', 'id');
					//print($teamMembers[0]['lastname']);
					if( !empty($teamForm) ) $b['done'][] = 1;
					else $b['done'][] = 0;
					
					$b['team_name'][] = $teamName[0]['team_name'];
					$b['lastname'][] = $teamMembers[0]['lastname'];
					$b['firstname'][] = $teamMembers[0]['firstname'];
					$b['middlename'][] = $teamMembers[0]['middle'];
					$b['slug'][] = $teamMembers[0]['slug'];
					$data['count']++;
				}
			}
					
			if( $data['role']==1 ){
				$teamLeaders = $this->user_model->getDataBase('users',1, '', 'role');
				//var_dump($teamLeaders);
				foreach( $teamLeaders as $array_data ){
					if( $array_data['id'] != $data['user_id'] ){
						$OtherTeam = $this->user_model->getDataBase('team_member',$array_data['id'], '', 'user_id');
						//var_dump($OtherTeam);
						$teamForm = $this->user_model->getDataBase('evaluation_results',$array_data['id'], $data['user_id'], 'user_id');
						//var_dump($array_data['id']);
						$teamName = $this->user_model->getDataBase('team',$OtherTeam[0]['team_id'], '', 'id');
						
						if( !empty($teamForm) ) $b['doneOther'][] = 1;
						else $b['doneOther'][] = 0;

						$b['team_nameOther'][] = $teamName[0]['team_name'];
						$b['lastnameOther'][] = $array_data['lastname'];
						$b['firstnameOther'][] = $array_data['firstname'];
						$b['middlenameOther'][] = $array_data['middle'];
						$b['slugOther'][] = $array_data['slug'];
						$data['countOtherTeam']++;
					}
				}
			}
			} else {
				$message = "You are not part of a team yet.";
				$data['count'] = -1;
			}	
		}
		$b['message'] = $message;
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/personnel', $b);
		$this->load->view('templates/footer');
	}

	public function FormEvaluate( $num, $data = Null ){
		//$temp = $_POST['userToEvaluate'];
		//print($num);
		$teamData = $this->user_model->getDataBase('users',$num, '','slug');
		$temp = $data['errors'];
		$data = $this->getInfo();
		$data['errors'] = $temp;
		$data['firstName'] = $teamData[0]['firstname'];
		$data['middleName'] = $teamData[0]['middle'];
		$data['lastName'] = $teamData[0]['lastname'];
		$data['userToEvaluate'] = $num;
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'ANSWERFORM';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/evalForm');//evalForm
		$this->load->view('templates/footer');
	}
	
	public function process(){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'PROCESS';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('templates/process');
		$this->load->view('templates/footer');
	}

	public function submitEvalForm(){
		$data = $this->getInfo();
		$userSlug = $_POST['userToEvaluate'];
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'ANSWERFORM';

		$names = ['quality', 'quantity', 'knowledge', 'reliability', 'leaning_ability', 'attendance', 'job_attitude', 'initiative', 'customer_service', 'cooperation_temWorl', 'honesty_integrity', 'field'];
		for ( $i = 0; $i < 12; $i++)
			$this->form_validation->set_rules($names[$i], $names[$i], 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['errors'] = 'Incomplete Form. Please fill up the form completely.';
			$this->FormEvaluate($userSlug,$data);
		}
		else{
			$userSlug = $this->user_model->getDataBase('users',$userSlug, '','slug');
			$this->FormSave->saveForms($names, $userSlug[0]['id']);
			$message = "Form has been submitted.";
			$this->people($message);
		}
	}

	public function getInfo(){
		$username = $this->session->userdata('username');
		$name = $this->user_model->getName($username);
		$data['firstname'] = $name['firstname'];
		$data['lastname'] = $name['lastname'];
		$data['middle'] = $name['middle'];
		$data['user_id'] = $name['id'];		
		$data['role'] = $name['role'];
		return $data;
	}
	
	public function getTeams(){		
		$listTeam = $this->user_model->getTeams();
		return $listTeam;
	}
	
}

?>