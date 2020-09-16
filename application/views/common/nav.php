
 	 <style type="text/css">
	#columns{
		height: 78%;
		width: 12%;
		background-color: #2b333e;
		color: white;
		float: left;
	}
	#iframes{
		float: left;
		
		

	}
	#li{
		width: 105%;


	}
	h3{
		color: white;
		font-size: 20px;
		font-weight: normal;
	}
	ul.nav a:hover{
		background-color:grey;
		
		
	}
	#footer2{
		margin-top:670px;
	}

 </style>
 <script type="text/javascript">
	Download();
	setInterval(Download,1000);
	function Download(){
		xhr=new XMLHttpRequest();
		xhr.open("GET","<?php echo site_url('gum2') ?>",true);
		xhr.send();
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 )
			{
				document.getElementById("unread").innerHTML=xhr.responseText;
			}
		}
	}
</script>

	
 <div id="columns">
	<ul class="nav navbar-nav">
		<li id="li"><a href="<?php echo site_url('testuser'); ?>"  ><h3>Dashboard</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('attendance'); ?>" ><h3>Attendance</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('expense'); ?>"  ><h3>Expense</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('inbox'); ?>"  ><h3>MailBox <span class="badge" id="unread" style="font-size: 20px"></span></h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('password') ?>"  ><h3>Change Password</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('profile'); ?>"  ><h3>Change Profile</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('logout'); ?>"  ><h3>Logout User</h3></a></li>
		
	</ul>
 </div>
 