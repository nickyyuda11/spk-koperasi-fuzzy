<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if (isset($_SESSION['username'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You must been login!</div>');
			redirect('client/dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('client/templates/auth_header', $data);
			$this->load->view('client/login');
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$email = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['username' => $email])->row_array();
		if ($user['status_client'] == 'aktif') {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'id' => $user['id'],
				];
				$this->session->set_userdata($data);
				redirect('client/dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
				redirect('client/login');
			}
		} elseif ($user['status_client'] == 'tidak_aktif') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not active! Please Contact Admin.</div>');
			redirect('client/login');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not registered!</div>');
			redirect('client/login');
		}
	}
	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration Page';
			$this->load->view('client/templates/auth_header', $data);
			$this->load->view('client/registration');
		} else {
			$this->client_model->inputUser();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
			redirect('client/login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('client/login');
	}
}
