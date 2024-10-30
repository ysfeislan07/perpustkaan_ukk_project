<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Book_model');
		$this->load->model('Loans_model');
		$this->load->model('History_model');

		if($this->session->userdata('role') == 'Users') {
			redirect('auth/block');
		}

		if(!$this->session->userdata('email')) {
			$this->session->set_flashdata('message', 'Please login, you dont have session active!');
			redirect('auth');
		}
	}
	public function dataBook()
	{
		$sortir = $this->input->post('sortir');
		
		if($sortir) {
			$data['dataBook'] = $this->Book_model->getBookSortir($sortir);
		} else {
			$data['dataBook'] = $this->Book_model->getBook();
		}

		$data['title'] = 'Data Book';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$data['categories'] = $this->db->get('categories')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataBook', $data);
		$this->load->view('templates/footer');
	}

	public function addBook()
	{
		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('categories', 'Categories', 'required|trim');
		$this->form_validation->set_rules('writer', 'Writer', 'required|trim');
		$this->form_validation->set_rules('publisher', 'Publisher', 'required|trim');
		$this->form_validation->set_rules('publication_year', 'Publication Year', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');

		if( $this->form_validation->run() == false ) {
			$data['title'] = 'Data Book';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['book'] = $this->db->get('book')->result_array();
			$data['categories'] = $this->db->get('categories')->result_array();
			$data['dataBook'] = $this->Book_model->getBook();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataBook', $data);
			$this->load->view('templates/footer');
		} else {
			$gambar = $_FILES['image'];
			if( $gambar = '') {} else {
				$config['upload_path']       = './assets-template/gambar';
				$config['allowed_types']     = 'jpg|png|gif';

				$this->load->library('upload', $config);
				if( !$this->upload->do_upload('image')) {
					echo "Upload gagal"; die();
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$data = [
				'title' => $this->input->post('title'),
				'image' => $gambar,
				'writer' => $this->input->post('writer'),
				'publisher' => $this->input->post('publisher'),
				'publication_year' => $this->input->post('publication_year'),
				'describe_book' => $this->input->post('describe_book'),
				'stok' => $this->input->post('stok'),
			];

			$this->db->insert('book', $data);

			$book_id = $this->db->insert_id();

			$data_categories = [
				'book_id' => $book_id,
				'categories_id' => $this->input->post('categories', true)
			];

			$this->db->insert('book_categories', $data_categories);

			$this->session->set_flashdata('message', 'Success add new book!');
			redirect('admin/dataBook');
		}
	}

	public function editeBook($id, $id_categories)
	{
		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('categories', 'Categories', 'required|trim');
		$this->form_validation->set_rules('writer', 'Writer', 'required|trim');
		$this->form_validation->set_rules('publisher', 'Publisher', 'required|trim');
		$this->form_validation->set_rules('publication_year', 'Publication Year', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');

		if( $this->form_validation->run() == false ) {
			$data['title'] = 'Data Book';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['book'] = $this->db->get('book')->result_array();
			$data['categories'] = $this->db->get('categories')->result_array();
			$data['dataBook'] = $this->Book_model->getBook();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataBook', $data);
			$this->load->view('templates/footer');
		} else {

			$db = $this->db->get_where('book', ['book_id' => $id])->row_array();

			$gambar = $_FILES['image'];
			if ($_FILES['image']['name'] != '') {
				$config['upload_path']       = './assets-template/gambar';
				$config['allowed_types']     = 'jpg|png|gif';
			
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$error = $this->upload->display_errors();
				} else {
					$gambar = $this->upload->data('file_name');
				}
			} else {
				$gambar = $db['image'];
			}
			
			
			$data = [
				'title' => $this->input->post('title'),
				'image' => $gambar,
				'writer' => $this->input->post('writer'),
				'publisher' => $this->input->post('publisher'),
				'publication_year' => $this->input->post('publication_year'),
				'describe_book' => $this->input->post('describe_book'),
				'stok' => $this->input->post('stok'),
			];


			$this->db->where('book_id', $id);
			$this->db->update('book', $data);

			$data_categories = [
				'categories_id' => $this->input->post('categories', true)
			];

			$this->db->where('book_categories_id', $id_categories);
			$this->db->update('book_categories', $data_categories);

			$this->session->set_flashdata('message', 'Success edite book!');
			redirect('admin/dataBook');
		}
	}

	public function deleteBook($id)
	{
		$this->db->where('book_id', $id);
		$this->db->delete('book');

		$this->session->set_flashdata('message', 'Success delete book!');
		redirect('admin/dataBook');
	}

	public function dataAdmin()
	{
		$data['title'] = 'Data Admin';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$data['dataAdmin'] = $this->db->get_where('users', ['role' => 'Admin'])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataAdmin', $data);
		$this->load->view('templates/footer');
	}

	public function addAdmin()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email sudah terdaftar',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Admin';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataAdmin'] = $this->db->get_where('users', ['role' => 'Admin'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataAdmin', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name' => $this->input->post('name', true),
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'password' => $this->input->post('password', true),
				'role' => 'Admin'
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', 'Success dadd new admin!');
			redirect('admin/dataAdmin');
		}
	}

	public function editeAdmin($id)
	{
		$dataUsers = $this->db->get_where('users', ['users_id' => $id])->row_array();

		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ( $dataUsers['email'] == $this->input->post('email') ) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Admin';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataAdmin'] = $this->db->get_where('users', ['role' => 'Admin'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataAdmin', $data);
			$this->load->view('templates/footer');
		} else {

			$name = $this->input->post('name', true);
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password');

			$data = [
				'name' => $name,
				'username' => $username,
				'password' => $password,
				'email' => $email,
			];

			$this->db->where('users_id', $id);
			$this->db->update('users', $data);

			$this->session->set_flashdata('message', 'Success edite admin!');
			redirect('admin/dataAdmin');
		}
	}


	public function deleteAdmin($id)
	{
		$this->db->where('users_id', $id);
		$this->db->delete('users');

		$this->session->set_flashdata('message', 'Success delete admin!');
		redirect('admin/dataAdmin');
	}

	public function dataCategories()
	{
		$data['title'] = 'Data Categories';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$data['dataCategories'] = $this->db->get('categories')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataCategories', $data);
		$this->load->view('templates/footer');
	}

	public function addCategories()
	{
		$this->form_validation->set_rules('categories', 'Name Categories', 'required|trim');

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Categories';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataCategories'] = $this->db->get('categories')->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataCategories', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name_categories' => $this->input->post('categories', true),
			];

			$this->db->insert('categories', $data);

			$this->session->set_flashdata('message', 'Success add new categories!');
			redirect('admin/dataCategories');
		}
	}

	public function editeCategories($id)
	{

		$this->form_validation->set_rules('categories', 'Name Categories', 'required|trim');
	
		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Categories';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataCategories'] = $this->db->get('categories')->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataCategories', $data);
			$this->load->view('templates/footer');
		} else {

			$categories = $this->input->post('categories', true);

			$data = [
				'name_categories' => $categories,
			];

			$this->db->where('categories_id', $id);
			$this->db->update('categories', $data);

			$this->session->set_flashdata('message', 'Success editen categories!');
			redirect('admin/dataCategories');
		}
	}

	public function deleteCategories($id)
	{
		$this->db->where('categories_id', $id);
		$this->db->delete('categories');

		$this->session->set_flashdata('message', 'Success delete categories!');
		redirect('admin/dataCategories');
	}
	public function dataStaff()
	{
		$data['title'] = 'Data Staff';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$data['dataStaff'] = $this->db->get_where('users', ['role' => 'Staff'])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataStaff', $data);
		$this->load->view('templates/footer');
	}

	public function addStaff()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email sudah terdaftar',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Staff';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataStaff'] = $this->db->get_where('users', ['role' => 'Staff'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataStaff', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name' => $this->input->post('name', true),
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'password' => $this->input->post('password', true),
				'role' => 'Staff'
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', 'Success add new staff!');
			redirect('admin/dataStaff');
		}
	}

	public function editeStaff($id)
	{
		$dataUsers = $this->db->get_where('users', ['users_id' => $id])->row_array();

		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ( $dataUsers['email'] == $this->input->post('email') ) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Staff';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataStaff'] = $this->db->get_where('users', ['role' => 'Staff'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataStaff', $data);
			$this->load->view('templates/footer');
		} else {

			$name = $this->input->post('name', true);
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password');

			$data = [
				'name' => $name,
				'username' => $username,
				'password' => $password,
				'email' => $email,
			];

			$this->db->where('users_id', $id);
			$this->db->update('users', $data);

			$this->session->set_flashdata('message', 'Success edite staff!');
			redirect('admin/dataStaff');
		}
	}

	public function deleteStaff($id)
	{
		$this->db->where('users_id', $id);
		$this->db->delete('users');

		$this->session->set_flashdata('message', 'Success delete staff!');
		redirect('admin/dataStaff');
	}
	public function dataUsers()
	{
		$data['title'] = 'Data Users';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$data['dataUsers'] = $this->db->get_where('users', ['role' => 'Users'])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataUsers', $data);
		$this->load->view('templates/footer');
	}

	public function addUsers()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email sudah terdaftar',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Users';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataUsers'] = $this->db->get_where('users', ['role' => 'Users'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataUsers', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name' => $this->input->post('name', true),
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'password' => $this->input->post('password', true),
				'role' => 'Users'
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', 'Success add new users!');
			redirect('admin/dataUsers');
		}
	}

	public function editeUsers($id)
	{
		$dataUsers = $this->db->get_where('users', ['users_id' => $id])->row_array();

		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ( $dataUsers['email'] == $this->input->post('email') ) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter',
		]);

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Data Users';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$data['dataUsers'] = $this->db->get_where('users', ['role' => 'Users'])->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/dataUsers', $data);
			$this->load->view('templates/footer');
		} else {

			$name = $this->input->post('name', true);
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password');

			$data = [
				'name' => $name,
				'username' => $username,
				'password' => $password,
				'email' => $email,
			];

			$this->db->where('users_id', $id);
			$this->db->update('users', $data);

			$this->session->set_flashdata('message', 'Success edite users!');
			redirect('admin/dataUsers');
		}
	}

	public function deleteUsers($id)
	{
		$this->db->where('users_id', $id);
		$this->db->delete('users');

		$this->session->set_flashdata('message', 'Success delete users!');
		redirect('admin/dataUsers');
	}

	public function dataActivityLoans()
	{
		$loans = $this->input->post('sortir');

		if($loans == 'In Progress') {
			$data['dataLoansUser'] = $this->Loans_model->getLoansSortir($loans);
		} elseif($loans == 'Accepted') { 
			$data['dataLoansUser'] = $this->Loans_model->getLoansSortir($loans);
		} elseif($loans == 'In Loans') { 
			$data['dataLoansUser'] = $this->Loans_model->getLoansSortir($loans);
		} elseif($loans == 'Finished') { 
			$data['dataLoansUser'] = $this->Loans_model->getLoansSortir($loans);
		} elseif($loans == 'Assessed') { 
			$data['dataLoansUser'] = $this->Loans_model->getLoansSortir($loans);
		} else {
			$data['dataLoansUser'] = $this->Loans_model->getLoans();
		}

		$data['title'] = 'Data Activity Loans';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataActivityLoans', $data);
		$this->load->view('templates/footer');
	}

	public function accLoans($id, $book_id)
	{

		$author = $this->db->get_where('users', ['users_id'=> $this->session->userdata('users_id')])->row_array();

		$data = [
			'author_id' => $author['name'],
			'status' => 'Accepted'
		];
		$this->db->where('loans_id', $id);
		$this->db->update('loans', $data);

		$qty = 1;
		$this->Loans_model->minStok($book_id, $qty);
		
		$this->session->set_flashdata('message', 'Success accepted users to loans book!');
		redirect('admin/dataActivityLoans');
	}
	public function deleteLoans($id)
	{
		$this->db->where('loans_id', $id);
		$this->db->delete('loans');

		$this->session->set_flashdata('message', 'Success delete progress users loans!');
		redirect('admin/dataActivityLoans');
	}

	public function accAlreadyLoans($id, $book_id)
	{

		$data = [
			'loan_date' => date('Y-m-d'),
			'return_date' => date('Y-m-d', strtotime('+ 7 days')),
			'status' => 'In Loans'
		];
		$this->db->where('loans_id', $id);
		$this->db->update('loans', $data);

		$this->session->set_flashdata('message', 'Users already taken book in loans!');
		redirect('admin/dataActivityLoans');
	}
	public function accFinishLoans($id, $book_id)
	{

		$data = [
			'return_date' => date('Y-m-d'),
			'status' => 'Finished'
		];
		$this->db->where('loans_id', $id);
		$this->db->update('loans', $data);

		$this->session->set_flashdata('message', 'Users already taken book in loans!');
		redirect('admin/dataActivityLoans');
	}

	public function reportLoans()
	{
		$report = $this->input->post('report');

		if($report == 'Today') {
			$data['count'] = $this->History_model->getDataToday();
			$data['dataHistoryLoans'] = $this->History_model->getHistoryToday();
		} elseif( $report == 'Weekly') {
			$data['count'] = $this->History_model->getDataWeekly();
			$data['dataHistoryLoans'] = $this->History_model->getHistoryWeekly();
		} elseif( $report == 'Monthly') {
			$data['count'] = $this->History_model->getDataMonthly();
			$data['dataHistoryLoans'] = $this->History_model->getHistoryMonthly();
		} else {
			$data['count'] = $this->History_model->getData();
			$data['dataHistoryLoans'] = $this->History_model->getHistoryLoans();
		}
		$data['title'] = 'Report Loans';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dataReportLoans', $data);
		$this->load->view('templates/footer');
	}
}
