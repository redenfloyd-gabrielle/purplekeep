<div id="main">

    <?php
         foreach($ownAdminAccount as $updateAdmin) { }
     ?>

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/CAdmin">Home</a></li>
        <li class="active">Admin Account Management</li>
    </ol>
      <!-- //breadcrumb-->

    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Update</strong> Profile</h2>
                    </header>

                    <div class="panel-body">

                        <?php if ($this->session->flashdata('error_msg')): ?>
                                <div class="alert alert-danger" style="margin-top: 15px;">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                            <?php endif ?>

                       

                    <form onsubmit="return formValidate()" name="updateAccountForm" id="updateAccountForm" class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/CAdmin/updateAdmin">

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">First name:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="ufname" required="" value="<?php echo $updateAdmin->first_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Middle Initial:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uminame" required="" value="<?php echo $updateAdmin->middle_initial; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Last name:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="ulname" required="" value="<?php echo $updateAdmin->last_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Email:</label>
                      <i>(example: johndoe@XXXX.com)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uemail" required="" value="<?php echo $updateAdmin->email; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Birthdate:</label>
                      <div class="col-8">
                        <input class="form-control" type="date" name="ubdate" id="bdayt" required="" value="<?php echo $updateAdmin->birthdate; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Gender:</label>
                      <div class="col-8">
                      <select class="form-control" name="ugender" required=""> <br>
                        <option value="Male" <?php if($updateAdmin->gender=='Male') {echo "selected=''";}?> >Male</option>
                        <option value="Female" <?php if($updateAdmin->gender=='Female') {echo "selected=''";}?>>Female</option>
                        <option value="Other" <?php if($updateAdmin->gender=='Other') {echo "selected=''";}?>>Other</option>
                      </select>
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Contact no:</label>
                      <i>(if mobile no.: 09XXXXXXXXX; if telephone no.: XXX-XXXX)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" pattern="^(09)\d{2}-\d{3}-\d{4}$|^\d{3}-\d{4}$" name="ucontact" required="" value="<?php echo $updateAdmin->contact_no; ?>">
                      </div>
                    </div>

                    <br><br>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Username:</label>
                      <i>(must contain at least 3 characters, maximum of 50 characters)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uuname" required="" value="<?php echo $updateAdmin->user_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Password:</label>
                      <i>(must contain at least 8 characters, maximum of 50 characters)</i>
                      <div class="col-8">
                        <input class="form-control" type="password" name="upassword" required="">
                      </div>
                        <input class="form-control hidden" type="text" name="uuserType" required="" value="<?php echo $updateAdmin->user_type; ?>">
                      </div>
                    </div>

                    <div class="modal-footer">
                        <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                        <input onclick="return formValidate()" id="" class="btn btn-primary" type="submit"  name="action" value="Update">
                    </div>
                </form>
                                    </div>

                </section>
            </div>
        </div>
    </div>
   
    <!-- ADD ADMIN MODAL -->
	


    <!-- UPDATE ACCOUNT MODAL -->
    <div id="updateAccount" class="modal" tabindex="-1" data-width="550">
        <div class="modal-header bg-inverse bd-inverse-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h1 class="modal-title" align="center">UPDATE ACCOUNT</h1>
        </div>

        <div class="modal-body">
            <div class="panel-body">

            <!-- Modal content-->
                <form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/CAdmin/updateAdmin">

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">First name:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="ufname" required="" value="<?php echo $updateAdmin->first_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Middle Initial:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uminame" required="" value="<?php echo $updateAdmin->middle_initial; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Last name:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="ulname" required="" value="<?php echo $updateAdmin->last_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Email:</label>
                      <i>(example: johndoe@XXXX.com)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uemail" required="" value="<?php echo $updateAdmin->email; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Birthdate:</label>
                      <div class="col-8">
                        <input class="form-control" type="date" name="ubdate" required="" value="<?php echo $updateAdmin->birthdate; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Gender:</label>
                      <div class="col-8">
                      <select class="form-control" name="ugender" required=""> <br>
                        <option value="Male" <?php if($updateAdmin->gender=='Male') {echo "selected=''";}?> >Male</option>
                        <option value="Female" <?php if($updateAdmin->gender=='Female') {echo "selected=''";}?>>Female</option>
                        <option value="Other" <?php if($updateAdmin->gender=='Other') {echo "selected=''";}?>>Other</option>
                      </select>
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Contact no:</label>
                      <i>(if mobile no.: 09XXXXXXXXX; if telephone no.: XXX-XXXX)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" min="11" name="ucontact" required="" value="<?php echo $updateAdmin->contact_no; ?>">
                      </div>
                    </div>

                    <br><br>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Username:</label>
                      <i>(must contain at least 3 characters, maximum of 50 characters)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uuname" required="" value="<?php echo $updateAdmin->user_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Password:</label>
                      <i>(must contain at least 8 characters, maximum of 50 characters)</i>
                      <div class="col-8">
                        <input class="form-control" type="password" name="upassword" required="" value="<?php echo $updateAdmin->password; ?>">
                      </div>
                        <input class="form-control hidden" type="text" name="uuserType" required="" value="<?php echo $updateAdmin->user_type; ?>">
                      </div>
                    </div>

                    <div class="modal-footer">
                        <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Closes</button>
                        <input id="update" class="btn btn-primary" type="submit"  name="action" value="Upsdate">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
  function formValidate(){
    var form = document.forms["updateAccountForm"];
    var fname = form["ufname"].value;
    var mname = form["uminame"].value;
    var lname = form["ulname"].value;
    var regex = /\d/;

    var bdate = document.getElementById("bdayt").value;
    var date = new Date(bdate);
    var year = date.getFullYear() + 18;
    var validateDate = new Date();
    var validateYear = validateDate.getFullYear();
    if(year < validateYear){
      return true;
    }else{
      alert("You are below 18");
      return false;
    }

    if(regex.test(fname) || regex.test(mname) || regex.test(lname)){
      alert("Invalid Input.");
      return false;
    }
    return true;
  }
</script>


<script type="text/javascript">
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();
   if(dd<10){
          dd='0'+dd
      } 
      if(mm<10){
          mm='0'+mm
      } 

  today = yyyy+'-'+mm+'-'+dd;
  document.getElementById("bdate").setAttribute("max", today);
</script>
