<?php 
class Attendance extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->model("userActivity");
		$this->load->library("session");
	}
	function index(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		$uid=$_SESSION['userId'];
		$attendances=$this->userActivity->getUserActivity($uid);
		$i=1;
		$data['attendances']=$attendances;
		$this->load->view("user/attendance",$data);
	}
	function adminAtte(){
		
		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$users=$this->user->getUsers('2');
		$data['users']=$users;
		$this->load->view("admin/userActivity",$data);
	}
	function fetchReport(){
		
		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$id=$this->uri->segment('2');
		$user=$this->user->getUser($id);
		$reports=$this->userActivity->getUserActivity($id);
		//echo "<a href=".site_url("downloadAtte/$id")."><label id='success' >Download</label></a>";

		echo "<table id='table78' class='table table-hover'>
		<tr>
			<th>S.No.</th>
			<th>Username</th>
			<th>Name</th>
			<th>LOGIN TIME</th>
			<th>LOGOUT TIME</th>
			<th>ACTIVE</th>
		</tr>";
		$i=1;
		foreach($reports as $report){
			
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$user['username']."</td>";
			echo "<td>".$user['firstname']." ".$user['lastname']."</td>";
			echo "<td>".$report['login']."</td>";
			echo "<td>".$report['logout']."</td>";
			echo "<td>".$report['active']."</td>";
			echo "</tr>";
			$i++;
		}
		echo "</table>";


	}
	function downloadAtte(){
		$id=$this->uri->segment(2);

		
		
		$reports=$this->userActivity->getUserActivity($id);
			$i=1;
			$fp = fopen('php://memory', 'w+');
			fputcsv($fp,array('S.No','Username','Name','Login','Logout','Active'));
			foreach ($reports as $row) {
				$user=$this->user->getUser($id);

				$name=$user['firstname']." ".$user['lastname'];
				$data=array($i,$user['username'],$name,$row['login'],$row['logout'],$row['active']);

			  fputcsv($fp, $data);
			  $i++;
			}

			rewind($fp);
			$csvFile = stream_get_contents($fp);
			fclose($fp);
		header('Content-Type: text/csv');
		header('Content-Length: '.strlen($csvFile));
		header('Content-Disposition: attachment; filename="file.csv"');
	}
}
?>