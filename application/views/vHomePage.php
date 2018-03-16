	<div class="container-box">
		<div class="container-content"></div>
		<div class="container" >
			<div class="col-md-12" id="eventsList">
				<div class="row">
					<div class="list-of-events"  id="targ2" style="margin-top: 10%;">
						<?php
	                    	$cnt =1;
	                        if(count($events) >0){

	                            foreach ($events as $event) {
									
	                    ?>
						
		                            <div class="event-box">
					        		 	<a href="<?php echo site_url();?>/CLogin/viewLoginEvent/<?php echo $event->event_id;?>">
					        		 		
					                		<div class="event-box-overlay">
						                		<span class="fa-stack fa-lg">
						    						<i class="glyphicon glyphicon-eye-open"></i>
												</span>
											</div>
											<div class = "event">
												<img style="width: 300px; height:0px;" >
												<div class = "event-description">
													<?php                                                                 
                                                                echo "<center><h3>";
                                                                if(strlen($event->event_name)>=42){
                                                                    echo substr($event->event_name,0,39)."...";
                                                                }else{
                                                                    echo $event->event_name;
                                                                }

          													 
                                                                echo '</h3></center><div><h5>Where: '.$event->event_venue.', '.$event->location[0]->location_name.', '.$event->location[0]->region_code.'</h5>';

                                                                $dateS = date_create($event->dateStart);
                                                                $dateE = date_create($event->dateEnd);
                                                                echo '<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'</h5>';
                                                                
                                                                echo '<div class="dot-hr"></div>';
                                                  
					        		 		?>
												</div>
											</div>
										</a>
									</div>
	                    <?php
	                            }
	                        }else{
	                        	echo "<center><h1 style='margin-top:100px !important;'>No available events!</h1></center>";
	                        }
	                    ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

