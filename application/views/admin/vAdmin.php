<div id="main">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/CAdmin">Home</a></li>
        <li class="active">Events</li>
    </ol>
      <!-- //breadcrumb-->


    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Event</strong> Management</h2>
                    </header>
                    <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" data-provide="data-table" id="toggle-column table-example">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Time</th>
                                  <th>Number of Tickets</th>
                                  <th>Status</th>
                                  <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($row!=FALSE){
                                        foreach ($row as $object) {
                                            echo  "<tr>
                                            <td>".$object->event_id."</td>
                                            <td>".$object->event_name."</td>
                                            <td>".$object->event_date_start." to ".$object->event_date_end."</td>
                                            <td>".$object->total_tickets_amtSold."</td>
                                            <td>".$object->event_status."</td>";

                                            if($object->event_status == "Pending"){
                                              echo " <td><a  href='#' data-id= '".$object->event_id."'>
                                                  <button  type='button' class='btn btn-inverse aprv'>APPROVE</button></a>
                                                  <a href='#' data-id= '".$object->event_id."'>
                                                  <button  type='button' class='btn btn-theme rej'>REJECT</button></a>
                                                  </td>
                                                  </tr>";
                                            }else {
                                              if($object->event_status=="Approved") {
                                                echo "<td>
                                                <button name='button' data-toggle='modal' data-target='#updateAccount".$object->event_id."' type='button' class='btn btn-info' data-backdrop='static' data-keyboard='false'>VIEW ATTENDEES </button>
                                                <input type = 'hidden' value = '".$object->event_id." id = 'pass' name = 'pass'>
                                                </td>
                                                </tr>";  
                                              }                                             
                                            }
                                            ?>
                                              <div id='updateAccount<?php echo $object->event_id?>' class='modal' tabindex'-1' data-width='500'>
                                                <div class='modal-header bg-inverse bd-inverse-darken'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='fa fa-times'></i></button>
                                                        <h1 class='modal-title' align='center'>Event: <?php $object->event_name?></h1>
                                                </div>
                                   
                                                <div class='modal-body'>
                                                  <div class="panel-body">
                                                    <ul class="list-group list-group-flush">
                                                            <?php 
                                                              $result = $this->MReports->nameAttendees( $object->event_id);
                                                              foreach($result as $obj){
                                                            ?>
                                                                    <li class="list-group-item"><?php echo  $obj['user_name']; ?></li>
                                                            <?php
                                                              }
                                                              $num = $this->MReports->countAttendees($object->event_id); 
                                                            ?>
                                                    </ul>
                                                       <h4 class='modal-title' align='left'>TOTAL : <?php echo $num;?></h4>
                                                  </div>
                                                </div>

                                                <div class='modal-footer'>
                                                    <button id='closeEditAccount' type='button' class='btn btn-danger' data-dismiss='modal' >Close</button>
                                                </div>
                                              </div>
                                            <?php
                                            
                                        }
                                    }
                                  ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                    </div>

</div>

</body>
<script>
  $(document).ready(function(){

    $('.aprv').click(function(){
     var id = $(this).closest("a").data('id');
     var res = confirm("Are you sure you want to approve this event?");

                          if(res == true) {
                           $(this).closest("a").attr("href", "<?php echo site_url()."/admin/CAdmin/approveEvent/"?>"+ id);
                           $(this).closest("a").click; 
                          }
     
    });

    $('.rej').click(function(){
     var id = $(this).closest("a").data('id');
     var res = confirm("Are you sure you want to reject this event?");

                          if(res == true) {
                           $(this).closest("a").attr("href", "<?php echo site_url()."/admin/CAdmin/rejectEvent/"?>"+ id);
                           $(this).closest("a").click; 
                          }
     
    });

  });

</script>
