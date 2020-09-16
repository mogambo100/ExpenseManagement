<?php 
class CheckPassword extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->model("userActivity");
		$this->load->library("session");
	}
	function index(){
		
		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		$password=$this->uri->segment('2');

		$id=$_SESSION['userId'];
		$length=strlen($password);
		$id=$_SESSION['userId'];
		$user=$this->user->getUser($id);

		if($this->user->specialPasswordCheck($user['username'],$password,$length) && $length>0)
		{
			if($this->user->validateUser($user['username'],$password))
			{
				$data= "<label id='admin'>New Password</label>&nbsp;
				 <input class='form-control' type='password' name='newPass' id='newPass'/> <input type='checkbox' name='check' 	onclick='showPassword()' >Show password
				 <br><br><button value='submit' class='btn btn-success'  >Change Password</button>";
				 $encode=$data;
			}
			else
			{
				$data="Password is Matching";
				$encode=$data;
			}	

		}
		else
			{
				$data= "Password Incorrect";
				$encode=$data;
			}
		echo $encode;


	}
}
?>