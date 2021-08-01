<?php

Class ReservasiModel extends CI_Model
{
	public $id_rsv;
	public $tgl_rsv;
	public $jumlah_org;
	public $no_meja;
	public $nama;
	public $no_hp;
	public $email;
	public $id_bayar;


	public function get_all_data_reservasi()
	{
		$query = "SELECT * from reservasi";
		return $this->db->query($query)->result_array();
	}

	function reservasi_get_list($where = null)
	{
		$this->db->join('pembayaran', 'pembayaran.id_bayar = reservasi.id_bayar', 'left');
		if ($where) {
			$this->db->where($where);
		}
		$q = $this->db->get('reservasi');
		return $result = $q->num_rows() > 0 ? $q->result_array() : array();
	}

	function reservasi_save($post)
	{
		try {
			// **
			// object save
			$object = array();
			$object = $post;
			$object['id_user'] = $this->session->userdata()['id_user'] ?? 0;
			$object['id_bayar'] = $post['bayar'];
			$object['kode_reservasi'] = mt_rand(1111111111111,9999999999999);
			unset($object['bayar']);

			// **
			// execute insert
			$this->db->insert('reservasi', $object);
			return $this->db->insert_id();
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	function riwayat_reservasi_get_list()
	{
		$this->db->where('id_user', $this->session->userdata()['id_user']);
		$q = $this->db->get('reservasi');
		return $result = $q->num_rows() > 0 ? $q->result_array() : array();
	}
}