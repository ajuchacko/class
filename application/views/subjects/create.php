<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title>Add Subject</title>
	<style type="text/css">
		h3 {
			margin-top: 30px;
			margin-bottom: 30px;
		}

		.alert {
			margin-top: 20px;
			border-left: 3px solid;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php if(validation_errors()): ?>
		<div class="alert alert-warning" role="alert">
			<?= validation_errors() ?>
		</div>
	<?php endif; ?>
	<h3>Subject Details</h3>
		<?php echo form_open('subjects/store'); ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Name</label>
		      <input type="text" name="name" class="form-control" id="inputPassword4" value="<?= set_value('name'); ?>" placeholder="Mathematics">
		    </div>	    
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>

