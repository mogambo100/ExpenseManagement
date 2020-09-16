<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

	</style>
	<title></title>
	
	<script type="text/javascript">
		
		function ajaxPassword(password){
			
			var password=document.getElementById("password").value;
			xhr=new XMLHttpRequest();
			xhr.open("GET","<?php echo site_url('checkPassword/')?>"+password,true);
			xhr.send();
			var data="";
			var response="";
			var inc=0;
			var progressBar=document.getElementById("progress");
			
				var color=document.getElementById("color");
			xhr.onreadystatechange=function(){
				if(xhr.readyState==4 && xhr.status==200){
					response=xhr.responseText;
					data=response;
					
					
					
				}
				

				if(data==="Password is Matching")
				{	
					
					var display=document.getElementById("newPassword");
					progress.className="progress-bar progress-bar-warning";
					progress.style.width=100+"%";
					
					document.getElementById("image").style.visibility="hidden";
					
					
					
					display.innerHTML=data;
					
				}
				else if(data==="Password Incorrect")
				{	
					var display=document.getElementById("newPassword");
					document.getElementById("image").style.visibility="hidden";
					progress.style.width=100+"%";
					progress.className="progress-bar progress-bar-danger";
					

					
					display.innerHTML=data;
					
				}
				else
				{	
					progress.style.width=100+"%";
					progress.className="progress-bar progress-bar-success";
					var display=document.getElementById("newPassword");
					document.getElementById("image").style.visibility="visible";
					
							
						display.innerHTML=data;


				}
				

				
			}
			

		}

		function showPassword(){
			var data=document.getElementById("newPass");
			if(data.type === "password")
			{
				data.type="text";
			}
			else
				data.type="password";
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
 <div id="login">
<?php if($user['changePassword']==0){ ?>
	<div>
		<img src="<?php echo base_url('assests/image/pd.JPG') ?>">
	</div>
<?php }else { ?>
<body>
<div align="center" class="container">
	<form action="<?php echo site_url('change') ?>" method="post" class="form-group">
		<h1 id="h1">Change Password</h1>
		<br><h2><?php echo $_SESSION['error']; ?></h2>
		<br><h2 id="countdownTimer" style="float: right;margin-right: 20px;"></h2>
		<label id="admin">Please Confirm Your Old Password</label><br><br><br>
		
		<label id="admin">Password</label>&nbsp;
		<input class="form-control"  type="password" id="password" name="password" onkeyup="ajaxPassword(this.value)">
		<img src="<?php echo base_url('assests/image/green.JPG') ?>" id="image" style="visibility: hidden;">
		<div class="progress" id="progressBar">
		<div id="progress" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $inc; ?>" 
		aria-valuemin="0" aria-valuemax="100" style="width:0%" ></div>
		</div>
		<div id="newPassword">
			
		</div>
	</form>

</div>
</body>
<?php } ?>
</div>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</html> 