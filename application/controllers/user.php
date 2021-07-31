<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// **
		// get user session
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index()
	{
		$data['title'] = 'User Dashboard';
		$data['user'] = $this->user;

		// **
		// view file to be loaded
		$data['view_file'] = 'dashboard';
		$this->load->view('templates/user/default.php', $data, FALSE);

		// $this->load->view('user/index', $data);
	}

	function daftar_member()
	{
		$data['title'] = "Daftar Member Page";
		$data['user'] = $this->user;

		// **
		// view file to be loaded
		$data['view_file'] = 'daftar_member';
		$this->load->view('templates/user/default.php', $data, FALSE);
	}
}
