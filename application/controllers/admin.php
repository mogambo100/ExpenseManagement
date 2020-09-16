<?php 
class Admin  extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->library("session");
	}
	function index(){
		if(!isset($_SESSION['aid']))
		{
			$loc=site_url("admin");
		  	redirect($loc);
		}
		$users=$this->user->getUsers('2');
		$data['users']=$users;
		$this->load->view('admin/testadmin',$data);
	}
	function search(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$type=$this->input->post('type');
		$item=$this->input->post('item');
		if($item=="")
		{	
			$users=$this->user->getUsers('2');
			$data['users']=$users;
			$this->load->view("admin/alluser",$data);
		}
		$users=$this->user->searchText($type,$item);
		$data['users']=$users;


		
		$this->load->view("admin/alluser",$data);
	}

	function searchActive(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$type=$this->input->post('type');
		$item=$this->input->post('item');
		if($item=="")
		{	
			$users=$this->user->getActiveUser();
			$data['users']=$users;
			$this->load->view("admin/active",$data);
		}
		$users=$this->user->searchTextActive($type,$item);
		$data['users']=$users;


		
		$this->load->view("admin/active",$data);
	}
	function searchInactive(){
		
		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$type=$this->input->post('type');
		$item=$this->input->post('item');
		if($item=="")
		{	
			$users=$this->user->getInactiveUser();
			$data['users']=$users;
			$this->load->view("admin/authenticateUser",$data);
		}
		$users=$this->user->searchTextInactive($type,$item);
		$data['users']=$users;


		
		$this->load->view("admin/authenticateUser",$data);
	}
}
?>