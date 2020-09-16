<?php
class Authenticate extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->library('session');

	}
	
	function submitAuth(){
		if($_SERVER['REQUEST_METHOD']=="POST")

		{
			
			$uid=$this->input->post('id');
			$active=$this->input->post('active');
			
			if($this->user->updateActiveStatus($uid,$_SESSION['aid'],$active))
			{	
				$ans=$this->user->updateParent($uid,$_SESSION['aid']);
				$loc=site_url('auth');
				redirect($loc);
			}
		}

	}
	function index(){
		
		$users=$this->user->getInActiveUser();
		
		
		$data['users']=$users;
		
		$this->load->view('admin/authenticateUser',$data);
	}

	function active(){
		$users=$this->user->getActiveUser();
		
		$data['users']=$users;
		
		$this->load->view('admin/active',$data);
	}

	function allusers(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
			
		$users=$this->user->getUsers('2');
		
		$data['users']=$users;
		$this->load->view('admin/alluser',$data);
	}

	
	function ajaxAuthenticate(){
		
		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$id=$this->uri->segment('2');
		$user=$this->user->getUser($id);


		echo "

		<table align='center' class='table table-striped'>
			<tr>
				<th>USER-ID</th>
				<th>Username</th>
				<th>Profile</th>
				<th>Active</th>
				<th>Update</th>
			</tr>
			
			<tr>";
				echo "<td><input type='text' name='id' value='".$user['id']."' style='width:40px'></td>";	
				
				echo "<td>".$user['username']." </td>";
				echo "<td><img class='img img-rounded' src='../assests/image/".$user['image']." ' style=' margin-top: 20px; margin-left: 20px; height: 100px;width: 80px;'></td>";

				if($user['active']==1)
				{
					echo "<td><input type='radio' name='active' value='1' checked>Active&emsp;<input type='radio' name='active' value='0' >In-Active</td>";
				}
				else
				{
					echo "<td><input type='radio' name='active' value='1'>Active&emsp;<input type='radio' name='active' value='0' checked >In-Active</td>";
				}

				echo "<td><button class='btn btn-success' style='width: 100%;' value='submit' name='updateAuthenticate'>Update</button></td>";
				echo "	</tr>";
				
				echo "</table>
						";

	
	}
}
 ?>
