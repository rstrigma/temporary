<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Admin | <?php if(isset($admintitle_for_page)){ echo $admintitle_for_page; } else{  echo 'Page'; }; ?></title>
		
		<!--  Loading all type of css here -->
	   <?php echo $this->Html->css('admin/css/bootstrap.min.css'); ?>
	   <?php echo $this->Html->css('admin/css/sb-admin.css'); ?>
	   <?php echo $this->Html->css('admin/css/plugins/morris.css'); ?>
	   <?php echo $this->Html->css('admin/font-awesome/css/font-awesome.min.css'); ?>
	   <?php echo $this->Html->script('admin/js/jquery.js'); ?>
	   <?php echo $this->Html->script('admin/js/jquery.validate.min.js'); ?>
	   
	   
	</head>

	<body>
		<!--  Loading  main body content  here  -->
		<?php echo $this->fetch('content');  ?>
		
		<!-- Loading all type of js here -->
		
		
		<?php echo $this->Html->script('admin/js/bootstrap.min.js'); ?>
		<?php echo $this->Html->script('admin/js/plugins/morris/raphael.min.js'); ?>
		<?php echo $this->Html->script('admin/js/plugins/morris/morris.min.js'); ?>
		<?php echo $this->Html->script('admin/js/plugins/morris/morris-data.js'); ?>
	</body>
</html>
