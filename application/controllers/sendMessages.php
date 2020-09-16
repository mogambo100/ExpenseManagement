<?php 
class SendMessage extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->load->model("mailbox");
		$this->load->library("session");
	}
	function index()
	{
		$toId=$this->input->post('toId');
		$subject=$this->input->post('subject');
		$from=$this->input->post('from');
		$mssg=$this->input->post('mssg');
		$type=$this->input->post('type');
		if($type==1)
		{
			$users=$this->user->getActiveUser();
			echo "<pre>";
			print_r($user);
			echo "</pre>";
			foreach($users as $user)

			{
				$toId=$user['username'];
				if($this->mailbox->insertMessage($toId,$from,$subject,$mssg))
					{
						echo "Send Succesfully";
					}
					else
					{
						echo "Message not send"	;
					}
					
			}
		}	

		elseif($this->inbox->insertMessage($toId,$from,$subject,$mssg))
		{
			echo "Send Succesfully";
		}
		else
			echo "message not sent"; 

	}
}




?>