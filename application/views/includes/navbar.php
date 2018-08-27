<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('home'); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('students'); ?>">Students</a>
      </li>
      <?php if($this->session->has_userdata('admin')) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('teachers'); ?>">Teachers</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('subjects'); ?>">Subjects</a>
      </li> 
<?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('details'); ?>">Details</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    	<?php 
if($this->session->has_userdata('admin')) {
	echo anchor('logout', 'Logout', 'title="Logout"'); 
} else {
	echo anchor('login', 'Login', 'title="Login"'); 
}
	
?>
    </form>
  </div>
</nav>