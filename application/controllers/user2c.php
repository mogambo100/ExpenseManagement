<?php

class User2c extends CI_Controller{
function __construct(){
	parent::__construct();
	$this->load->model("user");
	$this->load->model("mailbox");
	$this->load->model("userActivity");
	$this->load->model("expenseContribution");
	$this->load->library("session");
	}

	function expense(){

		date_default_timezone_set("Asia/Kolkata");

		


		if(!isset($_SESSION['username']))
		{
			header('location:U');
		}

			$user=$this->user->getUser($_SESSION['userId']);

		/*
		  User Back Button Disabled
		if($_SESSION['active']==false){
		  header('location:main.php');
		}*/

		
		$unread=$this->mailbox->getUnreadMessages($_SESSION['userId']);
		$data['user']=$user;
		$error=array("mobile"=>"","email"=>"","address"=>"");
		$data['error']=$error;
		$this->load->view("user/testuser",$data);

	}

}

	

		

	

		

	//sending message
	

 ?>




