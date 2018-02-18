<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCart extends CI_Controller {

	function __construct() {
		parent::__construct();
	 	$this->load->model('MCart');
	 	$this->load->model('MTicket');
	 	$this->load->model('MTicketType');
	 	$this->load->model('MUser');
	 	$this->load->library('form_validation');
		$this->load->helper('security');
	}

	public function index() {
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

		$data['events'] = $this->MCart->getCart();
		
		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vCart',$data);	
		$this->load->view('imports/vFooterLandingPage');
		
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

	}
	public function checkBalance(){
		$checked = $this->input->post('ticket');
		
		$retval =0;
		foreach ($checked as $key) {
			$query = $this->MCart->read_where(array('cart_id' => $key));
			$retval += $query[0]->total_price; 
		}
		$user = $this->MUser->read($this->session->userdata['userSession']->userID);
		if($user[0]->load_amt >= $retval){
			echo "sufficient";
		}
		// echo $retval;
	}
}