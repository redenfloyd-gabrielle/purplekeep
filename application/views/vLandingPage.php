<!-- Add these lines below to pages with customizable elements -->
<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations ");
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
                        <!-- <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> Logout </button></a> -->
                        <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login" title="Logout"><span class="fas fa-sign-out-alt fa-lg"></span></button></a>
                    </div>
                    <div class="button navbar-right">
                        <!-- <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> Create Event </button></a> -->
                        <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login" title="Create Event"><span class="fas fa-calendar-plus fa-lg"></span></button></a>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="Home"><a href="<?php echo site_url();?>/CLogin/viewDashBoard"><span class="fas fa-home fa-lg"></span></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="Profile"><a href="<?php echo site_url();?>/event/CEvent/viewEvents"><span class="fas fa-user fa-lg"></span></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>' title="Announcements"><a href="<?php echo site_url();?>/user/CUser/viewAnnouncements"><span class="fas fa-bell fa-lg"><?php if($announcementCount>0) {?><span id="bdg" class="ballons"><?php echo $announcementCount;?></span><?php }?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="Interested Events"><a href="<?php echo site_url();?>/event/CEvent/viewPreferenceEvents"><span class="fas fa-star fa-lg"></span></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" title="View Cart"><a href="<?php echo site_url();?>/finance/CCart/viewCart"><span class="fas fa-shopping-cart fa-lg"></span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav> <! -- END OF NAV -->

     <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme" >

                    <!-- <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-2.jpg')?>"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-5.jpg')?>"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-3.jpg')?>"></div> -->

                    <!-- <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_1) . '"></div>'?>
                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_2) . '"></div>'?>
                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_3) . '"></div>'?> -->

                </div>
            </div>
            <div class="container slider-content" >
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-1 col-sm-12">
                        <!-- <h2>See Events Near You</h2> -->
                        <h2><?php echo CustomizationManager::$strings->LANDING_PAGE_CAROUSEL_MESSAGE ?></h2>

                        <div class="search-form wow pulse" data-wow-delay="0.8s" style="height: 125px;">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 pull-left" style="padding-left: 50px;" >
                                      <span class="h6 pull-left" style="color: gray;"><?php echo CustomizationManager::$strings->LANDING_PAGE_SEARCH_BOX_LABEL ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 25px;align-content: center;-webkit-align-content: center;">
                                        <form action="<?php echo site_url();?>/user/CEvent/searchEvent" class="form" method="POST">
                                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                    <select name="searchDateMonth" class="form-control">
                                                      <option value="0" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 0 ){ echo "selected";}?>>-Month-</option>
                                                      <option value="1" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 1 ){ echo "selected";}?>>Jan</option>
                                                      <option value="2" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 2 ){ echo "selected";}?>>Feb</option>
                                                      <option value="3" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 3 ){ echo "selected";}?>>Mar</option>
                                                      <option value="4" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 4 ){ echo "selected";}?>>Apr</option>
                                                      <option value="5" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 5 ){ echo "selected";}?>>May</option>
                                                      <option value="6" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 6 ){ echo "selected";}?>>Jun</option>
                                                      <option value="7" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 7 ){ echo "selected";}?>>Jul</option>
                                                      <option value="8" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 8 ){ echo "selected";}?>>Aug</option>
                                                      <option value="9" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 9 ){ echo "selected";}?>>Sep</option>
                                                      <option value="10" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 10 ){ echo "selected";}?>>Oct</option>
                                                      <option value="11" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 11 ){ echo "selected";}?>>Nov</option>
                                                      <option value="12" <?php if(isset($_POST['searchDateMonth']) && $_POST['searchDateMonth'] == 12 ){ echo "selected";}?>>Dec</option>

                                                    </select>
                                                </div>
                                                <?php
                                                if(!isset($_POST['searchDateYear'])){
                                                    echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input name="searchDateYear" type="text" class="form-control" placeholder="Year" ></div>';
                                                } else {
                                                    echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input name="searchDateYear" type="text" class="form-control" placeholder="Year"  value="'.$_POST['searchDateYear'].'"></div>';
                                                }
                                                ?>

                                                <?php
                                                if(!isset($_POST['searchWord'])){

                                                    echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input name="searchWord" type="text" class="form-control" placeholder="Key word" pattern="[\sa-zA-z0-9]+"  value=""></div>';
                                                } else {
                                                    echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><input name="searchWord" type="text" class="form-control" placeholder="Key word" value="'.$_POST['searchWord'].'" pattern="[\sa-zA-z0-9]+"></div>';
                                                }
                                                    echo'<div class="col-sm-2 col-md-2 col-lg-2"><select Class="form-control" id="region_code" name="region_code" >
                                                        <option style="color: gray;" value="0">Region</option>
                                                        <option value="NCR">NCR</option>
                                                        <option value="CAR">CAR</option>
                                                        <option value="MIMAROPA">MIMAROPA</option>
                                                        <option value="ARMM">ARMM</option>
                                                        <option value="Region I">Region I</option>
                                                        <option value="Region II">Region II</option>
                                                        <option value="Region III">Region III</option>
                                                        <option value="Region IV">Region IV-A</option>
                                                        <option value="Region V">Region V</option>
                                                        <option value="Region VI">Region VI</option>
                                                        <option value="Region VII">Region VII</option>
                                                        <option value="Region VIII">Region VIII</option>
                                                        <option value="Region IX">Region IX</option>
                                                        <option value="Region X">Region X</option>
                                                        <option value="Region XI">Region XI</option>
                                                        <option value="Region XII">Region XII</option>
                                                        <option value="Region XIII">Region XIII</option>
                                                    </select></div>';

                                                    echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                    <select class="form-control" id="municipal-name" name="municipal_name">
                                                        <option style="color: gray;">Municipal</option>
                                                    </select></div>';
                                                
                                                ?>
                                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                                    <button class="btn search-btn" type="submit" style="float: left;"><i class="fa fa-search"></i></button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-END OF SLIDER-->

     <!-- CONTENT AREA -->
      <div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
         <div class="container">
             <div class="row">
                <div class="col-md-12  padding-top-40 properties-page">
                    <div class="col-xs-10 page-subheader sorting pl0">
                        <ul class="sort-by-list">
                            <li class="active">
                                <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                    <?php echo CustomizationManager::$strings->LANDING_PAGE_SORT_BY_DATE ?> <i class="fa fa-sort-amount-asc"></i>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                    <?php echo CustomizationManager::$strings->LANDING_PAGE_SORT_BY_PRICE ?> <i class="fa fa-sort-numeric-desc"></i>
                                </a>
                            </li>
                        </ul> <!-- END OF SORT BY LIST-->

                        <!--  <div class="items-per-page">
                                    <label for="items_per_page"><b><?php echo CustomizationManager::$strings->LANDING_PAGE_EVENTS_PER_PAGE ?></b></label>
                                    <div class="sel">
                                        <select id="items_per_page" name="per_page">
                                            <option value="3">3</option>
                                            <option value="6">6</option>
                                            <option value="9">9</option>
                                            <option selected="selected" value="12">12</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                            <option value="60">60</option>
                                        </select>
                                    </div><!--/ .sel-->
                        <!--  </div> --><!--/ .items-per-page--> 
                    </div>
                   <!--  <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                    </div><!--/ .layout-switcher--> 
                </div>

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

                                                                echo '<a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'" style="background-color:#CB6C52;"><h3 class="text-center"> ';

                                                                if(strlen($event->event_name)>=42){
                                                                    echo substr($event->event_name,0,39)."...";
                                                                }else{
                                                                    echo $event->event_name;
                                                                }
                                                
                                                                echo '</h3></a>';

                                                                // echo '<div class="item-thumb">
                                                                // <a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'"></a></div>'; 
                                                                
                                                                echo '<div style="height:130px;"><h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'</h5>';

                                                                $dateS = date_create($event->dateStart);
                                                                $dateE = date_create($event->dateEnd);
                                                                echo '<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'</h5>';

                                                                                                              
                                                    
                                                                $mintix = $event->tix;
                                                                foreach ($event->tix as $key) {
                                                                    $mintix = ($key->price <= $mintix)? $key->price : $mintix;
                                                                }
                                                                echo '<h5>Event Tickets as low as Php '.$mintix.'!!!</h5></div>';          
                                                                echo '<div class="dot-hr"></div>
                                                            </div>
                                                        </div>
                                                    </div>';

                                            }else if($now >= $start && $now <= $end){
                                                echo ' <div class="col-sm-6 col-md-4 p0">';
                                                    echo '<div class="box-two proerty-item">';
                                                        echo '<div class="item-entry overflow" >';
                                                                echo '<div class="corner-ribbon top-right sticky red">Happening now!</div>';
                                                                    

                                                                echo '<a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'" ><h3 class="text-center"> ';

                                                                if(strlen($event->event_name)>=42){
                                                                    echo substr($event->event_name,0,39)."...";
                                                                }else{
                                                                    echo $event->event_name;
                                                                }
                                                
                                                                echo '</h3></a>';

                                                                // echo '<div class="item-thumb">
                                                                // <a href="'.site_url().'/event/CEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'"></a></div>'; 

                                                                echo '<div style="height:130px;"><h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'</h5>';

                                                                $dateS = date_create($event->dateStart);
                                                                $dateE = date_create($event->dateEnd);
                                                                echo '<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'</h5>';
                                                                $mintix = $event->tix;
                                                                foreach ($event->tix as $key) {
                                                                    $mintix = ($key->price <= $mintix)? $key->price : $mintix;
                                                                }
                                                                echo '<h5>Event Tickets as low as Php '.$mintix.'!!!</h5></div>';
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

     <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <!-- <h4>About us </h4> -->
                                <h4><?php echo CustomizationManager::$strings->ABOUT_HEADER ?></h4>
                                <div class="footer-title-line"></div>
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
                                    <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li>
                                    <li><i class="pe-7s-mail strong"> </i> email@yourcompany.com</li>
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
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s"><?php echo CustomizationManager::$strings->FOOTER_NAV_HOME ?></a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-END OF FOOTER -->
</body>

<script>
    $(document).ready(function(){
        $('#region_code').on('change', function(){
          $('#municipal-name').empty().append('<option></option>');
            if(this.value != ""){
                // alert(this.value);
                var code = this.value;
                var dataSet = "region_code="+code;
                    $.ajax({
                        type: "POST",
                        url: '<?php echo site_url()?>/event/cEvent/displayMunicipal',
                        data: dataSet,
                        cache: true,
                        success: function(result){
                            if(result){
                            //    $('body').html(result);
                                var output = $.parseJSON(result);
                                $.each(output, function(i, d) {
                                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                                    $('#municipal-name').append('<option value="' + d.location_id+ '">' + d.location_name + '</option>');

                                });
                            }else{
                                alert("Error");
                            }
                        },
                        error: function(jqXHR, errorThrown){
                            console.log(errorThrown);
                        }
                    });
            }
        });

        $('#municipal-name').on('change', function(){
            if(this.value != ""){
                // alert(this.value);
                var code = this.value;
                var dataSet = "region_code="+code;
                    $.ajax({
                        type: "POST",
                        url: '<?php echo site_url()?>/event/cEvent/sortByLocation',
                        data: dataSet,
                        cache: true,
                        success: function(result){
                            if(result){
                                $('#list-type').html(result);
                            }else{
                                alert("Error");
                            }
                        },
                        error: function(jqXHR, errorThrown){
                            console.log(errorThrown);
                        }
                    });
            }
        });


    });
</script>


<!--END OF  SCRIPT-->
