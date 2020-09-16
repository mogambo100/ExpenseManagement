<style type="text/css">
	#columns{
		height: 97%;
		width: 15%;
		background-color: #2b333e;
		color: white;
		float: left;
	}
	#iframes{
		float: left;
		height: 800px;
		width: 900px;
		

	}
	#li{
		width: 100%;

	}
	h3{
		color: white;
		font-size: 20px;
		font-weight: normal;
	}
	ul.nav a:hover{
		background-color:#101010;
	}
	#footer{
		margin-top: 825px;
		
	}

 </style>
 <script type="text/javascript">
	Download();
	setInterval(Download,1000);
	function Download(){
		xhr=new XMLHttpRequest();
		xhr.open("GET","<?php echo site_url('gum'); ?>",true);
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
		<li id="li"><a href="<?php echo site_url('adminExpense'); ?>"  ><h3>Expense</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('addUser'); ?>" ><h3>Add User</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('adminAtte'); ?>"  ><h3>Attendance</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('permission'); ?>"  ><h3>Permissions</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('allusers'); ?>"  ><h3>Manage User</h3></a></li><br>
		<li id="li"><a href="<?php echo site_url('mailboxAdmin'); ?>"  ><h3>MailBox <span class="badge" id="unread" style="font-size: 20px"></span></h3></a></li>
		
		<li id="li"><a href="<?php echo site_url('logoutAdmin'); ?>"  ><h3>Logout Admin</h3></a></li>
		
	</ul>
 </div>
 