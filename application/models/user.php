<?php 
class User extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getUsers($type)
	{
		
		$query=$this->db->query("select * from user where type='$type'");
		$data=array();
		$record=$query->result_array();
		
			
		return $record;
		
	}
	function searchText($type,$item){
		$query=$this->db->query("select * from user where $type LIKE '%$item%' and type='2'");
		$record=$query->result_array();
		return $record;
	}
	function searchTextActive($type,$item){
		$query=$this->db->query("select * from user where $type LIKE '%$item%' and (type='2' and active='1')  ");
		$record=$query->result_array();
		return $record;
	}
	function searchTextInactive($type,$item){
			$query=$this->db->query("select * from user where $type LIKE '%$item%' and (type='2' and active='0')");
			$record=$query->result_array();
			return $record;
		}


	
	function getUserByName($username)
	{
		
		$query=$this->db->query("select * from user where username='$username'");
		$record=$query->row_array();
		return $record;
	}
	function getUserByEmail($email)
	{
		
		$query=$this->db->query("select * from user where email='$email'");
		$record=$query->row_array();
		return $record;
	}
	function getActiveUser(){
		$query=$this->db->query("select * from user where active='1' and type='2'");
		$record=$query->result_array();
		return $record;
	}

	function getInActiveUser(){
		$query=$this->db->query("select * from user where active='0'");
		$record=$query->result_array();
		return $record;
	}
	function getUser($id){
		
		$query=$this->db->query("select * from user where id='$id'");
			
		$record=$query->row_array();
		return $record;

	}
	function forgotPassword($email,$password){
		$query=$this->db->query("update user set password='$password' where email='$email'");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return fasle;
		}
	}
	function updatePassword($id,$password){
		
		$query=$this->db->query("update user set password='$password' where id=$id");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	function validateUser($username,$password){
		
		$query=$this->db->query("select * from user where username='$username' and active='1' ");
		$record=$query->row_array();
		
		if($password == $record['password'])
		{	
			return '1';
		}
		
		else
			return '0';
	}
	function getActiveStatus($id){
		
		$query=$this->db->query("select * from user where id='$id'");
		$record=$query->row_array();
		
		return $record['active'];
	}
	function getActiveStatusByName($username){
		
		$query=$this->db->query("select * from user where username='$username'");
		$record=$query->row_array();
		
		return $record['active'];
	}
	function updateActiveStatus($uid,$pid,$active){
		
		$query=$this->db->query("update user set active ='$active',pid='$pid' where id='$uid'");
		if($query!=NULL)
		{
			return true;

		}	
		else
		{
			return false;
		}	
		return $record;
	}
	function getPasswordLength($id){
		
		$query=$this->db->query("select * from user where id='$id'");
		$record=$query->row_array();
		
		$length=strlen($record['password']);
		
		return $length;
	}
	function specialPasswordCheck($username,$password,$length)
	{
		
		$query=$this->db->query("select * from user where username='$username'");
		$record=$query->row_array();
		
		$trimPassword=substr($record['password'],0,$length);
			
		if($password === $trimPassword)
		{
			return true;
		}
		
		else
			return false;
	}
	function createUser($firstname,$lastname,$username,$mobile,$email,$address,$password,$image){
		
		
		$query=$this->db->query("Insert into user (type,pid,firstname,lastname,username,mobile,email,address,password,image,active) values('2','2','$firstname','$lastname','$username','$mobile','$email','$address','$password','$image','1')");
		

		if($query!=NULL)
		{
			return true;

		}
		else
		{
			return false;
		}
		
		
		
		return $record;
	}
	function registerUser($firstname,$lastname,$username,$mobile,$email,$address,$password,$image){
		
		
		$query=$this->db->query("Insert into user (type,pid,firstname,lastname,username,mobile,email,address,password,image,active) values('2','2','$firstname','$lastname','$username','$mobile','$email','$address','$password','$image','0')");
		


		if($query>0)
		{
			return true;
		}
		else{
			return false;

		}
	}

	function updateParent($id,$pid){
		
		$query=$this->db->query("update user set pid='$pid' where id='$id'");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateUser($id,$username,$mobile,$email,$address,$image){
		
		
		$query=$this->db->query("update user set username='$username',mobile='$mobile',email='$email',address='$address' ,image='$image' where id=$id");

		$record=$query->row_array();
		return $record;


	}
	function updateUserSpecial($id,$mobile,$email,$address){
		
		
		$query=$this->db->query("update user set mobile='$mobile',email='$email',address='$address' where id='$id'");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}

		


	}
	function getUserForAuthentication()
	{
		
		$query=$this->db->query("select * from user where active='0'");
		$record=$query->result_array();
		return $record;
	}

	function addImage($id,$image){
		
		$query=$this->db->query("update user set image='$image' where id=$id");
		if($query!=NULL)
		{
			return true;

		}
		else
		{
			return false;
		}
	}
	function deleteUser($id)
	{
		
		$query=$this->db->query("delete from user where id=$id");
		
		$record=$query->row_array();
		
		return $record;
	}

	function checkUsername($username){
		$query=$this->db->query("select * from user where username='$username'");
		$record=$query->row_array();
		if($record!=NULL)
		{
			return true;

		}
		else
		{
			return false;
		}
	}
		function checkEmail($email){
		$query=$this->db->query("select * from user where email='$email'");
		$record=$query->row_array();
		if($record!=NULL)
		{
			return true;

		}
		else
		{
			return false;
		}
	}




	//user options 
	function updateUserPassword($id,$password){
		
		$query=$this->db->query("update user set password='$password' where id=$id");
		$record=$query->row_array();
		
		return ($record>0)?true:false;
	}
	function updatePermissions($id,$pass,$mess,$prof)
	{
		
		$query=$this->db->query("update user set changePassword='$pass',messaging='$mess',changeProfile='$prof' where id='$id'");
		
		if($query!=NULL)
			{
				return true;

			}
			else
			{
				return false;
			}
		

	}


}
?>