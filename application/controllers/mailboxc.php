<?php 
class Mailboxc extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("mailbox");
		$this->load->library("session");
		$this->load->model("user");
	}
	function inbox(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		$user=$this->user->getUser($_SESSION['userId']);

		$data['user']=$user;
		$id=$user['email'];
		$messages=$this->mailbox->getMessages($id,"inbox");
		$unread=$this->mailbox->getUnreadMessages($id);
		$mail['to']="";
		$mail['sub']="";
		$data['messages']=$messages;
		$data['unread']=$unread;
		$data['mail']=$mail;
		$data['type']="inbox";
		$errorMessage="";
		$data['errorMessage']=$errorMessage;

		$this->load->view("user/mailbox",$data);

	}
	function send(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}

		
		$user=$this->user->getUser($_SESSION['userId']);
		$data['user']=$user;
		$id=$user['email'];
		$mail['to']="";
		$mail['sub']="";
		
		$unread=$this->mailbox->getUnreadMessages($id);
		$smessages=$this->mailbox->getMessages($id,"send");
		$data['mail']=$mail;
		$data['unread']=$unread;
		$data['smessages']=$smessages;
		$data['type']="send";	

		$errorMessage="";
		$data['errorMessage']=$errorMessage;
		$this->load->view("user/mailbox",$data);
	}
	function adminInbox(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$user=$this->user->getUser($_SESSION['aid']);
		$mail['to']="";
		$mail['sub']="";
		

		$data['user']=$user;
		$id=$user['email'];
		$messages=$this->mailbox->getMessages($id,"inbox");
		$unread=$this->mailbox->getUnreadMessages($id);
		$smessages=$this->mailbox->getMessages($id,"send");
		$data['messages']=$messages;
		$data['unread']=$unread;
		$data['smessages']=$smessages;
		$data['type']="inbox";
		$data['mail']=$mail;
		$data['errorMessage']="";

		$this->load->view("admin/mailbox",$data);
	}
	function sendAdmin(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}

		
		$user=$this->user->getUser($_SESSION['aid']);
		$data['user']=$user;
		$id=$user['email'];

		$messages=$this->mailbox->getMessages($id,"inbox");
		$unread=$this->mailbox->getUnreadMessages($id);
		$smessages=$this->mailbox->getMessages($id,"send");
		$data['messages']=$messages;
		$data['unread']=$unread;
		$data['smessages']=$smessages;
		$data['type']="send";	
		$mail['to']="";
		$mail['sub']="";
		$data['mail']=$mail;
		$errorMessage="";
		$data['errorMessage']="";
		$this->load->view("admin/mailbox",$data);
	}

	function broadcast(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		$this->load->view("admin/broadcast");
	}
	function sendAll(){

		if($_SERVER['REQUEST_METHOD']=="POST")
		{	
			$subject=$this->input->post('sub');
			$user=$this->user->getUser($_SESSION['aid']);
			$from=$user['email'];
			$mssg=$this->input->post('message');
			$users=$this->user->getActiveUser();
			foreach($users as $user)

			{
				$toId=$user['email'];
				if(!$this->mailbox->insertMessage($toId,$from,$subject,$mssg))
					{
						$loc=site_url('broadcast');
						redirect($loc);
					}
					
			}
			$loc="mailboxAdmin";
			redirect($loc);
		}
	}

	function sendMessage(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
			$subject=$this->input->post('sub');
			$user=$this->user->getUser($_SESSION['aid']);
			$from=$user['email'];
			$mssg=$this->input->post('message');
			$toId=$this->input->post('toId');
			$mail['to']=$toId;
			$mail['sub']=$subject;
			if($this->mailbox->checkToId($toId)){
				if($this->mailbox->insertMessage($toId,$from,$subject,$mssg))
				{	$mail['to']="";
					$mail['sub']="";
					$user=$this->user->getUser($_SESSION['aid']);
					$data['user']=$user;
					$id=$user['email'];

					$messages=$this->mailbox->getMessages($id,"inbox");
					$unread=$this->mailbox->getUnreadMessages($id);
					$smessages=$this->mailbox->getMessages($id,"send");
					$data['messages']=$messages;
					$data['unread']=$unread;
					$data['smessages']=$smessages;
					$data['type']="send";
					$errorMessage="Mail sent successfullly !";
					$data['errorMessage']=$errorMessage;
					$data['mail']=$mail;
					$this->load->view('admin/mailbox',$data);
				}
			}
			else{
				$user=$this->user->getUser($_SESSION['aid']);
		$data['user']=$user;
		$id=$user['email'];

		$messages=$this->mailbox->getMessages($id,"inbox");
		$unread=$this->mailbox->getUnreadMessages($id);
		$smessages=$this->mailbox->getMessages($id,"send");
		$data['messages']=$messages;
		$data['unread']=$unread;
		$data['smessages']=$smessages;
		$data['type']="send";	
		$data['mail']=$mail;
				$errorMessage="Email not sent.";
				$data['errorMessage']=$errorMessage;
				$this->load->view("admin/mailbox",$data);
			}

	}
	function sendMessageUser(){

		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
			$subject=$this->input->post('sub');
			$user=$this->user->getUser($_SESSION['userId']);
			$from=$user['email'];
			$mssg=$this->input->post('message');
			$toId=$this->input->post('toId');
			$mail['to']=$toId;
			$mail['sub']=$subject;
			if($this->mailbox->checkToId($toId))
			{
				if($this->mailbox->insertMessage($toId,$from,$subject,$mssg))
				{	
					$mail['to']="";
						$mail['sub']="";
						$user=$this->user->getUser($_SESSION['userId']);
						$data['user']=$user;
						$id=$user['email'];

						$messages=$this->mailbox->getMessages($id,"inbox");
						$unread=$this->mailbox->getUnreadMessages($id);
						$smessages=$this->mailbox->getMessages($id,"send");
						$data['messages']=$messages;
						$data['unread']=$unread;
						$data['smessages']=$smessages;
						$data['type']="send";
						$errorMessage="Mail sent successfullly !";
						$data['errorMessage']=$errorMessage;
						$data['mail']=$mail;
						$this->load->view('user/mailbox',$data);
				}
			}	
			else{
				$user=$this->user->getUser($_SESSION['userId']);
		$data['user']=$user;
		$id=$user['email'];

		$messages=$this->mailbox->getMessages($id,"inbox");
		$unread=$this->mailbox->getUnreadMessages($id);
		$smessages=$this->mailbox->getMessages($id,"send");
		$data['messages']=$messages;
		$data['unread']=$unread;
		$data['smessages']=$smessages;
		$data['type']="send";	
		$data['mail']=$mail;
				$errorMessage="Email not sent.";
				$data['errorMessage']=$errorMessage;
				$this->load->view("user/mailbox",$data);
			}
	}
	function reply(){
		
		if(!isset($_SESSION['userId']))
		{
		$loc=site_url('U');
		 redirect($loc);
		}
		
		$user=$this->user->getUser($_SESSION['userId']);
		$id=$this->uri->segment(2);
		
		$message=$this->mailbox->getMessage($id);
		$data['user']=$user;
		$id=$user['email'];
		$messages=$this->mailbox->getMessages($id,"inbox");
		$unread=$this->mailbox->getUnreadMessages($id);
		$mail['to']=$message['fromId'];
		$mail['sub']="Re: ".$message['sub'];
		$data['messages']=$messages;
		$data['unread']=$unread;
		$data['mail']=$mail;
		$data['type']="inbox";
		
		$errorMessage="";
		$data['errorMessage']=$errorMessage;
				$this->load->view("user/mailbox",$data);

	}
		function replyAdmin(){

		if(!isset($_SESSION['aid']))
		{
		$loc=site_url('admin');
		 redirect($loc);
		}
		
		$user=$this->user->getUser($_SESSION['aid']);
		$id=$this->uri->segment(2);
		
		$message=$this->mailbox->getMessage($id);
//		$user['email']=$message['fromId'];
		$data['user']=$user;
		$id=$user['email'];
		$errorMessage="";
		$data['errorMessage']=$errorMessage;
		$messages=$this->mailbox->getMessages($id,"inbox");
		$unread=$this->mailbox->getUnreadMessages($id);
		$mail['to']=$message['fromId'];
		$mail['sub']="Re: ".$message['sub'];
		$data['messages']=$messages;
		$data['unread']=$unread;
		$data['mail']=$mail;
		$data['type']="inbox";
		
				$this->load->view("admin/mailbox",$data);

	}


}
?>
        

    
