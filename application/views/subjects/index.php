<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title>All Subject</title>
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
		<h3>All Subjects</h3>

			<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">Name</th>
				      <th scope="col">Edit</th>
				      <th scope="col">Remove</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($subjects as $key => $subject) : ?>
				    <tr>
				      <th scope="row"><?= $subject['id'] ?></th>
				      <td><?= $subject['name'] ?></td>
				      <td><a href="<?= site_url("subjects/edit/{$subject['id']}"); ?>">Edit</a></td>
				      <td><a href="<?= site_url("subjects/delete/{$subject['id']}"); ?>">Delete</a></td>
				    </tr>
					<?php endforeach; ?>
				  </tbody>
			</table>
	</div>
</body>
</html>