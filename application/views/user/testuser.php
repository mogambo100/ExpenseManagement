
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">

 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="nav">
 	<?php $this->load->view("common/nav"); ?>
 </div>	
	
	<style type="text/css">
		
	
			
	
	</style>
	<script type="text/javascript">
	
		function enlarge(){
			var complete=document.getElementById("complete");
			var profile=document.getElementById("image");
			complete.style.visibility="visible";
			profile.style.visibility="hidden";
		}
		function normal(){
			var complete=document.getElementById("complete");
			var profile=document.getElementById("image");
			complete.style.visibility="hidden";
			profile.style.visibility="visible";
		}
	
		function updateUser(){
			window.location.href="updateUser.php";
		}
		function updateUser2(){
			var mobile=document.getElementById("mobile");
			var email=document.getElementById("email");
			var address=document.getElementById("address");
			var confirm=document.getElementById("confirm");
			var update=document.getElementById("update");

			mobile.style.visibility="visible";
			email.style.visibility="visible";
			address.style.visibility="visible";
			confirm.style.visibility="visible";
			update.style.visibility="hidden";
		}
		function confirm(){
			var username=document.getElementById("username").value;
			var mobile=document.getElementById("mobile").value;
			var email=document.getElementById("email").value;
			var address=document.getElementById("address").value;
			var confirm=document.getElementById("confirm").value;
			var update=document.getElementById("update").value;
			

			var xhr=new XMLHttpRequest();
			xhr.open("POST","<?php echo site_url('update'); ?>",true);
			xhr.setRequestHeader("Content-type","Application/x-www-form-urlencoded");
			xhr.send("id="+username+"&mobile="+mobile+"&email="+email+"&address="+address);
			xhr.onreadystatechange=function(){
				if(xhr.readyState=4)
				{
					var obj=xhr.responseText;
					done=JSON.parse(obj);
				}
				if(done=="updated")
				{
					window.location.href="<?php echo site_url('testuser'); ?>";
				}
				else
				{
					document.getElementById("merror").innerHTML=done['mobile'];
					document.getElementById("aerror").innerHTML=done['address'];
					document.getElementById("eerror").innerHTML=done['email'];

				}

			}
			
		}
		</script>
	
<body>	
<div id="user1234" onmouse="normal()"  > 
		
	<h2>
			Welcome &nbsp;<?php echo $user['username'];?><label id="last">
						<h5>Last Logged IN :<?php echo $_SESSION['last_login'];?></h5>
					</label>
					
					<h3 id="h3122"><?php echo $user['firstname'];?>&nbsp;<?php echo $user['lastname'];?><br>E-mail : <?php echo $user['email'];?></h3>
	</h2>
	
	
	<div id="profile"  >
	
		
		<div id="proImage"><img class="img img-rounded" src="<?php echo base_url('assests/image/'); ?><?php echo $user['image']; ?>"></div>
		<div id="complete1234"  >
			<h3 id="h1243" align="center">Details:</h3>
				<table class=" table table-striped">
					<tr>
						<th>Username</th>
						<td><?php echo $user['username']?><input id="username" type="text"  value="<?php echo $user['id']?>" ></td>
					</tr>
					<tr>
						<th>Mobile</th>
						<td><?php echo $user['mobile']?><?php echo $error['mobile']; ?><br><input type="text"  value="<?php echo $user['mobile']?>" id="mobile"  ><label id="merror"></label></td>
					</tr>
					<tr>
						<th>E-mail</th>
						<td><?php echo $user['email']?><?php echo $error['email']; ?><br><input type="email"  value="<?php echo $user['email']?>"  id="email" ><label id="eerror"></label>  </td>
					</tr>
					<tr>
						<th>Address</th>
						<td><?php echo $user['address']?><?php echo $error['address']; ?><br><input type="text"  value="<?php echo $user['address']?>" id="address" ><label id="aerror"></label></td>
					</tr>
					<tr>
						<td ><button id="update" class="btn btn-success"  onclick="updateUser2()">Update</button></td>
						<td><button id="confirm" class="btn btn-success"   onclick="confirm()">Confirm</button></td>
						<td id="error"></td>
					</tr>
				</table>
		</div>	
		
	</div>
</div>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</body>
</html>


