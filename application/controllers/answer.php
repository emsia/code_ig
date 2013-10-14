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
	
	public function FormEvaluate( $data = Null ){
		$temp = $data['errors'];
		$data = $this->getInfo();
		$data['errors'] = $temp;
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'ANSWERFORM';
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body');
		$this->load->view('evaluation/evalForm');
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
		$data['title'] = "eUP Performance Evaluation | Answer";
		$data['active_nav'] = 'ANSWERFORM';

		$names = ['quality', 'quantity', 'knowledge', 'reliability', 'leaning_ability', 'attendance', 'job_attitude', 'initiative', 'customer_service', 'cooperation_temWorl', 'honesty_integrity', 'field'];
		for ( $i = 0; $i < 11; $i++)
			$this->form_validation->set_rules($names[$i], $names[$i], 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['errors'] = 'Incomplete Form. Please fill up completely except the Optional Field(Comment).';
			$this->FormEvaluate($data);
		}
		else{
			$this->FormSave->saveForms($names);
			$this->upcoming();
		}
	}

	public function getInfo(){
		$username = $this->session->userdata('username');
		$name = $this->User_model->getName($username);
		$data['firstname'] = $name['firstname'];
		$data['lastname'] = $name['lastname'];
		$data['middle'] = $name['middle'];
		return $data;
	}
}

?>