<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<style type="text/css">

</style>
<body>
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" href="<?php echo base_url('assets/js/allJs.js'); ?>"></script>

<script type="text/javascript">
	function ajaxReport(uid){
		xhr=new XMLHttpRequest();
		xhr.open("GET","<?php echo site_url('fetchReport/'); ?>"+uid,true);
		xhr.send();
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				var data=xhr.responseText;
				var temp=document.getElementById("report");
				temp.innerHTML=data;
				
			}
		};
	}
</script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
	<div  id="box" >

		<label  ">Select User 
		</label>
		<select name="selectUser" onchange="ajaxReport(this.value)" style="font-size: 20px;color: #6b5b95;background-color: #a2b9bc;">
			<option value="0">Select a user !</option>
			<?php foreach ($users as $user) {?>
				<option value="<?php echo $user['id']?>"><?php echo $user['firstname']; ?> &nbsp;<?php echo $user['lastname']; ?> ( <?php echo $user['email']; ?> )</option>
			<?php } ?>
		</select>
	
<br><br><br>
	<div id="report" >
		
	</div>
</div>
</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>