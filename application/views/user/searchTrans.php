<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/allUser.css'); ?>">
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
#label32{
			color: red;
			margin-left: 0.7%;
			
		}

</style>
<body>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <div id="header">
 	<?php $this->load->view("common/header");?>
 </div>
 <div id="nav">
 	<?php $this->load->view("common/nav"); ?>
 </div>

<div id="box12">
	<div id="title13">Contributions Done</div>
	<form action="<?php echo site_url('contri'); ?>" method="post" class="form-group">
		<input type="date" name="start" id="label12" class="form-control" placeholder="Start Date" ><label id="label32"><?php echo $date1; ?></label>
		<input type="date" name="end" id="label22" class="form-control" placeholder="End date"><label id="label32"><?php echo $date2; ?></label><br>
		<button class="btn btn-success" id="but4" value="Submit">Search</button>
		<br><label style="color:green;"><?php echo $msg; ?> </label>

	</form>
<?php if($datas!=NULL){ ?>
	
	<div id="tab" style="overflow-y: scroll;">
		<table class="table table-striped">
			<tr>
				<th>S.No.</th>
				<th>Email</th>
				<th>Amount</th>
				<th>Date</th>
			</tr>
			<?php $i=1; foreach($datas as $data) { ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['amount']; ?></td>
				<td><?php echo $data['date']; ?></td>
			</tr>
		<?php $i++; } ?>
		</table>
		<script type="text/javascript">
			function downloadUserContri(){
				window.location.href="<?php echo site_url('downloadUserContri'); ?>";
			}
		</script>
		<button class="btn btn-success" onclick="downloadUserContri()" name="Download">Download</button>
	</div>
<?php } else { ?>

<h3 style="color: black;">There are no contributions in this period !</h3>
<?php } ?>	
</div>
</body>
<div id="footer2">
  <?php $this->load->view("common/footer"); ?>
</div>

</html>