<?php

Class MenuModel extends CI_Model
{
	public $id_menu;
	public $nama_menu;
	public $harga_menu;
	public $gambar_menu;
	public $id_kategori;


	public function get_all_data_menu()
	{
		$query = "SELECT * from menu";
		return $this->db->query($query)->result_array();
	}

	function get_kategori()
	{
		$query = $this->db->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");

		return $query->result_array();
	}

	function menu_get_list($where = null)
	{
		if ($where) {
			$this->db->where($where);
		}
		$q = $this->db->get('menu');
		return $result = $q->num_rows() > 0 ? $q->result_array() : array();
	}

	function pesanan_hitung_total_harga($post)
	{
		try {
			// **
			// first, we get the details of menu by accessing menu_get_list function
			// this is where condition
			$where = array();
			$where['id_menu'] = $post['id_menu'];
			$menu_list = $this->menu_get_list($where);
			if (count($menu_list) < 1) {
				throw new Exception('Menu tersebut tidak ada dalam database');
			}
			$menu_details = $menu_list[0];

			return $total_harga = (int)$post['item_amount'] * (int)$menu_details['harga_menu'];
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}