<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="nav">
 	<?php $this->load->view("common/nav"); ?>
 </div>
<body>
	<div id="">
		<div id="add" >
			<div id="title" align="center">Add Details</div>
			<form class="form-group" id="form" method="post" action="<?php echo site_url('addItem'); ?>">
				<!--<label id="label">User-Id Name-Email</label>
				<select name="email"  class="form-control" id="inputItems" >
						<option value="-1">None</option>
					<?php /* foreach($users as $user) { ?>
						<option  value="<?php echo $user['email'];?>" ><?php echo $user['id'] ?>-<?php echo $user['firstname'] ?> <?php echo $user['lastname'] ?>---<?php echo $user['email'] ?></option>
					<?php } */?>
					

					<br>
				</select>-->
				<label style="color: red;"><?php echo $error['email']; ?></label><br>
					<label id='label'>Amount</label><input type='text' placeholder="amount" name='amount' id='inputItems' class='form-control' value="<?php echo $value['amount']; ?>"><label style="color: red;"><?php echo $error['amount']; ?></label><br>
					<label id='label'>Date</label><input type='date' name='date' id='inputItems' class='form-control' value="<?php echo $value['date']; ?>"><label style="color: red;"><?php echo $error['date']; ?></label><br>
					<br><br>
					<button id='inputItems' class='btn btn-success'>Submit</button>

					<label style="color: green;"><?php echo $msg; ?></label>
				
				
			</form>
		</div>
	</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</html>