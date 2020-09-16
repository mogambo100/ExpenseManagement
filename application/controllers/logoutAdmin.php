<?php
class LogoutAdmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');

	}
	function index(){
		session_unset();
		session_destroy();
		$loc=site_url('admin');
		redirect($loc);
	}
}
?>