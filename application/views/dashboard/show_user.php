<?php
	date_default_timezone_set('America/Los_Angeles');

	$str_to_time = strtotime($user['created_at']);
	$date = date("F jS Y", $str_to_time);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Information</title>
	<?php $this->load->view('partials/head.php'); ?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('partials/nav.php'); ?>
	<div class="container">
		<h3><?= $user['first_name'] . " " . $user['last_name'] ?></h3>
		<div class="col-xs-6 col-md-6">
			<div class="col-xs-6 col-md-3">
				<p>Registered at: </p>
				<p>User ID: </p>
				<p>Email address: </p>
				<p>Description: </p>
			</div>
			<div class="col-xs-6 col-md-4">
				<p><?= $date ?></p>
				<p>#<?= $user['id'] ?></p>
				<p><?= $user['email'] ?></p>
				<p><?= $user['description'] ?></p>
			</div>
		</div>
		
		<div class="col-xs-6 col-md-9">
			<form action="/messages/post/<?= $this->session->userdata('user_id') ?>/<?= $user['id'] ?>" method="post">
				<h3>Leave a message for <?= $user['first_name'] ?></h3>
				<div class="form-group">
					<textarea class="form-control textarea_buffer" name="input_message" rows="4" placeholder="Leave a message"></textarea>
				</div>
				<div class="col-md-offset-11">
					<input class="btn btn-success" type="submit" name="action" value="Post">
				</div>
			</form>
<?php
	$message_counter = 0;
	foreach($messages as $message)
	{
		//calculate time since message posted
		$str_to_time2 = strtotime($message['created_at']);
		$time_diff = abs(time() - $str_to_time2);
		$time_display = "";
		if($time_diff / 86400 >= 7)
		{
			$time_display = date("F jS Y", $str_to_time2);
		}
		else if($time_diff / 86400 >= 1)
		{
			$days = floor($time_diff / 86400);
			$time_display = $days . " days ago";
		}
		else if($time_diff / 86400 < 1 && $time_diff / 3600 >= 1)
		{
			$hours = floor($time_diff / 3600);
			$time_display = $hours . " hours ago";
		}
		else{
			$minutes = floor($time_diff / 60);
			$time_display = $minutes . " minutes ago";
		}
?>
			<!-- show messages -->
			<p class="inline_block div_box top_buffer1"><a href="/users/show/<?= $message['poster_id'] ?>"><?= $message['first_name'] . " " . $message['last_name'] ?></a> wrote</p>
			<div class="inline_block div_box align_right">
				<p><?= $time_display ?></p>
			</div>
			<textarea class="form-control textarea_buffer" name="display_message" rows="4" readonly><?= $message['message'] ?></textarea>
			<!-- show comments -->
<?php
		$comments_for_message = $comments[$message_counter];
		foreach($comments_for_message as $comment)
		{
			$str_to_time3 = strtotime($comment['created_at']);
			$time_diff2 = abs(time() - $str_to_time3);
			$time_display2 = "";
			if($time_diff2 / 86400 >= 7)
			{
				$time_display2 = date("F jS Y", $str_to_time3);
			}
			else if($time_diff2 / 86400 >= 1)
			{
				$days2 = floor($time_diff2 / 86400);
				$time_display2 = $days2 . " days ago";
			}
			else if($time_diff2 / 86400 < 1 && $time_diff2 / 3600 >= 1)
			{
				$hours2 = floor($time_diff2 / 3600);
				$time_display2 = $hours2 . " hours ago";
			}
			else{
				$minutes2 = floor($time_diff2 / 60);
				$time_display2 = $minutes2 . " minutes ago";
			}
?>
			<div class="inline_block div_buffer">
				<p class="inline_block div_box1"><a href="/users/show/<?= $comment['user_id'] ?>"><?= $comment['first_name'] . " " . $comment['last_name'] ?></a> wrote</p>
				<div class="inline_block div_box align_right">
					<p><?= $time_display2 ?></p>
				</div>
				<textarea class="form-control textarea_buffer1" name="display_comment" rows="4" readonly><?= $comment['comment'] ?></textarea>
			</div>
<?php
		}
?>
			<form action="/comments/post/<?= $message['id'] ?>/<?= $this->session->userdata('user_id') ?>/<?= $user['id'] ?>" method="post">
				<div class="form-group inline_block div_buffer">
					<textarea class="form-control textarea_buffer1" name="input_comment" rows="4" placeholder="Write a comment"></textarea>
				</div>
				<div class="col-md-offset-11">
					<input class="btn btn-success" type="submit" name="action" value="Post">
				</div>
			</form>
<?php
		$message_counter++;
	}
?>
		</div>
	</div>
</div>
</body>
</html>