<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('user_model', 'form_save'));

		if ( !$this->islogged() )
			redirect('http://192.81.218.182/eupeval/');
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

	public function eachMember($num=Null, $message=Null, $success=0){;

		$data = $this->getInfo();
		//var_dump($data);
		$data['title'] = "eUP Performance Evaluation | Teams";
		$data['active_nav'] = 'TEAM';

		$g = array();
		$g['count'] = 0;
		$g['message'] = $message;
		$g['success'] = $success;

		$AllTeams = $this->user_model->getAllTeams($num);
		if( count($AllTeams) ){
			$g['name'] = $AllTeams[0]['team_name'];
			$g['shortname'] = $AllTeams[0]['short_name'];
			$g['slugTeam'] = $AllTeams[0]['slug'];

			foreach ($AllTeams as $teamAll) {
				$g['fullName'][] = $teamAll['lastname'].", ".$teamAll['firstname']." ".substr($teamAll['middle'],0,1).".";
				$g['mail'][] = $teamAll['email'];
				$g['roles'][] = $teamAll['role'];
				$g['slug'][] = $teamAll['user_id'];
				$g['count']++;
			}
		}else{
			$AllTeams = $this->user_model->getDataBase('team', $num, '', 'slug');
			$g['name'] = $AllTeams[0]['team_name'];
			$g['shortname'] = $AllTeams[0]['short_name'];
			$g['slugTeam'] = $AllTeams[0]['slug'];
		}
		$g['role']=$data['role'];

		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/members', $g);
		$this->load->view('templates/footer');
	}

	public function inviteMember(){
		$message='';
		$data = $this->getInfo();

		$slug = $_POST['slug'];
		$team_name = $_POST['team_name'];
		$text = $_POST['textArea'];
		$arrays = preg_split('/[\s,]+/', $text);
		$data['countPeople'] = 0;

		foreach( $arrays as $array ){
			$checker = $this->checkEmail($array);
			if(!$checker){
				$message = 'Invalid email addresses.';
				break;
			}
			$data['countPeople']++;
		}
		if(empty($message)){
			$b['teams'] = 1;
			$b['emails'] = $arrays;
			$b['key'] = $slug;
			$b['team_name'] = $team_name;
			$data['title'] = 'eUP Performance Evaluation | Invitation';
			$data['active_nav'] = 'TEAM';
			$this->load->view('templates/head', $data);
			$this->load->view('templates/body');
			$this->load->view('evaluation/invitation', $b);
			$this->load->view('templates/footer');
		}else $this->eachMember($slug, $message, 0);
	}

	private function checkEmail($email){
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		if (preg_match($regex, $email)) return 1;
		else return 0;
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
		if( !$this->email->send() ) $this->eachMember( $data['key'], 'Error Sending invitations', 0);
		else $this->eachMember($data['key'], 'Invitation was sent.', 1);
	}

	public function removeMe(){
		$team_slug = $_POST['team_slug'];
		$personnel_slug = $_POST['personnel_slug'];
		$id = $this->user_model->getDataBase('team', $team_slug, '', 'slug');
		$person_id = $this->user_model->getDataBase('users', $personnel_slug, '', 'slug');
		//var_dump($id);
		$this->user_model->remove($id[0]['id'], $person_id[0]['id']);
		$this->eachMember($team_slug, 'Remove Successfully.', 1);
	}

	public function editPosition($num=Null, $slugTeam=Null, $message=Null, $success=0){
		$data = $this->getInfo();
		$data['title'] = "eUP Performance Evaluation | Settings";
		$data['active_nav'] = 'TEAM';
		$data['message'] = $message;
		$data['success'] = $success;

		$c['num'] = $slugTeam;
		$personnel = $this->user_model->getDataBase('users', $num, '', 'slug');
		$c['person'] = $personnel[0];

		$c['length_of_service'] = '';
		$c['new_position'] = '';
		$c['monetary_equivalent'] = '';
		$c['designation'] = '';
		$c['date_hired'] = '';

		$personnel = $this->user_model->getDataBase('user_details', $personnel[0]['id'], '', 'user_id');
		if(count($personnel)){
			$c['designation'] = $personnel[0]['designation'];
			$c['date_hired'] = $personnel[0]['date_hired'];
			$c['length_of_service'] = $personnel[0]['length_of_service'];
			$c['new_position'] = $personnel[0]['new_position'];
			$c['monetary_equivalent'] = $personnel[0]['monetary_equivalent'];
		}

		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('templates/editPersonnel', $c);
		$this->load->view('templates/footer');
	}

	public function promoteMe(){
		$role = $_POST['promoted'];
		$personnel = $_POST['personnel_slug'];
		$team = $_POST['team_slug'];

		//table name, column1 name, value1, column2 name, value2 
		$this->form_save->updater('users', 'slug', $personnel, 'role', $role);
		$this->editPosition($personnel, $team);
		return;
	}

	public function demoteMe(){
		$role = $_POST['demoted'];
		$personnel = $_POST['personnel_slug'];
		$team = $_POST['team_slug'];

		//table name, column1 name, value1, column2 name, value2 
		$this->form_save->updater('users', 'slug', $personnel, 'role', $role);
		$this->editPosition($personnel, $team);
		return;
	}

	public function deleteTeam(){
		$slug = $_POST['team_slug'];
		$this->db->delete('team', array('slug' => $slug));
		redirect('http://192.81.218.182/eupeval/index.php/answer/TeamAll');
	}

	public function addNewTeam(){
		$name = $_POST['teamNameFull'];
		$short = $_POST['teamNameshort'];
		$slug = $this->saltgen(8);
		$this->form_save->addTeam('team', $name, $short, $slug);
		redirect('http://192.81.218.182/eupeval/index.php/answer/TeamAll');
	}

	private function saltgen($max){
		$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$i = 0;
		$salt = "";
		while ($i < $max) {
			$salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
			$i++;
		}
		return $salt;
	}

	public function editTeam(){
		$fullName = $_POST['teamFullName'];
		$short = '';
		$team_slug = $_POST['team_slug'];

		if(isset($_POST['teamShortName'])){
			$short = $_POST['teamShortName'];
		}

		$this->form_save->updater('team', 'slug', $team_slug, 'short_name', $short);
		$this->form_save->updater('team', 'slug', $team_slug, 'team_name', $fullName);
		$this->eachMember($team_slug, 'Success Updating Team information', 1);
	}

	public function saveDetailsFilled(){
		$designation = $_POST['designation'];
		$user_id = $_POST['user_id'];
		$user_slug = $_POST['user_slug'];
		$team_slug = $_POST['team_slug'];

		$date_hired = $_POST['date_hired'];
		$length_of_service = $_POST['length_of_service'];
		$new_position = $_POST['new_position'];
		$monetary_equivalent = $_POST['monetary_equivalent'];

		$try = $this->user_model->getDataBase('user_details', $user_id, '', 'user_id');
		if(count($try)){
			$this->form_save->updater('user_details', 'user_id', $user_id, 'designation', $designation);
			$this->form_save->updater('user_details', 'user_id', $user_id, 'date_hired', $date_hired);
			$this->form_save->updater('user_details', 'user_id', $user_id, 'length_of_service', $length_of_service);
			$this->form_save->updater('user_details', 'user_id', $user_id, 'new_position', $new_position);
			$this->form_save->updater('user_details', 'user_id', $user_id, 'monetary_equivalent', $monetary_equivalent);
		}else{
			$data = array(
				'user_id' => $user_id,
				'designation' => $designation,
				'date_hired' => $date_hired,
				'length_of_service' => $length_of_service,
				'new_position' => $new_position,
				'monetary_equivalent' => $monetary_equivalent
			);
			$this->db->insert('user_details', $data);
		}

		$this->editPosition($user_slug, $team_slug, 'You updated the information.', 1);
	}

}

?>