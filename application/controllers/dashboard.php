<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}

	public function dashboard_index()
	{
		$users = $this->user->find_all();
		$data = array("users" => $users);
		$this->load->view('dashboard/dashboard_index', $data);
	}

	public function new_user()
	{
		$this->load->view('dashboard/new_user');
	}

	public function edit_user_admin($id)
	{
		$user = $this->user->find_user_by_id($id);
		$data = array("user" => $user);
		$this->load->view('dashboard/edit_user_admin', $data);
	}

	public function edit_user()
	{
		$user = $this->user->find_user_by_id($this->session->userdata("user_id"));
		$data = array("user" => $user);
		$this->load->view('dashboard/edit_user', $data);
	}

	public function show($id)
	{
		$user = $this->user->find_user_by_id($id);
		$messages = $this->message->get_messages($id);
		$comments = array();
		foreach($messages as $message)
		{
			$comments[] = $this->comment->get_comment($message['id']);
		}
		$data = array("user" => $user, "messages" => $messages, "comments" => $comments);
		$this->load->view('dashboard/show_user', $data);
	}
}
