<?php 
class Userc extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->model("userActivity");
		$this->load->model("mailbox");
		$this->load->model("expenseContribution");
		$this->load->library("session");
	}
	function index(){
		

		$error=array("error"=>"","flagRegister"=>"0");
		if(isset($_SESSION['aid']) || isset($_SESSION['userId']))
		{
			$loc=site_url('sample');
			redirect($loc);
		}
		$this->load->view("user/login",$error);
	}

	function login(){

		
		date_default_timezone_set("Asia/Kolkata");
		$flagRegister="0";
		//page loaded first time
		$flagRegister=$this->input->get('flagRegister');
		$_SESSION['last_visited']=time();

		if(isset($_SESSION['username']))

		{	$loc=site_url('testuser');
			redirect("$loc");
			return true;
		}

		$_SESSION['active']=false;
			
		$error="";
		if($_SERVER['REQUEST_METHOD']=="POST")
		{	
			$id=$this->input->post('userId');
			$password=$this->input->post('password');
			$user=$this->user->getUserByName($id);
				if($user['type']!="2")
				{
					$loc=site_url('U');
					//redirect($loc);	
				}
				
			if($this->user->getActiveStatusByName($id)==1)
			{		
				if($this->user->validateUser($id,$password)=='1')
				{	
					$_SESSION['active']=true;
					$user=$this->user->getUserByName($id);
					
					$_SESSION['userId']=$user['id'];

					$_SESSION['last_login']=date("y-m-d h:i:s");
					

					
					$_SESSION['username']=$user['username'];

					$loc=site_url('testuser');
					
					redirect("$loc");
					
				}
				else 
				{	
					$error=array("error"=>"Invalid Credentials","flagRegister"=>"0");
					$this->load->view('user/login',$error);
				}

			}
			else{
				$error=array("error"=>"","flagRegister"=>"1");
				$this->load->view('user/login',$error);
				
			}
			
		}

	}


	function main(){
		$error=array("error"=>"","flagRegister"=>"1");
		if(isset($_SESSION['aid']) || isset($_SESSION['userId']))
		{
			$loc=site_url('sample');
			redirect($loc);
		}
		$this->load->view("user/login",$error);
			
		}

	
	function loadPage(){

		$error="";
		$data['error']=$error;
		if(isset($_SESSION['userId']) || isset($_SESSION['aid']))
		{
			$loc=site_url('sample');
			redirect($loc);
		}
		
		$this->load->view("admin/main",$data);
	}
	function sample(){
		$this->load->view("common/sample");
	}
	function adminLogin(){
		if(isset($_SESSION['aid']))
		{
		$loc=site_url('adminExpense');
		 redirect($loc);
		}
		if(isset($_SESSION['userId']))
		{
			$error="Another User is already logged in .Please logout to continue.";
			$data['error']=$error;
			$this->load->view('admin/main',$data);
		}

			$error="";
			$data['error']=$error;
			if($_SERVER['REQUEST_METHOD']=="POST")
			{
				$id=$this->input->post('adminId');
				$password=$this->input->post('password');
				
				$user=$this->user->getUserByName($id);
				
				if($user['type']!="1")
				{
					$loc=site_url('admin');
					redirect($loc);	
				}

				if($this->user->validateUser($id,$password))
				{
					
					$_SESSION['aid']=$user['id'];
					
					$loc=site_url('adminExpense');
					redirect($loc);
					
				}
				else 
				{
					$error="Invalid Credentials";
					$data['error']=$error;
					$this->load->view('admin/main',$data);
				}

			}
	}

	function forgotPasswordUser(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
		if($this->user->forgotPassword($email,$password))
		{
			$error="Password Updated Successfully";
			$flagRegister=0;
			$data['flagRegister']=$flagRegister;
			$data['error']=$error;
			$this->load->view("user/login",$data);
		}
		else{
			
			$error="Invalid Credentials .Please Try Again!";
			$data['error']=$error;
			$flagRegister=0;
			$data['flagRegister']=$flagRegister;
			$this->load->view("user/login",$data);
		}
	}
	function Forgot(){
		$this->load->view("user/forgot");
	}
}
?>