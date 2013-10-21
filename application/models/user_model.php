<?php
class User_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
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
	
	function saltgen($max){
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $i = 0;
        $salt = "";
        while ($i < $max) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $i++;
        }
        return $salt;
	}
	
	function insertData(){
		$data = array(
			'username'	=> $_POST['username'],
			'email'			=> $_POST['email'],
			'password'	=> sha1($_POST['password']),
			'middle'		=> $_POST['middleName'],
			'firstname'	=> $_POST['firtsName'],
			'lastname'	=> $_POST['lastName'],
			'role'			=> 3,
			'verified'		=> 0,
			'slug'			=> $this->saltgen(25),
		);
		$this->db->insert('users', $data);
	}
	
	function getDataBase($tableName, $getId, $evaluator, $where_to_get){
		if( empty($evaluator) ) $query = $this->db->get_where($tableName, array($where_to_get => $getId));
		else	$query = $this->db->get_where($tableName, array($where_to_get => $getId, 'evaluator' => $evaluator));
		return $query->result_array();
	}
	
	function getAllUsers(){
		$query = $this->db->get('users');
		return $query->result_array();
	}
}
?>