<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<style type="text/css">
		.container {
			margin-top: 1rem;
		}
	</style>
</head>
<body>





	        	<?php if($this->session->has_userdata('admin')) : ?>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	        	<?php if($this->session->has_userdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?= $this->session->userdata('success'); 
						    $this->session->unset_userdata('success'); ?>
					</div>
				<?php endif; ?>
	            <div class="card card-default">

	                <div class="card-header">Dashboard</div>

	                <div class="card-body">


	                	

						<h3>You're logged In!</h3>

	                </div>
	            </div>
	        </div>
	    </div>



		<?php echo form_open_multipart("upload");  ?>
		  <div class="form-row col-md-8 mx-auto my-5">
		    <div class="form-group col-md-4">
		      <label for="inputCity">Upload Students Info</label>
		      <select name="item" class="custom-select custom-select-lg mb-3">
				  <option selected>Select</option>
				  <option value="attendance">Attendance</option>
				  <option value="details">Details</option>
				  <option value="marklist">Marklist</option>
			 </select>
		    <div class="custom-file">
			  <input type="file" name="csv_file" class="custom-file-input" id="customFile">
			  <label class="custom-file-label" for="customFile">Choose file</label>
			</div>		    
		    </div>
		  <button type="submit" class="btn btn-primary">Upload</button>
		  </div>
		  
		</form>
		<?php else: ?>
		<h3>Welcome, to School Manage Application</h3>
<?php endif;  ?>

	</div>
	  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

</body>
</html>