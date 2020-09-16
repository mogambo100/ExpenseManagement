<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<style>
		#profile{
			margin:0 auto;
			height:78%;
			width: 88%;
			float: left;
			background-color: #FFFACD;
			padding-left: 2%;
			align-content: center;
		}
		#profileImage{
			height: 30%;
			width: 15%;
			margin-top: 15px;
			 margin-left: 105px;
		}
		#profileCheck{
			float: left;
		}
		#upload
		{
			width: 40%;
		}
	</style>
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
<?php if($user['changeProfile']==0){ ?>
	<div id="profileCheck">
		<img src="<?php echo base_url('assests/image/pd.JPG') ?>">
	</div>
<?php }else { ?>
<body>
<div id="profile"  class="container">
	<form action="<?php echo site_url('profile'); ?>" method="post" enctype="multipart/form-data"  class="form-group">
		<img id="profileImage" src="<?php echo base_url('assests/image/') ;?><?php echo $user['image'];?>" ><br><br>

		<label>New Profile</label><br><br><input class="form-control" type="file" name="imageUpload" id="upload"><br>
		<br><br>
		<button value="submit" class="btn btn-success" id="upload">Change Image</button>
		
	</form>


</div>
</body>
<?php } ?>
 <div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</html>