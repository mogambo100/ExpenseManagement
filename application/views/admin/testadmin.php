<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>">
<!DOCTYPE html>
<html>
<head>
</head>


<body >
  <script type="text/javascript">
    function ajaxSearch(search){
      var item=search;
      var type=document.getElementById("type");
      var itemType=type.value;
      var xhr=new XMLHttpRequest();
      xhr.open("GET","<?php echo site_url('search/'); ?>"+itemType+"/"+item);
      xhr.send();
      xhr.onreadystatechange=function(){
        if(xhr.readyState==4)
        {
          var table=document.getElementById("data");
          table.innerHTML=xhr.responseText;
        }
      }


    }
  </script>

 <!DOCTYPE html>
 <html>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
  <?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
  <?php $this->load->view("common/anav"); ?>
 </div>
 
  
<div id="admin" align="center" style="float: left; margin-left: 15px;"  >
  <h1 id="h1">MANAGE USERS</h1>

  <br>
  <form action="<?php echo site_url('search') ?>" method="post"  >
  <select name="type" class="dropdown" id="type" class="form-control">
    
    <option value="username">Username</option>
    <option value="username">Firstname</option>
    <option value="username">Lastname</option>  
    <option value="mobile">Mobile</option>  
    <option value="email">Email</option>
    
  </select>
  <input type="text" name="item" placeholder="search" value="" style="width: 100px;height: 33px;"   >
  <button value="submit" class="btn btn-success">Search</button>
</form>
 <br>

  <table cellpadding="10px" cellspacing="10px" class="table table-striped" id="data">
    <tr>
      <th>USER ID</th>
      <th>NAME</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Mobile</th>
      <th>E-mail</th>
      <th>Address</th>
      <th>Profile</th>
      
    </tr>
    <?php foreach($users as $user){ ?>
      <tr>
          <td ><?php echo $user['id']?></td>
          <td><?php echo $user['username']?></td>
          <td><?php echo $user['firstname']?></td>
          <td><?php echo $user['lastname']?></td>
          <td><?php echo $user['mobile']?></td>
          <td><?php echo $user['email']?></td>
          <td><?php echo $user['address']?></td>
          <td><img class="img img-rounded" src="<?php echo base_url('assests/image/'); ?><?php echo $user['image']; ?>" style=" margin-top: 20px; margin-left: 20px; height: 100px;width: 80px;"></td>
          <td><!--<a href="<?php echo site_url('deleteUser/'); ?><?php echo $user['id'];?>" >Delete</a>--></td>
    </tr>
    <?php }?>
  </table>
 
</div>
</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>