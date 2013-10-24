<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('user_model', 'form_save'));

		if ( !$this->islogged() )
			redirect('http://192.81.218.182/eupeval/');
	}
	
	public function process(){		
		if ( !$this->islogged() )
			redirect('http://192.81.218.182/eupeval/');

		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'PROCESS';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('templates/process');
		$this->load->view('templates/footer');
	}

	public function getInfo(){
		$username = $this->session->userdata('username');
		$name = $this->user_model->getName($username);
		$data['firstname'] = $name['firstname'];
		$data['lastname'] = $name['lastname'];
		$data['middle'] = $name['middle'];
		$data['user_id'] = $name['id'];
		$data['email'] = $name['email'];
		$data['role'] = $name['role'];
		return $data;
	}

	public function people($message=Null, $num=1){
		$data = $this->getInfo();
		$teams = $this->user_model->getTeams();
		$data['teamCount'] = 0;
		$data['success'] = $num;

		foreach( $teams as $team ){
			$data['team_s'][] = $team['team_name'];
			$data['team_id'][] = $team['id'];
			$data['teamCount']++;
		}//endforeach
		$data['title'] = "eUP Performance Evaluation | Evaluate";
		$data['active_nav'] = 'ANSWERFORM';
		$data['count'] = 0; $data['countOtherTeam'] = 0;
		$b = array(); $c = array();

		if($data['role']==0 || $data['role']==3){
			$all = $this->user_model->getAllUsers();
			foreach( $all as $array_data ){
				if( $array_data['id'] != $data['user_id'] ){
					$OtherTeam = $this->user_model->getDataBase('team_member',$array_data['id'], '', 'user_id');					
					$teamForm = $this->user_model->getDataBase('evaluation_results',$array_data['id'], $data['user_id'], 'user_id');
					$teamName = $this->user_model->getDataBase('team',$OtherTeam[0]['team_id'], '', 'id');
					
					if($array_data['role']==1 || $array_data['role']==3){					
						if( !empty($teamForm) ) $b['doneOther'][] = 1;
						else $b['doneOther'][] = 0;
						
						$b['team_nameOther'][] = $teamName[0]['team_name'];
						$b['lastnameOther'][] = $array_data['lastname'];
						$b['firstnameOther'][] = $array_data['firstname'];
						$b['middlenameOther'][] = $array_data['middle'];
						$b['slugOther'][] = $array_data['slug'];
						$data['countOtherTeam']++;
					}//endif
					else{
						if( !empty($teamForm) ) $b['done'][] = 1;
						else $b['done'][] = 0;
						
						$b['team_name'][] = $teamName[0]['team_name'];
						$b['lastname'][] = $array_data['lastname'];
						$b['firstname'][] = $array_data['firstname'];
						$b['middlename'][] = $array_data['middle'];
						$b['slug'][] = $array_data['slug'];
						$data['count']++;
					}//end else
				}//end if
			}//end foreach
		}//end if
		else{
			$user_teamId = $this->user_model->getDataBase('team_member',$data['user_id'], '', 'user_id');
			if(!empty($user_teamId)){
				$team = $this->user_model->getDataBase('team_member',$user_teamId[0]['team_id'], '', 'team_id');
				foreach( $team as $array_data ){
					if( $array_data['user_id'] != $data['user_id'] ){
						$teamMembers = $this->user_model->getDataBase('users',$array_data['user_id'], '', 'id');
						$teamForm = $this->user_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
						$teamName = $this->user_model->getDataBase('team',$user_teamId[0]['team_id'], '', 'id');
						if( !empty($teamForm) ) $b['done'][] = 1;
						else $b['done'][] = 0;
						
						$b['team_name'][] = $teamName[0]['team_name'];
						$b['lastname'][] = $teamMembers[0]['lastname'];
						$b['firstname'][] = $teamMembers[0]['firstname'];
						$b['middlename'][] = $teamMembers[0]['middle'];
						$b['slug'][] = $teamMembers[0]['slug'];
						$data['count']++;
					}//end if
				}//end foreach

				if( $user_teamId[0]['team_id'] != 1 ){
					$team = $this->user_model->getDataBase('team_member',1, '', 'team_id');
					foreach( $team as $array_data ){
						$teamMembers = $this->user_model->getDataBase('users',$array_data['user_id'], '','id');
						if( ($data['role']==1 && $teamMembers[0]['role']==1) || ($data['role']==3 && $teamMembers[0]['role']==3) ) continue;
						$teamForm = $this->user_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
						$teamName = $this->user_model->getDataBase('team',1, '', 'id');
						if( !empty($teamForm) ) $b['done'][] = 1;
						else $b['done'][] = 0;
						
						$b['team_name'][] = $teamName[0]['team_name'];
						$b['lastname'][] = $teamMembers[0]['lastname'];
						$b['firstname'][] = $teamMembers[0]['firstname'];
						$b['middlename'][] = $teamMembers[0]['middle'];
						$b['slug'][] = $teamMembers[0]['slug'];
						$data['count']++;
					}//endforeach
				}//endif

				if( $user_teamId[0]['team_id'] != 10 ){
					$team = $this->user_model->getDataBase('team_member',10, '', 'team_id');
					foreach( $team as $array_data ){
						$teamMembers = $this->user_model->getDataBase('users',$array_data['user_id'], '', 'id');
						if( ($data['role']==1 && $teamMembers[0]['role']==1) || ($data['role']==3 && $teamMembers[0]['role']==3) ) continue;
						$teamForm = $this->user_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
						$teamName = $this->user_model->getDataBase('team',10, '', 'id');
						if( !empty($teamForm) ) $b['done'][] = 1;
						else $b['done'][] = 0;
						
						$b['team_name'][] = $teamName[0]['team_name'];
						$b['lastname'][] = $teamMembers[0]['lastname'];
						$b['firstname'][] = $teamMembers[0]['firstname'];
						$b['middlename'][] = $teamMembers[0]['middle'];
						$b['slug'][] = $teamMembers[0]['slug'];
						$data['count']++;
					}//endforeach
				}//endif

				if( $data['role']==1 || $data['role']==3 ){
					$teamLeaders = $this->user_model->getDataBase('users',1, '', 'role');
					foreach( $teamLeaders as $array_data ){
						if( $array_data['id'] != $data['user_id'] ){
							$OtherTeam = $this->user_model->getDataBase('team_member',$array_data['id'], '', 'user_id');
							$teamForm = $this->user_model->getDataBase('evaluation_results',$array_data['id'], $data['user_id'], 'user_id');
							$teamName = $this->user_model->getDataBase('team',$OtherTeam[0]['team_id'], '', 'id');
							
							if( !empty($teamForm) ) $b['doneOther'][] = 1;
							else $b['doneOther'][] = 0;

							$b['team_nameOther'][] = $teamName[0]['team_name'];
							$b['lastnameOther'][] = $array_data['lastname'];
							$b['firstnameOther'][] = $array_data['firstname'];
							$b['middlenameOther'][] = $array_data['middle'];
							$b['slugOther'][] = $array_data['slug'];
							$data['countOtherTeam']++;
						}//endif
					}//endforeach
				}//endif

			}//endif
			else{
				$message = "You are not part of a team yet.";
				$data['count'] = -1;
			}
		}//end else

		$b['message'] = $message;

		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/personnel', $b);
		$this->load->view('templates/footer');
	}

	public function postTeam(){		
		$data = $this->getInfo();
		$names = $_POST['id_select'];
		foreach($names as $name){
			$this->user_model->teamAssoc($name, $data['user_id']);
		}
		$this->people("You are successfully added to the team.", 1);
		return;
	}

	public function inviteMember(){
		$text = $_POST['textArea'];
		$team_id = $_POST['selectId'];
		$team_key = $this->user_model->getDataBase('team',$team_id, '','id');
		$data = $this->getInfo();
		$message='';
		$data['countPeople']=0;
		$arrays = preg_split('/[\s,]+/', $text);
		foreach( $arrays as $array ){
			$checker = $this->checkEmail($array);
			if(!$checker){
				$message = 'Invalid email addresses.';
				break;
			}
			$data['countPeople']++;
		}
		if(empty($message)){
			$b['emails'] = $arrays;
			$b['key'] = $team_key[0]['slug'];
			$b['team_name'] = $team_key[0]['team_name'];
			$data['title'] = 'eUP Performance Evaluation | Invitation';
			$data['active_nav'] = 'ANSWERFORM';
			$this->load->view('templates/head', $data);
			$this->load->view('templates/body');
			$this->load->view('evaluation/invitation', $b);
			$this->load->view('templates/footer');
		}else $this->people($message, 0);
	}

	public function sendInvites(){
		$data = $this->getInfo();
		$data['key'] = $_POST['key'];
		$data['team_name'] = $_POST['team_name'];
		$this->load->library('email');
		$this->email->from('eupeval@gmail.com', 'eUP Admin');
		$emails = $_POST['textArea'];
		$this->email->to($emails);
		$this->email->subject('Team Invitation | eUP Evaluation');
		$this->email->message($this->load->view( 'evaluation/emailinvitation', $data, true ));
		if( !$this->email->send() ) $this->people('Error Sending invitations', 0);
		else $this->people('Invitation was sent.', 1);
	}

	private function checkEmail($email){
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		if (preg_match($regex, $email)) return 1;
		else return 0;
	}

	public function FormEvaluate( $num=0, $data = Null ){
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
		$this->load->view('evaluation/evalForm');
		$this->load->view('templates/footer');
	}

	public function enterAsmember(){
		$data = $this->getInfo();
		$team_id = $_POST['selectMember'];
		$team_key = $_POST['team_key'];
		$teamData = $this->user_model->getTeamPass($team_id, $team_key);
		if( empty($teamData) ){ 
			$this->people('Please Check your Team Key and Team Name.', 0); 
		}
		else{
			$this->user_model->teamAssoc($team_id, $data['user_id']);
			$this->people("You are successfully added to the team.", 1);
		}
	}

	public function submit_evalform(){
		$data = $this->getInfo();
		$userSlug = $_POST['userToEvaluate'];
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'ANSWERFORM';
		//$names = array();
		$names = array('quality', 'quantity', 'knowledge', 'reliability', 'leaning_ability', 'attendance', 'job_attitude', 'initiative', 'customer_service', 'cooperation_temWorl', 'honesty_integrity', 'field');
		for ( $i = 0; $i < 12; $i++){
			$this->form_validation->set_rules($names[$i], $names[$i], 'required');
		}

		if ($this->form_validation->run() == FALSE)
		{
			$data['errors'] = 'Incomplete Form. Please fill up the form completely.';
			$this->FormEvaluate($userSlug,$data);
		}
		else{
			$userSlug = $this->user_model->getDataBase('users',$userSlug, '','slug');
			$this->form_save->saveForms($names, $userSlug[0]['id']);
			$message = "Form has been submitted.";
			$this->people($message, 1);
		}
	}

	private function resultsInner(){
		$data = $this->getInfo();
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
					//echo $data_users['user_id'];
					$first_id = $data_users['user_id'];
					if(!$team_count) $team_count = 1;
					if(!$director_count) $director_count = 1;
					if(!$leader_count) $leader_count = 1;
					
					$team_score /= $team_count;
					$director_score /= $director_count;
					$leader_score /= $leader_count;
					
					if( $old_role==1 || $old_role==3 ){
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
				}else if( $data_users['role_ev']==1 || $data_users['role_ev']==3 ){
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
			}//endforeach

			if(!$team_count) $team_count = 1;
			if(!$director_count) $director_count = 1;
			if(!$leader_count) $leader_count = 1;

			$team_score /= $team_count;
			$director_score /= $director_count;
			$leader_score /= $leader_count;
			//echo $old_role;
			if( $old_role==1 || $old_role==3){
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
			}//endif
			else{
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
			}//end else
		}//endif

		return $b;
	}

	public function results(){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Results";
		$data['active_nav'] = 'RESULT';
		$b = $this->resultsInner();
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/resultForm', $b);
		$this->load->view('templates/footer');
	}

	public function members( $old_tem_id, $myId ){
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
				}else if( $data_users['role_ev']==1 || $data_users['role_ev']==3){
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
		$sumAll /= $countAll;
		return $sumAll;
	}

	public function evaluationDetails($num){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Details";
		$data['active_nav'] = 'RESULT';		
		//$b = array();
		$b = $this->resultsInner();
		
		$user_slug = $this->user_model->getDataBase('users',$num, '','slug');
		if(empty($user_slug)){
			$this->load->view('templates/head', $data);
			$this->load->view('templates/errors');
			$this->load->view('templates/footer');
			return;
		}
		
		$list = $this->user_model->getME($user_slug[0]['id']);
		//echo $user_slug[0]['role'];
		$b['roleOfClicked'] = $user_slug[0]['role'];
		$b['idOfClicked'] = $user_slug[0]['slug'];
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
		//echo($b['result_of_members'][0]);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/resultEval', $b);
		$this->load->view('templates/footer');
	}
}