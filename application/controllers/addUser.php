<?php 
class AddUser extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->library('session');
	}
	function index(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$value=array("firstname"=>"","lastname"=>"","username"=>"","mobile"=>"","email"=>"","address"=>"","password"=>"","image"=>"");
		$error=array("firstname"=>"","lastname"=>"","username"=>"","password"=>"","email"=>"","mobile"=>"","image"=>"");
		$data['value']=$value;
		$data['error']=$error;
		$this->load->view("admin/addUser",$data);

	}
	
		function addUserInfo(){
			
		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
			if(!isset($_SESSION['aid']))
		{
			$loc=site_url('admin');
			redirect($loc);
		}
		$aid=$_SESSION['aid'];
		$value=array("firstname"=>"","lastname"=>"","username"=>"","mobile"=>"","email"=>"","address"=>"","password"=>"","image"=>"");
		$error=array("firstname"=>"","lastname"=>"","username"=>"","password"=>"","email"=>"","mobile"=>"","image"=>"");

		$msg="";
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			$username=$this->input->post('username');

			$mobile=$this->input->post('mobile');
			$email=$this->input->post('email');
			$address=$this->input->post('address');
			$password=$this->input->post('password');

			//File uploading part:
			$image=$_FILES['imageUpload'];
			$name=$image['name'];
			;

			$value['image']=$name;
			$value['firstname']=$firstname;
			$value['lastname']=$lastname;
			$value['username']=$username;
			$value['mobile']=$mobile;
			$value['email']=$email;
			$value['address']=$address;
			$value['password']=$password;
			
			//encoding file name with substring ;
			$str="0123456789";
			$str_shuffle=str_shuffle($str);
			$encode=substr($str_shuffle, 1,4);
			$name=$encode.$name;
			$filename=$image['tmp_name'];
			//server side validation 
			$flag1=true;	//empty username check
			$flag2=true;	//password check
			$flag3=true;	//email check
			$flag4=true;	//mobile no check
			$flag5=true;	//same username check
			$flag6=true;	//firstname check
			$flag7=true;	//lastname check
			$flag8=true;	//email same check
			$checkUser=$this->user->checkUsername($username);
			$checkEmail=$this->user->checkEmail($email);
			if($checkEmail==true)
			{
				$flag8=false;
				$error['email']="Email Already Exists !";
			}
			if($checkUser==true)
			{
				$flag5=false;
				$error['username']="Username Already Exists !";
			}
			

			if(!(is_numeric($mobile) && strlen($mobile)==10))
			{
				$flag4=false;
				$error['mobile']="Mobile no is incorrect";
			}
			if($username=="" )
			{
				$error['username']="Username is incorrect !";

				$flag1=false;
				
			}
			if($firstname=="" )
			{
				$error['firstname']="firstname is incorrect !";

				$flag6=false;
				
			}
			if($lastname=="" )
			{
				$error['lastname']="lastname is incorrect !";

				$flag7=false;
				
			}
			if($password=="" )
			{
				$flag2=false;
				$error['password']="Password is incorrect !";
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

			$data['error']=$error;
			$data['value']=$value;	
			if( $flag1 && $flag2 && $flag3 && $flag4 && $flag5 && $flag6 && $flag7 && $flag8 )
			{	
				$status=$this->user->createUser($firstname,$lastname,$username,$mobile,$email,$address,$password,$name);
				$loc=$_SERVER['DOCUMENT_ROOT']."/expense/assests/image/".$name;
				move_uploaded_file($filename,"$loc");
				$loc=site_url('addUser');
				redirect($loc);
			}
			else
			{
				$this->load->view('admin/addUser',$data);
			}


			
		}
	
	}
}
?>