<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {
	public function post($poster_id, $user_id)
	{
		$this->message->add_message($this->input->post(), $poster_id, $user_id);
		redirect("users/show/$user_id");
	}
	
}
