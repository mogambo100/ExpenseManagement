<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">

<!DOCTYPE html>
<html>
<head>
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
	<title></title>
</head>

<body>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" href="<?php echo base_url('assets/js/allJs.js'); ?>"></script>
<script type="text/javascript">
					
function ajaxChange(id){
		var userid=id;
		xhr=new XMLHttpRequest();
		xhr.open("GET","<?php echo site_url('ajaxPermission/'); ?>"+userid,true);
		xhr.send();
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4)
			{
				var data=xhr.responseText;
				
			}
			document.getElementById("perTable").innerHTML=data;
		}
	}
</script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain" >
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
 <style type="text/css">
 	
 </style>
<div id="permissions">
	<div id="userChange">
		<h3 style="color: white;width: 600px;">Select User:</h3>
		<select id="user" onchange="ajaxChange(this.value)">
			<option value="0">Select A User !</option>
			<?php foreach($users as $user) { ?>
				<option value="<?php echo $user['id']; ?>"> <?php echo $user['firstname']; ?> &nbsp;<?php echo $user['lastname']; ?> (<?php echo $user['email']; ?> )</option>
			<?php } ?>
		</select>
	</div>
	<h4 style="font-size: 28px; font-weight: bolder;" align="center">Permissions</h4>
	
		<form action='<?php echo site_url('submitPerm');?>' method='post'>
		<div id="perTable">
		</div>
			
		</form>
		

	
</div>
</div>
</body>
 <div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</html>