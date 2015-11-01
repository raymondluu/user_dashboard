<!DOCTYPE html>
<html lang="en">
<head>
	<title>New User</title>
	<?php $this->load->view('partials/head.php'); ?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('partials/nav.php'); ?>
	<div class="container">
		<h2 class="h2_buffer1">Add a new user</h2>
		<a class="btn btn-lg btn-primary" href="/dashboard/admin" role="button">Return to Dashboard</a>
		<?= $this->session->flashdata("errors"); ?>
		<?= $this->session->flashdata("success"); ?>
		<div class="col-xs-6 col-md-4">
			<form action="/users/add_user" method="post">
				<div class="form-group">
					<label>Email Address:</label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label>First name:</label>
					<input type="text" class="form-control" name="first_name">
				</div>
				<div class="form-group">
					<label>Last name:</label>
					<input type="text" class="form-control" name="last_name">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label>Password Confirmation:</label>
					<input type="password" class="form-control" name="c_password">
				</div>
				<div class="col-md-8 col-md-offset-8">
					<input class="btn btn-success" type="submit" name="create" value="Create">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>