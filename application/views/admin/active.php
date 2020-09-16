<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
	
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<html>
<head>
	
	<title></title>
</head>
<style type="text/css">
	
		
		#permissions{
			height: 97%;
			width: 84%;
			margin-left: 0.5%;
			overflow-y: scroll;
			float: left;
			background-color: #FFFACD;
		}
</style>
<body>
	
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <style type="text/css">
 	
 </style>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
<div id="permissions">
	
	<a href="<?php echo site_url('auth') ?>"><label id="danger">In-Active</label></a>
	<a href="<?php echo site_url('active') ?>""><label id="warning">Active</label></a>
	<a href="<?php echo site_url('allusers') ?>""><label id="success">All Users</label></a>

	<br><br>
  <form action="<?php echo site_url('searchActive') ?>" method="post"  >
  <select name="type" class="dropdown" id="type" class="form-control">
    
    <option value="username">Username</option>
    <option value="firstname">Name</option>
   
    <option value="mobile">Mobile</option>  
    <option value="email">Email</option>
	    
 </select>
	  <input type="text" name="item" placeholder="search" value="" style="width: 100px;height: 33px;"   >
	  <button value="submit" class="btn btn-success">Search</button>
	</form>
 <br>
	
	<h4 style="font-size: 28px; font-weight: bolder;margin-top: 20px;" align="center">Active User</h4>
		<div id="perTable">
		<table align='center' class='table table-striped'>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Active</th>
				<th>Update</th>
			</tr>
			<?php foreach($users as $act) {?>
			<tr>
				<form action="<?php echo site_url('submitAuth'); ?>" method="post">

				<input  type='text' name='id' value="<?php echo $act['id']; ?>" style='visibility: hidden;'>
				
				<td><?php echo  $act['username']; ?></td>
				<td><?php echo $act['firstname']; ?> <?php echo $act['lastname']; ?> </td>
				<td><?php echo $act['mobile']; ?></td>
				<td><?php echo  $act['email']; ?></td>
				
				<?php if($act['active']==1){?>
					<td><input type='radio' name='active' value='1' checked>Active&emsp;<input type='radio' name='active' value='0' >In-Active</td>
				<?php } else { ?>
					<td><input type='radio' name='active' value='1'>Active&emsp;<input type='radio' name='active' value='0' checked >In-Active</td>
				<?php } ?>

				<td><button class='btn btn-success' style='width: 100%;' value='submit' name='updateAuthenticate'>Update</button></td>
					</form>
					</tr>
					
			<?php } ?>
				</table>
						
			
	</div>
	
</div>
</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>