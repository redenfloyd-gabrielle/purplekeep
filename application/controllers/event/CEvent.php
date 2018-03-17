<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEvent extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
    	$this->load->model('user/MEvent');
    	$this->load->model('user/MUser');
    	$this->load->model('user/MTicketType');
    	$this->load->model('user/MTicket');
    	$this->load->model('MNotification');
    	$this->load->model('MCheckout');
	  	$this->load->model('MAnnouncement'); //admin module functionalit
    	$this->load->helper('date');
		$this->load->model('MEventInfo');
		$this->load->model('location/MLocation');
    	$this->error = "";
    	$this->success = "";
    	$this->load->library('form_validation');
	    $this->load->helper('security');
    }


	public function index()
	{

	}

	public function displayMunicipal(){
		if(isset($_POST['region_code'])){
			$code = $_POST['region_code'];
			$where = array("region_code" => $code);
			$result = $this->MLocation->read_where($where);
			// foreach($result as $muni){
			// 	var_dump($muni->location_name);
			// }
			echo json_encode($result);
		}else{
			echo false;
		}
	}

	// query to sort by location
	public function sortByLocation(){
		if(isset($_POST['region_code'])){
			$location_id = $_POST['region_code'];
			$result = $this->MEvent->getAllApprovedEventsAndByLocation($location_id);
			$ht = '';
			foreach ($result as $event) {
				date_default_timezone_set('Asia/Manila');
                $now = new DateTime("now");
                $end = new DateTime($event->dateEnd);
                $start = new DateTime($event->dateStart);
                $interval = date_diff($now, $start);
                $dateS = date_create($event->dateStart);
                $dateE = date_create($event->dateEnd);

                $mintix = $event->tix;
                foreach ($event->tix as $key) {
                    $mintix = ($key->price <= $mintix)? $key->price : $mintix;
                }

                $title = "";
                if(strlen($event->event_name)>=42){
                    $title = substr($event->event_name,0,39)."...";
                }else{
                    $title = $event->event_name;
                }

                if($now < $start){
                	$ht .= '<div>
                				<div class="col-sm-6 col-md-4 p0">
									<div class="box-two proerty-item">
										<div class="item-entry overflow">
										'.($now < $start?($interval->days == 0? "<div class='corner-ribbon top-right sticky red'>Less than a day!</div>": "<div class='corner-ribbon top-right sticky red'>".$interval->days." day/s left!</div>"):"").'

												<h3 class="text-center"><a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'">
													'.$title.'
												</a></h3>
												<div class="item-thumb">
														<a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'">
														</a>
												</div>
												<div style="height:130px;">
												<h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'</h5>
												<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'
                                       			</h5>
												<h5>Event Tickets as low as Php '.$mintix.'!!!</h5></div>
											<div class="dot-hr"></div>
										</div>
									</div>
								</div>
							</div>
					';
                }else if($now >= $start && $now <= $end){
                	$ht .= '<div class="col-sm-6 col-md-4 p0">
								<div class="box-two proerty-item">
									<div class="item-entry overflow">
										<div class="corner-ribbon top-right sticky red">Happening now!</div>

										<h3 class="text-center">
										<a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'">
										'.$title.'
										</a>
										</h3>

										<div class="item-thumb">
		                                    <a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'">
		                                    </a>
                                        </div>
                                        <div style="height:130px;">
                                        <h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'
                                        </h5>
                                        <h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'
                                        </h5>
                                        <h5>Event Tickets as low as Php '.$mintix.'!!!</h5></div>
                                        <div class="dot-hr"></div>
									</div>
								</div>
							</div>
							</div>
					';
                }

			}
			echo $ht;
		}else{
			echo false;
		}
	}

		//This function gets the date from the Calendar Module and sends in to the VCreateEvent.php
	public function viewCreateFromCalendar(){


		if(isset($_POST['startDate']) && isset($_POST['startTime']) && isset($_POST['endDate']) && isset($_POST['endTime']) ){
			$data['start_date'] = $_POST['startDate'];
			$data['start_time'] = $_POST['startTime'];
			$data['end_date'] = $_POST['endDate'];
			$data['end_time'] = $_POST['endTime'];
			$this->load->view('imports/vHeaderSignUpPage');
			$result = $this->load->view('vEventForCalendar',$data,TRUE);
			$this->load->view('imports/vHeaderSignUpPage');
			//$this->viewCreateEvent();
			echo $result;
		}



	}

	public function viewEditFromCalendar(){
		$data1['start'] = $_POST['start'];
		$data1['end'] = $_POST['end'];
		$data1['title'] = $_POST['title'];
		$data1['details'] = $_POST['details'];
		$data1['category'] = $_POST['category'];
		$data1['venue'] = $_POST['venue'];

		$id = $_POST['id'];

		$tid = $this->MEvent->joinEventTicketType($id);


		$data2['ticket_info'] = null;
		if($tid){
			$data2['ticket_info'] = $tid;
		}


        $data = array_merge($data1, $data2);

		$result = $this->load->view('vEditEvent',$data,TRUE);
		//$this->viewCreateEvent();
		echo $result;

	}

	public function viewCreateEvent()
	{
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
                              	$("#user").addClass("active");
                        </script>';
        $data['page_title'] = "Create Event Page";
  		$this->load->view('imports/vHeaderSignUpPage',$data);
		$this->load->view('vNewEvent',$data);
		$this->load->view('imports/vFooterLandingPage');

	}

	public function viewEvents($page)
	{

		$userid = $this->session->userdata['userSession']->userID;

		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		// $strEventSelect = "*, DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart, DATE_FORMAT(event_info.event_date_end,'%d-%b-%y %H:%m') as dateEnd";
		// $strEventWhere = array("user_id" => $userid,
		// 				"event_isActive" => TRUE);
		// $result = $this->MEvent->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($strEventSelect,
		// 					$strEventWhere,FALSE,FALSE,FALSE,FALSE);
		// echo"<pre>";
		// var_dump($result);

		$npages = ($page * 9)-9;
		$result = $this->MEvent->getLimitedEventsByUser($userid,$npages);
		$array = array();
		foreach ($result as $value) {
			$arrObj = new stdClass;
			$arrObj->data = $value;
			$arrObj->data->tix = $this->MEvent->getTicketsOfEvent($value->event_id);

			//Adding of location
			$arrObj->data->location = $this->MLocation->read_where("location_id = ".$value->location_id."");

			$array[] = $arrObj;
		}


		$strEventSelect1 = "*, DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart, DATE_FORMAT(event_info.event_date_end,'%d-%b-%y %H:%m') as dateEnd";
		$strEventWhere1 = array("user_id" => $userid,
						"event_isActive" => TRUE);
		$result1 = $this->MEvent->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($strEventSelect1,
							$strEventWhere1,FALSE,FALSE,FALSE,FALSE);
		$x = 0;
		foreach ($result1 as $value) {
			$x++;
		}
		$num = $x/9;
     	$num = ceil($num);


		$val = array();
		foreach ($array as $key) {
			$arrObj = new stdClass;
			$arrObj = $key->data;
			$val[] = $arrObj;
		}
		$data['events']  = $val;
		////////////STOPS HERE///////////////////////////////////////////////////



		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['user'] = $this->MUser->read($this->session->userdata['userSession']->userID);
		////////////STOPS HERE///////////////////////////////////////////////////


		$data['info'] = $this->MUser->loadUserDetails($userid);
		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['hist']   = $this->MEventInfo->getTransHistory($this->session->userdata['userSession']->userID);
		////////////STOPS HERE///////////////////////////////////////////////////
		$data['checkout'] = $this->MCheckout->showCheckout($this->session->userdata['userSession']->userID);

		for ($i=0; $i < count($data['checkout']) ; $i++) {
			$data['checkout'][$i]->checkoutDetails = $this->MCart->getChekDetails($data['checkout'][$i]->checkId);;
		}
		$data['userid'] = $userid;

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
			$data['page'] = $page;
			$data['ppage'] = 1;
			$data['npage'] = 1;
    		$data['pages'] = $num;
        	$data['page_title'] = "Profile Page";
		$this->load->view('imports/vHeaderLandingPage',$data);
		$this->load->view('vEvents',$data);
		$this->load->view('imports/vFooterLandingPage');
	}

	//redirect View Events Page from Redeem Code error
	public function viewEventsFromCodeError($dataError)
	{
		$userid = $this->session->userdata['userSession']->userID;

		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$gID = $data1 ['events']  = $this->MEvent->read_where('event_id = '.$id.'');
		////////////STOPS HERE///////////////////////////////////////////////////

		$result = $this->MEvent->getLimitedEventsByUser($userid,$page);

		$strEventSelect = "*, DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart, DATE_FORMAT(event_info.event_date_end,'%d-%b-%y %H:%m') as dateEnd";
		$strEventWhere = array("user_id" => $userid,
													 "event_isActive" => TRUE
													);
		$result = $this->MEvent->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($strEventSelect,
							$strEventWhere,FALSE,FALSE,FALSE,FALSE);
		// echo"<pre>";
		// var_dump($result);
		$array = array();
		foreach ($result as $value) {
			$arrObj = new stdClass;
			$arrObj->data = $value;
			$arrObj->data->tix = $this->MEvent->getTicketsOfEvent($value->event_id);

			//Adding of location
			$arrObj->data->location = $this->MLocation->read_where("location_id = ".$value->location_id."");

			$array[] = $arrObj;
		}

		$val = array();
		foreach ($array as $key) {
			$arrObj = new stdClass;
			$arrObj = $key->data;
			$val[] = $arrObj;
		}
		$data['events']  = $val;
		////////////STOPS HERE///////////////////////////////////////////////////



		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['user'] = $this->MUser->read($this->session->userdata['userSession']->userID);
		////////////STOPS HERE///////////////////////////////////////////////////


		$data['info'] = $this->MUser->loadUserDetails($userid);
		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['hist']   = $this->MEventInfo->getTransHistory($this->session->userdata['userSession']->userID);
		////////////STOPS HERE///////////////////////////////////////////////////

		$data['userid'] = $userid;

		/*$data['dataErrorTitle'] = $dataErrorTitle;
		$data['dataErrorMEssage'] = $dataErrorMessage;*/
		$data['dataError'] = $dataError;

		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vEvents',$data);
		$this->load->view('imports/vFooterLandingPage');
	}

	public function displayEventDetails($id)
	{

		$uid = null; //to get organize name
		$eid = null;
		$location_id = null; //get location ID
		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$gID = $data1 ['events']  = $this->MEvent->read_where('event_id = '.$id.'');
		////////////STOPS HERE///////////////////////////////////////////////////
		if($gID){
				foreach ($gID as $k) {
					$eid = $k->event_id;
					$uid = $k->user_id; //retrieve
					$location_id = $k->location_id;
				}



				//////////////////////////////////////////////////////////////////////////////
				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data2['organizer'] = $this->MUser->read_where('account_id = '.$uid.'');
				////////////STOPS HERE////////////////////////////////////////////////////

				$result_data = $this->MTicketType->loadType($eid);
				//////////////////////////////////////////////////////////////////////////////
				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data3['types'] = $this->MTicketType->read_where('event_id = '.$eid.'');
				////////////STOPS HERE////////////////////////////////////////////////////

				// $data4['tixStat'] = $this->MTicketType->getTicketStatus($eid);
				// if(isset($data4['tixStat'])){
				// 	$data = array_merge($data1,$data2,$data3,$data4);
				// }else{

				// }
				$data = array_merge($data1,$data2,$data3);
				//////////////////////////////////////////////////////////////////////////////
				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data['going'] = $this->MEvent->getGoingToEvent($id);
				////////////STOPS HERE////////////////////////////////////////////////////

				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data['user'] = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID));
				$data['location'] = $this->MLocation->read_where('location_id ='.$location_id.'');
				////////////STOPS HERE////////////////////////////////////////////////////

				//////////////////////////////////////////////////////////////////////////////
				$data['id'] = $this->session->userdata['userSession']->userID;
				if($this->error != ""){
					$data['errorMsg']= $this->error;
				 // print_r($data);
				}

				if($this->success != ""){
					$data['successMsg']= $this->success;
				 // print_r($data);
				}
				$result = $this->MPreference->checkIfInterestedAlready($this->session->userdata['userSession']->userID,$eid);

				if($result){
					$data['interested']	= TRUE;
					$data['user_event_preference_id'] = $result[0]->user_event_preference_id;
				}else{
					$data['interested']	= FALSE;
				}
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
        $data['page_title'] = "Event Details Page";
				$this->load->view('imports/vHeaderLandingPage',$data);
				$this->load->view('vEventDetails',$data);
				$this->load->view('imports/vFooterLandingPage');

		}else{
			redirect("CLogin/viewDashboard");
		}


		// $this->load->view('imports/vHeader');
		// $this->load->view('user/vEventRegistration', $data);
		// $this->load->view('imports/vFooter');
		# code...
	}

	public function displayEventDetailsFromCalendar()
	{


		$id = $_POST['id'];



		$uid = null; //to get organize name
		$eid = null;
		$location_id = null; //get location ID
		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$gID = $data1 ['events']  = $this->MEvent->read_where('event_id = '.$id.'');
		////////////STOPS HERE///////////////////////////////////////////////////
		if($gID){
				foreach ($gID as $k) {
					$eid = $k->event_id;
					$uid = $k->user_id; //retrieve
					$location_id = $k->location_id;
				}



				//////////////////////////////////////////////////////////////////////////////
				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data2['organizer'] = $this->MUser->read_where('account_id = '.$uid.'');
				////////////STOPS HERE////////////////////////////////////////////////////

				$result_data = $this->MTicketType->loadType($eid);
				//////////////////////////////////////////////////////////////////////////////
				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data3['types'] = $this->MTicketType->read_where('event_id = '.$eid.'');
				////////////STOPS HERE////////////////////////////////////////////////////

				// $data4['tixStat'] = $this->MTicketType->getTicketStatus($eid);
				// if(isset($data4['tixStat'])){
				// 	$data = array_merge($data1,$data2,$data3,$data4);
				// }else{

				// }
				$data = array_merge($data1,$data2,$data3);
				//////////////////////////////////////////////////////////////////////////////
				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data['going'] = $this->MEvent->getGoingToEvent($id);
				////////////STOPS HERE////////////////////////////////////////////////////

				//================SPRINT 3 INTERFACE MODULE============//
				/////////////////////////////////////////////////////////////////////////////
				$data['user'] = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID));
				$data['location'] = $this->MLocation->read_where('location_id ='.$location_id.'');
				////////////STOPS HERE////////////////////////////////////////////////////

				//////////////////////////////////////////////////////////////////////////////
				$data['id'] = $this->session->userdata['userSession']->userID;
				if($this->error != ""){
					$data['errorMsg']= $this->error;
				 // print_r($data);
				}

				if($this->success != ""){
					$data['successMsg']= $this->success;
				 // print_r($data);
				}
				$result = $this->MPreference->checkIfInterestedAlready($this->session->userdata['userSession']->userID,$eid);

				if($result){
					$data['interested']	= TRUE;
					$data['user_event_preference_id'] = $result[0]->user_event_preference_id;
				}else{
					$data['interested']	= FALSE;
				}

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
					$data['color'] = $_POST['color'];

				$result = $this->load->view("vEventDetailsFromCalendar",$data,true);
				echo $result;

		}else{
			redirect("CLogin/viewDashboard");
		}
	}



	public function buyTicket($tId,$eid)
		{
			// print_r($id);
			// $type = new MTicketType();
			// $where = array('event_id' => $id );
			// $data['tickets'] = $type->loadType($id);
			$res = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID  ));
			if($res){

				$res1 = $this->MTicketType->read_where( array('ticket_type_id' =>$tId  ));
				$result = $res[0]->load_amt - $res1[0]->price;

				if($result >= 0){
					$now = NEW DateTime(NULL, new DateTimeZone('UTC'));


					$data = array('date_sold' => $now->format('Y-m-d H:i:s'),
					  'user_id' => $this->session->userdata['userSession']->userID ,
					  'ticket_type_id' => $tId
	 				  );
					$res = $this->MTicket->insert($data);
				    $cnt = array('ticket_count' =>$res1[0]->ticket_count-1);
				    $where = array('ticket_type_id' => $tId);
					$asd = $this->MTicketType->update1($where, $cnt);

          $result = $this->MUser->update1(array("account_id"=>$this->session->userdata['userSession']->userID),array("load_amt"=>$result));
					// $this->success = "Bought ticket for ".$res1[0]->price;
					// $this->displayEventDetails($eid);

					$uid = $this->session->userdata['userSession']->userID;

					redirect('event/CEvent/displayEventDetails/'.$eid);
				}else{
					$this->session->set_flashdata('error_msg','Insufficient balance!');
					$this->displayEventDetails($eid);
				}

			}
		}
		public function createEvent(){
			if(empty($this->input->post('event_name'))){
				redirect("event/CEvent/viewCreateEvent");
			}

			$flag = true;

			$rules = "strip_tags|trim|xss_clean";
			$this->form_validation->set_rules('event_venue', 'Event Location',$rules.'|required|min_length[2]|max_length[50]');
			$this->form_validation->set_rules('event_name','Event Title',$rules.'|required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('region_code', 'Region',$rules.'|required');
			$this->form_validation->set_rules('municipal-name', 'Municipal',$rules.'|required');
			$this->form_validation->set_rules('dateStart', 'Start Date',$rules.'|required');
			$this->form_validation->set_rules('dateEnd', 'End Date',$rules.'|required');
			$this->form_validation->set_rules('event_category', 'event_category',$rules.'|required');
			$this->form_validation->set_rules('event_details', 'Event Details',$rules.'|required|min_length[5]|max_length[50]');

			if($this->form_validation->run() != FALSE){
				$event = new mEvent();
				$data['event_date_start'] = $this->input->post('dateStart');
				$data['event_date_end'] = $this->input->post('dateEnd');
				$date3 = new DateTime('now');

				$date2=explode(" ", $data3);
				$d = explode ("/", $date2[0]);
				$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
				$date3 = mdate("%Y-%m-%d %H:%i:%s", $ts);

				$date2=explode(" ", $data['event_date_start']);
				$d = explode ("/", $date2[0]);
				$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
				$data['event_date_start'] = mdate("%Y-%m-%d %H:%i:%s", $ts);

				$date2=explode(" ", $data['event_date_end']);
				$d = explode ("/", $date2[0]);
				$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
				$data['event_date_end'] = mdate("%Y-%m-%d %H:%i:%s", $ts);


				if($data['event_date_start'] < $date3 && $data['event_date_end'] < $date3){
          $this->session->set_flashdata('error_msg',"Date start and/or date end has already passed");
          redirect('event/CEvent/viewCreateEvent');
        }if($data['event_date_start'] > $data['event_date_end']){
          $this->session->set_flashdata('error_msg',"Inputted date start is greater than inputted date end");
          redirect('event/CEvent/viewCreateEvent');
        }if( $data['event_date_start'] == $data['event_date_end']){
          $this->session->set_flashdata('error_msg',"Inputted dates should not be the same");
          redirect('event/CEvent/viewCreateEvent');
        }else{
				$data['no_tickets_total'] = 0;
				$data['event_status'] = 'pending';
				$data['event_name'] = $this->input->post('event_name');
				$data['user_id'] = $this->session->userdata['userSession']->userID;
				$data['event_details'] = $this->input->post('event_details');
				$data['event_category'] = $this->input->post('event_category');
				// $data['event_picture'] = null;
				$data['event_venue'] = $this->input->post('event_venue');
				$data['addedAt'] = date('Y-m-d H:i:s');


				//Added location
				$data['location_id'] = $this->input->post('municipal-name');

				$constraint = array('event_venue' => $data['event_venue'], 'location_id' => $data['location_id'], 'event_date_start' => $data['event_date_start'], 'event_date_end' => $data['event_date_end']);
				$res = $this->MEvent->read_where($constraint);
				}
				if(count($res) > 0){
					$flag = false;
				}else{
					$affectedRows = $this->MEvent->insert($data);
					$evt_id = $this->MEvent->db->insert_id();

					$totalNumTix = 0;
					$data1['ticket_name'] = $this->input->post('ticketType1');
					$data1['ticket_count'] = $this->input->post('no_tickets_total1');
					$data1['price'] = $this->input->post('price_tickets_total1');

					$data1['event_id'] = $evt_id;
					$totalNumTix += $data1['ticket_count'];
					$this->MTicketType->insert($data1);

					$datetime1 = new DateTime($this->input->post('dateStart'));
					$datetime2 = new DateTime($this->input->post('dateEnd'));
					$interv = date_diff($datetime2, $datetime1);

					$no = $interv->format('%H:%I:%S');

					if($this->input->post('ticketType2')||$this->input->post('no_tickets_total2')||$this->input->post('no_tickets_total2')){
						$data1['ticket_name'] = $this->input->post('ticketType2');
						$data1['ticket_count'] = $this->input->post('no_tickets_total2');
						$data1['price'] = $this->input->post('price_tickets_total2');


						$data1['event_id'] = $evt_id;
						$totalNumTix += $data1['ticket_count'];
						$this->MTicketType->insert($data1);
					}

					if($this->input->post('ticketType3')||$this->input->post('no_tickets_total3')||$this->input->post('no_tickets_total3')){
						$data1['ticket_name'] = $this->input->post('ticketType3');
						$data1['ticket_count'] = $this->input->post('no_tickets_total3');
						$data1['price'] = $this->input->post('price_tickets_total3');

						$data1['event_id'] = $evt_id;
						$totalNumTix += $data1['ticket_count'];
						$this->MTicketType->insert($data1);
					}

					$where =  array('no_tickets_total' => $totalNumTix );
					$res = $this->MEvent->update($evt_id,$where);
					$flag = $res;

				}
				if($flag){
					$this->session->set_flashdata('success_msg',"Event is successfully created!");
					redirect("event/cEvent/viewEvents/1");
				}
			}else{
				$this->session->set_flashdata('error_msg',validation_errors());
				redirect("event/CEvent/viewCreateEvent");
			}
		}



		public function deleteEvent($id){
			// $event_id = $this->input>post('event_id');
			$data = array('event_isActive'=> 0);
			$v = $this->MUser->updateSpecificEvent($id,$data);
			if($v){
				redirect('event/CEvent/viewEvents/1');
			}else{
				echo "Error...";
			}
			//Code for tests purposes
			/*
			$this->event->deleteEvent(18);
			*/
		}

	public function updateEvent(){
		$this->load->model('events/MEvent','event');

		$event_id = $this->input->post('event_id');
		$event_date_start = $this->input->post('event_date_start');
		$event_date_end = $this->input->post('event_date_end');
		$event_name = $this->input->post('event_name');
		$event_details = $this->input->post('event_details');
		$event_category = $this->input->post('event_category');
		$event_venue = $this->input->post('event_venue');

		//Code for tests purposes
		/*
		$event_id = 18;
		$event_date_start = '2017-10-01 12:12:12';
		$event_date_end = '2017-10-01 12:12:12';
		$no_tickets_total = 15;
		$event_status = 'Approved';
		$event_name = 'Suntukan ng mga SHS sa Bunzel Lobby';
		$event_details = 'Bak-bakan na!';
		$event_category = 'Training';
		$event_venue = 'Consolacion Central Elementary School, Consolacion, Central Visayas, Philippines';
		*/
		//end of code snippet
		$data = array('event_date_start'=>$event_date_start,
					  'event_date_end'=>$event_date_end,
					  'event_name'=>$event_name,
					  'event_details'=>$event_details,
					  'event_category'=>$event_category,
					  'event_venue'=>$event_venue);

			$date3 = new DateTime('now');

			$date2=explode(" ", $date3);
			$d = explode ("/", $date2[0]);
			$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
			$date3 = mdate("%Y-%m-%d %H:%i:%s", $ts);

			$date2=explode(" ", $data['event_date_start']);
			$d = explode ("/", $date2[0]);
			$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
			$data['event_date_start'] = mdate("%Y-%m-%d %H:%i:%s", $ts);

			$date2=explode(" ", $data['event_date_end']);
			$d = explode ("/", $date2[0]);
			$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
			$data['event_date_end'] = mdate("%Y-%m-%d %H:%i:%s", $ts);

			if($data['event_date_start'] < $date3 && $data['event_date_end'] < $date3){
				$this->session->set_flashdata('error_msg',"Date start and/or date end has already passed");
				redirect('event/CEvent/editEvent/'.$event_id);
			}if($data['event_date_start'] > $data['event_date_end'] || $data['event_date_start'] == $data['event_date_end']){
				redirect('event/CEvent/editEvent/'.$event_id);
			}else{
			$v = $this->MUser->updateSpecificEvent($event_id,$data);

		if($v){
			$count = $this->MTicketType->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray('count(ticket_type_id) as cnt',array("event_id"=>$event_id));

		//	var_dump($count->cnt);
			//die();
			for($temp = 0; $temp < intval($count); $temp++){
				$data = array(
					'ticket_name' => $this->input->post('ticketType'.$temp),
					'price' => $this->input->post('price_tickets_total'.$temp),
					'ticket_count' => $this->input->post('no_tickets_total'.$temp)
				);
				//die();
			}
			$this->MTicketType->updateTicketInfo($event_id,$data);
			redirect('cLogin', 'refresh');
		}else{
			echo "Error...";
		}
	  }


	}

	public function updateProfile(){
		$user = new MUser();

		$rules = "strip_tags|trim|xss_clean";
		$this->form_validation->set_rules('uname','first name',$rules.'|required|min_length[6]|max_length[50]');
		$this->form_validation->set_rules('fname','First Name',$rules.'|required|max_length[50]');
		$this->form_validation->set_rules('lname','Last Name',$rules.'|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('midname','Middle initial',$rules.'|required|min_length[1]');
		$this->form_validation->set_rules('email','email',$rules.'|required|min_length[2]|max_length[50]|valid_email');
		$this->form_validation->set_rules('bdate','birthday',$rules.'|required');
		$data = array('user_name' => $this->input->post('uname'),
						  'first_name' => $this->input->post('fname'),
						  'last_name' => $this->input->post('lname'),
						  'middle_initial' => $this->input->post('midname'),
						  'email' => $this->input->post('email'),
						  'birthdate' => $this->input->post('bdate'),
						  'gender' => $this->input->post('gender'),
						  'contact_no' => $this->input->post('contact'),
						  'user_type' => 'Regular'
						);
		if ($this->form_validation->run() != FALSE )
		{
			$date = strtotime($data['birthdate']);
			$valiDate = strtotime('+ 18 year',$date);
			$curDate = strtotime("now");
			
			if($valiDate < $curDate){
				$res = $this->MUser->read_where(array('user_name' => $data['user_name']));
				$res1 = $this->MUser->read_where(array('email' => $data['email']));

				// echo "<pre>";
				// var_dump($res1);
				// die();
				
				if($res && $res[0]->account_id != $this->session->userdata['userSession']->userID){
						$this->session->set_flashdata('error_msg','Username taken');
						$this->data = $data;
						$this->session->set_flashdata('userDetails',json_encode($data));
						redirect("event/CEvent/viewEvents/1");
				}else if($res1 && $res1[0]->account_id != $this->session->userdata['userSession']->userID){
					$this->session->set_flashdata('error_msg','Email taken');
						$this->data = $data;
						$this->session->set_flashdata('userDetails',json_encode($data));
						redirect("event/CEvent/viewEvents/1");

                }else{
                        $this->data = $data;
                        $result = $user->update($this->session->userdata['userSession']->userID,$data);
						if($result){
						  $this->session->set_flashdata('success_msg',"User Profile updated!");
						  redirect("event/CEvent/viewEvents/1");
					    }
                }
			}else{
				$this->session->set_flashdata('userDetails',json_encode($data));
				$this->session->set_flashdata('error_msg','You must be at least 18 years old.');
				redirect("event/CEvent/viewEvents/1");
			}
			
		}else{
			$this->session->set_flashdata('error_msg',validation_errors());
			// redirect("user/cUser/viewSignUp");
			$this->data = $data;
					$this->session->set_flashdata('userDetails',json_encode($data));
					redirect("event/CEvent/viewEvents/1");
		}

	}

        public function updatePassword(){
            $user = new MUser();

            $rules = "strip_tags|trim|xss_clean";
            $this->form_validation->set_rules('password','Password','required|min_length[8]');
            $this->form_validation->set_rules('cpassword','Confirm password','required|matches[password]');
             $data = array('user_name' => $this->input->post('unameb'),
						  'password' => $this->input->post('password'),
						  'OldPassword' => $this->input->post('OldPassword'),
						  'cpassword' => $this->input->post('cpassword'),
						  'first_name' => $this->input->post('fnameb'),
						  'last_name' => $this->input->post('lnameb'),
						  'middle_initial' => $this->input->post('midnameb'),
						  'email' => $this->input->post('emailb'),
						  'birthdate' => $this->input->post('bdateb'),
						  'gender' => $this->input->post('genderb'),
						  'contact_no' => $this->input->post('contactb'),
						  'user_type' => 'Regular'
						);
            if ($this->form_validation->run() != FALSE ){

				$res2 = $this->MUser->read_where(array('account_id' => $this->session->userdata['userSession']->userID,
														"password" => hash('sha512', $data['OldPassword'])));
                if(!$res2){
					$this->session->set_flashdata('error_msg','Password does not match the current password.');
					$this->data = $data;
					$this->session->set_flashdata('userDetails',json_encode($data));
                    echo $data['password'];
                    echo $data['OldPassword'];
                    echo $data['cpassword'];
					redirect("event/CEvent/viewEvents/1");
                }else{
					$data['password'] = hash('sha512',$data['password']);
					unset($data['cpassword']);
					unset($data['OldPassword']);

					$result = $user->update($this->session->userdata['userSession']->userID,$data);

					if($result){
						$this->session->set_flashdata('success_msg',"User Password changed!");
						redirect("event/CEvent/viewEvents/1");
					}
                }
            }else{
                $this->session->set_flashdata('error_msg',validation_errors());
                // redirect("user/cUser/viewSignUp");
                $this->data = $data;
                        $this->session->set_flashdata('userDetails',json_encode($data));
                        redirect("event/CEvent/viewEvents/1");
		    }
        }


		public function upcomingEvents(){
			$this->load->model('events/MEvent','Event');
			$data['events'] = $this->Event->showUpcomingEvents();

			// print_r($data);
			$this->load->view('imports/vHeader');
			$this->load->view('user/vUpcoming.php', $data);
			$this->load->view('imports/vFooter');

		// $this->output->set_content_type('application/json')->set_output(json_encode($result));
		}

		public function editEvent($id){
			$data['ev'] = $this->MUser->getEventDetails($id)->row();
			$data['ti'] = $this->MUser->getTicketDetails($id)->result();


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

			$data['page_title'] = "Edit Event Page";
			$this->load->view('imports/vHeaderSignUpPage',$data);
			$this->load->view('imports/vHeaderSignUpPage');
			$this->load->view('user/vEditEvent', $data);

			$this->load->view('imports/vFooterLandingPage');
		}
		public function interested()
		{
			$uid = $this->session->userdata['userSession']->userID;
			$pref = new MPreference();
			$eid = $this->input->post('eid');
			//print_r($id);
			$now = NEW DateTime(NULL, new DateTimeZone('UTC'));
			$constraint = array('event_id' => $eid, 'user_id' => $uid);
			$res = $pref->read_where($constraint);

			if(null != $res && count($res) > 0){
				$pid = $res[0]->user_event_preference_id;
				$pref->delete($pid);

				echo json_encode(false);
			}else{
				$data = array('preference_date' => $now->format('Y-m-d H:i:s'),
						  'user_id' => $uid ,
						  'event_id' => $eid
		 				  );
				$result = $pref->insert($data);
				echo json_encode(true);
			}
			// if($result){
			// 	//redirect("event/CEvent/viewPreferenceEvents");
			// 	// $this->viewPreferenceEvents();

			// 	echo 1;
			// }
			// //echo $id;
			// # code...
		}
		public function interestedRemove()
		{
			// // $uid = $this->session->userdata['userSession']->userID;
			// // $pref = new MPreference();

			// // $now = NEW DateTime(NULL, new DateTimeZone('UTC'));
			// // $data = array('preference_date' => $now->format('Y-m-d H:i:s'),
			// // 			  'user_id' => $uid ,
			// // 			  'event_id' => $id
		 // // 				  );
			// $id = $this->input->post('check1');
			// //print_r($id);
			// $result = $this->MPreference->delete($id);

			// if($result){
			// 	//redirect("event/CEvent/viewPreferenceEvents");
			// 	// $this->viewPreferenceEvents();
			// 	echo 1;
			// }
			// //echo $id;
			// # code...
		}
		public function viewPreferenceEvents()
		{
			$uid = $this->session->userdata['userSession']->userID;
			$result_data = $this->MPreference->joinEventPrefs($uid);
			//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_name = $value->event_name;
					$arrObj->event_picture = $value->event_picture;
					$arrObj->dateStart = $value->dateStart;
					$arrObj->dateEnd = $value->event_date_end;
					$arrObj->event_category = $value->event_category;
					$arrObj->event_venue = $value->event_venue;
					//Location
					$arrObj->location_name =$value->location_name;
					$arrObj->region_code = $value->region_code;
					$arrObj->tix = $this->MEvent->getTicketsOfEvent($value->event_id);
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data['events'] = $array;
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
            $data['page_title'] = "Interested Event Page";
			$this->load->view('imports/vHeaderLandingPage' ,$data);
			$this->load->view('user/vPrefEvents', $data);

			$this->load->view('imports/vFooterLandingPage');
			# code...
		}

		public function viewEventConfirmation() {
		  $this->load->view('imports/vHeaderLandingPage');
	  	$this->load->view('vEventConfirmation.php');
  		$this->load->view('imports/vFooterLandingPage');
	 }
}
?>
