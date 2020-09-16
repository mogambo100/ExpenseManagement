
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

	
	<title></title>
</head>
<script type="text/javascript">
	function register(){
		window.location.href="<?php echo site_url('registerPage'); ?>";
	}
</script>
<body>
	<style type="text/css">
	</style>

<div id="login2223">
	<h1 id="h1345"   >Expense Management System</h1>
		
	<div id="details324" class="row" >
		
			<div id="loginimage65" class="">
				<img src="<?php echo base_url('assests/image/login.JPG'); ?>" id="image2">
			</div>
			<div id="form16" class="" >
				<form action="<?php echo site_url('login/0'); ?>" method="post">
		<h3 id="h13">User Login&emsp;| <a href="<?php echo site_url('admin');  ?>">Log in as Admin</a></h3><br>
		<input  type="text" name="userId" placeholder="Username" class="form-control" style="width: 300px;"><br>
		<input type="password" name="password" placeholder="Password" class="form-control" style="width: 300px;"><br><br><br><br>
		<button type="submit" class="btn btn-success" >Login</button>

		<a href="<?php echo site_url('registerPage'); ?>"> Register</a>/<a href="<?php echo site_url('loadForgotPassword'); ?>"> Forgot Password</a><br><br><br><br>
		<h2><?php echo $error;  ?></h2>
		<?php if($flagRegister==1) { ?>
		<h4 style="color: green;font-weight: bold;font-style: italic;font-family: arial"> REQUEST HAS BEEN SENT TO ADMIN FOR AUTHENTICATION, SLA FOR THIS REQUEST IS 6HRS. PLEASE TRY SIGNING IN AFTER 6 HRS</h4>
	<?php } ?>
	</form>
			</div>


	</div>
</div>




</body>
</html> 