<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#attendance12{
		height: 78%;
		width: 87%;
		float: left;
		

	}
	#h312{
		color:green;
		font-style: italic;
		font-weight: bolder;
		font-size: 28px;


	}
	#table324{
		margin-top: 20px;
		float: center;
		height: 86%;
		overflow-y: scroll;
	}
</style>
<body>
	 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="nav">
 	<?php $this->load->view("common/nav"); $i=1;?>
 </div>


<div id="attendance12">
	<h3 id="h312" align="center">Attendance Sheet</h3>

	<div id="table324">
		<table class="table table-hover" >
			<tr>
				<th>S.No</th>
				<th>Login </th>
				<th>Logout</th>
				<th>Active Duration</th>
			</tr>
			<?php $i=1; foreach($attendances as $attendance) { ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $attendance['login'] ?></td>
				<td><?php echo $attendance['logout'] ?></td>
				<td><?php echo $attendance['active'] ?></td>
			</tr>
			<?php $i++;} ?>
		</table>
	</div>
	
	</div>
	
	
	


</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</html>