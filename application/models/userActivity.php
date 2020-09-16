<?php 
class UserActivity extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}	

	function insertUserActivity($uid,$login,$logout,$active){
		
		$query=$this->db->query("insert into userActivity(uid,login,logout,active) values ('$uid','$login','$logout','$active') ");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}

		
		}
	function getUserActivity($uid){
		
		$query=$this->db->query("select * from userActivity where uid='$uid'");
		$record=$query->result_array();
		return $record;		
	}
	function updateLogout($uid,$login,$logout){
		
		$query=$this->db->query("update userActivity set logout='$logout' where uid='$uid' and login='$login'");
		$query=$this->db->query("select * from userActivity where uid='$uid' and login='$login'");
		$record=$query->row_array();
		
		$dlogin=strtotime($record['login']);
		$dlogout=strtotime($record['logout']);
		var_dump($dlogin);
		
		var_dump($dlogout);
		$active=$dlogout-$dlogin;
		$active= gmdate("H:i:s",$active);
		$query=$this->db->query("update userActivity set active='$active' where uid='$uid' and login='$login'");
		$query=$this->db->query("select * from userActivity where uid='$uid' and login='$login'");
		var_dump($query);
			if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}
	
		

	}
	function deleteUserActivity($id)
	{
		
		$query=$this->db->query("delete from useractivity where uid=$id");
		
		
		
		
		return $record;
	}
}
?>