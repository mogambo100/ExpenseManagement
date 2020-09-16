	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>


 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
 <script type="text/javascript">
 	function inbox(){
	window.location.href="<?php echo site_url('mailboxAdmin'); ?>";
}
 </script>
<style type="text/css">
	
</style>
	<div id="showMessageAdmins" style="">
			
			
			

			
			<div id="content" style="margin-left: 0px; margin-top: 0px; ">
				<button class="btn btn-danger">
					<a style="font-size: 15px;
					" href="<?php echo site_url('sendAdmin'); ?>" >Sent
					</a>
				</button>
				<button class="btn btn-success">
					<a style="font-size: 15px;
					" href="<?php echo site_url('mailboxAdmin'); ?>" >Inbox
					   <span class="badge" id="unread"><?php //echo sizeof($unread); ?></span>
					</a>
				</button>
				<button class="btn btn-warning">
					<a style="font-size: 15px;
					" href="<?php echo site_url('broadcast'); ?>" >Broadcast
					   <span class="badge" id="unread"><?php //echo sizeof($unread); ?></span>
					</a>
				</button>

				
				
				<?php if($type!="inbox"){ ?>
					<div id="send"   >
					<table class="table table-hover" style="">
					<tr>
						<th>To</th>
						<th>Subject</th>
						<th>status</th>
						<th>Commands</th>
					</tr>
				
				<?php foreach($smessages as $message) { ?>
				<tr>
						
						<td><?php echo $message['toId'] ?></td>
						<td><a id="message2" href="<?php $id=$message['id']; echo site_url('showMessageAdmin/').$message['id'];?>"><?php echo $message['sub'] ?></a></td>
						<td><?php if($message['status']=='1') {echo 'read';} else {echo 'unread';}  ?></td>
						<td></td>
					
				</tr>
				<?php } ?>
			</table>
			</div>
			<?php } else { ?>
				<script type="text/javascript">
						function reply(){
					var to=document.getElementById("mssgTo");
					var sub=document.getElementById("subject");
					var todetail=document.getElementById("todetail");
					var subjectDetail=document.getElementById("subjectDetail");
					to.innerHTML=todetail.value;
					sub.innerHTML=subjectDetail.value;

				}
				</script>
				
				<div id="inbox"  >
					<table class="table table-hover" style="padding-left: 0px;max-width: 700px">
					<tr>
					<th>From</th>
					<th>Subject</th>
					<th>Status</th>
					<th>Commands</th>
				</tr>
				
				<?php foreach($messages as $message) { ?>
				<tr>
						
						<td id="todetail"><?php echo $message['fromId'] ?></td>
						<td id="subjectDetail"><a id="message2" href="<?php $id=$message['id']; echo site_url('showMessageAdmin/').$message['id'];?>" ><?php echo $message['sub'] ?></a></td>
						<td><?php if($message['status']=='1') {echo 'read';} else {echo 'unread';}  ?></td>
						<td><a href="<?php echo site_url('replyAdmin/').$message['id']; ?>">Reply</a></td>
					
				</tr>
				<?php } ?>
				</table>
				</div>
			<?php } ?>
				</div>
		</div>
		

	<div id="sendMessage" style="" >
		<style>
			

		</style>
		
		

				<div id="message2" style="" class="form-group">
		            <h3 style="color: #c94c4c;padding: 5px;margin-top: 5px; ">Compose</h3>
		            <form action="<?php echo site_url('sendMessageByAdmin');?>" method="post">
		             <input type="email" required class="form-control" name="toId" placeholder="To Whom" id="mssgTo" value="<?php echo $mail['to']; ?>"><br>
		             <input value="<?php echo $mail['sub']; ?>" type="text"  class="form-control" name="sub" placeholder="Subject" id="subject"><br>
		            <textarea placeholder="Your message goes here" class="form-control" name="message" id="messageContent"></textarea><br>
		            <button  id="mssgSend" value="submit" class="btn btn-success">Send Messsage</button>
		            <label id="recievedMessage"><?php echo $errorMessage; ?></label>
		          	</form>
		        </div>
			</div>

</div>

<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
