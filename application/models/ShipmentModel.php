<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShipmentModel extends CI_Model {

	function shipment_get_list($where=null)
	{
		if ($where) {
			$this->db->where($where);
		}
		$q = $this->db->get('shipment');
		return $result = $q->num_rows() > 0 ? $q->result_array() : array();
	}

}

/* End of file ShipmentModel.php */
/* Location: ./application/models/ShipmentModel.php */