<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mains extends CI_Controller 
{

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->output->enable_profiler();
	// }

	public function target()
	{
		die('target');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function register()
	{

		$this->load->view('register');
	}
	
	public function admin_dashboard()
	{
		$all_users['all_users'] = $this->session->userdata('all_users');
		$all_users['message'] = $this->session->userdata('message');
		$all_users['message_color'] = $this->session->userdata('message_color');
		// var_dump($all_users);
		// die('admin - SO CLOSE');
		$this->load->view('admin_dashboard', $all_users);
	}

	public function new_user()
	{
		$this->load->view('new_user');
	}

	public function user_info($id = -1)
	{
		if($id == -1)
		{
			$user_id['id'] = $this->session->userdata('user')['id'];
			var_dump($user_id['id']);
			// die('alsdjf');
		}
		else
		{
			$user_id['id'] = $id;
		}

		$user = $this->user->get_user_by_id($user_id['id']);
		$this->session->set_userdata('profile', $user);
		// var_dump($user);

		//retrieve messages
		$messages = $this->message->profile_messages($user['id']);
		$this->session->set_userdata('profile_messages',$messages);

		$user['profile_messages'] = $this->session->userdata('profile_messages');

		// var_dump($user['profile_messages']);

		//retrieve comments
		$comment_info = $this->session->userdata('comment_info');
		$comments = $this->comment->profile_comments();

		// var_dump($comments);
		$this->session->set_userdata('profile_comments',$comments);

		$user['profile_comments'] = $this->session->userdata('profile_comments');

		// var_dump($user['profile_comments']);

		// var_dump($user);
		// var_dump($this->session->userdata('profile'));
		// die('mains/user_info');
		$this->load->view('user_info', $user);
	}

	public function edit_user($id = -1)
	{
		// var_dump($id);
		if($id == -1)
		{
			$user_id['id'] = $this->session->userdata('user')['id'];
		}
		else
		{
			$user_id['id'] = $id;
		}
		// var_dump($user_id);
		// die('wah');
		$this->load->view('edit_user', $user_id);
	}

	public function remove($id)
	{
		//delete user
		$this->db->where('id', $id);
		$this->db->delete('users'); 

		redirect('/user_info_process/dashboard');
	}
}


//end of mains controller
?>