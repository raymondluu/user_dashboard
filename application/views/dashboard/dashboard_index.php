<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		<?php $this->load->view('partials/title_user_level_condition.php'); ?>
		Dashboard
	</title>
	<?php $this->load->view('partials/head.php'); ?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('partials/nav.php'); ?>
	<div class="container">
		<h2 class="h2_buffer">
			<?php $this->load->view('partials/header_user_level_condition.php'); ?>
		</h2>
		<?php $this->load->view('partials/button_user_level_condition.php'); ?>
		<table class="table table-striped table-bordered top_buffer_table">
			<thead class="thead">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created at</th>
					<th>User level</th>
<?php
	if($this->session->userdata('user_level') == 9)
	{
?>
					<th>Actions</th>
<?php
	}
?>
				</tr>
			</thead>
			<tbody>
<?php
	foreach($users as $user)
	{
		$str_to_time = strtotime($user['created_at']);
		$date = date("M. jS Y", $str_to_time);

		$user_level = "User";
		if($user['user_level'] == 9)
		{
			$user_level = "Admin";
		}
?>
				<tr>
					<td><?= $user['id'] ?></td>
					<td><a href="/users/show/<?= $user['id'] ?>"><?= $user['first_name'] . " " . $user['last_name'] ?></a></td>
					<td><?= $user['email'] ?></td>
					<td><?= $date ?></td>
					<td><?= $user_level ?></td>
<?php
	if($this->session->userdata('user_level') == 9)
	{
?>
			<td>
				<a href="/users/edit/<?= $user['id'] ?>">edit</a>
				<a class="left_buffer" name="remove_link" href="#" holdlink="/users/remove_user/<?= $user['id'] ?>">remove</a>
			</td>
<?php
	}
?>
				</tr>
<?php
	}
?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>


