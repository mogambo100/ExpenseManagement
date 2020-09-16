<?php 
class ChangeUserPassword extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->model("userActivity");
		$this->load->library('session');
	}
	function index(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		$error="";
		$length=$this->user->getPasswordLength($_SESSION['userId']);
		$inc=100/$length;
		$user=$this->user->getUser($_SESSION['userId']);
		$data['error']=$error;
		$data['length']=$length;
		$data['inc']=$inc;
		$data['user']=$user;
		$_SESSION['error']="";
		$this->load->view("user/changeUserPassword",$data);
		
		if(!isset($_SESSION['userId']))
		{
			
			$_SESSION['relogin']="SESSION_EXPIRED";
			$loc=site_url('logout');
			redirect($loc);
		}
		
	}
	function change(){
		
		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
	if($_SERVER['REQUEST_METHOD']=='POST')
		{	
			
			$password=$this->input->post("newPass");
			$id=$_SESSION['userId'];
			if($password=="")
			{	
				$_SESSION['error']="PASSWORD CAN'T BE BLANK";
				$this->load->view('user/ChangeUserPassword',$data);
			}
			else if($this->user->updatePassword($id,$password))
			{
				$loc=site_url('testuser');
				redirect($loc);
			}
			
		}


	}
}
?>