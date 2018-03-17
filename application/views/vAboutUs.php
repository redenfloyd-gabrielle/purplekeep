<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 1");
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

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

        <style>
            a{
                color:	#D2691E;
            }
            h1{
                margin: auto;
                margin-left: 33%;
                color:	#333333;
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
        </style>
    </head>

    <body background = "<?php echo base_url();?>/assets/nikkiAssets/img/aboutusbackground.png">
        <nav class="navbar navbar-inverse">
            <div class="container container-fluid">
                <div class="container">
                    <ul class="nav navbar-navx navbar-right inline-navbar" color = "#D2691E">
                        <li><a href="<?php echo site_url();?>/cInitialize/#">Home</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class = "row">
            <div class = "col-sm-3"></div>
            <div class = "col-sm-6 div-content">
                <h1><?php echo CustomizationManager::$strings->ABOUT_US_TITLE; ?></h1>
                <br>
                <hr>
                <br>
                <div class = "content">
                    <span>
                      <?php echo CustomizationManager::$strings->ABOUT_US; ?>
                    </span>
                </div>
            </div>
        </div>
    </body>
</html>
