<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class the_wall extends CI_Controller {

	public function index()
	{
		die('the_wall/index');
	}

	// public function profile($id)
	// {
	// 	// $profile = $this->user->get_user_by_id($id);
	// 	// $this->session->set_userdata('profile', $profile);

	// 	$profile = $this->session->userdata('profile');
	// 	// var_dump($profile);

	// 	// $messages = $this->message->profile_messages($profile['id']);
	// 	// var_dump($messages);
	// 	// $this->session->set_userdata('profile_messages',$messages);
	// 	// var_dump($this->session->userdata('profile_messages'));
	// 	// die('/the_wall/profile');
	// 	redirect('/mains/user_info/'.$profile['id']);
	// }

	public function post_message()
	{
		$post = $this->input->post();
		// var_dump($post);
		// echo '<br>';
		// var_dump($this->session->userdata('profile'));
		// echo '<br>';
		// var_dump($this->session->userdata('user'));

		if(!empty($post['message_area']))
		{
			$data = array(
					'content' => $post['message_area'],
					'user_id' => $this->session->userdata('user')['id'],
					'profile_id' => $this->session->userdata('profile')['id']
				);
			var_dump($data);

			$this->message->add_message($data);
			// die("what");
			redirect('/mains/user_info/'.$this->session->userdata('profile')['id']);
			die('not empty!');
		}
		else
		{
			redirect('/mains/user_info/'.$this->session->userdata('profile')['id']);
			die('empty');
		}
		die('the_wall/user_post_message');

		redirect('/mains/user_info/'.$this->session->userdata('profile')['id']);
	}

	public function post_comment()
	{
		$post= $this->input->post();
		// var_dump($post);

		if(!empty($post['comment_area']))
		{
			$data = array(
					'content' => $post['comment_area'],
					'user_id' => $this->session->userdata('user')['id'],
					'message_id' => $post['message_id']
				);

			// var_dump($data);
			// $this->session->set_userdata('comment_info', $post);

			$this->comment->add_comment($data);
			redirect('/mains/user_info/'.$this->session->userdata('profile')['id']);
			die('not empty!');
		}
		else
		{
			redirect('/mains/user_info/'.$this->session->userdata('profile')['id']);
			die('empty');
		}

		die('the_wall/user_post_comment');
	}

}
//end of mains controller
?>