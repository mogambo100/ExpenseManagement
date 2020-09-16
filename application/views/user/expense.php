<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>"><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	
</style>
<script type="text/javascript">
		function search(){
			window.location.href="<?php  echo site_url('contri')?>";
		}
	</script>
<body>
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="nav">
 	<?php $this->load->view("common/nav"); ?>
 </div>

<div id="box" class="container">
	<div id="title" align="center">Expense MANAGEMENT</div>
	<div id="but">
		<label class="" id="success"><span class="glyphicon glyphicon-bookmark"></span>   Balance <span id="bamount"><?php echo "	".$bamt; ?></span></label>
		<label class="" id="danger"><span class="glyphicon glyphicon-shopping-cart"></span > Expense <span id="eamount"><?php echo "	".$eamt; ?></span></label>
		<label id="warning"><span class="	glyphicon glyphicon-log-in"></span> Deposit <span id="damount"><?php echo "	".$damt; ?></span></label>
		<button class="btn btn-primary" id="tablets"  onclick="search()"><span class="	glyphicon glyphicon-search"></span> Search Contributions</button>
		<a href="<?php echo site_url('addItemPage'); ?>">
		<label id="success2" > Add Contribution</label></a>
		
		
	</div>
	
	<div id="table" >
		<table class="table table-striped ">
			<tr>
				<th>S.No.</th>
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
		function downloadExpense(){
			window.location.href="<?php echo site_url('downloadExpense'); ?>";
		}
	</script>
	<div id="download"><button class="btn btn-success" onclick="downloadExpense()">Download</button></div>
</div>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>
</body>
</html>