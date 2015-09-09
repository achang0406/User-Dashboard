<?php
class message extends CI_Model {
     function get_all_messages()
     {
         return $this->db->query("SELECT * FROM messages")->result_array();
     }
     function get_message_by_id($message_id)
     {
         return $this->db->query("SELECT * FROM messages WHERE id = ?", array($message_id))->row_array();
     }
     function get_most_recent_message()
     {
         return $this->db->query("SELECT * FROM messages ORDER BY id DESC LIMIT 1")->row_array();
     }
     function add_message($message)
     {
        $this->load->helper('date');
         $query = "INSERT INTO messages (content, user_id, profile_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
         $values = array($message['content'], $message['user_id'], $message['profile_id']); 
         return $this->db->query($query, $values);
     }
     function profile_messages($id)
     {
        $query = "SELECT user2.first_name As current_profile,user1.first_name, user1.last_name, DATE_FORMAT(messages.created_at, '%M %D %Y') AS 'created_at', messages.id, messages.content FROM messages LEFT JOIN users as user1 ON messages.user_id = user1.id LEFT JOIN users AS user2 ON messages.profile_id = user2.id WHERE messages.profile_id = ?";
        $values = array($id);
        return $this->db->query($query,$values)->result_array();
     }
}
?>