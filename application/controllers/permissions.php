<?php
class Permissions extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->model("mailbox");
		$this->load->library("session");
	}
	function index(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$users=$this->user->getActiveUser();
		$data['users']=$users;
		$this->load->view("admin/permissions",$data);

	}
	function permissions(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}

		if($_SERVER['REQUEST_METHOD']=='POST')

		{
			$uid=$this->input->post('uid');
			$pass=$this->input->post('grantedPass');
			$mess=$this->input->post('grantedMess');
			$prof=$this->input->post('grantedProf');
			if($this->user->updatePermissions($uid,$pass,$mess,$prof))
			{	
				$loc=site_url('permission');
				redirect($loc);
			}
		}
	}
	function ajaxPermission(){
		
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
				<th>Username</th>
				<th>Change Password</th>
				<th>Messaging</th>
				<th>Change Profile</th>
				<th>Update</th>
			</tr>
			
			<tr>";
				echo "<input type='text' style='visibility:hidden;' name='uid' value='".$user['id']."' style='visibility:hidden;'>";	
				
				echo "<td>".$user['username']." </td>";

				if($user['changePassword']==1)
				{
					echo "<td><input type='radio' name='grantedPass' value='1' checked>Yes&emsp;<input type='radio' name='grantedPass' value='0' >No</td>";
				}
				else
				{
					echo "<td><input type='radio' name='grantedPass' value='1'>Yes&emsp;<input type='radio' name='grantedPass' value='0' checked >No</td>";
				}

				if($user['messaging']==1)
				{
					echo "<td><input type='radio' name='grantedMess' value='1' checked>Yes&emsp;<input type='radio' name='grantedMess' value='0' >No</td>";
				}
				else
				{
					echo "<td><input type='radio' name='grantedMess' value='1' >Yes&emsp;<input type='radio' name='grantedMess' value='0' checked >No</td>";
				}

				if($user['changeProfile']==1)
				{
					echo "<td><input type='radio' name='grantedProf' value='1' checked>Yes&emsp;<input type='radio' name='grantedProf' value='0' >No</td>";
				}
				else
				{
					echo "<td><input type='radio' name='grantedProf' value='1'>Yes&emsp;<input type='radio' name='grantedProf' value='0' checked >No</td>";
				}
				echo "<td><button class='btn btn-success' style='width: 100%;' value='submit' name='updatePermissions'>Update</button></td>";
				echo "	</tr>";
				
				echo "</table>
				";
	}
}
?>
