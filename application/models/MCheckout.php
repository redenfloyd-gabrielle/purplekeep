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

		public function showCheckout ($id) {
			$this->db->select("*");
			$this->db->from("checkout");
			$this->db->from("cart");
			// $this->db->join("cart", "cart.checkoutId = checkout.checkId", "right");
			$this->db->join("ticket_type as tt","tt.ticket_type_id = cart.ticket_id","left");
			$this->db->join("event_info as ei","tt.event_id = ei.event_id","left");
			$this->db->where("checkout.account_id", $id);
			$this->db->where("cart.checkoutId = checkout.checkId");
			$this->db->group_by("checkout.checkId");

			
			$query = $this->db->get();
			// echo $this->db->last_query();
			// die();
			return $query->result();
		}
	}
?>
