<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<?php 
include "../common/dl.php";
session_start();
if(!isset($_SESSION['userId']))
{
	header('location:login.php');
}
	$error=array("username"=>"","password"=>"","email"=>"","mobile"=>"","image"=>"" ,"address"=>"");

	$_GET['called']=0;
	$id=$_SESSION['userId'];
	$value=getUser($id);
	
	$flagImage=false;
	$msg="";
		
		$id=$_POST['id'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$address=$_POST['address'];
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
		$flag1=true;
		$flag2=true;
		$flag3=true;
		$flag4=true;
		if(!(is_numeric($mobile) && strlen($mobile)==10))
		{
			$flag4=false;
			$error['mobile']="Mobile no is incorrect";
		}
		if($id=="" )
		{
			$flag1=false;
			$error['username']="Username Can't Be NULL";
		}
		if($address=="")
		{
			$flag2=false;
			$error['address']="Address can't be NULL";
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

			
		if( $flag1 && $flag2 && $flag3 && $flag4)
		{
			if(updateUserSpecial($id,$mobile,$email,$address))
			{
				
				echo "updated";
			}
			else{
				echo "Error in data";
			}
		}
		
	

?>
