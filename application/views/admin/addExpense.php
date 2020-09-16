<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
 <style type="text/css">
 	
 </style>
	<div id="">
		<div id="add" >
			
			<form class="form-group" id="form" method="post" action="<?php echo site_url('addExpenseDetail'); ?>">
				<div id="title" align="center"> Add Details</div>
				
				<input name="detail" class="form-control" placeholder="Detail" id="inputItems" value="<?php echo $value['detail']; ?>"><br>
				<label id="label31" ><?php echo $error['detail'] ?></label><br>
				<input type='text' placeholder="Amount" name='amount' id='inputItems' class='form-control' value="<?php echo $value['amount']; ?>">
				<br><label id="label31"><?php echo $error['amount'] ?></label><br>
				<input type='date' placeholder="Date" name='date' id='inputItems' class='form-control' value="<?php echo $value['date']; ?>">
				<br><label id="label31"><?php echo $error['date'] ?></label><br>
				<button id="btnsubmit" style="" class='btn btn-success'>Submit</button>
				<label style="color: green;"><?php echo $msg ?></label><br>
				
			</form>
		</div>
	</div>
	</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>