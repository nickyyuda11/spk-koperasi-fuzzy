<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function viewUser()
	{
		return $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
	}
	public function inputUser()
	{
		$data = array(
			'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'tanggal_daftar' => date('Y-m-d H:i:s')
		);
		return $this->db->insert('user', $data);
	}
	public function inputData()
	{
		$data = array(
			'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
			'umur' => htmlspecialchars($this->input->post('umur', true)),
			'nik' => htmlspecialchars($this->input->post('nik', true)),
			'no_kk' => htmlspecialchars($this->input->post('nokk', true)),
			'npwp' => htmlspecialchars($this->input->post('npwp', true)),
			'status_pengajuan' => htmlspecialchars('sudah pengajuan', true),
			'gaji' => htmlspecialchars($this->input->post('gaji', true)),
			'jumlah_pengajuan' => htmlspecialchars($this->input->post('pengajuan', true)),
			'waktu_pengajuan' => htmlspecialchars($this->input->post('waktu_pengajuan', true)),
			'setuju_sk' => htmlspecialchars($this->input->post('setujusk', true)),
			'status_client' => htmlspecialchars('aktif', true),
		);
		$this->db->update('user', $data, ['username' => $this->session->userdata('username')]);

		if ($this->input->post('umur') < 18) {
			$data = [
				'status_pengajuan' => htmlspecialchars('tidak diterima umur belum mencukupi', true),
			];
			$this->db->update('user', $data, ['username' => $this->session->userdata('username')]);
		} elseif ($this->input->post('umur') <= 20) {
			$rumus_umur_kecil = 1;
			$rumus_umur_besar = 0;
		} elseif ($this->input->post('umur') <= 40) {
			$rumus_umur_kecil = (40 - $this->input->post('umur')) / 20;
			$rumus_umur_besar = ($this->input->post('umur') - 20) / 20;
		} else {
			$rumus_umur_kecil = 0;
			$rumus_umur_besar = 1;
		}

		if ($this->input->post('gaji') < 800000) {
			$data = [
				'status_pengajuan' => htmlspecialchars('tidak diterima gaji belum mencukupi', true),
			];
			$this->db->update('user', $data, ['username' => $this->session->userdata('username')]);
		} elseif ($this->input->post('gaji') <= 2000000) {
			$rumus_gaji_kecil = 1;
			$rumus_gaji_besar = 0;
		} elseif ($this->input->post('gaji') <= 4000000) {
			$rumus_gaji_kecil = (4000000 - $this->input->post('gaji')) / 2000000;
			$rumus_gaji_besar = ($this->input->post('gaji') - 2000000) / 2000000;
		} else {
			$rumus_gaji_kecil = 0;
			$rumus_gaji_besar = 1;
		}

		if ($this->input->post('pengajuan') <= 1000000) {
			$rumus_pengajuan_kecil = 1;
			$rumus_pengajuan_besar = 0;
		} elseif ($this->input->post('pengajuan') < 3000000) {
			$rumus_pengajuan_kecil = (3000000 - $this->input->post('pengajuan')) / 1500000;
			$rumus_pengajuan_besar = ($this->input->post('pengajuan') - 1000000) / 1500000;
		} else {
			$rumus_pengajuan_kecil = 0;
			$rumus_pengajuan_besar = 1;
		}

		if ($this->input->post('waktu_pengajuan') < 6) {
			$rumus_waktu_kecil = 1;
			$rumus_waktu_besar = 0;
		} elseif ($this->input->post('waktu_pengajuan') <= 6) {
			$rumus_waktu_kecil = (12 - $this->input->post('waktu_pengajuan')) / 6;
			$rumus_waktu_besar = ($this->input->post('waktu_pengajuan') - 12) / 6;
		} else {
			$rumus_waktu_kecil = 0;
			$rumus_waktu_besar = 1;
		}

		$alphas = array();
		$zs = array();

		// rule 1
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_kecil, $rumus_pengajuan_kecil, $rumus_waktu_kecil));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 2
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_kecil, $rumus_pengajuan_kecil, $rumus_waktu_besar));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 3
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_kecil, $rumus_pengajuan_besar, $rumus_waktu_kecil));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 4
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_kecil, $rumus_pengajuan_besar, $rumus_waktu_besar));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 5
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_besar, $rumus_pengajuan_kecil, $rumus_waktu_kecil));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 6
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_besar, $rumus_pengajuan_kecil, $rumus_waktu_besar));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 7
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_besar, $rumus_pengajuan_besar, $rumus_waktu_kecil));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 8
		array_push($alphas, min($rumus_gaji_kecil, $rumus_umur_besar, $rumus_pengajuan_besar, $rumus_waktu_besar));
		$temp = 100 - (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 9
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_kecil, $rumus_pengajuan_kecil, $rumus_waktu_kecil));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 10
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_kecil, $rumus_pengajuan_kecil, $rumus_waktu_besar));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 11
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_kecil, $rumus_pengajuan_besar, $rumus_waktu_kecil));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 12
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_kecil, $rumus_pengajuan_besar, $rumus_waktu_besar));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 13
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_besar, $rumus_pengajuan_kecil, $rumus_waktu_kecil));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 14
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_besar, $rumus_pengajuan_kecil, $rumus_waktu_besar));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 15
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_besar, $rumus_pengajuan_besar, $rumus_waktu_kecil));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		// rule 16
		array_push($alphas, min($rumus_gaji_besar, $rumus_umur_besar, $rumus_pengajuan_besar, $rumus_waktu_besar));
		$temp = 50 + (end($alphas) * 50);
		array_push($zs, $temp);

		var_dump($alphas);
		echo "<hr>";
		var_dump($zs);
		echo "<hr>";
		// print_r($alphas);
		// echo "<hr>";
		// print_r($zs);
		// var_dump($zs);

		// echo count($alphas);
		$counter = 0;
		$counter2 = 0;

		for ($i = 0; $i < count($alphas); $i++) {
			$counter += $alphas[$i] * $zs[$i];
			$counter2 += $alphas[$i];
			var_dump($counter);
			var_dump($counter2);
		}
		$htemp = $counter / $counter2;
		var_dump($htemp);
		$data = array(
			'hasil_spk' => htmlspecialchars($htemp, true)
		);
		$this->db->update('user', $data, ['username' => $this->session->userdata('username')]);
	}
	public function changeImage($post_image, $slug)
	{
		$user = $this->viewUser();
		if ($user[$slug] == '') {
			$data = array(
				$slug => $post_image
			);
			return $this->db->update('user', $data, ['username' => $user['username']]);
		} else {
			$image_file_name = $this->db->select($slug)->get_where('user', [$slug => $user[$slug]])->row()->$slug;
			$cwd = getcwd(); // save the current working directory
			$image_file_path = $cwd . "\\assets\\img\\profil\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); // Restore the previous working directory
			$data = array(
				$slug => $post_image
			);
			return $this->db->update('user', $data, ['username' => $user['username']]);
		}
	}
}
