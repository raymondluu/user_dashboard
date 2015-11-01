<?php
	if($this->session->userdata('user_level') == 9)
	{
?>
			<a class="btn btn-lg btn-primary" href="/users/new" role="button">Add new</a>
<?php
	}
?>