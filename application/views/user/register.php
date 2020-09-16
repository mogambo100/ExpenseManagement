	
	<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
	</style>
	<title></title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 
	<div id="create" align="center">
		<form action="<?php echo site_url('register'); ?>" method="post" enctype="multipart/form-data"  >
			<h1 >Register User</h1>
			<input class="form-control" type="text" name="firstname" id="input43" placeholder="Firstname" value="<?php echo $value['firstname']; ?>"><h5 id="text" id="text"><?php echo $error['firstname']; ?></h5><br>
			<input class="form-control" placeholder="Lastname" type="text" name="lastname" id="input44" value="<?php echo $value['lastname']; ?>"><h5 id="text" id="text"><?php echo $error['lastname']; ?></h5><br>
			<input class="form-control" type="text" placeholder="Username" name="username" id="input45" value="<?php echo $value['username']; ?>"><h5 id="text" id="text"><?php echo $error['username']; ?></h5><br>
			<input type="password" name="password" id="input46" placeholder="password"  class="form-control" value="<?php echo $value['password']; ?>"><h5 id="text" ><?php echo $error['password']; ?></h5><br>
			<input type="email" name="email" id="input47" placeholder="E-mail @" class="form-control" value="<?php echo $value['email']; ?>"><h5 id="text" ><?php echo $error['email']; ?></h5><br>
			<input type="text" name="mobile" placeholder="Mobile no." class="form-control" id="input42" value="<?php echo $value['mobile']; ?>"><h5 id="text" ><?php echo $error['mobile']; ?></h5><br>
			
			<input type="textarea" placeholder="Address" class="form-control"name="address" id="input48" value="<?php echo $value['address']; ?>"><br>

			<input class="form-control" placeholder="Profile Pic" type="file" name="imageUpload"  id="input49" value="<?php echo $value['image']; ?>"><br>
			
			<button style="" id="registerBtn" value="Submit" class="btn btn-success">Create</button>
		</form>
	</div>
	</div>

</body>


</html>