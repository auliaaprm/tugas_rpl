<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// **
		// load model
		$this->load->model('MemberModel','model');
		$this->load->model('MenuModel','menu_model');

		// **
		// get user session
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// **
		// layout to be loaded
		$this->layout = "templates/user/default.php";
	}

	public function index()
	{
		$data['title'] = 'User Dashboard';
		$data['user'] = $this->user;

		// **
		// view file to be loaded
		$data['view_file'] = 'dashboard';
		$this->load->view($this->layout, $data, FALSE);

		// $this->load->view('user/index', $data);
	}

	function menu_page()
	{
		$data['title'] = "Daftar Menu";
		$data['user'] = $this->user;

		// **
		// view file to be loaded
		$data['view_file'] = 'daftar_menu_page';

		// **
		// data on that page
		$data['menu_list'] = $this->menu_model->menu_get_list();
		$this->load->view($this->layout, $data, FALSE);
	}

	function daftar_member_page()
	{
		$data['title'] = "Pendaftaran Member";
		$data['user'] = $this->user;

		// **
		// view file to be loaded
		$data['view_file'] = 'daftar_member_page';
		$this->load->view($this->layout, $data, FALSE);
	}

	function daftar_member()
	{
		$post = $this->input->post();
		try {
			$member_id = $this->model->member_save($post);

			// **
			// data notif
			$notif_data = array();
			$notif_data['result'] = "success";
			$notif_data['message'] = "Berhasil mendaftar sebagai member";
			$this->create_notif($notif_data);
		} catch (Exception $e) {
			// **
			// data notif
			$notif_data = array();
			$notif_data['result'] = "danger";
			$notif_data['message'] = $e->getMessage();
			$this->create_notif($notif_data);
		}
		redirect('user/member/daftar','refresh');
	}

	function create_notif($data)
	{
		// **
		// set notification
		$notif_data = array();
		$notif_data['result'] = $data['result'];
		$notif_data['message'] = $data['message'];
		$this->session->set_flashdata('notif', $notif_data);
	}
}
