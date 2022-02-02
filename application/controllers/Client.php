<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	private function _cekLogin()
	{
		if (!isset($_SESSION['username'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You must been login!</div>');
			redirect(base_url('client/login'));
		}
	}
	public function index()
	{
		$this->_cekLogin();
		$data['title'] = 'Dashboard Buka Uang';
		$data['user'] = $this->client_model->viewUser();
		$this->load->view('client/templates/auth_header', $data);
		$this->load->view('client/templates/auth_sidebar', $data);
		$this->load->view('client/templates/auth_topbar', $data);
		$this->load->view('client/dashboard/index', $data);
		$this->load->view('client/templates/auth_footer');
	}
	public function inputPengajuan()
	{
		$this->_cekLogin();
		$this->client_model->inputData();
		redirect(base_url('client/dashboard'));
	}
	public function batalkanPengajuan()
	{
		$this->_cekLogin();
		$data = array(
			'status_pengajuan' => htmlspecialchars('pengajuan batal', true),
			'foto_ktp' => htmlspecialchars('', true),
			'foto_sktp' => htmlspecialchars('', true),
			'foto_sgaji' => htmlspecialchars('', true)
		);
		$this->db->update('user', $data, ['username' => $this->session->userdata('username')]);
		redirect(base_url('client/dashboard'));
	}
	public function uploadImage($slug)
	{
		$config['upload_path'] = 'assets/img/profil';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = '5048';
		$config['max_width'] = '5000';
		$config['max_height'] = '5000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			$errors = array('error' => $this->upload->display_errors());
			$post_image = 'default.jpg';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$post_image = $data['upload_data']['file_name'];
		}

		$this->client_model->changeImage($post_image, $slug);

		// Set message
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Image changed.</div>');

		redirect('client/dashboard');
	}
}
