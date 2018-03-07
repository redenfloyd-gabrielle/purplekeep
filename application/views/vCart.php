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
                    <a class="navbar-brand" href="<?php echo site_url();?>/CLogin/viewDashBoard"><img src="<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>"></a>
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
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>' title="Announcements"><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements"><span><i class="fas fa-bell fa-lg"></i></span><?php if($announcementCount>0) {?><span id="bdg" class="badge badge-notify"><?php echo $announcementCount;?></span><?php }?></a></li>
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
                        <h1 class="page-title">View Cart</h1>
                    </div>
                </div>
            </div>
        </div>
      </div>

        <!-- property area -->
      <div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
         <div class="container">
             <div class="row">
                <div class="col-md-12 ">
                <div class="col-md-3 p0 padding-top-40">
                      
                </div>



                  <div class="col-md-12">
                    <div class="col-md-3 wow fadeInRight animated" style="padding:1;">
                      <div class="blog-asside-right pr0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                            <div class="panel-body search-widget">
                               <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-heading">
                                                <center><h1 style="font-size: 50px;" class="panel-title">Php <?php foreach($user as $u){echo $u->load_amt;}?>.00</h1></center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <p><?php echo CustomizationManager::$strings->PROFILE_PAGE_INSUFFICIENT_BALANCE ?>
                                        <a style=" color: #e2624b; cursor:pointer; border-bottom: 1.5px solid #e2624b;padding-bottom: 2px"  onMouseOver="this.style.color='#ffcec0';this.style.paddingBottom='8px';this.style.borderBottom='3px solid #e2624b';"    onMouseOut="this.style.color='#e2624b' ;this.style.paddingBottom='2px';" type="button" class="dbutton " id="load" ><?php echo CustomizationManager::$strings->PROFILE_PAGE_LOAD_NOW ?></a>
  <script>
     $("#load").click(function(){
        $("#some").toggle(500);
    });
 </script>
                                      </p>
                                      <div class="row">
                                        <div class="col-xs-12" id="some" hidden="">
                                          <form action="<?php echo site_url(); ?>/user/CUser/redeemCodeInCart" method="post">
                                              <input type="text" class="form-control" name="ccode" placeholder="Enter code">
                                              <!-- <button type="submit" class="navbar-btn nav-button pull-right"   >Redeem Code</button> -->
                                              <button type="submit" class="navbar-btn nav-button pull-right"   ><?php echo CustomizationManager::$strings->PROFILE_PAGE_REDEEM_CODE ?></button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                </div> <!-- col-md-12 -->
                            </div> <!--panel body search widget -->
                        </div>
                        <div class="modal fade" id="lmodal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3><img src="img/credit-card.png" class="elogo"> eLoad</h3>
                                    </div>
                                    <div class="modal-body">

                                        <label class="label-control">Card Number</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter Card Number">

                                        <h6 class="note">*Note: you only have 3 attemps to enter correct values</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>







                      <!-- <div class="panel panel-default" style="border-style: solid;border-color: #CB6C52;">
                        <div class="panel-body">
                            <h2><strong>Load Balance :</strong></h2>
                            <span class="h4" style="color: #CB6C52;">Php <?php foreach($user as $u){echo $u->load_amt;}?>.00</span>
                        </div>
                      </div> -->

                      <div class="panel panel-default" style="border-style: solid;border-color: #CB6C52;">
                        <div class="panel-body">
                            <h2><strong>Total :</strong></h2>
                            <span class="h4" style="color: #CB6C52;" id="total">Php <?php foreach($total as $t){
                              if($t->total>0){
                                echo $t->total;
                              }else{
                                echo "0";
                              }
                            }?>.00</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-9">
                      <?php if ($this->session->flashdata('error_msg')): ?>
                        <div class="alert alert-danger">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo $this->session->flashdata('error_msg'); ?>
                        </div>
                      <?php endif ?>
                          <div class="alert alert-danger hidden" id="error">
                              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                              <div id="errLabel"></div>
                          </div>
                    
                      <?php if ($this->session->flashdata('success_msg')): ?>
                          <div class="alert alert-success">
                              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                              <?php echo $this->session->flashdata('success_msg'); ?>
                          </div>
                      <?php endif ?> 
                    </div>

                    <div class="col-md-9" style="padding:1%; margin-top: 3%; border-color:  #ecf1f2; border-style: solid; border-width: 1px;">
                      <div id="list-type" class="proerty-th">
                      <?php 
                          $attr = array('class' => 'form_horizontal',

                            'id' => 'myform');
                            echo form_open(site_url()."/finance/CCart/checkout", $attr); ?>
                         <?php if(isset($events) && count($events)>0){

                                foreach ($events as $event) {
                                     ?>
                                     <div class="panel panel-default" style="margin-left:3%;">
                                      <div class="panel-heading">
                                        <input type="checkbox" checked="checked" class="evt" id="<?php echo key($events); ?>"  style="margin-bottom:2%;">
                                          <span class="h4">
                                            <strong>Event Name :  <?php echo $event[0]->event_name;?></strong>
                                          </span>
                                      </div>
                                      <div class="panel-body">                                                      
                                      
                                     <?php
                                     foreach ($event as $cart) {
                                     ?>
                                        <div class="panel panel-default" style="margin-left:3%;">
                                        <input type="hidden" class="cartID" value="<?php echo $cart->cart_id;?>" >
                                         <div class="panel-heading">

                                                <input type="checkbox" name="ticket[]" value="<?php echo $cart->cart_id;?>" class="<?php echo 'tix'.key($events);?> indi" id="<?php echo $cart->ticket_type_id;?>" checked="checked">
                                                <span> Ticket Name:<strong><?php echo $cart->ticket_name;?></strong></span>

                                                <span class="pull-right h5">Total Price:<span id="label<?php echo $cart->cart_id;?>"><b><?php echo $cart->total_price;?></b></span></span>
                                          </div>
                                         <div class="panel-body">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                  <tr>
                                                    <th scope="row" class="closest"> Price:<?php echo $cart->price;?> </th>
                                                    <td class="pull-right">
                                                      <form class="offset-md-3">
                                                          <div class="form-group row">
                                                            <button class="btn btn-default pull-left minus" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                                                            <div class="col-sm-6">
                                                              <input type="text" class="qty" disabled value ="<?php echo $cart->quantity;?>" class="form-control">
                                                            </div>
                                                            <button class="btn btn-default  plus" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                                                          </div>
                                                      </form>
                                                    </td>
                                                    <td>
                                                      <form  method="POST" action="<?php echo site_url(); ?>/finance/CCart/deleteCartItem">
                                                        <input name="id" class="hidden" value="<?php echo $cart->cart_id;?>">
                                                        <button type="submit" class="button btn btn-default pull-right">
                                                          <i class="glyphicon glyphicon-trash delete"></i>
                                                        </button>
                                                      </form>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                         </div>
                                       </div>
                                     <?php
                                      }
                                     ?>
                                     </div>
                                     <?php
                                     next($events);
                                }
                         ?>
                                    </div>
                        </div>
                         <?php
                         }else{?>
                            <h1>Nothing in your cart. Shop for tickets now!</h1>
                         <?php }?>
                       <?php echo form_close(); ?>
                    </div>
                    </div>
                  </div>

                </div>
             </div><!-- END OF ROW-->

         </div>
        
     <!--- END OF CONTENT AREA-->

        <!-- Footer area-->
        <div class="footer-area">
            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                               <img src= "<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>" alt="" class="wow pulse" data-wow-delay="1s" >
                                <p>We help you reach out to the most interesting events anywhere they may be. The events you’ve always wanted to join and create will be in your hands with just a few clicks. Worry not because we’re here to help you discover the latest events this planet will ever have.</p>

                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Contact Us</h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-mail strong"> </i> dailyEvents@gmail.com</li>
                                    <li><i class="pe-7s-call strong"> </i> 253-2753</li>
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

            <?php if(isset($events) && count($events)>0){?>
             <div class="checkoutContainer" style="margin-left:3%;">
                   <input type="checkbox" checked="">
                   <span class="h4"><strong>SELECT ALL</strong><span style="margin: 10px;" class="badge badge-light h5">4</span> </span>
                  <form id = "form01" action="<?php echo site_url(); ?>/finance/CCart/getCart" method="POST">
                    <!--blank form-->
                  </form>
                  <form action="<?php echo site_url(); ?>/finance/CCart/checkout" method="POST">
                    <input id ="i01" type="hidden" value="" name="input01">
                    <button class="btn btn-default pull-right" id="checkout" type="submit">CHECKOUT</button>
                  </form>
             </div>
             <?php } ?>
        </div>

