<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	
		#inputItems{
		width: 34%;
		margin-left: 32.7%;
		margin-top: 2%;
	}	
	
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/nav"); ?>
 </div>
<body>
	<div id="">
		<div id="add" >
			
			<form class="form-group" id="form" method="post" action="<?php echo site_url('addItem'); ?>">
					
				<style type="text/css">
					</style>
				<div id="title" align="center">Add Contribution Details</div><br><br>
				
					<input type='text' placeholder="Amount" name='amount' id='inputItems' class='form-control' value="<?php echo $value['amount']; ?>"><label id="label31" ><?php echo $error['amount']; ?></label><br>			
					<input type='date' name='date' id='inputItems' class='form-control' value="<?php echo $value['date']; ?>"><label id="label31" ><?php echo $error['date']; ?></label><br>
					
					<button  id="btnsubmit" class='btn btn-success'>Submit</button>

					<label style="color: green;"><?php echo $msg; ?></label>
				
				
			</form>
		</div>
	</div>
	</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</html>