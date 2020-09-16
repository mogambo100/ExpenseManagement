<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>"><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
<div id="box2" class="container">
	<div id="title" align="center">Contribution Report</div>
	<div id="but">
		<label id="success"><span class="glyphicon glyphicon-bookmark"></span>   Balance <span id="bamount"><?php echo "	".$bamt; ?></span></label>
		<a href="<?php echo site_url('adminExpense'); ?>" >
		<label id="danger"><span class="glyphicon glyphicon-shopping-cart"></span > Expense <span id="eamount"><?php echo "	".$eamt; ?></span></label></a>
		<a href="<?php echo site_url('viewCont'); ?>">
		<label id="warning"><span class="	glyphicon glyphicon-log-in"></span> Deposit <span id="damount"><?php echo "	".$damt; ?></span></label></a>
		<a href="<?php echo site_url('addExpense'); ?>">
		<label id="warning2"> Add Expense </label></a>
		
		
	</div>
	
	<div id="table3" >
		<table class="table table-striped ">
			<tr>
				<th>S.NO.</th>
				
				<th>Name</th>
				<th>Email</th>
				
				<th>Amount</th>
				<th>Date</th>
				
			</tr>
			<?php $i=1;  foreach ($contribution as $contri) { ?>
				<tr>
					<td><?php echo $i; ?></td>	
					<td><?php echo $firstname[$i-1]; ?> <?php echo $lastname[$i-1]; ?></td>
					
					 <td><?php echo $contri['email']; ?></td>
					 <td><?php echo $contri['amount']; ?></td>
					 <td><?php echo $contri['date']; ?></td>
				</tr>
			<?php $i++; } ?>
		</table>
	</div>
	<script type="text/javascript">
		function downloadContri(){
			window.location.href="<?php echo site_url("downloadContri"); ?>";
		}
	</script>
	<div id="download"><button class="btn btn-success" onclick="downloadContri()">Download</button></div>
</div>
</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>