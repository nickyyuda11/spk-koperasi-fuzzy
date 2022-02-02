<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function viewadmin()
	{
		return $this->db->get_where('admin', ['username_adm' => $this->session->userdata('username_adm')])->row_array();
	}
	public function client()
	{
		return $this->db->get_where('user')->result_array();
	}
	public function viewClient($slug)
	{
		return $this->db->get_where('user', ['username' => $slug])->row_array();
	}
}
