<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('User_model', 'FormSave'));
	}
	
	public function results(){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Results";
		$data['active_nav'] = 'RESULT';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/evalForm');
		$this->load->view('templates/footer');
	}
	
	public function people(){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Evaluate";
		$data['active_nav'] = 'ANSWERFORM';
		$data['count'] = 0; $data['countOtherTeam'] = 0;
		$b = array(); $c = array();
		
		if($data['role']==0){
			$all = $this->User_model->getAllUsers();
			foreach( $all as $array_data ){		
				if( $array_data['id'] != $data['user_id'] ){
					$OtherTeam = $this->User_model->getDataBase('team_member',$array_data['id'], '', 'user_id');					
					$teamForm = $this->User_model->getDataBase('evaluation_results',$array_data['id'], $data['user_id'], 'user_id');
					$teamName = $this->User_model->getDataBase('team',$OtherTeam[0]['team_id'], '', 'id');
					
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
			$user_teamId = $this->User_model->getDataBase('team_member',$data['user_id'], '', 'user_id');
			//var_dump($user_teamId);
			//print($user_teamId['team_id']); 
			
			//var_dump($teamName);
			//print($data['team_name']);
			$team = $this->User_model->getDataBase('team_member',$user_teamId[0]['team_id'], '', 'team_id');
			//print($team);
			//var_dump($team);
			foreach( $team as $array_data ){
				//print($array_data['user_id']."<br/>");
				if( $array_data['user_id'] != $data['user_id'] ){
					$teamMembers = $this->User_model->getDataBase('users',$array_data['user_id'], '', 'id');
					$teamForm = $this->User_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
					$teamName = $this->User_model->getDataBase('team',$user_teamId[0]['team_id'], '', 'id');
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
				$team = $this->User_model->getDataBase('team_member',1, '', 'team_id');
				foreach( $team as $array_data ){
					$teamMembers = $this->User_model->getDataBase('users',$array_data['user_id'], '','id');
					if( $data['role']==1 && $teamMembers[0]['role']==1 ) continue;
					$teamForm = $this->User_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
					$teamName = $this->User_model->getDataBase('team',1, '', 'id');
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
				$team = $this->User_model->getDataBase('team_member',10, '', 'team_id');
				foreach( $team as $array_data ){
					$teamMembers = $this->User_model->getDataBase('users',$array_data['user_id'], '', 'id');
					if( $data['role']==1 && $teamMembers[0]['role']==1 ) continue;
					$teamForm = $this->User_model->getDataBase('evaluation_results',$teamMembers[0]['id'], $data['user_id'], 'user_id');
					$teamName = $this->User_model->getDataBase('team',10, '', 'id');
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
				$teamLeaders = $this->User_model->getDataBase('users',1, '', 'role');
				//var_dump($teamLeaders);
				foreach( $teamLeaders as $array_data ){
					if( $array_data['id'] != $data['user_id'] ){
						$OtherTeam = $this->User_model->getDataBase('team_member',$array_data['id'], '', 'user_id');
						//var_dump($OtherTeam);
						$teamForm = $this->User_model->getDataBase('evaluation_results',$teamLeaders[0]['id'], $data['user_id'], 'user_id');
						$teamName = $this->User_model->getDataBase('team',$OtherTeam[0]['team_id'], '', 'id');
						
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
		}
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/personnel', $b);
		$this->load->view('templates/footer');
	}

	public function FormEvaluate( $num, $data = Null ){
		//$temp = $_POST['userToEvaluate'];
		//print($num);
		$teamData = $this->User_model->getDataBase('users',$num, '','slug');
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
			$userSlug = $this->User_model->getDataBase('users',$userSlug, '','slug');
			$this->FormSave->saveForms($names, $userSlug[0]['id']);
			print('GREAT!');
		}
	}

	public function getInfo(){
		$username = $this->session->userdata('username');
		$name = $this->User_model->getName($username);
		$data['firstname'] = $name['firstname'];
		$data['lastname'] = $name['lastname'];
		$data['middle'] = $name['middle'];
		$data['user_id'] = $name['id'];		
		$data['role'] = $name['role'];
		return $data;
	}
}

?>