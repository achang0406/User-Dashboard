<?php
class user extends CI_Model {
     function get_all_users()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users ORDER BY admin AND id DESC")->result_array();
     }
     function get_user_by_email($user_email)
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users WHERE email = ?", array($user_email))->row_array();
     }
     function get_user_by_id($user_id)
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users WHERE id = ?", array($user_id))->row_array();
     }
     function get_most_recent_user()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users ORDER BY id DESC LIMIT 1")->row_array();
     }
     function add_user($user)
     {
        $this->load->helper('date');
         $query = "INSERT INTO users (email, first_name, last_name, password, admin, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
         $values = array($user['email'], $user['first_name'], $user['last_name'], $user['password'], $user['admin']); 
         return $this->db->query($query, $values);
     }
}
?>