<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_info_process extends CI_Controller {

	public function index()
	{
		die('user_info_process/index');
	}

	public function signin()
	{
		$post = $this->input->post();
		// var_dump($post);

		//check if user exist
		// $this->load->model("user");
		$user = $this->user->get_user_by_email($post['email']);
		// var_dump($user);
		if(!empty($user))
		{
			if($this->encrypt->decode($user['password']) == $post['password'])
			{
				$this->session->set_userdata('user', $user);
				// var_dump($this->session->userdata('user'));
				// die('say wahhh??');
				redirect('/user_info_process/dashboard');
			}
		}
		redirect('/mains/signin');
		die();
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/mains/signin');
		die();
	}

	public function dashboard()
	{
		$this->load->model("user");
		$all_users = $this->user->get_all_users();
		$this->session->set_userdata('all_users', $all_users);
		redirect('/mains/admin_dashboard');
		die();
	}

	public function edit_user_info()
	{
		$post = $this->input->post();

		//update user info
		if($post['action'] == 'update_info')
			{

			$data = array(
					'email' => $post['email'],
					'first_name' => $post['first_name'],
					'last_name' => $post['last_name'],
				);
			if($post['user_level'] == 'admin')
			{
				$data['admin'] = 1;
			}
			else
			{
				$data['admin'] = 0;
			}
			$this->session->set_userdata('message', 'Updated information successfully!');
		}

		//update user password!
		else if($post['action'] == 'update_password')
		{
			//validate password
			$this->load->library("form_validation");
			$this->form_validation->set_rules('password', "Password", "min_length[5]|required");
			$this->form_validation->set_rules('password_confirmation', "Confirm Password", "matches[password]|required");

			if($this->form_validation->run() === FALSE)
			{
				$this->session->set_userdata('message', 'Failed to set new password');
				$this->session->set_userdata('message_color', 'red');
				redirect('/user_info_process/dashboard');
				die('failed!');
			}
			else
			{
				$this->session->set_userdata('message', 'Successfully set new password!');
				$this->session->set_userdata('message_color', 'green');
				$data['password'] = $this->encrypt->encode($post['password']);
			}
		}

		$this->db->where('id', $post['id']);
		$this->db->update('users', $data);
		redirect('/user_info_process/dashboard'); 
		die('edit_user_info');

	}

	public function new_user()
	{
		$post = $this->input->post();
		// var_dump($post);

		//load validation library
		$this->load->library("form_validation");

		//validation rules
		$this->form_validation->set_rules('email', "Email", "valid_email|required");
		$this->form_validation->set_rules('first_name', "First Name", "trim|required");
		$this->form_validation->set_rules('last_name', "Last Name", "trim|required");
		$this->form_validation->set_rules('password', "Password", "min_length[5]|required");
		$this->form_validation->set_rules('password_confirmation', "Confirm Password", "matches[password]|required");

		$this->form_validation->set_message('required', '*');

		//validation begins
		if($this->form_validation->run() === FALSE)
		{
			//if validaiton fails
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('first_name', form_error('first_name'));
			$this->session->set_flashdata('last_name', form_error('last_name'));
			$this->session->set_flashdata('password', form_error('password'));
			$this->session->set_flashdata('password_confirmation', form_error('password_confirmation'));

			if($post["action"] == "register")
			{
				redirect('/mains/register');
			}
			else 
			{
				redirect('/mains/new_user');
			}
			die();
		}
		else
		{
		    //codes to run on success validation here
			$user['email'] = $post['email'];
			$user['first_name'] = $post['first_name'];
			$user['last_name'] = $post['last_name'];
			$user['password'] = $this->encrypt->encode($post['password']);
			// var_dump($user['password']);

			$all_users = $this->user->get_all_users();
			if(empty($all_users))
			{	
				$user['admin'] = 1;
			}
			else
			{
				$user['admin'] = 0;
			}

			$this->user->add_user($user);

			if($post["action"] == "register")
			{
				redirect('/mains/signin');
			}
			else 
			{
				redirect('/mains/signin');
			}
			die();

		}
		//validation ends
	}
}
//end of mains controller
?>