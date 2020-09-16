<?php 
class Mailbox extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function insertMessage($toId,$fromId,$subject,$mssg)
	{
		
		$query=$this->db->query("insert into messages(toId,fromId,sub,message,status) values('$toId','$fromId','$subject','$mssg','0')");
		if($query>0)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	function updateMessage($id)
	{
		
		$query=$this->db->query("update messages set status='1' where id='$id' ");
		if($query!=NULL)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	function getMessages($email,$type){
		
		if($type=="inbox")
		{
			$query=$this->db->query("select * from messages where toId='$email'");
		}
		else
		{
			$query=$this->db->query("select * from messages where fromId='$email'");
		}
		
		$record=$query->result_array();
		return $record;	
	}
	function getMessage($Id){
		
		$query=$this->db->query("select * from messages where id='$Id'");
		$record=$query->row_array();
		
		return $record;
	}
	function getUnreadMessages($email){
		
		
			$query=$this->db->query("select * from messages where toId='$email' and status='0'");
		
		
		$record=$query->result_array();
		return $record;	
	}

	function getMessageById($id){
		
		$query=$this->db->query("select * from messages where id='$id'");
		$record=$query->row_array();
		
		return $record;	
	}
	function deleteMessage($id)
	{
		
		$query=$this->db->query("delete from messages where id=$id ");
		$record=$query->row_array();
	
		return $record;
	}


	function checkToId($toId){
		$query=$this->db->query("select * from user");
		$record=$query->result_array();
		$flag=false;
		foreach($record as $row)
		{
			if($toId==$row['email'])
			{
				$flag=true;
			}
		}
		return $flag;
	}

	}
?>