<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<style type="text/css">
	
	</style>
	
	<title></title>
</head>
<script type="text/javascript">
	function register(){
		window.location.href="<?php echo site_url('registerPage'); ?>";
	}
</script>
<body>
<style type="text/css">
#login2{
			background-color: #a2b7c2;
			height: 50%;
			width: 100%;
			margin-top: 2%;
			padding-top: 2%;
			}
	#details
	{
		height: 90%;
		width:50%;
		margin: 0 auto;
		
		background-color: white;
	}
	#form16{
		margin: 0 auto;
	}
	#input131,#input132
	{
		width: 50%;
		margin-top: 2.5%;
	}
	#h112{
		font-style: italic;
		font-family: arial;
		margin: 0 auto;
		color: purple;
	}
	#forgotBtn{
		width: 50%;
		margin-top: 2.5%;
	}
</style>
	<div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
<div id="login2">

	<div id="details">
		
			<div id="form16" class="form-group" align="center" >
				<form action="<?php echo site_url('forgotPasswordUser') ?>" method="post">
		<h1 id="h112" >Reset Password</h1>
		<input class="form-control" id="input131" type="text" placeholder="Email" name="email"><br>
		<input class="form-control" id="input132" type="password" placeholder="Password" name="password"><br>
		
		
			<button class="btn btn-success " id="forgotBtn" value="submit" name="resetPassword">Reset Password</button>
				</form>
			</div>


	</div>
</div>




</body>
</html> 