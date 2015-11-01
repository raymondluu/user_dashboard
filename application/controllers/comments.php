<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {
	public function post($message_id, $commenter_id, $user_id)
	{
		$this->comment->add_comment($this->input->post(), $message_id, $commenter_id);
		redirect("users/show/$user_id");
	}
	
}
