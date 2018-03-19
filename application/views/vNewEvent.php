<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 1");
?>
    <body>

        <div id="preloader">
            <span id="baseUrl" hidden><?php echo site_url()?></span>
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

                    <a class="navbar-brand" href="<?php echo site_url();?>/CLogin/viewDashBoard"><img src="<?php echo base_url(CustomizationManager::$images->LOGO_SMALL)?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s">
                            <?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_LOGOUT_BUTTON ?> </a>
                        </button>
                    </div>

                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s">
                            <?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_CREATE_EVENT_BUTTON ?> </a>
                        </button>
                    </div>


                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/CLogin/viewDashBoard"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_NAV_HOME ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewEvents"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_NAV_PROFILE ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>'><a href="<?php echo site_url();?>/user/CUser/viewAnnouncements"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_ANNOUNCEMENTS ?><?php if($announcementCount>0) {?><span id="bdg" class="ballons"><?php echo $announcementCount;?></span><?php }?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewPreferenceEvents"><?php echo CustomizationManager::$strings->NAV_INTERESTED ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/CCart/viewCart"><?php echo CustomizationManager::$strings->NAV_VIEW_CART ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->


        <div class="page-head">
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TITLE ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->


        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">
                <div class="col-md-2"></div>
                <!-- MultiStep Form -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <form id="msform" class="ui fluid form" accept-charset="utf-8" enctype="multipart/form-data">
                            <div id="formsteps" class="ui three steps">
                              <div class="active step">
                                <i class="ticket alternate icon"></i>   
                                <div class="content">
                                  <div class="title">Event Details</div>
                                  <div class="description">Tell us something about your event</div>
                                </div>
                              </div>
                              <div class="step">
                                <i class="compass alternate icon"></i>
                                <div class="content">
                                  <div class="title">Venue Details</div>
                                  <div class="description">Let others know the location of your event</div>
                                </div>
                              </div>
                              <div class="step">
                                <i class="ticket alternate icon"></i>
                                <div class="content">
                                  <div class="title">Tickets</div>
                                  <div class="description">Add tickets to your event</div>
                                </div>
                              </div>
                            </div>
                            <!-- fieldsets -->
                            <fieldset data-value="1">
                                <h2 class="fs-title">Event Details</h2>
                                <h3 class="fs-subtitle">Tell us something about your event</h3>
                                <div class="form-group field" style="text-align:left">

                                    <!-- <label for="name">Event Picture</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_PICTURE ?></label>
                                   <input type="file" name="userfile"  id="fileToUpload" accept="image/*">
                                </div>
                                <div class="form-group field" style="text-align:left">
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_TITLE ?></label>
                                    <input type="text" class="form-control" name="event_name" required="">
                                </div>
                                <div class="form-group field" style="text-align:left">
                                    <!-- <label for="email">Category</label> -->
                                    <label for="email"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_CATEGORY ?></label>
                                        <select Class="form-control" name="event_category" required>
                                            <option></option>
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
                                </div>
                                <div class="form-group field" style="text-align:left">
                                    <!-- <label for="name">STARTS</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_START ?></label>

                                    <input  class="form-control" type="text"  value="<?php if(!empty($start_date)){
                                        echo $start_date." ".$start_time;
                                    }else{
                                        echo "";
                                    };
                                    ?>" name="dateStart" id="datetimepicker1" required="">
                                    <script>
                                        $("#datetimepicker1").datetimepicker();
                                    </script>
                                </div>

                                <div class="form-group field" style="text-align:left">
                                    <!-- <label for="name">ENDS</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_END ?></label>
                                    <input  class="form-control" type="text" value="<?php if(!empty($end_date)){
                                        echo $end_date." ".$end_time;
                                    }else{
                                        echo "";
                                    };
                                    ?>" name="dateEnd" id="datetimepicker2" required="">
                                    <script>
                                        $("#datetimepicker2").datetimepicker();
                                    </script>
                                </div>
                                <div class="form-group field" style="text-align:left">
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_DESCRIPTION ?></label>
                                    <textarea class="form-control" name="event_details" required="" rows="3"></textarea>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset data-value="2">
                                <h2 class="fs-title">Venue Details</h2>
                                <h3 class="fs-subtitle">Let others know the location of your event</h3>
                                <div class="form-group field" style="text-align:left">
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_LOCATION ?></label>
                                    <input type="text" class="form-control" name="event_venue" required="">
                                </div>

                                <div class="form-group field" style="text-align:left">
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_CAPACITY ?></label>
                                    <input type="number" min="1" class="form-control" name="venue_capacity" required="">
                                </div>
                                <!-- Added a location_code -->
                                <div class="form-group field" style="text-align:left">

                                    <!-- <label for="email">Location_code</label> -->
                                    <label for="region_code">Region Code</label>
                                        <select Class="form-control" id="region_code" name="region_code" required>
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
                                </div>

                                <!-- Added a city group -->
                                <div class="form-group field"  style="text-align:left">
                                    <!-- <label for="email">Location_code</label> -->
                                    <label for="municipal-name">CITY/MUNICIPAL</label>
                                        <select Class="form-control" id="municipal-name" name="municipal-name" required>
                                        </select>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset data-value="3">
                                <h2 class="fs-title">Tickets</h2>
                                <h3 class="fs-subtitle">Add tickets to your event</h3>
                                <div class="form-group field"  style="text-align:left">
                                    <!-- <span>TICKET TYPE </span> <br> -->
                                    <label><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_TYPE ?></label> <br>     
                                    <input type="text" class="form-control" name="ticketType" placeholder="Ticket type">
                                </div>
                                <div class="form-group field"  style="text-align:left">
                                    <label><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_QUANTITY ?></label>
                                    <input type="number" class="form-control" min="1" name="no_tickets_total" placeholder="Ticket count">
                                </div>
                                <div class="form-group field"  style="text-align:left">
                                    <label><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_PRICE ?></label>
                                    <input type="number" class="form-control" min="0" name="price_tickets_total" placeholder="Ticket price">
                                </div>
                                <div class="right aligned column">
                                    <button type="button" id="addTix" class="ui orange labeled icon button">
                                      <i class="plus icon"></i>
                                      Add
                                    </button>
                                  </div>
                                <h4 class="ui horizontal divider header">
                                  <i class="ticket icon"></i>
                                  Tickets
                                </h4>
                                <div style="max-width:540px;height:140px;overflow-y:auto;border:1px solid #b3b3b3;border-radius:5px">
                                <ul id="ticketList" class="list-group" style="margin:0;text-align:left">
                                    <div style="text-align:center"><br><br><h3><i class="meh outline icon"></i>Ticket list is empty.</h3></div>
                                </ul>
                                </div>
                                <button id="submitEvent" type="button" class="ui button action-button" value=""><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_SUBMIT_BUTTON ?></button>
                            </fieldset>
                        </form>

                    </div>
                </div>
                <!-- /.MultiStep Form -->
                <div class="col-md-2"></div>
            </div>
        </div>

        <!-- Audio -->
        <audio id = "audio-event" src = "../../../assets/customization1Assets/audio/event.wav"></audio>


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
                                    <li><i class="pe-7s-map-marker strong"> </i> <?php include ('vAddress.php');?></li>
                                    <li><i class="pe-7s-mail strong"> </i> <?php include ('vEmail.php');?></li>
                                    <li><i class="pe-7s-call strong"> </i> <?php include ('vContactNo.php');?></li>
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
        <script>
          $(document).ready(function(){
            $('#audio-event').trigger('play');
          });
        </script>

        <script type="text/javascript">
            $("#datetime").datepicker();
        </script>

        <script type="text/javascript">
            $("#date1").datepicker();
        </script>
        <script type="text/javascript">
            $("#date2").datepicker();
        </script>
        <script type="text/javascript">
            $('#time1').timepicker();
        </script>
        <script type="text/javascript">
            $('#time2').timepicker();
        </script>

          <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>

        <script>
            $('#region_code').on('change', function(){
              $('#municipal-name').empty().append('<option></option>');
                if(this.value != ""){
                    // alert(this.value);
                    var code = this.value;
                    var dataSet = "region_code="+code;
                        $.ajax({
                            type: "POST",
                            url: '<?php echo site_url()?>/event/CEvent/displayMunicipal',
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
            // $('#municipal-name').on('change', function(){
            //     if(this.value != "Select CITY/MUNICIPAL below..."){
            //         var city = this.value;
            //         alert(city);
            //     }
            // });
            function checkLocation(){
              var form = document.forms["createEventForm"];
              var location = form["event_venue"].value;
              if(!location.match(/[a-z]/i)){
                alert("Invalid Input!" + location.length);
                return false;
              }
              return true;
            }
        </script>