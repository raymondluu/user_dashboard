<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function register_user()
	{
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("c_password", "Password Confirmation", "trim|required|min_length[8]|matches[password]");
		if($this->form_validation->run() === false)
		{
			$this->session->set_flashdata("errors", validation_errors());
		}
		else
		{
			$user = $this->user->find_user_by_email($this->input->post());
			if(count($user) > 0)
			{
				$this->session->set_flashdata("errors", "<p>Email address is already taken!</p>");
			}
			else
			{
				$this->session->set_flashdata("success", "<p>Successfully registered! Please sign in.</p>");
				
				// add everyone in as user
				$this->user->add_user($this->input->post());

				// update first user as admin
				if($this->db->insert_id() == 1)
				{
					$this->user->make_admin($this->db->insert_id(), 9);
				}
			}
		}

		redirect("/main/register");
	}

	public function login_user()
	{
		$user = $this->user->find_user_by_email_and_password($this->input->post());
		if(count($user) > 0)
		{
			$this->session->set_userdata("logged_in", 1);
			$this->session->set_userdata("user_id", $user['id']);
			$this->session->set_userdata("user_level", $user['user_level']);

			if($user['user_level'] == 9)
			{
				redirect("/dashboard/admin");
			}
			else // $user['user_level'] == 1
			{
				redirect("/dashboard");
			}
		}
		else
		{
			$this->session->set_flashdata("errors", "<p>Email and Password combination do not match.</p>");
			redirect("/signin");
		}
	}

	public function logout_user()
	{
		$this->session->set_userdata("logged_in", 0);
		$this->session->unset_userdata("user_id");
		$this->session->unset_userdata("user_level");
		redirect("/signin");
	}

	public function add_user()
	{
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("c_password", "Password Confirmation", "trim|required|min_length[8]|matches[password]");
		if($this->form_validation->run() === false)
		{
			$this->session->set_flashdata("errors", validation_errors());
		}
		else
		{
			$user = $this->user->find_user_by_email($this->input->post());
			if(count($user) > 0)
			{
				$this->session->set_flashdata("errors", "<p>Email address is already taken!</p>");
			}
			else
			{
				$this->session->set_flashdata("success", "<p>Successfully added new user!</p>");
				
				$this->user->add_user($this->input->post());
			}
		}

		redirect("users/new");
	}

	public function update($id)
	{
		if($this->input->post('action') == "Save")
		{
			$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
			$this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha");
			$this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha");
			if($this->form_validation->run() === false)
			{
				$this->session->set_flashdata("errors", validation_errors());
			}
			else
			{
				$user = $this->user->find_user_by_email($this->input->post());
				if(count($user) > 0 && $user['id'] != $id)
				{
					$this->session->set_flashdata("errors", "<p>Email address is already taken!</p>");
				}
				else
				{
					$this->session->set_flashdata("success", "<p>Successfully updated information!</p>");
					
					$this->user->update_user_info($this->input->post(), $id);
				}
			}
		}
		else if($this->input->post('action') == "Update Password")
		{
			$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
			$this->form_validation->set_rules("c_password", "Password Confirmation", "trim|required|min_length[8]|matches[password]");
			if($this->form_validation->run() === false)
			{
				$this->session->set_flashdata("errors", validation_errors());
			}
			else
			{
				$this->session->set_flashdata("success", "<p>Successfully updated password!</p>");
				$this->user->update_user_pass($this->input->post(), $id);
			}
		}
		else if($this->input->post('description_action') == "Save")
		{
			$this->session->set_flashdata("success", "<p>Successfully updated description!</p>");
			$this->user->update_description($this->input->post(), $id);
		}

		if($this->input->post('from_page') == "admin")
		{
			redirect("users/edit/$id");
		}
		else if($this->input->post('from_page') == "user")
		{
			redirect("users/edit");
		}
	}

	public function remove_user($user_id)
	{
		$this->comment->remove_comments($user_id);
		$this->message->remove_messages($user_id);
		$this->user->remove_user($user_id);
		redirect("/dashboard/admin");
	}
}
