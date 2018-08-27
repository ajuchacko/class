<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title>All Students</title>
	<style type="text/css">
		.alert {
			margin-top: 20px;
			background-color: white;
			border: 1px solid green;
			border-left: 3px solid green;
			color: green;
		}
		h3 {
			margin-top: 10px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>

	<div class="container">
		<?php if($this->session->has_userdata('success')) : ?>
			<div class="alert alert-success" role="alert">
				<?= $this->session->userdata('success'); 
				    $this->session->unset_userdata('success'); ?>
			</div>
		<?php endif; ?>
		<h3>All Students</h3>

			<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">Name</th>
				      <th scope="col">Note</th>
				      <th scope="col">Email</th>
				      <th scope="col">Mobile</th>
				      <th scope="col">Address</th>
				      <th scope="col">Registered On</th>
  	        	<?php if($this->session->has_userdata('admin')) : ?>
				      <th scope="col">Edit</th>
				      <th scope="col">Remove</th>
			  	<?php endif; ?>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($students as $key => $student) : ?>
				    <tr>
				      <th scope="row"><?= $student['id'] ?></th>
				      <td><a href="<?= site_url("students/{$student['id']}"); ?>"><?= $student['name'] ?></a></td>
				      <td><?= $student['note'] ?></td>
				      <td><?= $student['email'] ?></td>
				      <td><?= $student['mobile'] ?></td>
				      <td><?= $student['address'] ?></td>
				      <td><?= date('d-m-Y', strtotime($student['created_at'])); ?></td>
  	        	<?php if($this->session->has_userdata('admin')) : ?>
				      <td><a href="<?= site_url("students/edit/{$student['id']}"); ?>">Edit</a></td>
				      <td><a href="<?= site_url("students/delete/{$student['id']}"); ?>">Delete</a></td>
			    <?php endif; ?>
				    </tr>
					<?php endforeach; ?>
				  </tbody>
			</table>
	</div>
	  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>