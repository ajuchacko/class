<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title>Add Teacher</title>
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
	<h3>Teacher Details</h3>
		<?php echo form_open('teachers/store'); ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Name</label>
		      <input type="text" name="name" class="form-control" id="inputPassword4" value="<?= set_value('name'); ?>" placeholder="Jane">
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Email</label>
		      <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= set_value('email'); ?>" placeholder="jane@example.com">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputAddress">Address</label>
		    <input type="text" name="address" class="form-control" id="inputAddress" value="<?= set_value('address'); ?>" placeholder="1234 Main St">
		  </div>
		  
		  <div class="form-row">
		    <div class="form-group col-md-8">
		      <label for="inputCity">Degree</label>
		      <input type="text" name="degree" class="form-control"  value="<?= set_value('degree'); ?>" placeholder="Bsc Physics" id="inputCity">
		    </div>
		    <div class="form-group col-md-8">
		      <label for="inputCity">Salary</label>
		      <input type="text" name="salary" class="form-control"  value="<?= set_value('salary'); ?>" placeholder="45000" id="inputCity">
		    </div>
		    <div class="form-group col-md-4">
		    <label for="inputAddress2">Mobile</label>
		    <input type="text" name="mobile" class="form-control" id="inputAddress2" value="<?= set_value('mobile'); ?>" placeholder="+91989633753">
		  </div>
		  <div class="form-group col-md-4">
		    <label for="inputAddress2">Subject</label>
		    <div class="input-group mb-3">
			  <select class="custom-select" name="subject" id="inputGroupSelect03">
			    <option selected>Choose..</option>
			    <?php foreach ($subjects as $key => $subject) : ?>
				    <option value="<?= $subject['id'] ?>"><?= $subject['name'] ?></option>
				<?php endforeach; ?>
			  </select>
			</div>

		  </div>

		  </div>
		  
		  <button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>

