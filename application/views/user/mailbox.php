<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
				

			</script>
			<style type="text/css">
		
			</style>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="nav">
 	<?php $this->load->view("common/nav"); ?>
 </div>

<?php if($user['messaging']==0){ ?>
	<div>
		<img src="<?php echo base_url('assests/image/pd.JPG');?>">
	</div>
<?php }else { ?>

	<div id="showMessages" style="">
			<style type="text/css">
				table{
					font-size: 14px;
				}
			</style>
			<script type="text/javascript">
				Download();
				setInterval(Download,1000);
				function Download(){
					xhr=new XMLHttpRequest();
					xhr.open("GET","<?php echo site_url('gum2'); ?>",true);
					xhr.send();
					xhr.onreadystatechange=function(){
						if(xhr.readyState==4 )
						{
							document.getElementById("unread").innerHTML=xhr.responseText;
						}
					}
				}
			</script>
			<style type="text/css">
				#message{
					color: black;
				}
			</style>

			
			<div id="content" >
				<button class="btn btn-danger">
					<a style="font-size: 15px;
					color: white;" href="<?php echo site_url('send'); ?>" >Sent
					</a>
				</button>
				<button class="btn btn-success">
					<a style="font-size: 15px;
					color: white;" href="<?php echo site_url('inbox'); ?>" >Inbox
					   <span class="badge" id="unread"><?php //echo sizeof($unread); ?></span>
					</a>
				</button>

				
				
				<?php if($type!="inbox"){ ?>
					<div id="send"  >
					<table class="table table-hover" style="font-size: 18px;">
					<tr>
					<th>To</th>
					<th>Subject</th>
					<th>status</th>
					<th>Commands</th>
				</tr>
				
				<?php foreach($smessages as $message) { ?>
				<tr>
						<td><?php echo $message['toId'] ?></td>
						<td><a id="message" href="<?php $id=$message['id']; echo site_url('showMessage/').$message['id'];?>"><?php echo $message['sub'] ?></a></td>
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
					<table class="table table-hover table-condensed" style="font-size: 18px;">
					<tr>
					<th>From</th>
					<th>Subject</th>
					<th>Status</th>
					<th>Commands</th>
				</tr>
				
				<?php foreach($messages as $message) { ?>
				<tr>
						
						<td id="todetail"><?php echo $message['fromId'] ?></td>
						<td id="subjectDetail"><a id="message" href="<?php $id=$message['id']; echo site_url('showMessage/').$message['id'];?>"><?php echo $message['sub'] ?></a></td>
						<td><?php if($message['status']=='1') {echo 'read';} else {echo 'unread';}  ?></td>
						<td><a href="<?php echo site_url('reply/').$message['id']; ?>">Reply</a></td>
					
				</tr>
				<?php } ?>
				</table>
				</div>
			<?php } ?>
				</div>

		
	</div>
	<div id="sendMessage"  >
		<style>
			

		</style>
		
		

				<div id="message" style="" class="form-group">
		            <h3 style="color: #c94c4c;padding: 5px;margin-top: 5px; ">Compose</h3>
		             <form action="<?php echo site_url('sendMessageByUser'); ?>" method="post">
		             <input type="email" required class="form-control" name="toId" placeholder="To Whom" id="mssgTo" value="<?php echo $mail['to']; ?>"><br>
		             <input type="text" class="form-control" name="sub" placeholder="Subject" id="subject" value="<?php echo $mail['sub']; ?>"><br>
		            <textarea placeholder="Your message goes here" class="form-control" name="message" id="messageContent"></textarea><br>
		            <button  id="mssgSend" value="submit" class="btn btn-success">Send Messsage</button>
		            <label id="recievedMessage"><?php echo $errorMessage; ?></label>
		          	</form>
		        </div>
			</div>


<?php } ?>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
