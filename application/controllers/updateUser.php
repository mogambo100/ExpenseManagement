<?php 
class UpdateUser extends CI_Controller{
	function __construct(){
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
			$error=array("username"=>"","password"=>"","email"=>"","mobile"=>"","image"=>"" ,"address"=>"");

			$_GET['called']=0;
			$id=$_SESSION['userId'];
			$value=$this->user->getUser($id);
			$data['error']=$error;
			$data['value']=$value;
			$flagImage=false;
			$msg="";
				
				$id=$this->input->post('id');
				$mobile=$this->input->post('mobile');
				$email=$this->input->post('email');
				$address=$this->input->post('address');
				$name=$value['image'];

				//image section 
				/*
				if($_FILES['imageUpload']['size']!=0)
				{	var_dump($_FILES['imageUpload']);
					$image=$_FILES['imageUpload'];
					$name=$image['name'];
					$filename=$image['tmp_name'];
					var_dump($value['image']);
					$file_to_be_deleted="../assests/image/".$value['image'];
					var_dump($file_to_be_deleted);
					$value['username']=$username;
					$value['mobile']=$mobile;
					$value['email']=$email;
					$value['address']=$address;
					$value['image']=$name;

					$str="0123456789";
					$str_shuffle=str_shuffle($str);
					$encode=substr($str_shuffle,1,4);
					$name=$encode.$name;
					$flagImage=true;
					unlink("../assests/image/".$file_to_be_deleted);
				}*/
				//file data send for updation with server side validation 
				
				$flag2=true;
				$flag3=true;
				$flag4=true;
				if(!(is_numeric($mobile) && strlen($mobile)==10))
				{
					$flag4=false;
					$error['mobile']="Mobile no is incorrect";
				}
				
				if($address=="")
				{
					$flag2=false;
					$error['address']="Address is incorrect";
				}
				
					$j=strpos($email,'@');
					$com=strpos($email,'.com');
					$len=strlen($email);
					$diff=$len-$com;
					
				
				if($j>0 && ($com-$j)>0 && $diff==4)
					$flag3=true;
				else 
					{
						$flag3=false;
						$error['email']="Email is incorrect";
					}

					
				if(  $flag2 && $flag3 && $flag4)
				{
					if($this->user->updateUserSpecial($id,$mobile,$email,$address))
					{
						
						$data="updated";
						$send=json_encode($data);
						echo $send;
					}
					
				}
				else{
						$data=json_encode($error);
						echo $data;
					}

			}
}
?>