<?php
	class MCheckout extends MY_Model{
		const DB_TABLE = "checkout";
		const DB_TABLE_PK = "checkId";

		public function __construct(){
			
		}

		public function getLastAdded(){
			$this->db->select("checkId");
			$this->db->from("checkout");
			$this->db->order_by("checkId", "DESC", "limit 1");
			
			$query = $this->db->get();
			return $query->result();
		}
	}
?>
