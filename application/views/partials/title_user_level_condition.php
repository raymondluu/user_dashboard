<?php
	if($this->session->userdata('user_level') == 9)
	{
?>
		<?= "Admin" ?>
<?php
	}
	else //$this->session->userdata('user_level') == 1
	{
?>
		<?= "User" ?>
<?php
	}
?>