<!-- Add these lines below to pages with customizable elements -->
<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 0");
?>
<!-- Up to here -->

 <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url();?>/CLogin/viewDashBoard"><img src="<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <!-- <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> Logout </button></a> -->
                        <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login" title="Logout"><span class="fas fa-sign-out-alt fa-lg"></span></button></a>
                    </div>
                    <div class="button navbar-right">
                        <!-- <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> Create Event </button></a> -->
                        <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login" title="Create Event"><span class="fas fa-calendar-plus fa-lg"></span></button></a>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">

                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="Home"><a href="<?php echo site_url();?>/CLogin/viewDashBoard"><span class="fas fa-home fa-lg"></span></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="Profile"><a href="<?php echo site_url();?>/event/CEvent/viewEvents/1"><span class="fas fa-user fa-lg"></span></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>' title="Announcements"><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements"><span><i class="fas fa-bell fa-lg"></i></span><?php if($announcementCount>0) {?><span id="bdg" class="badge badge-notify"><?php echo $announcementCount;?></span><?php }?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="Interested Events"><a href="<?php echo site_url();?>/event/CEvent/viewPreferenceEvents"><span class="fas fa-star fa-lg"></span></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="View Cart"><a href="<?php echo site_url();?>/finance/CCart/viewCart"><span class="fas fa-shopping-cart fa-lg"></span></a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->


        <div class="page-head">
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <!-- <h1 class="page-title">Profile</h1> -->
                        <h1 class="page-title"><?php echo CustomizationManager::$strings->PROFILE_PAGE_TITLE ?></h1>
                    </div>
                </div>
            </div>
        </div>
                <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">
                <div class="row">
                <div class="col-md-3 p0 padding-top-40">
                    <div class="blog-asside-right pr0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                            <div class="panel-body search-widget">
                               <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-heading">
                                                <center><p style="font-size: 3em;word-wrap: break-word; border-bottom: solid 3px #CB6C52;" class="panel-title">Php <?php foreach($user as $u){echo $u->load_amt;}?>.00</p></center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                           <p ><?php echo CustomizationManager::$strings->PROFILE_PAGE_INSUFFICIENT_BALANCE ?>
                                                <a style=" color: #e2624b; cursor:pointer; border-bottom: 1.5px solid #e2624b;padding-bottom: 2px"  onMouseOver="this.style.color='#ffcec0';this.style.paddingBottom='8px';this.style.borderBottom='3px solid #e2624b';"    onMouseOut="this.style.color='#e2624b' ;this.style.paddingBottom='2px';" type="button" class="dbutton " id="load" ><?php echo CustomizationManager::$strings->PROFILE_PAGE_LOAD_NOW ?></a>


<!--                                             <button type="button" class="dbutton" data-toggle ="modal" data-target="#lmodal">Load Now</button>
 -->
 <script>
     $("#load").click(function(){
        $("#some").toggle(500);
    });
 </script>
                                        </p>
                                        <div class="row">

                                                <div class="col-xs-12" id="some" hidden="">
                                                    <form action="<?php echo site_url(); ?>/user/CUser/redeemCode" method="post">
                                                        <input type="text" class="form-control" name="ccode" placeholder="Enter code" required="">
                                                        <!-- <button type="submit" class="navbar-btn nav-button pull-right"   >Redeem Code</button> -->
                                                        <button type="submit" class="navbar-btn nav-button pull-right"   ><?php echo CustomizationManager::$strings->PROFILE_PAGE_REDEEM_CODE ?></button>
                                                    </form>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="lmodal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3><img src="img/credit-card.png" class="elogo"> eLoad</h3>
                                        </div>
                                        <div class="modal-body">

                                            <label class="label-control">Card Number</label>
                                            <input type="text" class="form-control" name="" placeholder="Enter Card Number">

                                            <h6 class="note">*Note: you only have 3 attemps to enter correct values</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body search-widget">
                                <fieldset >
                                    <div class="row">
                                        <div class="col-md-12">
                                             <a href="<?php echo site_url()?>/calendar/cCalendar">
                                            <!-- <button class = "button btn largesearch-btn">Calendar</button></a> -->
                                            <button class = "button btn largesearch-btn"><?php echo CustomizationManager::$strings->PROFILE_PAGE_CALENDAR_BUTTON ?></button></a>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <br><br>
                        </div>


                    </div>
                </div>

                <div class="col-md-9  pr0 padding-top-40 properties-page">

