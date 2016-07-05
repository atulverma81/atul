<!--Search Result Starts Here--> 
   <?php echo $html->css("style"); ?>
    <section class="search-result">
      
    
      <!--Event By Search Result Starts Here-->
      <ul class="events">
        <!--/*****************/-->
         
         <?php  if(!empty($events)) { ?>
        <!--/*****************/-->
        <li>
         <?php if(!empty($events['Event']['image'])) { ?>
	 <div class="event-image"> <img src="/img/eventImages/thumbs/<?php echo $events['Event']['image']; ?>" alt=""> </div>
	<?php } else {?>
         <div class="event-image"> <img src="/images/event.jpeg" height="144" width="100" alt=""> </div> 
	<?php } ?> 
          <div class="event-descp">
            <ul>	   
              <li>
                <h3><?php echo $events['Event']['event_name'];?></h3>
              </li>
              <li class="event-date"><b>Start-date:&nbsp;&nbsp;</b> <?php echo e($time->format('D, M d, Y',$events['Event']['start_date'])); ?></li>
	      <li class="event-date"><b>End-date:&nbsp;&nbsp;</b> <?php echo  e($time->format('D, M d, Y',$events['Event']['end_date'])); ?></li>
	       
	  <li class="event-date"><b>Time:&nbsp;&nbsp;</b> <?php echo  e($time->format('H:i a',$events['Event']['start_date'])); ?> -- <?php echo  e($time->format('H:i a',$events['Event']['end_date'])); ?> 	  
	  </li>
	  <li class="event-date"><b>Location:&nbsp;</b> </li> 
              <li>  <?php echo ucfirst($events['Event']['street']);?> <br> <?php echo ucfirst($events['Event']['city']);?> , <?php if(!empty($events['Event']['otherstate'])) { 
              		  echo $events['Event']['otherstate']; 
              } else { echo $utility->findStateName($events['Event']['state']);}
              	?> , <?php echo $events['Event']['zipcode'];?> <br> <?php echo $utility->findCountryName($events['Event']['country']);?> <br> <?php echo $events['Event']['phone'];?> </li>   
              
		<?php if(!empty($events['Event']['event_frequency'])) {?>
	       <li class="event-date"><b>Frequency:&nbsp;&nbsp;</b> 
		<?php 
			$keyword = $utility->BindFrequency($events['Event']['event_frequency']);
			if(!empty($keyword) && ($keyword == "other")) {
				echo $events['Event']['otherFrequency'];
			}else{
				echo $utility->BindFrequency($events['Event']['event_frequency']); 
			}
			?>
		</li>
		<?php } ?>
              <?php if(!empty($events['Event']['description'])) { ?>
              <li><b>Description:&nbsp;&nbsp;</b> <?php echo $events['Event']['description'];?></li>
              <?php } ?>  
            <li><a href="/Contents/AboutUs" target="_blank" style="color: rgb(0, 169, 229); cursor: pointer;text-decoration:none;"><b>Click here to learn about us:&nbsp;&nbsp;</b> </a></li>   
              </ul>
	    </div>
	   </li>
	 <?php } ?>
            </ul>
          </div>
        </li>
        <!--/************/--> 
       
      </ul>
      <!--Event By Search Result Ends--> 
    </section>
    <!--Search Result Ends-->
  </div>
</section>
<!--Section Ends-->