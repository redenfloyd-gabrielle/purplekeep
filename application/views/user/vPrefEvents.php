<!-- Add these lines below to pages with customizable elements -->
<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 1");
?>
<!-- Up to here -->

    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>

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
                        <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"><?php echo CustomizationManager::$strings->LOGOUT_BUTTON ?> </button></a>
                    </div>

                    <div class="button navbar-right">
                        <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> <?php echo CustomizationManager::$strings->CREATE_EVENT_BUTTON ?> </button></a>
                    </div>

                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/CLogin/viewDashBoard"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_HOME ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewEvents"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_PROFILE ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>'><a href="<?php echo site_url();?>/user/CUser/viewAnnouncements"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_ANNOUNCEMENTS ?><?php if($announcementCount>0) {?><span id="bdg" class="ballons"><?php echo $announcementCount;?></span><?php }?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewPreferenceEvents"><?php echo CustomizationManager::$strings->NAV_INTERESTED ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/CCart/viewCart"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_VIEW_CART ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head">
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><?php echo CustomizationManager::$strings->INTERESTED_PAGE_TITLE ?></h1>               
                    </div>
                </div>
            </div>
        </div>

        <!-- property area -->
         <div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
         <div class="container">
             <div class="row">
                <div class="col-md-12 ">
                    <div id="list-type" class="proerty-th">
                        <?php
                            $cnt =1;
                            if(isset($events)){
                                 foreach ($events as $event) {
                                    date_default_timezone_set('Asia/Manila');
                                    $now = new DateTime("now");
                                    $end = new DateTime($event->dateEnd);
                                    $start = new DateTime($event->dateStart);
                                    $interval = date_diff($now, $start);

                                    if($now < $start){
                                                echo '<div class="col-sm-6 col-md-4 p0" >';
                                                    echo '<div class="box-two proerty-item">';
                                                        echo '<div class="item-entry overflow" >';

                                                                if($now < $start){
                                                                    if($interval->days == 0){
                                                                        echo '<div class="corner-ribbon top-right sticky red">Less than a day!</div>';
                                                                    }else{
                                                                        echo '<div class="corner-ribbon top-right sticky red">'.$interval->days;
                                                                        echo ' day/s left!';
                                                                        echo '</div>';
                                                                    }
                                                                }

                                                                echo '<h3 class="text-center"><a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'"> ';

                                                                if(strlen($event->event_name)>=42){
                                                                    echo substr($event->event_name,0,39)."...";
                                                                }else{
                                                                    echo $event->event_name;
                                                                }

                                                                echo '</a></h3>';

                                                                echo '<div class="item-thumb">
                                                                <a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'"></a></div>';

                                                                echo '<h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'</h5>';

                                                                $dateS = date_create($event->dateStart);
                                                                $dateE = date_create($event->dateEnd);
                                                                echo '<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'</h5>';



                                                                $mintix = $event->tix;
                                                                foreach ($event->tix as $key) {
                                                                    $mintix = ($key->price <= $mintix)? $key->price : $mintix;
                                                                }
                                                                echo '<h5>Event Tickets as low as Php '.$mintix.'!!!</h5>';
                                                                echo '<div class="dot-hr"></div>
                                                            </div>
                                                        </div>
                                                    </div>';

                                            }else if($now >= $start && $now <= $end){
                                                echo ' <div class="col-sm-6 col-md-4 p0">';
                                                    echo '<div class="box-two proerty-item">';
                                                        echo '<div class="item-entry overflow" >';
                                                                echo '<div class="corner-ribbon top-right sticky red">Happening now!</div>';


                                                                echo '<h3 class="text-center"><a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'"> ';

                                                                if(strlen($event->event_name)>=42){
                                                                    echo substr($event->event_name,0,39)."...";
                                                                }else{
                                                                    echo $event->event_name;
                                                                }

                                                                echo '</a></h3>';

                                                                echo '<div class="item-thumb">
                                                                <a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'"></a></div>';

                                                                echo '<h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'</h5>';

                                                                $dateS = date_create($event->dateStart);
                                                                $dateE = date_create($event->dateEnd);
                                                                echo '<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'</h5>';
                                                                $mintix = $event->tix;
                                                                foreach ($event->tix as $key) {
                                                                    $mintix = ($key->price <= $mintix)? $key->price : $mintix;
                                                                }
                                                                echo '<h5>Event Tickets as low as Php '.$mintix.'!!!</h5>';
                                                                echo '<div class="dot-hr"></div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            }
                                }
                            }
                        ?>
                    </div>
                </div>
             </div><!-- END OF ROW-->
         </div>
      </div>
     <!--- END OF CONTENT AREA-->

        <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                       <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4><?php echo CustomizationManager::$strings->ABOUT_HEADER ?></h4>
                                <div class="footer-title-line"></div>
                              <img src= "<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>" alt="" class="wow pulse" data-wow-delay="1s" >
                                <p><?php echo CustomizationManager::$strings->ABOUT_MESSAGE ?></p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4><?php echo CustomizationManager::$strings->CONTACT_US_HEADER ?></h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> <?php include ('/../vAddress.php');?></li>
                                    <li><i class="pe-7s-mail strong"> </i> <?php include ('/../vEmail.php');?></li>
                                    <li><i class="pe-7s-call strong"> </i> <?php include ('/../vContactNo.php');?></li>
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
                                <li><a class="wow fadeInUp animated" href="<?php echo site_url();?>/CLogin/viewDashBoard" data-wow-delay="0.2s">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Audio -->
        <audio id = "audio-wishlist" src = "../../../assets/customization1Assets/audio/wishlist.wav"></audio>

        <script>
        $(document).ready(function(){
          $('#audio-wishlist').trigger('play');
        });
        </script>
