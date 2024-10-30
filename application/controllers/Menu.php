<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
		$this->load->model('Book_model');
		$this->load->model('Loans_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Users_model');

		if(!$this->session->userdata('email')) {
			$this->session->set_flashdata('message', 'Please login, you dont have session active!');
			redirect('auth');
		}
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$users_id = $this->session->userdata('users_id');
		$data['dataLoansUser'] = $this->Loans_model->getLoansByUsers($users_id);
		$data['loansAcc'] = $this->Loans_model->loansAcc($users_id);
		$data['loansInProgress'] = $this->Loans_model->loansInProgress($users_id);
		$data['countBook'] = $this->Dashboard_model->countBook();
		$data['countStok'] = $this->Dashboard_model->countStok();
		$data['countUsers'] = $this->Dashboard_model->countUsers();
		$data['countLoansBook'] = $this->Dashboard_model->countLoansBook();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/dashboard', $data);
		$this->load->view('templates/footer');
	}
	public function loansBook()
	{
		$sortir = $this->input->post('sortir');
		
		if($sortir) {
			$data['dataBook'] = $this->Book_model->getBookSortir($sortir);
		} else {
			$data['dataBook'] = $this->Book_model->getBook();
		}
		$data['title'] = 'Loans Book';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$data['categories'] = $this->db->get('categories')->result_array();
		$users_id = $this->session->userdata('users_id');
		$data['dataLoansUser'] = $this->Loans_model->getLoansByUsers($users_id);
		$data['loansAcc'] = $this->Loans_model->loansAcc($users_id);
		$data['loansInProgress'] = $this->Loans_model->loansInProgress($users_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/loansBook');
		$this->load->view('templates/footer');
	}
}
