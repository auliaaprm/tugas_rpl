<?php

Class PesananModel extends CI_Model
{
	// public $id_pesanan;
	public $id_user;
	public $shipment;
	public $id_menu;
	public $total_harga;
	public $alamat;
	public $keterangan;


	public function get_all_data_pesanan()
	{
		$query = "SELECT menu.*, pesanan.*, user.* from pesanan
		left join menu on menu.id_menu = pesanan.id_menu
		left join user on user.id_user = pesanan.id_user";
		return $this->db->query($query)->result_array();
	}

	function pesanan_get_list($where = null)
	{
		$this->db->from('pesanan');
		$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
		$this->db->join('user', 'user.id_user = pesanan.id_user');
		if ($where) {
			$this->db->where($where);
		}
		$q = $this->db->get();
		return $result = $q->num_rows() > 0 ? $q->result_array() : array();
	}

	function pesanan_save($post)
	{
		try {
			// **
			// check if there's same item on the cart by getting the list of pesanan of this current user
			$where = array();
			$where['pesanan.id_user'] = $this->session->userdata()['id_user'];
			$where['pesanan.id_menu'] = $post['id_menu'];
			$where['id_bayar'] = $post['id_bayar'];
			$pesanan_list = $this->pesanan_get_list($where);
			
			// **
			// if pesanan is already exist
			if (count($pesanan_list) > 0) {
				$pesanan_details = $pesanan_list[0];
				$post['total_harga'] += $pesanan_details['total_harga'];
				$post['item_amount'] += $pesanan_details['total_item'];
			}

			// **
			// object save
			$object = array();
			if (!empty($pesanan_details)) {
				$object['id_pesanan'] = $pesanan_details['id_pesanan'];
			}
			$object['id_menu'] = $post['id_menu'];
			$object['id_user'] = $this->session->userdata()['id_user'];
			$object['total_item'] = $post['item_amount'];
			$object['total_harga'] = $post['total_harga'];

			// **
			// if pesanan_details is set, do update
			// else, do insert
			if (!empty($pesanan_details)) {
				$this->db->where('id_pesanan', $pesanan_details['id_pesanan']);
				$this->db->update('pesanan', $object);
				$affected_rows = $this->db->affected_rows();
			} else {
				$this->db->insert('pesanan', $object);
				$affected_rows = $this->db->insert_id();
			}

			// **
			// check if there are rows affected. either by insertion, or update
			if (!$affected_rows) {
				throw new Exception('Gagal memasukkan barang ke keranjang');
			}
			return $this->db->insert_id();
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}