	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
	<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#contain
 	{
 		width: 100%;
 		
 	}
		#create{
			
			margin-left: 0.5%;
			width:84%;
			height: 97%;
			float: left;	
			color: black;
			overflow-y: scroll;
			background-color: #fefbd8;
		}
		#h1{
			color:#50394c ;
			font-family: consolas;
			font-weight: 80%;
			float: center;
		}
		#label{
			color:#50394c ;
			margin:0 auto;
			margin-left: 15px;
			font-family: consolas;
			font-weight:bolder;
			
		}
		#input43{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#input44{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#input45{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#input46{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#input47{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#input48{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#input49{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#input42{
			margin:0 auto;	
			width: 500px;
			height: 36px;
		}
		#text{
			color: red;
		
			font-family: consolas;
			font-weight: lighter;
			
		}
		label{
			font-size: 15px;

		}
	</style>
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
	<div id="create" align="center">
		<form action="<?php echo site_url('aud'); ?>" method="post" enctype="multipart/form-data"  >
			<h1 >Add User Details</h1>
			<input class="form-control" type="text" name="firstname" id="input43" placeholder="Firstname" value="<?php echo $value['firstname']; ?>"><h5 id="text" id="text"><?php echo $error['firstname']; ?></h5><br>
			<input class="form-control" placeholder="Lastname" type="text" name="lastname" id="input44" value="<?php echo $value['lastname']; ?>"><h5 id="text" id="text"><?php echo $error['lastname']; ?></h5><br>
			<input class="form-control" type="text" placeholder="Username" name="username" id="input45" value="<?php echo $value['username']; ?>"><h5 id="text" id="text"><?php echo $error['username']; ?></h5><br>
			<input type="password" name="password" id="input46" placeholder="password"  class="form-control" value="<?php echo $value['password']; ?>"><h5 id="text" ><?php echo $error['password']; ?></h5><br>
			<input type="email" name="email" id="input47" placeholder="E-mail @" class="form-control" value="<?php echo $value['email']; ?>"><h5 id="text" ><?php echo $error['email']; ?></h5><br>
			<input type="text" name="mobile" placeholder="Mobile no." class="form-control" id="input42" value="<?php echo $value['mobile']; ?>"><h5 id="text" ><?php echo $error['mobile']; ?></h5><br>
			
			<input type="textarea" placeholder="Address" class="form-control"name="address" id="input48" value="<?php echo $value['address']; ?>"><br>

			<input class="form-control" placeholder="Profile Pic" type="file" name="imageUpload"  id="input49" value="<?php echo $value['image']; ?>"><br>
			
			<button style="width: 50%;font-size: 20px;" value="Submit" class="btn btn-success">Create</button>
		</form>
	</div>
	</div>

</body>
 <div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>