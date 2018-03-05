<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCart extends CI_Controller {

	function __construct() {
		parent::__construct();
	 	$this->load->model('MCart');
	 	$this->load->model('MTicket');
	 	$this->load->model('MTicketType');
	 	$this->load->model('MUser');
	 	$this->load->model('MAnnouncement');
	 	$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->model('MCheckout');
	}

	public function index() {
	}

	public function getCart () {
		$mc = new MCart();

		echo json_encode($mc->read_where(array("account_id" => 3, "status"=> "active")));
		// $carts = $this->input->post('cart');
		// echo $carts;
		
	}

	public function getLimit () {
		$tm = new MTicketType();

		$id = $this->input->post('id');

		$data = $tm->read_where(array("ticket_type_id" => $id));

		foreach($data as $d) {
			echo $d->ticket_count;
		}
	}

	public function addToCart () {
		$cart = new MCart();
		//$qty = $this->input->post('qty1')
		$qty= $this->input->post('qty1');
		$id = $this->input->post('ticket'); //ticket id
		$cart_id = 0;


		
		//check if ticket already exist!
		$data = $cart->read_where(array ("ticket_id"=>$id,
										 "account_id"=>$this->session->userdata['userSession']->userID,
										 "status"=>'active'
										)
								);
		foreach ($data as $datum) {
			$cart_id = $datum->cart_id;
		}

		//check if cart_id != 0, if the data exist!
		if ($cart_id != 0) {
			//add to existing
			echo $cart_id;
			$this->addToExisting($cart_id, $qty);
		} else { //add new cart item

			
			$ticketPrice = $this->MTicketType->getTicketPrice($id);
			$data = array ('cart_id'=>null,
				'ticket_id'=>$id,
				'quantity'=>$qty,
				'total_price'=>$ticketPrice[0]->price * $qty,
				"account_id"=>$this->session->userdata['userSession']->userID);

			if ($cart->insert($data) > 0) {
				redirect("finance/CCart/viewCart");
			} else {
				echo 'Failed!';
			}
		}
	}

	//add to existing cart item
	public function addToExisting ($id, $qty1) {
		
		//$id = 1; //cart id here
		$qty = 0;

		//get the current ticket qty
		$data = $this->MCart->read($id);
		$ticket_id = 0;
		foreach ($data as $datum) {
			$qty = $datum->quantity;
			$ticket_id = $datum->ticket_id;
		}
		$qty += $qty1;

		$ticketPrice = $this->MTicketType->getTicketPrice($ticket_id);

		$affectedFields = array ('quantity'=>$qty,
								'total_price'=>$qty * $ticketPrice[0]->price);
		$where = array ('cart_id'=>$id);

		
		
		if ($this->MCart->update1($where, $affectedFields) > 0) {
			redirect("finance/CCart/viewCart");
		} else {
			echo 'Failed!';
		}
	}

	public function viewCart(){
		if(isset($this->session->userdata['userSession'])){
			$data['events'] = $this->MCart->getCart();
		$data['announcements'] = $this->MAnnouncement->getUnviewedOfUser($this->session->userdata['userSession']->userID);
		$data['announcementCount'] = count($data['announcements']);
		if(count($data['announcements']) == 0){
			$data['announcements'] = NULL;
		}
		
			$array1 = array();
			if($data['announcements']){
				foreach ($data['announcements'] as $value) {
						$arrObj = new stdClass;
						$arrObj->announcementID = $value->announcementID;
						$arrObj->announcementDetails = $value->announcementDetails;
						$arrObj->first_name = $value->first_name;
						$arrObj->last_name = $value->last_name;
						if($value->sec){
							$arrObj->ago =$value->sec;  
							$arrObj->agoU ="seconds ago";  
						}else if($value->min){
							$arrObj->ago =$value->min; 
							$arrObj->agoU ="minutes ago";   
						}else if($value->hr){
							$arrObj->ago =$value->hr;  
							$arrObj->agoU ="hours ago";  
						}else if($value->day){
							$arrObj->ago =$value->day; 
							$arrObj->agoU ="days ago";   
						}
						$array1[] = $arrObj;
				}
			}
			$data['announcements'] = $array1;
			
		$this->data['custom_js']= '<script type="text/javascript">

                              $(function(){

                              	$("#dash").addClass("active");

                              });

                        </script>';

        $data['user'] = $this->MUser->read($this->session->userdata['userSession']->userID);
        $data['total'] = $this->MCart->getTotal($this->session->userdata['userSession']->userID);
		
		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vCart',$data);	
		$this->load->view('imports/vFooterLandingPage');
		}else{
			redirect("CLogin");
		}
		
		
	}
	//add 1 qty to the cart
	public function addQty () {
		$cart = new MCart();
		$id = $this->input->post("id"); //cart id here
		$qty = $this->input->post("quantity");
		
		$affectedFields = array ('quantity'=>$qty);
		$where = array ('cart_id'=>$id);
		$cartDetails = $this->MCart->read_where($where);
		
		$ticketPrice = $this->MTicketType->getTicketPrice($cartDetails[0]->ticket_id);
		// echo $cartDetails[0]->total_price +$ticketPrice[0]->price;
		$affectedFields['total_price'] = $cartDetails[0]->total_price +$ticketPrice[0]->price;
		if ($cart->update1($where, $affectedFields) > 0) {
			echo $cartDetails[0]->total_price +$ticketPrice[0]->price."||".$id;
		} else {
			echo 'Failed!';
		}
	}

	//minus 1 qty to the cart
	public function minusQty () {
		$cart = new MCart();
		$id = $this->input->post("id"); //cart id here
		$qty = $this->input->post("quantity");
		
		if ($qty == 0) {
			$cart->delete($id);
		} else {
			$affectedFields = array ('quantity'=>$qty);
			$where = array ('cart_id'=>$id);
		$cartDetails = $this->MCart->read_where($where);
		
		$ticketPrice = $this->MTicketType->getTicketPrice($cartDetails[0]->ticket_id);
		
		$affectedFields['total_price'] = $cartDetails[0]->total_price -$ticketPrice[0]->price;
		
			if ($cart->update1($where, $affectedFields) > 0) {
				echo $cartDetails[0]->total_price -$ticketPrice[0]->price."||".$id;
			} else {
				echo 'Failed!';
			}
		}
	}
	//minus 1 qty to the cart
	public function deleteCartItem () {
		$cart = new MCart();
		$id = $this->input->post("id"); //cart id here
		
		$affectedFields = array ('status'=>"deleted");
		$where = array ('cart_id'=>$id);

		if ($cart->update1($where, $affectedFields) > 0) {
			redirect("finance/CCart/viewCart");
		} else {
			echo 'Failed!';
		}

	}
	public function checkout(){
		$idchecked = $this->input->post('input01');
		$idchecked = explode("/", $idchecked);
		$finalChecked = array();
		//get all white spaces
		foreach ($idchecked as $id) {
			if ($id != 0) {
				array_push($finalChecked,$id);
			}
		}

		if (empty($finalChecked)) {
			$this->session->set_flashdata('error_msg',"No Cart item selected!");
		 	redirect("finance/CCart/viewCart");
		}

		$total = 0;
		foreach ($finalChecked as $key) {
			$query = $this->MCart->read_where(array('ticket_id' => $key,"status"=>"active","account_id"=>$this->session->userdata['userSession']->userID));
			echo json_encode($query);
			foreach($query as $q) {
				$total += $q->total_price; 
			}
			
		}

		$user = $this->MUser->read($this->session->userdata['userSession']->userID);
		$loadamount = 0;
		foreach ($user as $u) {
			$loadamount = $u->load_amt;
		}

		if($loadamount >= $total){
			//update cart status
			foreach ($finalChecked as $d) {
				$cart = array ("status" => "deleted");
				$where = array ("ticket_id" => $d);

				$this->MCart->update1($where, $cart);

				//nya add checkout
				$checkout = new MCheckout();
				$chck = array ("account_id" => 3,
							   "checkTotal" => $total);
				$checkout->insert($chck);

				//nya kuha id
				$checkoutData = $checkout->getLastAdded();
				$checkId = 0;
				foreach($checkoutData as $c) {
					$checkId = $c->checkId;
				}

				$cart = array ("checkoutId" => $checkId);
				$where = array ("ticket_id" => $d);
				$this->MCart->update1($where, $cart);

				$newload = $loadamount - $total;
				$this->MUser->update(3, array("load_amt" => $newload));

				$this->session->set_flashdata('success_msg',"Successfully Checkedout!");
				redirect("finance/CCart/viewCart");
			}
		}else{
			$this->session->set_flashdata('error_msg',"Insufficient balance!");
			redirect("finance/CCart/viewCart");
		}



		// $checked = $this->input->post('ticket');
		// $cnt = 0;
		// $retval =0;
		// if($checked){
		// 	foreach ($checked as $key) {
		// 		$query = $this->MCart->read_where(array('cart_id' => $key));
		// 		$retval += $query[0]->total_price; 
		// 	}
			
		// 	$user = $this->MUser->read($this->session->userdata['userSession']->userID);
			
		// 	if($user[0]->load_amt >= $retval){
		// 		foreach ($checked as $key) {
		// 			$query = $this->MCart->read_where(array('cart_id' => $key));
		// 			for ($i=0; $i < $query[0]->quantity; $i++) { 
		// 					$now = NEW DateTime(NULL, new DateTimeZone('UTC'));
		// 					$data = array('date_sold' => $now->format('Y-m-d H:i:s'),
		// 							  'user_id' => $this->session->userdata['userSession']->userID ,
		// 							  'ticket_type_id' => $query[0]->ticket_id
		//  				  				);
		// 					$res = $this->MTicket->insert($data);

		// 			}
		// 			$this->MCart->update($key,array("status"=>"deleted"));
		// 		}
		// 		$newLoad = $user[0]->load_amt - $retval;
		// 		$result = $this->MUser->update($this->session->userdata['userSession']->userID,array("load_amt"=>$newLoad));
		// 		$this->session->set_flashdata('success_msg',"Successfully Checkedout!");
		// 		redirect("finance/CCart/viewCart");
		// 	}else{
		// 		$this->session->set_flashdata('error_msg',"Insufficient balance!");
		// 		redirect("finance/CCart/viewCart");
		// 	}
		// }else{
		// 	$this->session->set_flashdata('error_msg',"No Cart item selected!");
		// 	redirect("finance/CCart/viewCart");
		
		// }

	}
	public function checkBalance(){
		$checked = $this->input->post('ticket');
		$cnt =0 ;
		$retval =0;
		if($checked){
			foreach ($checked as $key) {
				$query = $this->MCart->read_where(array('cart_id' => $key));
				$retval += $query[0]->total_price; 
			}
			$user = $this->MUser->read($this->session->userdata['userSession']->userID);
			
			if($user[0]->load_amt >= $retval){
				echo "sufficient";
			}			
		}else{
			echo "No Cart item selected!";
		}
		
		// echo $retval;
	}
}