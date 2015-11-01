<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Model {
	public function add_comment($post_data, $message_id, $commenter_id)
	{
		$query = "INSERT INTO comments (comment, created_at, updated_at, message_id, user_id)
				  VALUES (?, NOW(), NOW(), ?, ?)";
		$values = array($post_data['input_comment'], $message_id, $commenter_id);
		$this->db->query($query, $values);
	}
	
	public function get_comment($message_id)
	{
		$query = "SELECT comments.id, comment, comments.created_at, message_id, user_id, first_name, last_name
				  FROM comments
				  LEFT JOIN users
				  ON comments.user_id = users.id
				  WHERE message_id = ?";
		$value = $message_id;
		return $this->db->query($query, $value)->result_array();
	}

	public function remove_comments($user_id)
	{
		$query = "DELETE FROM comments
				  WHERE user_id = ?";
		$value = $user_id;
		$this->db->query($query, $value);
	}
}