<?php 
class Profile extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->library("session");

	}
	function index(){
		
		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		$id=$_SESSION['userId'];
		$user=$this->user->getUser($id);
		$data['user']=$user;
		$this->load->view("user/changeProfile",$data);

		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			if($_FILES['imageUpload']['size']!=0)
			{

			$image=$_FILES['imageUpload'];
			
			$file_to_be_deleted=$user['image'];
			$name=$image['name'];
			$filename=$image['tmp_name'];
			$str="0123456789";
			$str_shuffle=str_shuffle($str);
			$encode=substr($str_shuffle,1,4);
			$name=$encode.$name;
			$loc=$_SERVER['DOCUMENT_ROOT']."/expense/assests/image/".$name;
			move_uploaded_file($filename, "$loc");
			$loc=$_SERVER['DOCUMENT_ROOT']."/expense/assests/image/".$file_to_be_deleted;
			
			unlink($loc);
			}
			else
			{
				$name=$user['image'];
			}

			
			if($this->user->addImage($id,$name))
			{
				$loc=site_url("testuser");
				redirect("$loc");
			}
		}
	}
}
?>