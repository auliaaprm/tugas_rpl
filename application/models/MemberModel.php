<?php

Class MemberModel extends CI_Model
{
	public $id_member;
	public $nama_member;
	public $tgl_lahir;
	public $jenis_kelamin;
	public $no_hp;
	public $email;


	public function get_all_data_member()
	{
		$query = "SELECT * from member";
		return $this->db->query($query)->result_array();
	}

	function member_get_list($where = null)
	{
		if ($where) {
			$this->db->where($where);
		}
		$q = $this->db->get('member');
		return $result = $q->num_rows() > 0 ? $q->result_array() : array();
	}

	function member_save($post)
	{
		try {
			// **
			// check if this email is already registered as member
			$where = array();
			$where['email'] = $post['email'];
			$member_list = $this->member_get_list($where);
			
			// **
			// throw error if email is already registered
			if (count($member_list) > 0) {
				throw new Exception('Pendaftaran member gagal, karena email sudah terdaftar');
			}

			// **
			// object save
			$object = array();
			$object = $post;
			$this->db->insert('member', $object);
			return $this->db->insert_id();
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}