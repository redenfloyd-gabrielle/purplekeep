<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 2");
?>
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
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_CREATE_EVENT_BUTTON ?> </a></button>
                    </div>

                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/event/CEvent/viewCreateEvent" data-wow-delay="0.4s"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_LOGOUT_BUTTON ?> </a></button>
                    </div>


                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/CLogin/viewDashBoard"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_NAV_HOME ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewEvents/1"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_NAV_PROFILE ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/user/CUser/viewAnnouncements">Announcements</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/CEvent/viewPreferenceEvents">Interested Events</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/CCart/viewCart">View Cart</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->


        <div class="page-head">
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <center><h1 class="page-title"> EVENT CREATION SUCCESSFUL! </h1></center>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->


        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">
                <div class="col-md-3">
                    <div class="box-for overflow">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-for overflow">
                    <center><h2 class="page-title"> Your event creation is complete. </h2></center> <br>
                    <center><h3> Your event has been successfully submitted. Please wait for the confirmation. </h3></center> <br>
                    <center><button type="submit" class="btn btn-default"><a href="<?php echo site_url();?>/event/CEvent/viewEvents"> CLICK HERE TO VIEW EVENTS </a></button></center>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-for overflow">
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
