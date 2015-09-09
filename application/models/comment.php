<?php
class comment extends CI_Model {
     function get_all_comments()
     {
         return $this->db->query("SELECT * FROM comments")->result_array();
     }
     function get_comment_by_id($comment_id)
     {
         return $this->db->query("SELECT * FROM comments WHERE id = ?", array($comment_id))->row_array();
     }
     function get_most_recent_comment()
     {
         return $this->db->query("SELECT * FROM comments ORDER BY id DESC LIMIT 1")->row_array();
     }
     function add_comment($comment)
     {
        $this->load->helper('date');
         $query = "INSERT INTO comments (content, user_id, message_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
         $values = array($comment['content'], $comment['user_id'], $comment['message_id']); 
         return $this->db->query($query, $values);
     }
    function profile_comments()
    {
        $query = "SELECT users.first_name, users.last_name, messages.profile_id, messages.id AS message_id, messages.content, comments.id AS comments_id, comments.content, DATE_FORMAT(comments.created_at, '%M %D %Y') AS 'created_at' FROM comments JOIN users ON comments.user_id = users.id JOIN messages ON comments.message_id = messages.id";
        // $values = array($message_id);
        return $this->db->query($query)->result_array();
    }
}
?>