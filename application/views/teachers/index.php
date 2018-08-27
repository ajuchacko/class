<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<title>All Teacher</title>
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
	<?php //dd($subjects) ?>
	<?php 

		function filter($subject, $teacher) {
		    return $subject['id'] === $teacher['subject_id'];
		}

	?>
	<div class="container">
		<?php if($this->session->has_userdata('success')) : ?>
			<div class="alert alert-success" role="alert">
				<?= $this->session->userdata('success'); 
				    $this->session->unset_userdata('success'); ?>
			</div>
		<?php endif; ?>
		<h3>All Teachers</h3>

			<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Degree</th>
				      <th scope="col">Salary</th>
				      <th scope="col">Subject</th>
				      <th scope="col">Mobile</th>
				      <th scope="col">Address</th>
				      <th scope="col">Joined On</th>
				      <th scope="col">Edit</th>
				      <th scope="col">Remove</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($teachers as $key => $teacher) : ?>
				    <tr>
				      <th scope="row"><?= $teacher['id'] ?></th>
				      <td><?= $teacher['name'] ?></td>
				      <td><?= $teacher['email'] ?></td>
				      <td><?= $teacher['degree'] ?></td>
				      <td><?= $teacher['salary'] ?></td>
				      <?php 
				      if(!is_null($teacher['subject_id'])) {
				      foreach ($subjects as $key => $subject) : ?>
				      		<?php if($subject['id'] === $teacher['subject_id']):?>
						      <td><?= $subject['name'] ?></td>
					      	<?php endif; ?>
					  <?php endforeach; } else {
					  	echo "<td></td>";
					  } ?>
				      <td><?= $teacher['mobile'] ?></td>
				      <td><?= $teacher['address'] ?></td>
				      <td><?= date('d-m-Y', strtotime($teacher['created_at'])); ?></td>
				      <td><a href="<?= site_url("teachers/edit/{$teacher['id']}"); ?>">Edit</a></td>
				      <td><a href="<?= site_url("teachers/delete/{$teacher['id']}"); ?>">Delete</a></td>
				    </tr>
					<?php endforeach; ?>
				  </tbody>
			</table>
	</div>
</body>
</html>