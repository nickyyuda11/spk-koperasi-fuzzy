<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		if (isset($_SESSION['username_adm'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You must been login!</div>');
			redirect('admin/dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Admin Login Page';
			$this->load->view('admin/templates/auth_header', $data);
			$this->load->view('admin/login');
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('admin', ['username_adm' => $username])->row_array();
		if ($user) {
			if (password_verify($password, $user['pass_adm'])) {
				$data = [
					'username_adm' => $user['username_adm'],
					'id_adm' => $user['id_adm'],
				];
				$this->session->set_userdata($data);
				echo 'Berhasil Masuk';
				redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
				redirect('admin/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not registered!</div>');
			redirect('admin/login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username_adm');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('admin/login');
	}
	private function _cekLogin()
	{
		if (!isset($_SESSION['username_adm'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You must been login!</div>');
			redirect(base_url('admin/login'));
		}
	}
	public function index()
	{
		$this->_cekLogin();
		$data['title'] = 'Admin Dashboard - Buka Uang';
		$data['user'] = $this->admin_model->viewadmin();
		$data['client'] = $this->admin_model->client();
		$this->load->view('admin/templates/auth_header', $data);
		$this->load->view('admin/templates/auth_sidebar', $data);
		$this->load->view('admin/templates/auth_topbar', $data);
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('admin/templates/auth_footer');
	}
	public function detailUser($slug)
	{
		$this->_cekLogin();
		$data['title'] = 'Admin Dashboard - Buka Uang';
		$data['user'] = $this->admin_model->viewadmin();
		$data['client'] = $this->admin_model->viewClient($slug);
		$this->load->view('admin/templates/auth_header', $data);
		$this->load->view('admin/templates/auth_sidebar', $data);
		$this->load->view('admin/templates/auth_topbar', $data);
		$this->load->view('admin/dashboard/view', $data);
		$this->load->view('admin/templates/auth_footer');
	}
	public function setujuiPengajuan($slug)
	{
		$this->db->update('user', ['status_pengajuan' => 'pengajuan disetujui'], ['username' => $slug]);
		redirect('admin/dashboard');
	}
	public function tolakPengajuan($slug)
	{
		$this->db->update('user', ['status_pengajuan' => 'pengajuan ditolak'], ['username' => $slug]);
		redirect('admin/dashboard');
	}
}
