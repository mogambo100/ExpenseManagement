<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
<style type="text/css">
	
</style>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
<div id="message"  class="form-group">
    <h3 style="color: #c94c4c;padding: 5px;margin-top: 5px; ">Broadcast</h3>
    <form action="<?php echo site_url('sendAll'); ?>" method="post">
    
     <input type="text" class="form-control" name="sub" placeholder="Subject" id="subject" style="width: 500px;"><br>
    <textarea placeholder="Your message goes here" class="form-control" name="message" id="messageContent" style="width: 500px; height: 300px;"></textarea><br>
    <button  id="mssgSend"  class="btn btn-success" name="broadcastMessage" value="submit">Send Messsage</button>
    <label id="recievedMessage"></label>
  	</form>
</div>
</div>


<div id="footer2" >
  <?php $this->load->view("common/footer"); ?>
</div>



