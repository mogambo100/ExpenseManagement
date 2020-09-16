<?php 
class DeleteUser extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->library("session");
	}
	function index(){
		$id=$this->uri->segment('2');
		$data['id']=$id;
		$this->load->view("admin/deleteScript",$id);
	}
}
?>