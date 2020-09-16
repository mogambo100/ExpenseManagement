<?php 
	
class Logout extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->model("mailbox");
		$this->load->model("userActivity");
		$this->load->library("session");
	}

	function index(){
		date_default_timezone_set("Asia/Kolkata");
		
		$uid=$_SESSION['userId'];
		$_SESSION['again_login_check']=date("y-m-d");
		$_SESSION['last_logout']=date("y-m-d h:i:s");
		$record=$this->userActivity->getUserActivity($uid);

		if(sizeof($record)==0)
		{	var_dump("First time logging in by any user");
			$date1=strtotime($_SESSION['last_login']);
			$date2=strtotime($_SESSION['last_logout']);
			$active=$date2-$date1;
			$active= gmdate("H:i:s",$active);
			$ans=$this->userActivity->insertUserActivity($uid,$_SESSION['last_login'],$_SESSION['last_logout'],$active);
			session_destroy();
			session_unset();
			$loc=site_url('U');
			redirect("$loc");
		}
		else
		{
			$record=$this->userActivity->getUserActivity($uid);
			$count=sizeof($record);
			
			$result=$record[$count-1];
			$logindate=strtotime($result['login']);
			
			$date=date("y-m-d" ,$logindate);
			
			
			if($date!=$_SESSION['again_login_check'])
			{	var_dump("existing user login on first time on a day");
				$date1=strtotime($_SESSION['last_login']);
				$date2=strtotime($_SESSION['last_logout']);
				$active=$date2-$date1;
				$active= gmdate("H:i:s",$active);
				$ans=$this->userActivity->insertUserActivity($uid,$_SESSION['last_login'],$_SESSION['last_logout'],$active);
				session_destroy();
				session_unset();

			$loc=site_url('U');
			redirect("$loc");

			}
			else
			{	var_dump("UPDATING LOGIING IN TABLE");
				$result=$this->userActivity->updateLogout($uid,$result['login'],$_SESSION['last_logout']);
					
				session_destroy();
				session_unset();
				$loc=site_url('U');
			redirect("$loc");

			}

		}
	}

}
?>
