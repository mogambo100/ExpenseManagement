<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allCss.css'); ?>"><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	  
</style>

<body>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" href="<?php echo base_url('assets/js/excellentexport.min.js'); ?>"></script>
<script type="text/javascript" href="<?php echo base_url('assets/js/jquery.tabletoCSV.js'); ?>"></script>

 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="contain">
 <div id="nav">
 	<?php $this->load->view("common/anav"); ?>
 </div>
 
<div id="box2" >
	<div id="title" align="center">Expense Report</div>
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
				<th>Detail</th>
				
				<th>Amount</th>
				<th>Date</th>
				
			</tr>
			<?php $i=1; foreach ($expense as $exp) { ?>
				<tr>
					<td><?php echo $i; ?></td>	
					<td><?php echo $exp['detail']; ?></td>
					<td><?php echo $exp['amount']; ?></td>
					<td><?php echo $exp['date']; ?></td>
				</tr>
			<?php $i++; } ?>
		</table>
	</div>
	<script type="text/javascript">
		function download(){
			window.location.href="<?php echo site_url('downloadExpense'); ?>";
			
		}
	</script>

	
		<button  class="btn btn-success" onclick="download()">Download</button>
</div>
</div>
</body>
 <div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>