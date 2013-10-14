<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper('url');
		$this->load->model('User_model');
	}
	
	public function index( $data = Null )
	{	
		if ( $this->islogged() )
			redirect('http://localhost/code_ig/index.php/home');
		$data['title'] = "eUP Performance Evaluation | Login";
		$this->load->view('templates/head', $data);
		$this->load->view('templates/login');
		$this->load->view('templates/footer');
	}
	
	public function loginSubmit(){
		$config = array(
			array(
				'field'   => 'username', 
                'label'   => 'Username', 
                'rules'   => 'required'
            ),
            array(
				'field'   => 'password', 
				'label'   => 'Password', 
				'rules'   => 'required'
            )
        );
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE){
			$data['errors'] = 'Invalid username and password combination.';
			$this->index( $data );
			return;
		}else{
			$uname = $this->input->post('username');
			$pword = $this->input->post('password');
			if(!$this->User_model->verifynameAndPass($uname,$pword)){
				$data['errors'] = "Invalid username and password combination.";//"Your Account is not yet Verified. Please Confirm it first using email.";
				$this->index($data);
				return;
			}
			if( !$this->User_model->verifynameAndPass($uname,$pword, 1)){
				$data['errors'] = "Account not yet Verified. Check your email.";
				$this->index($data);
				return;
			}
			
			$result = $this->User_model->getuid($uname);
			$this->log($uname,$result['role']);
			redirect('http://localhost/code_ig/index.php/home');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('http://localhost/code_ig/');
	}
	
	private function log($uname, $role){
		$this->session->set_userdata('logged',true);
		$this->session->set_userdata('username',$uname);
		$this->session->set_userdata('role', $role);
	}
	
	public function detals_of_users( ){
		$username = $this->session->userdata('username');
		$name = $this->User_model->getName($username);
		$data['firstname'] = $name['firstname'];
		$data['lastname'] = $name['lastname'];
		$data['middle'] = $name['middle'];
		$data['user_id'] = $name['id'];
		return $data;
	}

	public function errors(){
		$data['title'] = 'Page Not Found';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/errors');
	}
}