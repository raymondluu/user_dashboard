<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Model {
	public function add_message($post_data, $poster_id, $user_id)
	{
		$query = "INSERT INTO messages (message, created_at, updated_at, user_id, poster_id)
				  VALUES (?, NOW(), NOW(), ?, ?)";
		$values = array($post_data['input_message'], $user_id, $poster_id);
		$this->db->query($query, $values);
	}
	
	public function get_messages($id)
	{
		$query = "SELECT messages.id, message, messages.created_at, user_id, poster_id, first_name, last_name
				  FROM messages
				  LEFT JOIN users
				  ON messages.poster_id = users.id
				  WHERE user_id = ?
				  ORDER BY messages.created_at DESC";
		$value = $id;
		return $this->db->query($query, $value)->result_array();
	}

	public function remove_messages($user_id)
	{
		$query = "DELETE FROM messages
				  WHERE user_id = ?
				  OR poster_id = ?";
		$value = array($user_id, $user_id);
		$this->db->query($query, $value);
	}
}