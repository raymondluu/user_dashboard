<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function add_user($post_data)
	{
		$query = "INSERT INTO users (email, first_name, last_name, password, user_level, created_at, updated_at)
				  VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($post_data['email'],
						$post_data['first_name'],
						$post_data['last_name'],
						$post_data['password'],
						1);
		$this->db->query($query, $values);
	}

	public function remove_user($user_id)
	{
		$query = "DELETE FROM users
				  WHERE id = ?;";
		$value = $user_id;
		$this->db->query($query, $value);
	}

	public function find_user_by_email($post_data)
	{
		$query = "SELECT *
				  FROM users
				  WHERE email = ?";
		$value = $post_data['email'];
		return $this->db->query($query, $value)->row_array();
	}

	public function find_user_by_id($id)
	{
		$query = "SELECT *
				  FROM users
				  WHERE id = ?";
		$value = $id;
		return $this->db->query($query, $value)->row_array();
	}

	public function find_user_by_email_and_password($post_data)
	{
		$query = "SELECT *
				  FROM users
				  WHERE email = ?
				  AND password = ?";
		$value = array($post_data['email'], $post_data['password']);
		return $this->db->query($query, $value)->row_array();
	}

	public function find_all()
	{
		$query = "SELECT *
				  FROM users";
		return $this->db->query($query)->result_array();
	}

	public function make_admin($id, $user_level)
	{
		$query = "UPDATE users
				  SET user_level = ?
				  WHERE id = ?";
		$value = array($user_level, $id);
		$this->db->query($query, $value);
	}

	public function update_user_info($post_data, $id)
	{
		$user_level = 1;
		if($post_data['user_level'] == "Admin" || $post_data['user_level'] == "9")
		{
			$user_level = 9;
		}
		$query = "UPDATE users
				  SET email = ?, first_name = ?, last_name = ?, user_level = ?, updated_at = NOW()
				  WHERE id = ?";
		$values = array($post_data['email'],
						$post_data['first_name'],
						$post_data['last_name'],
						$user_level,
						$id);
		$this->db->query($query, $values);
	}

	public function update_user_pass($post_data, $id)
	{
		$query = "UPDATE users
				  SET password = ?, updated_at = NOW()
				  WHERE id = ?";
		$values = array($post_data['password'],
						$id);
		$this->db->query($query, $values);
	}

	public function update_description($post_data, $id)
	{
		$query = "UPDATE users
				  SET description = ?
				  WHERE id = ?";
		$values = array($post_data['description'], $id);
		$this->db->query($query, $values);
	}
}
