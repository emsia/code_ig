<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper('url');
		$this->load->model('user_model');
		include('welcome.php');
	}
	
	public function results(){
		$me = new welcome;
		$data = $me->detals_of_users();
		$data['title'] = "eUP Performance Evaluation | Results";
		$data['active_nav'] = 'RESULT';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/evalForm');
		$this->load->view('templates/footer');
	}
	
	public function FormEvaluate(){
		$me = new welcome;
		$data = $me->detals_of_users();
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'BEHAVIORAL';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/evalForm');
		$this->load->view('templates/footer');
	}
	
	public function process(){
		$me = new welcome;
		$data = $me->detals_of_users();
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'PROCESS';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('templates/process');
		$this->load->view('templates/footer');
	}
}

?>