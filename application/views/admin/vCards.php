<div id="main">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/CAdmin">Home</a></li>
        <li class="active">Generate Card</li>
    </ol>
      <!-- //breadcrumb-->

    <div id="content">
        <div class="row">
          <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Cards</strong></h2>
                    </header>
                    <div class="panel-body">
                      <table class="table table-bordered table-hover text-center" id = "card-table" data-card-url="<?php echo site_url();?>/admin/CAdmin/fetchCardData">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Code</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                                  <th>Created By</th>
                                  <th>Added On</th>
                                  <th>Redeemed by</th>
                                  <th>Redeemed On</th>
                                </tr>
                              </thead>

                              <tbody >
                              <?php
                                if($dtCards != False){
                                  $prepareDat = "";
                                
                                  foreach ($dtCards as $cards) {
                                    
                                    $statCards = ($cards->cardStatus == 0)?'<span class="label label-danger">Used</span>':'<span class="label label-success">Available</span>';
                                    $nameCard = $cards->first_name. " ". $cards->last_name;
                                    $nameCard1 = $cards->buyerF. " ". $cards->buyerL;
                                    $prepareDat .= "<tr>".
                                                      "<td>".$cards->cardId."</td>".
                                                      "<td>".$cards->cardCode."</td>".
                                                      "<td>".$cards->cardAmount."</td>".
                                                      "<td>".$statCards."</td>".
                                                      "<td>".$nameCard."</td>".
                                                      "<td>".$cards->addedAt."</td>".
                                                      "<td>".$nameCard1."</td>".
                                                      "<td>".$cards->updatedAt."</td>".
                                                    "</tr>";
                                  }
                                   echo $prepareDat;   
                                }
                              ?>
                              </tbody>
                      </table>
                    </div>
                </section>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Generate Card</strong></h2>
                    </header>
                    <div class="panel-body">

                      <form id="gForm" class="form inline" method="POST" action="<?php echo site_url('finance/CCard/card'); ?>">
                          <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="toggle-column table-example">
                              <thead>
                                  <tr>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                  </tr>
                              </thead>
                              
                              <tbody>
                                  <tr>
                                      <td>&#x20B1; 100</td>
                                      <td>
                                          <span class="input-group-btn form-group">
                                             <button class="btn btn-secondary col-1 cardsbtn unaM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button> 
                                             <input type="text" name="qty1" class="form-control col-sm-3 qtyinput" id="qty1" placeholder="Quantity" aria-label="Quantity">
                                             <button class="btn btn-secondary col-1 cardsbtn unaP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                          </span>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>&#x20B1; 200</td> 
                                      <td>
                                          <span class="input-group-btn form-group">
                                             <button class="btn btn-secondary col-1 dosM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                             <input type="text" name="qty2" class="form-control col-sm-3 qtyinput" id="qty2" placeholder="Quantity" aria-label="Quantity">
                                             <button class="btn btn-secondary col-1 dosP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                          </span>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>&#x20B1; 500</td>
                                      <td>
                                          <span class="input-group-btn form-group">
                                             <button class="btn btn-secondary col-1 tresM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                             <input type="text" name="qty3" class="form-control col-sm-3 qtyinput" id="qty3" placeholder="Quantity" aria-label="Quantity">
                                             <button class="btn btn-secondary col-1 tresP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                          </span>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>&#x20B1; 1000</td>
                                      <td>
                                          <span class="input-group-btn form-group">
                                             <button class="btn btn-secondary col-1 kwatroM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                             <input type="text" name="qty4" class="form-control col-sm-3 qtyinput" id="qty4" placeholder="Quantity" aria-label="Quantity">
                                             <button class="btn btn-secondary col-1 kwatroP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                          </span>
                                      </td>
                                  </tr>   
                              </tbody>
                          </table>

                          <center>
                              <button id="generate" class="btn btn-inverse btn-transparent" type="submit">
                                  <strong>GENERATE</strong>
                              </button>
                          </center>
                      </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
          

<script type="text/javascript">
var value = 0 ;
  $( document ).ready(function() {
    $(".qtyinput").val(value);


    
    $('.qtyinput').on('input', function (event) { 
      this.value = this.value.replace(/[^0-9]/g, '');
      if (this.value == "" ) {
        this.value = 0;
      }
    });

    $( ".unaM" ).click(function() {
      if ($("#qty1").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty1").val();
        get -= 1;
        $("#qty1").val(get); 
      }
    });

    $( ".unaP" ).click(function() {
      var get = parseInt($("#qty1").val());
      if (get <= 1000) {
        get += 1;
        $("#qty1").val(get); 
      }
      
    });

     $( ".dosM" ).click(function() {
      if ($("#qty2").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty2").val();
        get -= 1;
        $("#qty2").val(get); 
      }
    });

    $( ".dosP" ).click(function() {
      var get = parseInt($("#qty2").val());
      if (get <= 1000) {
        get += 1;
        $("#qty2").val(get);
      } 
    });

     $( ".tresM" ).click(function() {
      if ($("#qty3").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty3").val();
        get -= 1;
        $("#qty1").val(get); 
      }
    });

    $( ".tresP" ).click(function() {
      var get = parseInt($("#qty3").val());
      if (get <= 1000) {
        get += 1;
        $("#qty3").val(get);
      }  
    });

     $( ".kwatroM" ).click(function() {
      if ($("#qty4").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty4").val();
        get -= 1;
        $("#qty4").val(get); 
      }
    });

    $( ".kwatroP" ).click(function() {
      var get = parseInt($("#qty4").val());
      if (get < 1000) {
        get += 1;
        $("#qty4").val(get);
      } 
    });

      $(document).on('submit',"#gForm",function(e){
        e.preventDefault();
        var _url = $(this).attr('action');


        $.ajax({
          url: _url,
          method:"POST",
          data: $(this).serialize(),
          success: function(){ 
                    alert("sucess");
                    $(':input').val(0);
                  },
          error: function(){
                    alert("error!");
                  }
        });
      });
  });

  
</script>
  </body>
</html>
