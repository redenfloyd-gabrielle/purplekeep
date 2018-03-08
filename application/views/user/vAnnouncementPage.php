<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 2");
?>
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
                    <a class="navbar-brand" href="<?php echo site_url();?>/CLogin/viewDashBoard"><img src= "<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>"></a>
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
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>' title="Announcements"><a href="<?php echo site_url();?>/user/CUser/viewAnnouncements"><span class="fas fa-bell fa-lg"></a></li>
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
                        <h1 class="page-title">Announcements</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->


        <?php
            if($announcements!=FALSE){
                foreach ($announcements as $announcement) {
                    if($announcement->announcementStatus != "Finished") {
                        $date = date("m-d-Y", strtotime($announcement->addedAt));
                    ?>

                        <div class='card'>
                            <div class='thumbnail'><img src="<?php echo base_url('assets/nikkiAssets/img/default_user.png')?>">'</div>

                            <?php
                                echo "
                                    <div class='right'>
                                        <div id='".$announcement->announcementID."'>
                                        </div>

                                        <p class='title'>
                                          ".(($announcement->announcementTitle)?strtoupper($announcement->announcementTitle):'THIS ANNOUNCEMENT HAS NO TITLE')."
                                        </p>

                                        <div class='separator'></div>

                                        <p>".$announcement->announcementDetails."</p>

                                        <div class='author'>
                                          <span class='box-text'>".$announcement->first_name." ".$announcement->last_name."</span>
                                        </div>

                                        <div class='date'>
                                         <span class='box-text'>".$date."</span>
                                        </div>

                                     </div>

                                "
                            ?>

                            </div>
                        </div>

                    <?php
                        ;
                    }
                }
            }else{
                echo "<center><h2>No announcements this time.</h2></center>";
            }
        ?>





        <div id="createAnnouncement" class="modal fade" tabindex="-1" data-width="650">
            <div class="modal-header bg-inverse bd-inverse-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h1 class="modal-title" align="center">CREATE AN ANNOUNCEMENT</h1>
            </div>

            <div class="modal-body">
                <div class="panel-body">

          <!-- Modal content-->
                    <form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/CAdmin/createAnnouncement">

                        <div class="form-group" >
                            <label for="" class="col-8 control-label">Announcement:</label>
                            <div class="col-8">
                                <textarea class="form-control" type="text" name="announcementDetails" required="" style="min-height: 300px; max-height: 300px;"></textarea>
                            </div>
                        </div>

                        <div class="form-group" >
                            <div class="col-8">
                                <input class="form-control hidden" type="text" name="postedBy" value="<?php echo $ownAccount->account_id; ?>">
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                            <input id="" class="btn btn-primary" type="submit"  name="action" value="Announce">
                        </div>
                    </form>
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
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                               <img src= "<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>" alt="" class="wow pulse" data-wow-delay="1s" >
                                <p>We help you reach out to the most interesting events anywhere they may be. The events you’ve always wanted to join and create will be in your hands with just a few clicks. Worry not because we’re here to help you discover the latest events this planet will ever have.</p>

                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Contact Us</h4>
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
                                <li><a class="wow fadeInUp animated" href="<?php echo site_url();?>/CLogin/viewDashBoard" data-wow-delay="0.2s">Home</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<script>
    $(document).ready(function() {
        $('html, body').animate({ scrollTop: $('#<?php echo $clickedAnnouncement; ?>').offset().top}, 'slow');
    });
</script>
