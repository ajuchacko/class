<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title>Edit Student Details</title>
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
	<h3>Edit Student Details</h3>
			<?php echo form_open("students/update/{$student['id']}"); ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Name</label>
		      <input type="text" name="name" class="form-control" id="inputPassword4" value="<?= $student['name'];?>">
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Email</label>
		      <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $student['email'];?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputAddress">Address</label>
		    <input type="text" name="address" class="form-control" id="inputAddress" value="<?= $student['address'];?>">
		  </div>
		  
		  <div class="form-row">
		    <div class="form-group col-md-8">
		      <label for="inputCity">Notes</label>
		      <input type="text" name="note" class="form-control" id="inputCity" value="<?= $student['note'];?>">
		    </div>
		    <div class="form-group col-md-4">
		    <label for="inputAddress2">Mobile</label>
		    <input type="text" name="mobile" class="form-control" id="inputAddress2" value="<?= $student['mobile'];?>">
		  </div>		    
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>

