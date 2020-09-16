<?php 
class ShowMessage extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("mailbox");
		$this->load->model("user");
		$this->load->library("session");
	}
	function index(){
		
		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		$id=$this->uri->segment('2');
		
		$message=$this->mailbox->getMessage($id);
		$record=$this->mailbox->updateMessage($id);
		$data['message']=$message;
		$data['record']=$record;
		$this->load->view("user/showMessage",$data);
	}
	function indexAdmin(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$id=$this->uri->segment('2');
		
		$message=$this->mailbox->getMessage($id);
		$record=$this->mailbox->updateMessage($id);
		$data['message']=$message;
		$data['record']=$record;
		$this->load->view("admin/showMessage",$data);
	}
}
?>