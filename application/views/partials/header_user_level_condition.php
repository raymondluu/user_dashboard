<?php
	if($this->session->userdata('user_level') == 9)
	{
?>
			<?= "Manage Users" ?>
<?php
	}
	else //$this->session->userdata('user_level') == 1
	{
?>
			<?= "All Users" ?>
<?php
	}
?>