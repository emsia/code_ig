<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper('url');
		$this->load->model(array('user_model', 'form_save'));

		if ( !$this->islogged() )
			redirect('http://192.81.218.182/eupeval/');
	}

	public function account($message=Null, $success=1){
		$data = $this->getInfo();
		$c = $this->form_save->getUserDetails($data['user_id']);
		//var_dump($c);
		$data['title'] = "eUP Performance Evaluation | Settings";
		$data['active_nav'] = 'SETTINGS';
		$data['message'] = $message;
		$data['success'] = $success;
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('templates/account', $c);
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
		$data['username'] = $name['username'];
		$data['role'] = $name['role'];
		$data['password'] = $name['password'];
		return $data;
	}

	public function savePassword(){
		$config = array(
			array(
				'field'   => 'old_password', 
                'label'   => 'Old Password', 
                'rules'   => 'required'
            ),
            array(
				'field'   => 'new_password', 
				'label'   => 'New Password', 
				'rules'   => 'required|matches[conf_password]|min_length[6]'
            ),
			array(
				'field'   => 'conf_password', 
				'label'   => 'Confirm Password', 
				'rules'   => 'required'
            ),			
        );
        $this->form_validation->set_rules($config);
        if (!$this->form_validation->run()){
        	$this->account();
        	return;
        }
        $data = $this->getInfo();

		$old_pass = $_POST['old_password'];
		if( sha1($old_pass) !== $data['password'] ){
			$this->account('Incorrect Password. Please Try again.', 0);
			return;
		}
		$new_pass = $_POST['new_password'];
		if( sha1($new_pass) == $data['password']){
			$this->account('Password has been used already. Please choose different one.', 0);
			return;	
		}
		$conf_pass = $_POST['conf_password'];
		$user_id = $_POST['user_id'];
		$this->form_save->save_password($user_id, $new_pass);
		$this->account('New password has been saved.', 1);
	}

	public function saveDetails(){
		$config = array(
			array(
				'field'   => 'username', 
                'label'   => 'User Name', 
                'rules'   => 'required'
            ),
            array(
				'field'   => 'email', 
				'label'   => 'Email', 
				'rules'   => 'required'
            ),
			array(
				'field'   => 'lastname', 
				'label'   => 'Last Name', 
				'rules'   => 'required'
            ),
            array(
				'field'   => 'firstname', 
				'label'   => 'First Name', 
				'rules'   => 'required'
            ),
            array(
				'field'   => 'middle', 
				'label'   => 'Middle Name', 
				'rules'   => 'required'
            ),			
        );
        $this->form_validation->set_rules($config);
        if (!$this->form_validation->run()){
        	$this->account();
        	return;
        } else{
        	$user_id = $_POST['user_id'];
        	$this->form_save->save_details($user_id);
        	$this->account('Details has been Saved.', 1);
        }
	}

}

?>