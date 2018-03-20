<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 0");
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> About Us </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/styleCreateEvent.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.min.css')?>">
        <!-- <link href="<?php echo base_url('assets/nikkiAssets/img/aboutusbackground.png')?>" rel="image_src" /> -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

        <style>
            a{
                color:	white;
            }
            h1{
                margin: auto;
                margin-left: 33%;
                color:	white;
                width: 50%;
                padding: 10px;
            }
            span{
                padding-left: 3.8em;
                font-size: 16px;
            }
            body {
                background-color: #cccccc;
            }
            .content{
                padding: 3em;
                background-color: rgba(255, 255, 255, 0.5);
            }
            .dailyEvents{
                text-align: center;
                color:white;
                font-size: 20px;
            }
            .row{
                margin-bottom: 5%;
            }
        </style>
    </head>

    <body background = "<?php echo base_url();?>/assets/dianeAssets/img/top_header.png">
        <nav class="navbar navbar-inverse">
            <div class="container container-fluid">
                <div class="container">
                    <ul class="nav navbar-navx navbar-right inline-navbar" color = "#D2691E">
                        <li><a href="<?php echo site_url();?>/cInitialize"><img src="<?php echo base_url('assets/neilAssets/img/home.png');?>" style="height:24px; width:24px;"> Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class = "row">
            <div class = "col-sm-3"></div>
                <div class = "col-sm-6 div-content">
                    <h1>About US!</h1>
                    <br>
                    <hr>
                    <br>
                    <div class = "content">
                        
                        <div>
                            <img src="<?php echo base_url(CustomizationManager::$images->LOGO_LIGHT)?>" style="display: block; margin-left: auto; margin-right: auto; height:200px; width:350px;">
                        </div>
                        <div class="dailyEvents" >Daily Events is a joint effort project made by students from the University of 
                        San Carlos in line with their Software Engineering course.
                        The team composes of 4th year BSIT students from University of San Carlos, together with 
                        their teacher, a working professional in the field to guide them.
                        
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>

        <div class = "row">
            <div class = "col-sm-2"></div>
                <div class = "col-sm-8 div-content">
                    <div class = "content" style="height:450px;">
                        
                        <div align="center">
                                <img class="img-circle" src="<?php echo base_url(CustomizationManager::$images->PARTY_LOGO)?>" style="height:200px; width:200px; display:inline-block; margin-right:40px;">
                                <img class="img-circle" src="<?php echo base_url(CustomizationManager::$images->TICKET_LOGO)?>" style="height:200px; width:200px; display:inline-block; margin-right:40px;">
                                <img class="img-circle" src="<?php echo base_url(CustomizationManager::$images->PARTY_LOGO2)?>" style="height:200px; width:200px; display:inline-block;">
                            </div>
                            <div class="dailyEvents" style="width:33%; float:left;">
                                This web application allows people to connect together through events and give them an accessible way for them to look for events.
                            </div>
                            <div class="dailyEvents" style="width:33%; float:left;">
                                This application also allows users a hassle-free way to purchase tickets.
                            </div>
                            <div class="dailyEvents" style="width:33%; float:left;">
                                This application gives clients an easy way to bring events to potential customers.
                            </div>
                            
                        </div>
                        
                    </div>

            </div>
        </div>

        <div class = "row">
            <div class = "col-sm-2"></div>
                <div class = "col-sm-8 div-content">
                    <div class = "content">
                        
                    <div align="center" style="margin-bottom: 20px;">
                        <img src="<?php echo base_url(CustomizationManager::$images->CLASS_LOGO)?>" style="display: block; margin-left: auto; margin-right: auto; height:250px; width:400px;">
                    </div>
                    <div class="dailyEvents">
                        Lastly, I would like to give credit to the people who have made this application possible. No matter how small or big the contribution they had to this project, their laughs, their blessings, their perseverance, their ideas and even their time, understanding that the entire class still had other matters to work on such as their thesis, helped all of us no matter how of a burden or hardship it may be, yet they persevered through and through.
                    </div>
                        
                    </div>

            </div>
        </div>

        
    </body>
</html>
