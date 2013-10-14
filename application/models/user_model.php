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
}
?>