<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<head>

<script type="text/javascript">
	function inbox(){
		window.location.href="<?php echo site_url('inbox'); ?>";
	}
</script>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
  <?php $this->load->view("common/header");?>
 </div>
 <div id="nav">
  <?php $this->load->view("common/nav"); ?>
 </div>

<div id="message6"  class="form-group">
            <h3 style="color: #c94c4c;padding: 5px;margin-top: 5px; ">Message</h3>
            From: <label class="form-control" name="fromId"  id="mssgFrom"><?php echo $message['fromId']; ?></label><br>
            Subject:
            <label class="form-control" name="subject" id="messageSubject"><?php echo $message['sub']; ?></label><br>
            Message
            <label class="form-control" name="message" id="messageContent" style="height: 100%;width: 100%;" ><?php echo $message['message']; ?></label><br>
            <button  id="inbox" onclick="inbox()" class="btn btn-primary">Go Back</button>
            <label id="recievedMessage"></label>
        
          
        </div>
        <div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
