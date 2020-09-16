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
function inbox(){
	window.location.href="<?php echo site_url('mailboxAdmin'); ?>";
}
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