<script>
  var panel;
  $("#chkout").click(function(){
        var data=$("#myform").serialize();

        $.ajax({ url:'<?php echo site_url();?>/finance/CCart/checkBalance',
                          type:"POST",
                    data: data,
                    success: function(e){
                        if(e.match('sufficient')){
                          $(document).find("div#error").addClass("hidden");
                          var res = confirm("Are you sure you want to Chekout?");

                          if(res == true) {
                            $(document).find("#myform").submit();
                          }

                        }else if(e.match('No Cart item selected!')){
                            $(document).find("div#error").removeClass("hidden");
                            $(document).find("div#errLabel").text(e);
                          // alert(e);
                        }else{
                          $(document).find("div#error").removeClass("hidden");
                            $(document).find("div#errLabel").text("Insufficient Balance.");
                          // alert("Load Balance Insufficient");
                        }
                      }

                 });

                return false;
      });

    $(document).ready(function() {

      var id = "";
      $.ajax({
        url: $("#form01").attr('action'),
        method:"POST",
        success: function(retval){ 
                  var arr = JSON.parse(retval);
                  for (var i = 0; i < arr.length; i++) {
                    if ($("#"+arr[i]['ticket_id']).attr("checked") == "checked") {
                      id = id+"/"+arr[i]['ticket_id'];
                    }
                  }
                  $("#i01").val(id); 
                  console.log(id);
                },
        error: function(){
                alert("error!");
              }
      });
      

      $('input.indi').on('ifChecked', function (event){
          $(this).closest("input").attr('checked', true);          
          var id = $(this).closest("input").attr('id');
          // $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").addClass("checked");
          // $(document).find(".tix"+id).attr("checked",true);

          var classList = $(this).attr('class').split(/\s+/);
          var temp = classList[0].replace('tix','');
          var cnt =0;
          var cnt1 =0;
          $.each($(document).find(".tix"+temp),function(index1,item1){
            
                if(item1.checked){
                  cnt1+=1;
                }else{
                  console.log(item1);      
                }
                cnt+=1;
              });
          if(cnt1 == cnt){
            $(document).find("input#"+temp).iCheck('check');
          }
          
            addId($(this).attr('id'));
          
      });
      $('input.indi').on('ifUnchecked', function (event) {
          $(this).closest("input").attr('checked', false);
          var id = $(this).closest("input").attr('id');
          // $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").removeClass("checked");
          // $(document).find(".tix"+id).removeAttr('checked');

          var classList = $(this).attr('class').split(/\s+/);
          $.each(classList, function(index, item) {
              var temp = item.replace('tix','');
              $(document).find("input#"+temp).closest("div.icheckbox_square-yellow").removeClass("checked");
              $(document).find("#"+temp).removeAttr('checked');
                // $(document).find("input#"+temp).iCheck('uncheck');

          });
          removeId($(this).attr('id'));
      });
      $('input.evt').on('ifChecked', function (event){
          $(this).closest("input").attr('checked', true);          
          var id = $(this).closest("input").attr('id');
          $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").addClass("checked");
          $(document).find(".tix"+id).attr("checked",true);

          var id = $(this).attr('id');
          
          
          // $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").addClass("checked");
          $(document).find(".tix"+id).iCheck('check');

          // $.each($(document).find(".tix"+id),function(index1,item1){
          //     addId(item1.id);
          // });
      });
      $('input.evt').on('ifUnchecked', function (event) {
          $(this).closest("input").attr('checked', true);          
          var id = $(this).closest("input").attr('id');
          $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").removeClass("checked");
          $(document).find(".tix"+id).attr("checked",false);

          var id = $(this).attr('id');
          
          
          // $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").removeClass("checked");
          // $(document).find(".tix"+id).attr("checked",false);
          $(document).find(".tix"+id).iCheck('uncheck');
          $.each($(document).find(".tix"+id),function(index1,item1){
                removeId(item1.id);
              });
      });
      function checkID (id) {
        var s = $("#i01").val();
        var arr = s.split('/');
        var ret
        for (var i=0; i< arr.length; i++) {
          if (arr[i] == id) {
            return true;
          }
        }
       return false;
      }
      function removeId (id) {
        var s = $("#i01").val();
        var arr = s.split('/');
        var done = "";
        for (var i=0; i< arr.length; i++) {
          if (arr[i] != id) {
            done = done+arr[i]+"/";
          }
        }
        $("#i01").val(done);
        console.log($("#i01").val());
      }

      function addId (id) {
        var s = $("#i01").val();
        var arr = s.split('/');
        var done = "";
        for (var i=0; i< arr.length; i++) {
          done=done+arr[i]+"/";
        }
        done += id;
        $("#i01").val(done);
        console.log($("#i01").val());
      }

      $(".minus").click(function(){
        var input = $(this).closest("div.row").find("input");
        if(input.val() > 0){
          var get = input.val();
          get-=1;
          input.val(get);
          updateTicketCount("minus",$(this).closest("div.panel").find("input.cartID").val(),get);

          updateTotal("minus", $(this).closest("tr").find("th.closest").html());
        }
      });

      var limit = 0;
      $(".plus").click(function(){
        var input = $(this).closest("div.row").find("input");
        var get = parseInt(input.val());
        check($(this).closest("div.panel").find("input.cartID").val());
        if (get != limit) {
          get++;
          input.val(get);
          updateTicketCount("plus",$(this).closest("div.panel").find("input.cartID").val(),get);

          updateTotal("plus", $(this).closest("tr").find("th.closest").html());
        }
        
      });

      //check if more than limit
      function check (id) {
        $.ajax ({
          url : "<?php echo site_url()?>/finance/CCart/getLimit",
          data : {"id" : id},
          method : "POST",
          success: function(e){
                    limit = e;
                },
                error: function(e){
                }
        });
      }

      function updateTotal (type, p) {
        //p = p.replace("Price:", "");
        p = p.replace("Price:", "");
        var price;
        if(type == "plus"){
          price = parseInt(p);
        }else{
          price = parseInt(p);
          price = -price;
        }

        var t = $("#total").text();
        t = t.replace("Php ", "");
        var total = parseInt(t);

        $("#total").text("Php "+(total+price)+".00");
      }

      function updateTicketCount(type,id,quantity){
        var link ="";
        if(type == "plus"){
          var link =  "<?php echo site_url()?>/finance/CCart/addQty";
        }else{
          var link = "<?php echo site_url()?>/finance/CCart/minusQty";
        }
        $(document).find(".plus").attr("disabled", true);
        $(document).find(".minus").attr("disabled", true);
        $.ajax({
                url: link,
                data: { "id":id,"quantity":quantity },
                type: "POST",
                success: function(e){

                     $(document).find(".plus").attr("disabled", false);
                     $(document).find(".minus").attr("disabled", false);
                     var arr = e.split('||');
                     // alert();
                     $(document).find("#label"+arr[1]).text(arr[0]);
                     // alert($(document).find("input#"+arr[1]).closest("div.panel").find("div.panel-body").find("table.table").find("div#labelrani").text());
                     // $(document).find("input#"+arr[1]).closest("div.panel").find("div.panel-body").find("label").text();
                     // alert(arr[0]+"-"+arr[1]);

                     if(quantity == 0){
                       location.reload();
                     }
                },
                error: function(e){
                    // console.log(e);
                    // alert(e.responseText);
                }
            });
      }

    } );


</script>
