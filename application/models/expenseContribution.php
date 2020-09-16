<?php 
class ExpenseContribution extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();

	}

	function insertContribution($email,$amount,$date){
		
		$query=$this->db->query("insert into contribution(email,amount,date) values('$email','$amount','$date')");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function selectContribution($start,$end){
		
		$query=$this->db->query("select * from contribution where date>='$start' and date<='$end'");
		$record=$query->result_array();
		return $record;	
		}

	function selectCertainContribution($email,$start,$end){
		
		$query=$this->db->query("select * from contribution where email='$email' and date>='$start' and date<='$end'");
		$record=$query->result_array();
		return $record;	
		
		
	}
	function selectContributions($email)
	{
		$query=$this->db->query("select * from contribution where email='$email'");
		$record=$query->result_array();
		return $record;
	}

	//expense table
	function insertExpense($detail,$amount,$date){

		
		$query=$this->db->query("insert into expense(detail,amount,date) values ('$detail','$amount','$date')");
		if($query!=NULL)
		{
			return true;
		}			
		else
		{
			return false;
		}
		
	}
	function selectExpense($start,$end)
	{
		
		$query=$this->db->query("select * from expense where date>='$start' and date <='$end'");
		
		$record=$query->result_array();
		return $record;	
	}

	function insertTemp($fromId,$amount,$date)
	{
		$query=$this->db->query("insert into temp (fromId,amount,date) values('$fromId','$amount','$date')");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function getLastTemp(){
		$query=$this->db->query("select * from temp ORDER BY id DESC LIMIT 1");
		$record=$query->result_array();
		return $record;
	}
	function selectTemp($id){
		$query=$this->db->query("select * from temp where id='$id'");
		$record=$query->row_array();
		return $record;
	}
	function deleteTemp($id){
		$query=$this->db->query("delete from temp where id='$id'");
		if($query!=NULL)
		{
			return true;

		}
		else
		{
			return false;
		}
	}
}
?>