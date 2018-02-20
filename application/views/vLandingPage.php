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
                        <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> <?php echo CustomizationManager::$strings->LANDING_PAGE_LOGOUT_BUTTON ?> </button></a>
                    </div>
                    <div class="button navbar-right">
                        <!-- <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> Create Event </button></a> -->
                        <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> <?php echo CustomizationManager::$strings->LANDING_PAGE_CREATE_EVENT_BUTTON ?> </button></a>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/CLogin/viewDashBoard"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_HOME ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewEvents"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_PROFILE ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>'><a href="<?php echo site_url();?>/user/CUser/viewAnnouncements"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_ANNOUNCEMENTS ?><?php if($announcementCount>0) {?><span id="bdg" class="ballons"><?php echo $announcementCount;?></span><?php }?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewPreferenceEvents">Interested Events</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/CCart/viewCart"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_VIEW_CART ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav> <! -- END OF NAV -->

     <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <!-- <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-2.jpg')?>"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-5.jpg')?>"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-3.jpg')?>"></div> -->

                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_1) . '"></div>'?>
                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_2) . '"></div>'?>
                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_3) . '"></div>'?>

                </div>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-1 col-sm-12">
                        <!-- <h2>See Events Near You</h2> -->
                        <h2><?php echo CustomizationManager::$strings->LANDING_PAGE_CAROUSEL_MESSAGE ?></h2>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <div class="col-md-12">
                                <div class="col-md-3 pull-left" style="padding:1%; ">
                                  <span class="h6 pull-left" style="color: gray;"><?php echo CustomizationManager::$strings->LANDING_PAGE_SEARCH_BOX_LABEL ?></span>
                                </span></div>
                            </div>
                            
                            <form action="<?php echo site_url();?>/user/CEvent/searchEvent" class="form" method="POST">
                               
                                <div class="form-group col-md-11">
                                    <?php
                                    if(!isset($_POST['searchDateMonth'])){
                                        echo '<div class="col-md-2"><select name="searchDateMonth" class="form-control">
                                                  <option value="0">Month</option>
                                                  <option value="1">Jan</option>
                                                  <option value="2">Feb</option>
                                                  <option value="3">Mar</option>
                                                  <option value="4">Apr</option>
                                                  <option value="5">May</option>
                                                  <option value="6">Jun</option>
                                                  <option value="7">Jul</option>
                                                  <option value="8">Aug</option>
                                                  <option value="9">Sep</option>
                                                  <option value="10">Oct</option>
                                                  <option value="11">Nov</option>
                                                  <option value="12">Dec</option>
                                                </select></div>';
                                    } else {
                                        echo '<div class="col-md-2">
                                              <select name="searchDateMonth" class="form-control">
                                                  <option value="0">Month</option>
                                                  <option value="1">Jan</option>
                                                  <option value="2">Feb</option>
                                                  <option value="3">Mar</option>
                                                  <option value="4">Apr</option>
                                                  <option value="5">May</option>
                                                  <option value="6">Jun</option>
                                                  <option value="7">Jul</option>
                                                  <option value="8">Aug</option>
                                                  <option value="9">Sep</option>
                                                  <option value="10">Oct</option>
                                                  <option value="11">Nov</option>
                                                  <option value="12">Dec</option>
                                                </select></div>';
                                    }
                                    ?>

                                    <?php
                                    if(!isset($_POST['searchDateYear'])){
                                        echo '<div class="col-md-2"><input name="searchDateYear" type="text" class="form-control" placeholder="Year"></div>';
                                    } else {
                                        echo '<div class="col-md-2"><input name="searchDateYear" type="text" class="form-control" placeholder="Year"></div>';
                                    }
                                    ?>

                                    <?php
                                    if(!isset($_POST['searchWord'])){
                                        echo '<div class="col-md-3"><input name="searchWord" type="text" class="form-control" placeholder="Key word" pattern="[\sa-zA-z0-9]+"></div>';
                                    } else {
                                        echo '<div class="col-md-3"><input name="searchWord" type="text" class="form-control" placeholder="Key word" value="'.$_POST['searchWord'].'" pattern="[\sa-zA-z0-9]+"></div>';
                                    }

                                        echo'<div class="col-md-2"><select Class="form-control" id="region_code" name="region_code" required>
                                            <option style="color: gray;">Region</option>
                                            <option>NCR</option>
                                            <option>CAR</option>
                                            <option>MIMAROPA</option>
                                            <option>ARMM</option>
                                            <option>Region I</option>
                                            <option>Region II</option>
                                            <option>Region III</option>
                                            <option>Region IV-A</option>
                                            <option>Region V</option>
                                            <option>Region VI</option>
                                            <option>Region VII</option>
                                            <option>Region VIII</option>
                                            <option>Region IX</option>
                                            <option>Region X</option>
                                            <option>Region XI</option>
                                            <option>Region XII</option>
                                            <option>Region XIII</option>
                                        </select></div>';

                                        echo '<div class="col-md-3">
                                        <select class="form-control" id="municipal-name" name="municipal_name">
                                            <option style="color: gray;">Municipal</option>
                                        </select></div>';
                                    
                                    ?>
                                    ?>
                                </div>
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button> 
                            </form>
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
                            <li>
                                <!-- Sort by Location -->
                                <select id="region_code" name="region_code" required>
                                    <option></option>
                                    <option>NCR</option>
                                    <option>CAR</option>
                                    <option>MIMAROPA</option>
                                    <option>ARMM</option>
                                    <option>Region I</option>
                                    <option>Region II</option>
                                    <option>Region III</option>
                                    <option>Region IV-A</option>
                                    <option>Region V</option>
                                    <option>Region VI</option>
                                    <option>Region VII</option>
                                    <option>Region VIII</option>
                                    <option>Region IX</option>
                                    <option>Region X</option>
                                    <option>Region XI</option>
                                    <option>Region XII</option>
                                    <option>Region XIII</option>
                                </select>

                                <!-- Municipal -->
                                <select id="municipal-name" name="municipal-name" required>
                                </select>
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

<!--START OF  SCRIPT-->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#aDropdown', function(){
            var id = $(this).data('id');
            $.ajax({
                url: "<?php echo site_url()?>/user/CUser/updateAnnounce/"+id,
                data: { id:id },
                type: "POST",
                success: function(data){
                    var d=data.split('/');
                    $('#bdg').remove();
                    // alert(d[0].trim());
                   
                },
                error: function(data){
                    alert("error");
                }
            });
        });
    } );
    
    $(document).ready(function(){
        <?php if(isset($announcements)){
        foreach ($announcements as $key) {
            ?>
             $.notify({
              title: "<?php echo '<strong>'.substr(trim(str_replace("\"", "\'",(preg_replace( "/\r|\n/", "", $key->announcementDetails )))),0,25).'</strong><br>';?>",
              icon: 'glyphicon glyphicon-info-sign',
              message: '<?php echo $key->ago." ".$key->agoU;?><a href="<?php echo site_url();?>/user/CUser/viewClickedAnnouncement/<?php echo $key->announcementID; ?>" >Click here...</a> '
            },{
              type: 'info',
              animate: {
                    enter: 'animated fadeInUp',
                exit: 'animated fadeOutDown'
              },
              placement: {
                from: "bottom",
                align: "left"
              },
              offset: 20,
              spacing: 10,
              z_index: 1031,
            });
            <?php
        }
       
       
    }?>
<?php ?>
    });
</script> 
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
