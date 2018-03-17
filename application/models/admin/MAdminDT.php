<?php
    class MAdminDT extends MY_model  {

		const DB_TABLE = "card";
		const DB_TABLE_B = "user_account";
		// const DB_TABLE_PK = "announcementID";

		public function fetchCardModel(){
			$searchColumn = array("card.cardId",
								"card.cardCode",
								"card.cardAmount",
								"card.cardStatus",
								"ua.first_name",
								"ua.last_name",
								"DATE_FORMAT(card.addedAt,'%d-%b-%y %h:%m') as addedAt",
								"DATE_FORMAT(card.updatedAt,'%d-%b-%y %h:%m') as updatedAt",
								"ua1.first_name as 'buyerF'",
								"ua1.last_name as 'buyerL'");


			$this->db->select($searchColumn);
			$this->db->from($this::DB_TABLE);
			$this->db->join("user_account as ua",'card.addedBy = ua.account_id');
			$this->db->join("user_account as ua1","card.updatedBy = ua1.account_id","left");

			$query = $this->db->get();
			// echo		$this->db->last_query();
			// 	die();

			return $query->result();

		}
		// public function fetchCardModel()
		// {
		// 	$searchColumn = array("cardId",
		// 							"cardCode",
		// 							"cardAmount",
		// 							"cardStatus",
		// 							"first_name",
		// 							"last_name",
		// 							"addedAt",
		// 							"updatedAt");

		// 	$select_column = array("cardId",
		// 							"cardCode",
		// 							"cardAmount",
		// 							"cardStatus",
		// 							"first_name",
		// 							"last_name",
		// 							"addedAt",
		// 							"updatedAt");
		// 	 $order_column = array("cardId",
		// 							"cardCode",
		// 							"cardAmount",
		// 							"cardStatus",
		// 							"first_name",
		// 							"last_name",
		// 							"addedAt",
		// 							"updatedAt");

		// 	$this->db->select($select_column);
		// 	$this->db->from($this::DB_TABLE);
		// 	$this->db->join($this::DB_TABLE_B,'card.addedBy = user_account.account_id');

		// 	$i = 0;

		// 	foreach($searchColumn as $item){
		// 			if(isset($_POST["search"]["value"])){
		// 				if($i === 0){
		// 					$this->db->group_start();
		// 					$this->db->like($item,$_POST["search"]["value"]);
		// 				}else{
		// 					$this->db->or_like($item,$_POST["search"]["value"]);
		// 				}
		// 				if(count($searchColumn)-1 == $i){
		// 					$this->db->group_end();
		// 				}
		// 			}
		// 			$i++;
		// 	}

		// 	if(isset($_POST["order"])){
		// 		$this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		// 	}else{
		// 		$this->db->order_by("cardStatus","DESC");
		// 	}

		// }

		// public function make_datatables_card()
		// {

		// 	$this->fetchCardModel();

		// 	if($_POST["length"] != -1){
		// 		$this->db->limit($_POST["length"],$_POST["start"]);
		// 	}

		// 	$query = $this->db->get();

		// 	return $query->result();
		// }

		// function get_filtered_data_card()
		// {
		// 	$this->fetchCardModel();
		// 	$query = $this->db->get();
		// 	return $query->num_rows();
		// }

		// function get_all_data_card()
		// {
		// 	$this->db->select("*");
		// 	$this->db->from($this::DB_TABLE);

		// 	return $this->db->count_all_results();
		// }
    } 
?>
