<?php if ($this->session->userdata('userSession')) { ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Daily Events Create </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/styleCreateEvent.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.min.css')?>">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>                       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    
                    <a class="navbar-brand" href="<?php echo site_url();?>/CLogin/viewDashBoard"><img src="<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login" title="Logout"><span class="fas fa-sign-out-alt fa-lg"></span></button></a>
                    </div>
                    <div class="button navbar-right">
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
        </nav> <! -- END OF NAV -->
    <form method="post" action="<?php echo site_url();?>/event/CEvent/createEvent ">
        <div class ="createYourEvent">
            <h1> EDIT YOUR EVENT! </h1> <br>
            <h2> Share it. Make it live. </h2>
        </div>
        
        <div class="eventHeader">
            <span> EVENT DETAILS </span>
        </div>
        
        <div class="form-container">
            <span>EVENT TITLE</span> <br>
            <input type="text" name="event_name" placeholder="Give a short distinct name." required="" value="<?php echo $title?>"> <br><br>
            <span>LOCATION</span> <br>
            <input type="text" name="event_venue" placeholder="State where it is held." required="" value="<?php echo $venue;?>"> <br><br>
            
            <span>STARTS</span> <br>
            <div class="row container">
                <div class="col-md-6">
                    <div class="container timeContainer">
                        <input type="text"  value="<?php if(!empty($start)){
                            echo $start;
                        }else{
                            echo "";
                        }; 
                        ?>" name="dateStart" id="datetimepicker1" required="">
                    </div>

                    <script>
                        $("#datetimepicker1").datetimepicker();
                    </script>
                </div>

                <!-- <div class="timeContainer">
                    <input type="text" id="date1" name="event_date_start" placeholder="Date Start">
                </div>
                <div class="timeContainer">
                    <input type="text" id="time1" name="event_time_start" placeholder="Event starts">
                </div> -->
            </div>
            
            <span>ENDS</span> <br>
            <div class="row container">
                <div class="col-md-6 timeContainer">
                    <div class="container">
                        <input type="text" value="<?php if(!empty($end)){
                            echo $end;
                        }else{
                            echo "";
                        }; 
                        ?>" name="dateEnd" id="datetimepicker2" required="">
                    </div>

                    <script>
                        $("#datetimepicker2").datetimepicker();
                    </script>
                </div>

                <!-- <div class="timeContainer">
                    <input type="text" id="date1" name="event_date_start" placeholder="Date Start">
                </div>
                <div class="timeContainer">
                    <input type="text" id="time1" name="event_time_start" placeholder="Event starts">
                </div> -->
            </div>
            <span>CATEGORY </span> <br>
                    <div class="select-field">
                        <select name="event_category" required="" default="<?php echo $category;?>">
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
             <br><br>
           <span>EVENT DESCRIPTION</span> <br>
            <textarea class="form-control" name="event_details" placeholder="Tell what your event is all about." required="" value="<?php echo $details; ?>" rows="3"></textarea>
            

        </div>
        
        <br><br>
        <div class="eventHeader">
            <span> EVENT TICKETS </span>
        </div>
        <?php if(isset($ticket_info)) { ?>
            <?php foreach ($ticket_info as $info){ ?>
        <div class="form-container">
            <div class="row container">
                <div class="ticketContainer">

                    <span>TICKET TYPE </span> <br>
                    <div class="select-field">
                         <input type="text" required="" name="ticketType1" placeholder="Ticket type" value="<?php echo $info->ticket_name; ?>"> 
                       <!--  <select name="ticketType">
                            <option value="">Free</option>
                            <option value="">VIP</option>
                        </select> -->
                    </div>
                </div>
                <div class="ticketContainer">
                    <span>NUMBER OF TICKETS</span>
                    <div class="select-field">  
                        <input type="number" class="form-control" min="1" required="" name="no_tickets_total1" placeholder="Ticket count" value="<?php echo $info->ticket_count; ?>"> 
                    </div>
                </div>
                <div class="ticketContainer">
                    <span>PRICE OF TICKET</span>
                    <div class="select-field">  
                        <input type="number" class="form-control" min="0" required="" name="price_tickets_total1" placeholder="Ticket price" value="<?php echo $info->price; ?>"> 
                    </div>
                </div>
            </div>
        </div><br>
        <?php } ?>
    <?php } ?>
    </div><br><br><br>

        
        <div class="horizontalLine"></div>
    
        <div class="submitContainer">
            <center><span> Your event is ready! Make it live now. </span></center>
            <center>
                <button class="btn btn-lg btn-warning" type="submit" value="Create Event">
                    Create Event
                </button>
            </center>
        </div>
    </form>    


        <div class="footer">
            <span> © 2017 Daily Events </span>
        </div>
    </body>
    
    
    
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
    
</html>

<?php } else {
        redirect('CLogin/login');
    }
?>
