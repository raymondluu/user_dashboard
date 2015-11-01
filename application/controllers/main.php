<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		if(!$this->session->userdata("logged_in"))
		{
			$this->session->set_userdata("logged_in", 0);
		}
	}

	public function index()
	{
		$this->load->view('main/index');
	}

	public function register()
	{
		$this->load->view('main/register');
	}

	public function sign_in()
	{
		$this->load->view('main/sign_in');
	}
}
