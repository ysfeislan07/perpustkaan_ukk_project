<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

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
		$this->load->model('Loans_model');
		$this->load->model('Users_model');
		$this->load->model('History_model');

		if(!$this->session->userdata('email')) {
			$this->session->set_flashdata('message', 'Please login, you dont have session active!');
			redirect('auth');
		}
	}
	public function profile()
	{
		$data['title'] = 'Profile';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$users_id = $this->session->userdata('users_id');
		$data['dataLoansUser'] = $this->Loans_model->getLoansByUsers($users_id);
		$data['loansAcc'] = $this->Loans_model->loansAcc($users_id);
		$data['loansInProgress'] = $this->Loans_model->loansInProgress($users_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/profile');
		$this->load->view('templates/footer');
	}

	public function editProfile($id)
	{
		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|strtolower|regex_match[/^[^\s]+$/]', [
			'regex_match' => 'Username tidak boleh mengandung spasi'
		]);
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('telp', 'No. Telp', 'required|trim|numeric');

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Profile';
			$email = $this->session->userdata('email');
			$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
			$users_id = $this->session->userdata('users_id');
			$data['dataLoansUser'] = $this->Loans_model->getLoansByUsers($users_id);
			$data['loansAcc'] = $this->Loans_model->loansAcc($users_id);
			$data['loansInProgress'] = $this->Loans_model->loansInProgress($users_id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/profile', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$address = $this->input->post('address');
			$telp = $this->input->post('telp');

			$data = [
				'name' => $name,
				'Username' => $username,
				'address' => $address,
				'telp' => $telp,
			];

			$this->db->where('users_id', $id);
			$this->db->update('users', $data);

			$this->session->set_flashdata('message', 'Berhasil mengubah profile');
			redirect('user/profile');
		}
	}

	public function loansBook($id, $id_users)
	{
		$users = $this->db->get_where('users', ['users_id' => $id_users])->row_array();
		if(!$users['address'] || !$users['username'] || !$users['telp']) {
			$this->session->set_flashdata('message', 'Completed your biodata profile!');
			redirect('menu/loansBook');
		}

		$this->db->where('users_id', $id_users);
		$this->db->where_in('status', array('In Progress', 'Accepted', 'In Loans'));
		$jumlah_peminjaman = $this->db->count_all_results('loans');

		$this->db->where('book_id', $id);
		$this->db->where('users_id', $id_users);
		$this->db->where_in('status', array('In Progress', 'Accepted', 'In Loans'));
		$query = $this->db->get('loans');
	
		if ($jumlah_peminjaman < 3) {
			if($query->num_rows() == 0) {

				$data = [
					'users_id' => $id_users,
					'book_id' => $id,
					'status' => 'In Progress'
				];
				
				$this->db->insert('loans', $data);
				$this->session->set_flashdata('message', 'Book success to loans!');
				redirect('menu/loansBook');
			} else {
				$this->session->set_flashdata('message-error', 'You already loans this book!');
				redirect('menu/loansBook');
			}
		} else {
			$this->session->set_flashdata('message-error', 'You already maximum capacity loans book!');
			redirect('menu/loansBook');
		}
	}

	public function deleteActivityLoans($id)
	{
		$this->db->where('loans_id', $id);
		$this->db->delete('loans');
		$this->session->set_flashdata('message', 'Success delete your progress loans!');
		redirect('user/activityLoans');
	}

	public function activityLoans()
	{
		$data['title'] = 'Activity Loans';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$users_id = $this->session->userdata('users_id');
		$data['dataLoansUser'] = $this->Loans_model->getLoansByUsers($users_id);
		$data['loansAcc'] = $this->Loans_model->loansAcc($users_id);
		$data['loansInProgress'] = $this->Loans_model->loansInProgress($users_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/activityLoans', $data);
		$this->load->view('templates/footer');
	}

	public function personalCollections()
	{
		$data['title'] = 'Personal Collections';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$users_id = $this->session->userdata('users_id');
		$data['dataCollections'] = $this->Users_model->getCollections($users_id);
		$data['dataLoansUser'] = $this->Loans_model->getLoansByUsers($users_id);
		$data['loansAcc'] = $this->Loans_model->loansAcc($users_id);
		$data['loansInProgress'] = $this->Loans_model->loansInProgress($users_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/personalCollections', $data);
		$this->load->view('templates/footer');
	}

	public function addCollections($id)
	{
		$users = $this->session->userdata('users_id');
		$this->db->where('users_id', $users);
		$query_row = $this->db->get('personal_collections');

		if( $query_row->num_rows() < 10) {

			$this->db->where('book_id', $id);
			$this->db->where('users_id', $users);
			$query = $this->db->get('personal_collections');

			if( $query->num_rows() == 0 ) {

				$data = [
					'book_id' => $id,
					'users_id' => $users
				];
				
				$this->db->insert('personal_collections', $data);
				$this->session->set_flashdata('message', 'Success add book to collections!');
				redirect('menu/loansBook');
			} else {
				$this->session->set_flashdata('message', 'Book already add to collections!');
				redirect('menu/loansBook');
			}
			
		} else {
			$this->session->set_flashdata('message', 'Collections is full!');
			redirect('menu/loansBook');
		}
	}

	public function deleteCollections($id)
	{
		$this->db->where('collections_id', $id);
		$this->db->delete('personal_collections');
		$this->session->set_flashdata('message', 'Your book success to delete from collections!');
		redirect('user/personalCollections');
	}

	public function addExtension($id, $book_id, $users_id)
	{
		$extensions = $this->input->post('extensions');
		$get = $this->db->get_where('loans', ['loans_id' => $id])->row_array();

		$return = date('Y-m-d', strtotime('+' . $extensions . ' days', strtotime($get['return_date'])));		

		$data = [
			'return_date' => $return,
			'extensions_id' => 1

		];

		$this->db->where('loans_id', $id);
		$this->db->update('loans', $data);
		$this->session->set_flashdata('message', 'Success add extension day to loans book!');
		redirect('user/activityLoans');
	}

	public function rateBook($id, $book_id, $users_id)
	{
		$data = [
			'book_id' => $book_id,
			'users_id' => $users_id,
			'rate' => $this->input->post('rate'),
			'text' => $this->input->post('text'),
			'date' => date('Y-m-d')
		];

		$this->db->insert('rate_book', $data);

		$data_confirm = [
			'status'=> 'Assessed',
			'confirm_rate' => 1
		];

		$this->db->where('loans_id', $id);
		$this->db->update('loans', $data_confirm);

		$this->session->set_flashdata('message', 'Success to rate this book loans. Thankyou!');
		redirect('user/activityLoans');
	}

	public function loansHistory()
	{
		$data['title'] = 'Loans History';
		$email = $this->session->userdata('email');
		$data['users'] = $this->db->get_where('users', ['email'=> $email])->row_array();
		$users_id = $this->session->userdata('users_id');
		$data['dataLoansHistory'] = $this->History_model->getLoansHistory($users_id);
		$data['dataLoansUser'] = $this->Loans_model->getLoansByUsers($users_id);
		$data['loansAcc'] = $this->Loans_model->loansAcc($users_id);
		$data['loansInProgress'] = $this->Loans_model->loansInProgress($users_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/loansHistory', $data);
		$this->load->view('templates/footer');
	}
}