<div >
    <div class="container">
        <div class="row es-wrap">
            <div class="event-search">
                <div class="panel-body search-widget">
                    <form action="" class=" form-inline">
                        <fieldset>
                            <div class="col-xs-4 col-lg-4">
                                <input type="text" class="form-control" placeholder="Key word">
                            </div>
<!--                             <div class="col-xs-4 col-lg-2">
                                <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Category">
                                    <option>Attraction</option>
                                    <option>Appearance</option>
                                    <option>Competition</option>
                                    <option>Concert</option>
                                    <option>Conference</option>
                                    <option>Convention</option>
                                    <option>Festival</option>
                                    <option>Gala</option>
                                    <option>Meeting</option>
                                    <option>Party</option>
                                    <option>Rally</option>
                                    <option>Retreat</option>
                                    <option>Screening</option>
                                    <option>Seminar</option>
                                    <option>Tour</option>
                                    <option>Others</option>
                                </select>
                            </div> -->
                            <!-- <div class="col-xs-2 col-lg-2">
                                <div class="price-range-wrap">
                                    <label for="price-range" style="color:#000">Price range (P):</label>
                                        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="5"
                                                        data-slider-value="[0,1000]" id="price-range" ><br />
                                        <b class="pull-left color" style="color:#000">P0.00</b>
                                        <b class="pull-right color" style="color:#000" >P10,000.00</b>
                                </div>
                            </div> -->
                            <div class="col-xs-2 col-lg-2">
                                <input class="button btn smallsearch-btn" value="Search" type="submit">
                             </div>
                        </fieldset>
                    </form>
                 </div>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <?php echo $this->session->flashdata('success_msg') ?>
          </div>
      <?php endif ?>
    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger" style="margin-top: 15px;">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <?php echo $this->session->flashdata('error_msg'); ?>
        </div>
    <?php endif ?>



  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTabs" role="tablist">
    <?php if (!$this->session->flashdata('userDetails')){ ?>
        <li role="presentation" class="tab active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo CustomizationManager::$strings->PROFILE_PAGE_TAB_EVENTS ?></a></li>
    <?php }else{ ?>
        <li role="presentation" class="tab"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo CustomizationManager::$strings->PROFILE_PAGE_TAB_EVENTS ?></a></li>
    <?php } ?>

    <li role="presentation" class="tab"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo CustomizationManager::$strings->PROFILE_PAGE_TAB_REPORTS ?></a></li>
    <li role="presentation" class="tab"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?php echo CustomizationManager::$strings->PROFILE_PAGE_TAB_PAYMENT_HISTORY ?></a></li>
    <?php if ($this->session->flashdata('userDetails')){ ?>
        <li role="presentation" class="tab active"><a href="#editprofile" aria-controls="editprofile" role="tab" data-toggle="tab">Edit Profile</a></li>
    <?php }else{ ?>
        <li role="presentation" class="tab"><a href="#editprofile" aria-controls="editprofile" role="tab" data-toggle="tab">Edit Profile</a></li>
    <?php } ?>


  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
     <?php if (!$this->session->flashdata('userDetails')){ ?>
            <div role="tabpanel" class="tab-pane active" id="home">
    <?php }else{ ?>
        <div role="tabpanel" class="tab-pane" id="home">
    <?php } ?>

        <div class="col-md-12 clear">
            <div id="list-type" class="proerty-th">

                        <?php
                            if(isset($events)){
                                $cnt =1;
                                foreach ($events as $event) {
                                    $cntTx = count($event->tix);
                                    $cHeight = "76px";

                                    if($cntTx > 2){
                                        $cHeight = "0px";
                                    }else if($cntTx > 1){
                                        $cHeight = "17px";
                                    }

                        ?>
                            <div class="col-sm-6 col-md-4 p0" >
                                <div class="box-two proerty-item" style="height:398px;">
                                    <!-- <div class="item-thumb">
                                        <a href="<?php echo site_url();?>/event/CEvent/displayEventDetails/<?php echo $event->event_id;?>"><img  style="max-height: 50px;" src="<?php echo base_url();?><?php echo $event->event_picture; ?>"></a>
                                    </div> -->
                                       <div class="item-entry overflow">
                                       <a href="<?php echo site_url();?>/event/CEvent/displayEventDetails/<?php echo $event->event_id;?>">
                                            <h3 class="text-center" style="padding:50px;background-color:#CB6C52;"> <?php
                                                if(strlen($event->event_name)>=26){
                                                    echo substr($event->event_name,0,23)."...";
                                                }else{
                                                        echo $event->event_name;
                                                }
                                                ?>
                                            </h3>
                                        </a>
                                        <?php
                                                if($event->event_status == 'Approved'){
                                                        date_default_timezone_set('Asia/Manila');
                                                        $now = new DateTime("now");
                                                        $end = new DateTime($event->dateEnd);
                                                        $start = new DateTime($event->dateStart);
                                                        $interval = date_diff($now, $start);

                                                        if($now > $start && $now > $end){
                                                            echo "<h5>Expired!</h5>";

                                                        }else if($now < $start){
                                                            if($interval->days == 0){
                                                                echo "<h5>Less than a day!</h5>";
                                                            }else{
                                                                echo "<h5>$interval->days day/s left!</h5>";
                                                                }

                                                        }else if($now >= $start && $now <= $end){
                                                            echo "<h5>Happening now!</h5>";
                                                        }
                                                    }else{
                                                        echo "<h5>Not yet Approved!</h5>";
                                                    }


                                                ?>
                                            <div style="margin-bottom:<?php echo $cHeight;?>;">
                                             <table class="table-condensed table-responsive" >
                                                                <thead>
                                                                    <th><center>Ticket Name</center></th>
                                                                    <th><center>Ticket Price</center></th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($event->tix as $key) {?>
                                                                    <tr>
                                                                        <td><?php echo$key->name;?></td>
                                                                        <td><?php echo$key->price;?></td>
                                                                    </tr>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                            </div>
                                            <div class="dot-hr"></div>
                                            <div>
                                                <span class="pull-left"><b> Date: </b> <?php echo $event->dateStart;?>  </span>
                                                 <span class="proerty-price pull-right"><?php echo $event->event_status;?> </span>
                                            </div>
                                            <br>
                                        </div>
                                </div>
                            </div>

                        <?php
                                }
                            }
                        ?>
            </div>

            <div class="col-md-12">
                <div class="pull-right">
                    <div class="pagination">
                        <ul>
                            <li><a href = '<?php echo site_url()?>/event/CEvent/viewEvents/<?php if($page !=1){$ppage = $page-1;} echo $ppage?>'>Prev</a></li>
                            <?php
                            for($n=1; $n<=$pages; $n++){
                                echo "<li><a href='".site_url()."/event/CEvent/viewEvents/".$n."'>".$n."</a></li>";
                            }
                            ?>
                            <li><a href = '<?php echo site_url()?>/event/CEvent/viewEvents/<?php if($page != $pages){$ppage = $page+1;} echo $ppage?>'>Next</a></li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
        <div class="col-md-12 clear">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Date Start</th>
                                    <th>Event Status</th>
                                    <th>Event Venue</th>
                                    <th>Event Category</th>
                                    <th>Option</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($events)) {?>
                                    <?php foreach ($events as $e) { ?>
                                        <tr>
                                            <td><?php echo $e->event_id;?></td>
                                            <td><?php echo $e->event_name;?></td>
                                            <td><?php echo $e->dateStart;?></td>
                                            <td><?php echo $e->event_status;?></td>
                                            <td><?php echo $e->event_venue.', '.$e->location[0]->location_name.', '.$e->location[0]->region_code.'';?></td>
                                            <td><?php echo $e->event_category;?></td>
                                            <td>
                                                <div class="panel-body search-widget">
                                                    <fieldset >
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <!-- <a href="<?php echo site_url();?>/reports/cReports/generateRevenue/<?php echo $e->event_id;?>"><button class="button btn largesearch-btn " id="<?php echo $e->event_id;?>">Generate Revenue</button></a> -->

<!-- Button HTML (to Trigger Modal) -->
<a href="#myModal<?php echo $e->event_id;?>" role="button" class="button btn largesearch-btn" data-toggle="modal">Generate Revenue</a>

<!-- Modal HTML -->
<div id="myModal<?php echo $e->event_id;?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title"><?php echo $e->event_name;?></h1>
            </div>
            <div class="modal-body">
                <?php
                $ei = new MEventInfo();
                $res = $ei->getRevenue($e->event_id);
                ?>

                <table class="table table-hover table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Ticket Name</th>
                                <th>Quantity Sold</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gTotal = 0;
                foreach ($res as $r) {
                    $gTotal += ($r->cnt*$r->price);
                ?>
                            <tr>
                                <td><?php echo $r->ticket_name; ?></td>
                                <td><?php echo $r->cnt; ?></td>
                                <td><?php echo $r->price; ?></td>
                                <td><?php echo $r->cnt*$r->price; ?> </td>
                            </tr>
                        <?php
                        }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><h3 style="font-size: 20px; text-align: right; font-weight: 600; padding: 10px;"> Total Revenue: </h3></td>
                                <td>
                                    <div class="panel-heading">
                                        <center><h2 class="panel-title" style="font-size: 30px; font-weight: 600; border-bottom: 3px solid #e2624b; padding: 10px;"> <?php echo $gTotal; ?> </h2></center>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
         <div class="col-md-12 clear">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Amount</th>
                                    <th>Date paid</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($checkout as $c) { ?>
                                        <tr>
                                            <td><?php echo $c->checkId?></td>
                                            <td><?php echo $c->checkTotal?></td>
                                            <td><?php echo $c->checkCreatedOn?></td>
                                            <td>
                                                <div class="panel-body search-widget">
                                                    <fieldset >
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <!-- <a href="<?php echo site_url();?>/reports/cReports/generateRevenue/<?php echo $e->event_id;?>"><button class="button btn largesearch-btn " id="<?php echo $e->event_id;?>">Generate Revenue</button></a> -->

<!-- Button HTML (to Trigger Modal) -->
<a href="#paymentHistory<?php echo $c->checkId;?>" role="button" class="button btn largesearch-btn" data-toggle="modal">View Details</a>

<!-- Modal HTML -->
<div id="paymentHistory<?php echo $c->checkId;?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title"></h1>
            </div>
            <div class="modal-body">

                <table class="table table-hover table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <th style="text-align:center;">Ticket Name</th>
                                <th style="text-align:center;">Quantity Bought</th>
                                <th style="text-align:center;">Price</th>
                                <th style="text-align:center;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $grandTotal = 0;
                            foreach ($c->checkoutDetails as $cd) {
                            ?>
                            <tr style="text-align:center;">
                                <td><?php echo $cd->ticket_name;?></td>
                                <td><?php echo $cd->quantity;?></td>
                                <td><?php echo $cd->total_price / $cd->quantity;?></td>
                                <td><?php echo $cd->total_price; $grandTotal+= $cd->total_price;?></td>
                            </tr>

                        <?php }
                            ?>
                            <tr><td></td><td></td>
                                <td><h3 style="font-size: 20px; text-align: right; font-weight: 600; padding: 10px;"> Total Revenue: </h3></td>
                                <td>

                                    <div class="panel-heading">
                                        <center><h2 class="panel-title" style="font-size: 30px; font-weight: 600; border-bottom: 3px solid #e2624b; padding: 10px;"> <?php echo $grandTotal; ?> </h2></center>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php
                                    /*foreach ($res as $r) {
                                            echo  '<tr>';
                                                    //echo '<td>'.$r->dateSold.'</td>';
                                                    //echo '<td>'.$r->ticket_type_id.'</td>';
                                            echo '</tr>';
                                    }
                                */?>
                            </tbody>
                        </table>
                    </div>

                    <!--view details modal-->
                    <div class="modal fade" id="lmodal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3><img src="img/credit-card.png" class="elogo"> eLoad</h3>
                                </div>
                                <div class="modal-body">

                                    <label class="label-control">Card Number</label>
                                    <input type="text" class="form-control" name="" placeholder="Enter Card Number">

                                    <h6 class="note">*Note: you only have 3 attemps to enter correct values</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>


    </div>
    <?php if ($this->session->flashdata('userDetails')){ ?>
        <div role="tabpanel" class="tab-pane active" id="editprofile">
    <?php
            $info = array();
         $info[] = json_decode($this->session->flashdata('userDetails'));

}else{ ?>
            <div role="tabpanel" class="tab-pane" id="editprofile">
    <?php } ?>

        <h2>Edit Profile</h2>
        <?php foreach($info as $in){ ?>
            <form  method="POST" onsubmit="return validate()" action="<?php echo site_url()?>/event/CEvent/updateProfile">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="first name">First Name</label>
                    <input type="text" <?php  echo 'value="'.$in->first_name.'"';?> class="form-control" pattern="[a-zA-Z\s]+" name="fname" id="fname" required="">
                </div>

                <div class="form-group">
                    <label for="middle initial">Middle Initial</label>
                    <input type="text"  <?php  echo 'value="'.$in->middle_initial.'"';?> class="form-control" pattern="[a-zA-Z]+" name="midname" id="midname" required="">
                </div>

                <div class="form-group">
                    <label for="last name">Last Name</label>
                    <input type="text"  <?php  echo 'value="'.$in->last_name.'"';?> class="form-control" pattern="[a-zA-Z\s]+" name="lname" id="lname" required="">
                </div>

            <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"  <?php  echo 'value="'.$in->email.'"';?> class="form-control" name="email" id="email" pattern="[^ @]*@[^ @]*" required="">
                </div>

            <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date"  <?php  echo 'value="'.$in->birthdate.'"';?> name="bdate" required="" id="bdayt">
            </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender">
                        <option value="Male" <?php  if(isset($in->gender) && $in->gender=="Male"){echo 'selected';}?>>Male</option>
                        <option value="Female" <?php  if(isset($in->gender) && $in->gender=="Female"){echo 'selected';}?>>Female</option>
                        <option value="Other" <?php  if(isset($in->gender) && $in->gender=="Other"){echo 'selected';}?>>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact no">Contact Number (09XX-XXX-XXXX) </label>
                    <input type="text" <?php  echo 'value="'.$in->contact_no.'"';?>  pattern="^(09)\d{2}-\d{3}-\d{4}$|^\d{3}-\d{4}$" class="form-control" name="contact" id="contact" required="">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" minlength="6"<?php  echo 'value="'.$in->user_name.'"';?> required="" class="form-control" pattern="[a-zA-Z0-9]+" name="uname" id="uname">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  class="form-control" required="" minlength="8" pattern="[a-zA-Z0-9]+" name="OldPassword" id="OldPassword">
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><!-- <a href="<?php echo site_url();?>/CEvent/updateProfile"> -->Edit Profile</button>
                </div>


            </div>
            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="modal-title">Edit Profile Confirmation</h2>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"  class="form-control" required="" minlength="8" pattern="[a-zA-Z0-9]+" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password"  class="form-control" required="" minlength="8" pattern="[a-zA-Z0-9]+" name="cpassword" id="cpassword">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" onclick="validate()" class="btn btn-default">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                  </div>
                </div>
              </div> 
            </div>
        </form>
        <?php
            }
        ?>
    </div>


    </div>


  <script type="text/javascript">

    /*
    $(document).ready(function(){
        var wrap = $(this).find('.es-wrap');
        $('.tab a').on('click', function (e) {
            e.preventDefault();
            console.log('clicked');
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');

            target = $(this).attr('href');

            $('.tab-content > div').not(target).hide();

            $(target).fadeIn(600);

        });

        $(this).scroll(function(e){
            if($(this).scrollTop() > 225){
                wrap.addClass("fix-search");
            }else{
                wrap.removeClass("fix-search");
            }
        });
    });/*
</script>

</div>
                </div>
                </div>
            </div>
        </div>



        <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <!-- <h4>About us </h4> -->
                                <h4><?php echo CustomizationManager::$strings->ABOUT_HEADER ?></h4>
                                <div class="footer-title-line"></div>

                               <!-- <img src= "<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>" alt="" class="wow pulse" data-wow-delay="1s" > -->
                               <img src= "<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>" alt="" class="wow pulse" data-wow-delay="1s" >
                                <p><?php echo CustomizationManager::$strings->ABOUT_MESSAGE ?></p>

                                <img src="assets/img/footer-logo.png" alt="" class="wow pulse" data-wow-delay="1s">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <!-- <h4>Contact Us</h4> -->
                                <h4><?php echo CustomizationManager::$strings->CONTACT_US_HEADER ?></h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> USC TC - Nasipit Talamban Cebu City</li>
                                    <li><i class="pe-7s-mail strong"> </i> dailyevents@gmail.com</li>
                                    <li><i class="pe-7s-call strong"> </i> +1 908 967 5906</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

           <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="pull-left">
                            <span> (C) UI Module , All rights reserved 2017  </span>
                        </div>
                        <div class="bottom-menu pull-right">
                         <ul>
                            <li><a class="wow fadeInUp animated" href="<?php echo site_url();?>/CLogin/viewDashBoard" data-wow-delay="0.2s"><?php echo CustomizationManager::$strings->FOOTER_NAV_HOME ?></a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<div id="errorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" id="errorTitle"></h3>
      </div>
      <div class="modal-body">
        <p id="errorMessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php
  if(isset($dataError)){
    if($dataError == "CodeInvalid") {
        echo "<script type = 'text/javascript'>
                $(document).ready(function(){
                  $('#errorModal').modal('show');

                  document.getElementById('errorTitle').innerHTML = 'CODE INVALID';
                  document.getElementById('errorMessage').innerHTML = 'The code you entered is not found. Please make sure you entered a valid code.';

                });
              </script>";
    } else if ($dataError == "CodeUsed") {
        echo "<script type = 'text/javascript'>
                $(document).ready(function(){
                  $('#errorModal').modal('show');

                  document.getElementById('errorTitle').innerHTML = 'CODE ALREADY USED';
                  document.getElementById('errorMessage').innerHTML = 'The code you entered has already been used. Please use a new one.';

                });
              </script>";
    }
  }
?>

<script type="text/javascript">
    function validate(){
        var bdate = document.getElementById("bdayt").value;
        var date = new Date(bdate);
        var year = date.getFullYear() + 18;
        var validateDate = new Date();
        var validateYear = validateDate.getFullYear();
        if(year < validateYear){
          return true;
        }else{
          alert("You are below 18");
          return false;
        }
    }
</script>

<script type="text/javascript">
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("bdate").setAttribute("max", today);
</script>
