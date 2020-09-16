<?php 
class GetUnreadMessages extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("mailbox");
		$this->load->model("user");
		$this->load->library("session");
	}
	function index(){
		$id=$_SESSION['aid'];
		$user=$this->user->getUser($id);
		$unread=$this->mailbox->getUnreadMessages($user['email']);
		echo sizeof($unread);

	}
	function user(){
		$id=$_SESSION['userId'];
		$user=$this->user->getUser($id);
		$unread=$this->mailbox->getUnreadMessages($user['email']);
		echo sizeof($unread);

	}
}
?>