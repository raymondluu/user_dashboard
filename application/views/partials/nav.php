<?php 
//function to echo class="active" to make nav bar links active if on that page.
//found this function off stackoverflow
//http://stackoverflow.com/questions/11813498/make-twitter-bootstrap-navbar-link-active
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<p class="navbar-brand">Test App</p>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
<?php
	if($this->session->userdata("logged_in") == 0)
	{
?>
				<li><a href="/">Home</a></li>
<?php
	}
	else
	{
?>
<?php
	if($this->session->userdata('user_level') == 9)
	{
?>
				<li <?= echoActiveClassIfRequestMatches("admin"); ?>><a href="/dashboard/admin">Dashboard</a></li>
<?php
	}
	else
	{
?>
				<li <?= echoActiveClassIfRequestMatches("dashboard"); ?>><a href="/dashboard">Dashboard</a></li>
<?php
	}
?>
				<li <?= echoActiveClassIfRequestMatches("edit"); ?>><a href="/users/edit">Profile</a></li>
<?php
	}
?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
<?php
	if($this->session->userdata("logged_in") == 0)
	{
?>
              <li><a href="/signin">Sign in</a></li>
<?php
	}
	else
	{
?>
              <li><a href="/users/logout_user">Log off</a></li>
<?php
	}
?>
            </ul>
		</div>
	</div>
</nav>