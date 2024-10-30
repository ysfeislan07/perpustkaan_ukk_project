<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login Page';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/footer');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$users = $this->db->get_where('users', ['email'=> $email])->row_array();

			if($users) {
				if($password == $users['password']) {
					$data = [
						'users_id' => $users['users_id'],
						'email'=> $users['email'],
						'role' => $users['role'],
					];
					$this->session->set_userdata($data);

					redirect('menu');
				} else {
					$this->session->set_flashdata('message-error', 'Wrong password!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message-error', 'Email not registeres!');
				redirect('auth');
			}
		}
	}
	public function register()
	{
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.Email]');
		$this->form_validation->set_rules('password','Password','required|trim');

		if ( $this->form_validation->run() == FALSE ) {
			$data['title'] = 'Register Page';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/register');
			$this->load->view('auth/footer');
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'email'=> $this->input->post('email'),
				'password'=> $this->input->post('password'),
				'role' => 'Users'
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message-error', 'Your account already to registered. Please login now!!');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('users_id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('message', 'Your sesi is ended. Please login again!');
		redirect('auth');
	}

	public function block()
	{
		$this->session->unset_userdata('users_id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$data['title'] = '404 Not Found';
		$this->load->view('auth/block', $data);
	}
}
