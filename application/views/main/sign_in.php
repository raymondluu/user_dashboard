<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign in Page</title>
	<?php $this->load->view('partials/head.php'); ?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('partials/nav.php'); ?>
	<div class="container">
		<?= $this->session->flashdata("errors"); ?>
		<h2>Signin</h2>
		<div class="col-xs-6 col-md-4">
			<form action="/users/login_user" method="post">
				<div class="form-group">
					<label>Email Address:</label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="col-md-8 col-md-offset-8">
					<input class="btn btn-success" type="submit" name="signin" value="Sign in!">
				</div>
			</form>
			<a class="top_buffer" href="/register">Don't have an account? Register</a>
		</div>
	</div>
</div>
</body>
</html>