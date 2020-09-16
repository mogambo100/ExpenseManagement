<?php 
session_start();
$userId=$_SESSION['userId'];
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<?php include "../common/bootstrap.php";?>
<script type="text/javascript">
		function sendMessage(){
			var to=document.getElementById("mssgTo").value;
			var subject=document.getElementById("subject").value;
			var mssg=document.getElementById("messageContent").value;
		    xhr=new XMLHttpRequest();
			xhr.open("post","<?php echo site_url('sendMessages'); ?>",true);
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr.send("from=<?php echo $userId;?>&toId="+to+"&subject="+subject+"&mssg="+mssg+"&type=0");
			xhr.onreadystatechange=function(){
				if(xhr.readyState==4 && xhr.status==200)
				{
					document.getElementById("recievedMessage").innerHTML=xhr.responseText;
					document.getElementById("mssgTo").value="";
					document.getElementById("subject").value="";
					document.getElementById("messageContent").value="";
				}
				else
				{
					document.getElementById("mssgTo").value=to;
					document.getElementById("subject").value=subject;
					document.getElementById("messageContent").value=mssg;
				}
									

			}

		}
</script>

<div id="message" style="width: 280px;" class="form-group">
            <h3 style="color: #c94c4c;padding: 5px;margin-top: 5px; ">Compose</h3>
             <input type="text" class="form-control" name="toId" placeholder="To Whom" id="mssgTo"><br>
             <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject"><br>
            <textarea placeholder="Your message goes here" class="form-control" name="message" id="messageContent"></textarea><br>
            <button  id="mssgSend" onclick="sendMessage()" class="btn btn-success">Send Messsage</button>
            <label id="recievedMessage"></label>
          
        </div>