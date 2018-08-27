<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title>Login</title>
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
	<h3>Login here</h3>
			<?php echo form_open('trylogin'); ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Email</label>
		      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="jane@example.com">
		    </div>
		  </div>
		  <div class="form-row">
		  <div class="form-group col-md-6">
		    <label for="inputAddress">password</label>
		    <input type="password" name="password" class="form-control" id="inputAddress">
		  </div>
		  </div>

		  
		 
		  
		  <button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>

