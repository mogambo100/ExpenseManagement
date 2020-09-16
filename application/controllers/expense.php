<?php 
class Expense extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("expenseContribution");
		$this->load->model("user");
		$this->load->model("mailbox");
		$this->load->library("session");
	}
	function index(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		date_default_timezone_set("Asia/Kolkata");
		$date=date("m");
		$bamt="";
		$eamt="";
		$damt="";
		$contribution=$this->expenseContribution->selectContribution("2018-04-01","2018-07-30");

		$expense=$this->expenseContribution->selectExpense("2018-04-01","2018-07-30");
		$f=fopen("data.csv","w");
		foreach($contribution as $contri)
		{
			$damt+=$contri['amount'];
		}
		foreach($expense as $exp)
		{
			$eamt+=$exp['amount'];
			$bamt=$damt-$eamt;
		}
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			header("Content-Disposition: attachment; filename='data.csv'");
		}
		$data['bamt']=$bamt;
		$data['eamt']=$eamt;
		$data['damt']=$damt;
		$data['contribution']=$contribution;
		$data['expense']=$expense;
		$this->load->view('user/expense',$data);
	}

	function contribution(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		$uid=$_SESSION['userId'];
		$user=$this->user->getUser($uid);
		$email=$user['email'];
		$_SESSION['userEmail']=$email;
		$date1="";
		$date2="";
		$msg="";
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$start=$this->input->post('start');
			$end=$this->input->post('end');
			$dt1=strtotime($start);
			$dt2=strtotime($end);
			$msg="Contributions from ".$start." to ".$end;
			if($dt1=="" )
			{
				$date1="Please enter Correct date !";
				$msg="Please enter a valid Period";
			}
			$data['date1']=$date1;
			if($dt2=="" )
			{
				$date2="Please enter Correct date !";
				$msg="Please enter a valid Period";
				
			}
			$data['date2']=$date2;
			$_SESSION['start']=$start;
			$_SESSION['end']=$end;
			
			$datas=$this->expenseContribution->selectCertainContribution($email,$start,$end);
			$data['datas']=$datas;
			$data['msg']=$msg;
			
			$this->load->view("user/searchTrans",$data);

		}
		else
		{	$today=date("y-m-d");
			$msg="Contributions from 18-01-01 to ".$today;
			$data['date1']=$date1;
			$data['date2']=$date2;
			$datas=$this->expenseContribution->selectContributions($email);
			$data['datas']=$datas;
			$data['msg']=$msg;
			$this->load->view("user/searchTrans",$data);
		}
		
	}


	function adminExpense(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		date_default_timezone_set("Asia/Kolkata");
		$date=date("m");
		$bamt="";
		$eamt="";
		$damt="";
		$contribution=$this->expenseContribution->selectContribution("2018-04-01","2018-07-30");

		$expense=$this->expenseContribution->selectExpense("2018-04-01","2018-07-30");
		$f=fopen("data.csv","w");
		foreach($contribution as $contri)
		{
			$damt+=$contri['amount'];
		}
		foreach($expense as $exp)
		{
			$eamt+=$exp['amount'];
			$bamt=$damt-$eamt;
		}
		$data['bamt']=$bamt;
		$data['eamt']=$eamt;
		$data['damt']=$damt;
		$data['contribution']=$contribution;
		$data['expense']=$expense;
		$this->load->view('admin/expense',$data);
		
	}
	function addItemPage(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		//$aid=$_SESSION['aid'];
		$users=$this->user->getUsers('2');
		$data['users']=$users;
		$value=array("email"=>"","amount"=>"","date"=>"");
		$error=array("email"=>"","amount"=>"","date"=>"");
		$msg="";
		$data['value']=$value;
		$data['error']=$error;
		$data['msg']=$msg;
		$this->load->view("user/addItem",$data);
	}
	function addItem(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		//$aid=$_SESSION['aid'];
		$users=$this->user->getUsers('2');


		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$userId=$_SESSION['userId'];
			$user=$this->user->getUser($userId);
			$email=$user['email'];
			date_default_timezone_set("Asia/Kolkata");
			
			$amount=$this->input->post('amount');
			$date=$this->input->post('date');
			$value=array("amount"=>"","date"=>"");
			$error=array("amount"=>"","date"=>"");
			
			$value['amount']=$amount;
			
			$value['date']=$date;
			
			$msg="";
			$flag1=true; //amount check
			$flag2=true; //date check
			

			
			if(!is_numeric($amount) || $amount=="")
			{
				$error['amount']="Please enter Numeric values";
				$flag1=false;
			}
			$dateToday=date("y-m-d");

			
			if(strtotime($date)>strtotime($dateToday) || $date=="")
			{	
				$error['date']="Please enter correct date";
				$flag2=false;
			}

			$data['value']=$value;
			$data['error']=$error;
			

			if($flag1 && $flag2 )

			{	
				$value['email']="";
				$value['amount']="";
				$value['date']="";
				$data['value']=$value;
				$to="admin@orange.com";
				$from="accounts@orange.com";
				$sub="Confirm Contribution by ".$email;
				$ans=$this->expenseContribution->insertTemp($email,$amount,$date);
				$idTemp=$this->expenseContribution->getLastTemp();
				$mssg="".$user['firstname']." ".$user['lastname']." "."made a contribution of ".$amount." on ".$date.'.<a href='.site_url("confirmContri/").$idTemp[0]['id'].'>Click to confirm</a>'; 

				$ans=$this->mailbox->insertMessage($to,$from,$sub,$mssg);
				$msg="Mail Sent to admin ";
				$data['msg']=$msg;
				$this->load->view('user/addItem',$data);
				return true;

			}
				
			else{	

					$users=$this->user->getUsers('2');
					$data['users']=$users;
					$msg="Mail not sent !";
					$data['msg']=$msg;
					$this->load->view('user/addItem',$data);
					return true;
				}
		}

	}

	function addExpense(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$value=array("detail"=>"","amount"=>"","date"=>"");
		$error=array("detail"=>"","amount"=>"","date"=>"");
		$msg="";
		$data['value']=$value;
		$data['error']=$error;
		$data['msg']=$msg;
		$this->load->view("admin/addExpense",$data);
	}
	function addExpenseDetail(){
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			$detail=$this->input->post('detail');
			$amount=$this->input->post('amount');
			$date=$this->input->post('date');
			date_default_timezone_set("Asia/Kolkata");
			
			$value=array("detail"=>"","amount"=>"","date"=>"");
			$error=array("detail"=>"","amount"=>"","date"=>"");
			$value['detail']=$detail;
			$value['amount']=$amount;
			$value['date']=$date;
			$msg="";
			$flag1=true; //amount check
			$flag2=true; //date check
			$flag3=true; //user check

			if($detail=="")
			{
				$flag3=false;
				$error['detail']="Please enter valid description";
			}
			if(!is_numeric($amount) || $amount=="")
			{
				$error['amount']="Please enter Numeric values";
				$flag1=false;
			}
			$dateToday=date("y-m-d");

			
			if(strtotime($date)>strtotime($dateToday) || $date=="")
			{	
				$error['date']="Please enter correct date";
				$flag2=false;
			}

			$data['value']=$value;
			$data['error']=$error;
			

			if($flag1 && $flag2 && $flag3)

			{	
				$value['detail']="";
				$value['amount']="";
				$value['date']="";
				$data['value']=$value;
				$ans=$this->expenseContribution->insertExpense($detail,$amount,$date);
				$msg="Data  Saved Successfully";
				$data['msg']=$msg;
				$this->load->view('admin/addExpense',$data);
				return true;

			}
				
			else{	

					
					$msg="Data Not Saved Successfully";
					$data['msg']=$msg;
					$this->load->view('admin/addExpense',$data);
					return true;
				}
				
				
			
		}

	}
	
	function viewCont(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
 
		date_default_timezone_set("Asia/Kolkata");
		$date=date("m");
		$bamt="";
		$eamt="";
		$damt="";
		$contribution=$this->expenseContribution->selectContribution("2018-04-01","2018-07-30");

		$expense=$this->expenseContribution->selectExpense("2018-04-01","2018-07-30");
		$f=fopen("data.csv","w");
		foreach($contribution as $contri)
		{
			$damt+=$contri['amount'];
		}
		foreach($expense as $exp)
		{
			$eamt+=$exp['amount'];
			$bamt=$damt-$eamt;
		}
		$data['bamt']=$bamt;
		$data['eamt']=$eamt;
		$data['damt']=$damt;
		$data['contribution']=$contribution;
		$data['contribution']=$contribution;
		$firstname=array();
		$lastname=array();

		foreach($contribution as $contri){
			$userName=$this->user->getUserByEmail($contri['email']);
			$firstname[]=$userName['firstname'];
			$lastname[]=$userName['lastname'];
		}
		$data['firstname']=$firstname;
		$data['lastname']=$lastname;
		$this->load->view('admin/contribution',$data);
	}


	function confirmContri(){

		$idTemp=$this->uri->segment(2);
		$record=$this->expenseContribution->selectTemp($idTemp);
		$res=$this->expenseContribution->deleteTemp($idTemp);
		$ans=$this->expenseContribution->insertContribution($record['fromId'],$record['amount'],$record['date']);
		$loc=site_url('mailboxAdmin');
		redirect($loc);

	}

	function downloadExpense(){

		$arr=$this->expenseContribution->selectExpense("2018-01-01","2018-12-31");
		$fp = fopen('php://memory', 'w+');
		fputcsv($fp,array('S.No','Detail','Amount','Date'));
		foreach ($arr as $row) {
		  fputcsv($fp, $row);
		}

		rewind($fp);
		$csvFile = stream_get_contents($fp);
		fclose($fp);

		header('Content-Type: text/csv');
		header('Content-Length: '.strlen($csvFile));
		header('Content-Disposition: attachment; filename="file.csv"');

		exit($csvFile);

	}
	function downloadUserContri(){

		$fp = fopen('php://memory', 'w+');
		$datas=$this->expenseContribution->selectCertainContribution($_SESSION['userEmail'],$_SESSION['start'],$_SESSION['end']);
			$i=1;

			fputcsv($fp,array('S.No','Email','Amount','Date'));
			foreach ($datas as $row) {
				
			}

			rewind($fp);
			$csvFile = stream_get_contents($fp);
			fclose($fp);
		header('Content-Type: text/csv');
		header('Content-Length: '.strlen($csvFile));
		header('Content-Disposition: attachment; filename="file.csv"');
	}

	function downloadContri(){


		$arr=$this->expenseContribution->selectContribution("2018-01-01","2018-12-31");
		$fp = fopen('php://memory', 'w+');
		fputcsv($fp,array('S.No.','Name','Email','Amount','Date'));
		$i=1;
		foreach ($arr as $row) {
			$user=$this->user->getUserByEmail($row['email']);
			$name=$user['firstname']." ".$user['lastname'];
			$data=array($i,$name,$row['email'],$row['amount'],$row['date']);
		  fputcsv($fp, $data);
		  $i++;
		}

		rewind($fp);
		$csvFile = stream_get_contents($fp);
		fclose($fp);

		header('Content-Type: text/csv');
		header('Content-Length: '.strlen($csvFile));
		header('Content-Disposition: attachment; filename="file.csv"');

		exit($csvFile);

	
	}
}
?>