<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<style type="text/css">
		.container {
			margin-top: 4rem;
		}
	</style>
</head>
<body>
<div class="container">

	<table class="table col-md-6">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Article</th>
	      <th scope="col">Download</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($details as $key => $value) : ?>
	    <tr>
	      <th scope="row"><?= $key + 1 ?></th>
	      <td><?= $value['name'] ?></td>
	      <td><a href="<?= base_url("./uploads/{$value['name']}")?>" target="_blank">Click here</a></td>
	      <td></td>
	    </tr>
	<?php endforeach; ?>
	    <!-- <tr>
	      <th scope="row">2</th>
	      <td>Jacob</td>
	      <td>Thornton</td>
	      <td>@fat</td>
	    </tr>
	    <tr>
	      <th scope="row">3</th>
	      <td>Larry</td>
	      <td>the Bird</td>
	      <td>@twitter</td>
	    </tr> -->
	  </tbody>
	</table>

	</div>
  

  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>