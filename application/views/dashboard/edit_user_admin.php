<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit User</title>
	<?php $this->load->view('partials/head.php'); ?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('partials/nav.php'); ?>
	<div class="container">
		<h2 class="h2_buffer1">Edit user #<?= $user['id'] ?></h2>
		<a class="btn btn-lg btn-primary" href="/dashboard/admin" role="button">Return to Dashboard</a>
		<?= $this->session->flashdata("errors"); ?>
		<?= $this->session->flashdata("success"); ?>
		<div class="col-xs-6 col-md-4">
			<form action="/users/update/<?= $user['id'] ?>" method="post">
				<p class="top_buffer1">Edit Information</p>
				<div class="form-group">
					<label>Email Address:</label>
					<input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
				</div>
				<div class="form-group">
					<label>First name:</label>
					<input type="text" class="form-control" name="first_name" value="<?= $user['first_name'] ?>">
				</div>
				<div class="form-group">
					<label>Last name:</label>
					<input type="text" class="form-control" name="last_name" value="<?= $user['last_name'] ?>">
				</div>
				<div class="form-group">
					<label>User Level:</label>
					<select class="form-control" name="user_level">
						<option>User</option>
						<option <?php if($user['user_level'] == 9){ ?><?= "selected='selected'" ?><?php } ?>>Admin</option>
					</select>
				</div>
				<div class="col-md-9 col-md-offset-9">
					<input type="hidden" name="from_page" value="admin">
					<input class="btn btn-success" type="submit" name="action" value="Save">
				</div>
			</form>
		</div>
		<div class="col-xs-6 col-md-4 left_buffer1">
			<form action="/users/update/<?= $user['id'] ?>" method="post">
				<p class="top_buffer1">Change Password</p>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label>Password Confirmation:</label>
					<input type="password" class="form-control" name="c_password">
				</div>
				<div class="col-md-6 col-md-offset-6">
					<input type="hidden" name="from_page" value="admin">
					<input class="btn btn-success" type="submit" name="action" value="Update Password">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>