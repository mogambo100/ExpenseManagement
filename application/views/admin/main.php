<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>"><!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 					
<html>
<head>
	<style type="text/css">

    			</style>
	
	
	<title></title>
</head>
<body>
<div id="login2">
	<h1 id="h1345" style="" >Expense Management System</h1>
	<div id="details3" class="row" >
		
			<div id="loginimage" class="">
				<img src="<?php echo base_url('assests/image/login.JPG'); ?>" id="image">
			</div>
			<div id="form5" class="" >
				<form action="<?php echo site_url('adminLogin'); ?>" method="post" class="">
		
		<h3 id="h13">Admin Login&emsp;|<a href="<?php echo site_url('U');  ?>">Log in as User</a></h3><br><br>
		<input type="text" name="adminId" style="width: 400px;" placeholder="Username" class="form-control" ><br>
		<input type="password" name="password" class="form-control" style="width: 400px;" placeholder="password" ><br><br><br><br>
		<button type="submit" class="btn btn-success " >Login</button><br><br><br><br>
		<h2><?php echo $error;  ?></h2>
	</form>
			</div>


	</div>
</div>
</body>
</html>
