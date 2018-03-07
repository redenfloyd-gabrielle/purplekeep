        <script src="<?php echo base_url('assets/nikkiAssets/js/modernizr-2.6.2.min.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/js/jquery-1.10.2.min.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/bootstrap/js/bootstrap.min.js')?>" rel="stylesheet" /> </script>

        <script src="<?php echo base_url('assets/nikkiAssets/js/bootstrap-select.min.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/js/bootstrap-hover-dropdown.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/js/easypiechart.min.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/js/owl.carousel.min.js')?>" rel="stylesheet" /> </script>

        <script src="<?php echo base_url('assets/nikkiAssets/js/wow.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/js/icheck.min.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/js/price-range.js')?>" rel="stylesheet" /> </script>
        <script src="<?php echo base_url('assets/nikkiAssets/js/main.js')?>" rel="stylesheet" /> </script>

        <script  src="<?php echo base_url(); ?>assets/jsKyleAssets/moment.min.js"></script>
        <!-- <script src="<?php echo base_url('assets/jsKyleAssets/bootstrap.min.js')?>" rel="stylesheet" /> </script> -->
        <script src="<?php echo base_url('assets/jsKyleAssets/fullcalendar.js')?>" rel="stylesheet" /> </script>

        <script src="<?php echo base_url('assets/dianeAssets/js/bootstrap-notify.min.js')?>" rel="stylesheet" /> </script>

    </body>
</html>

<script>
    $("#price-slider").slider();
    $("#price-slider").on("slide", function(slideEvt) {
        var str = slideEvt.value.toString().replace(/\,/g, ' - ');;
        $("#price-value-slider").text(str);
    });

    $(document).ready(function(){
        <?php if(isset($announcements)){
        foreach ($announcements as $key) {
            ?>
             $.notify({
              title: "<?php echo '<strong>'.substr(trim(str_replace("\"", "\'",(preg_replace( "/\r|\n/", "", $key->announcementDetails )))),0,25).'</strong><br>';?>",
              icon: 'glyphicon glyphicon-info-sign',
              message: '<?php echo $key->ago." ".$key->agoU;?><a style="color:#494c53;" href="<?php echo site_url();?>/user/CUser/viewClickedAnnouncement/<?php echo $key->announcementID; ?>" > Click here...</a> '
            },{
              type: 'danger',
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
       
       
    }
    ?>
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
    });
</script>
