 
<?php
		$paginator->options(array('update'=>'listID', 
					'url'=>array('controller'=>'events','action'=>'SearchResult',$separator), 
					'indicator' =>'loaderID'));
		$ascImage = $html->image('sort_up.gif',array('border'=>0));
		$descImage = $html->image('sort_down.gif',array('border'=>0));
?>
 
<!--Top Pagination Starts Here-->
<div id="loaderID" style="display:none;position:absolute;margin-left:480px;margin-top:50px"><?php echo $html->image("/images/loader_large_blue.gif"); ?></div>
<div id="listID">
 
 <?php if(!empty($events)) {?>
      <nav class="pagination">
        <p>Showing Page <?php echo $paginator->counter(); ?></p>
	<ul>
          <li> <?php echo $paginator->prev('<<', array('escape'=>false)); ?>  </li> 
          <li> <a class="current"> <?php echo $paginator->numbers(array('separator'=>'','escape'=>false)); ?>  </a></li>
          <li>   <?php echo $paginator->next('>>', array('escape'=>false)); ?>  </li> 
        </ul>
      </nav>
   <?php } ?>   
      <!--Top Pagination Ends-->
      <!--Event By Search Result Starts Here-->
      <ul class="events">
         <?php if(!empty($events)){  foreach($events as $event) { ?>
        <!--/*****************/-->
        <li>
        <div class="event-image">
	<?php if(!empty($event['Event']['image'])) {?>
	<img src="/img/eventImages/thumbs/<?php echo $event['Event']['image']; ?>" alt="">
	<?php } else {?>
	<img src="/images/event.jpeg" height="144" width="100" alt="">
	<?php } ?>
	</div>
          <div class="event-descp">
            <ul>	   
              <li>
                <h3><?php echo $event['Event']['event_name'];?></h3>
              </li>
               <li class="event-date"><b>Location:&nbsp;</b> </li> 
              <li>  <?php echo ucfirst($event['Event']['street']);?> <br> <?php echo ucfirst($event['Event']['city']);?> , <?php if(!empty($event['Event']['otherstate'])) { 
              		  echo $event['Event']['otherstate']; 
              } else { echo $utility->findStateName($event['Event']['state']);}
              	?> , <?php echo $event['Event']['zipcode'];?> <br> <?php echo $utility->findCountryName($event['Event']['country']);?> <br> <?php echo $event['Event']['phone'];?> </li>             
              <li class="event-date"><b>Start-Date:&nbsp;</b> <?php echo e($time->format('D, M d, Y',$event['Event']['start_date']));?></li>
  <li class="event-date"><b>End-Date:&nbsp;</b> <?php echo  e($time->format('D, M d, Y',$event['Event']['end_date']));?></li>
  <li class="event-date"><b>Start-Time:&nbsp;</b> <?php echo  e($time->format('H:i a',$event['Event']['start_date']));?></li>
  <li class="event-date"><b>End-Time:&nbsp;</b> <?php echo  e($time->format('H:i a',$event['Event']['end_date']));?></li>  
    <li>  
	       <a href="#" onclick="javascript:void window.open('/events/ViewEvent/<?php echo $event['Event']['id']; ?>','1280827590745','width=950,height=350,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" class="c-more" style="cursor:pointer;">See More Details</a> 
		
		<?php $userid = $session->read("loginId"); if(isset($userid) &&  ($userid == $event['Event']['user_id'])){?>
	        <a href="#" class="c-more">View Comments</a><a href="/Events/editEvent/<?= $event['Event']['id'] ?>" class="c-more">Edit Event</a>
	        <a href="/Events/deleteEvent/<?= $event['Event']['id'] ?>" onClick="return show_confirm();" class="c-more">Delete Event</a>
		<?php } ?>
		</li>
		 
              </ul>
             
              <?php $userid = $session->read("loginId"); if(!empty($userid)) { ?>
              <ul>
              <li class="expand" id="catagory<?php echo $event['Event']['id']; ?>">
              <a href="javascript:void(0);" onclick="toggle_visibility('show<?= $event['Event']['id'] ?>','catagory<?= $event['Event']['id'] ?>');" > 
		POST COMMENTS</a>
              </li>
              	<li class="collapse" id="show<?php echo $event['Event']['id']; ?>" style="display:none;">
<a href="javascript:void(0);" onclick="toggle_visibility('show<?= $event['Event']['id'] ?>','catagory<?= $event['Event']['id'] ?>');" > 
		POST COMMENTS</a>
                	<ol> 
                	    <textarea id="comment<?php echo $event['Event']['id']; ?>" style="width: 590px; height: 33px;" ></textarea> <br>
			   <input type="submit" class="comment_submit" value=" Comment " onclick="postComment(<?= $event['Event']['id'] ?>),toggle_visibility('show<?= $event['Event']['id'] ?>','catagory<?= $event['Event']['id'] ?>');" >
                    </ol>
                </li>
               
              </ul>
              <?php } ?>
              <ul> <li id="loader" style="display:none;position:absolute;margin-left:400px;margin-top:50px"> <?php echo $html->image("/img/loader_large_blue.gif"); ?> </li></ul>
			<ul> 
			<li id="c_show<?php echo $event['Event']['id']; ?>"><a href="javascript:void(0);" onclick="return showComment('c_show<?= $event['Event']['id'] ?>','c_hide<?= $event['Event']['id'] ?>','commentMessage<?= $event['Event']['id'] ?>');">View Comments </a></li>
			<li id="c_hide<?php echo $event['Event']['id']; ?>" style="display:none;"><a href="javascript:void(0);" onclick="return showComment('c_show<?= $event['Event']['id'] ?>','c_hide<?= $event['Event']['id'] ?>','commentMessage<?= $event['Event']['id'] ?>');">Hide Comments </a></li>
			</ul>
               
              <ul id="commentMessage<?php echo $event['Event']['id']; ?>" style="display:none;">  
                      <?php  
					$allComments = $utility->getComments($event['Event']['id']);
                      
                      if(!empty($allComments)) { foreach($allComments as $comment){  ?>
                    <li class="expand" id="commentcatagory<?php echo $comment['Comment']['id']; ?>">
                            <a href="javascript:void(0);" onclick="togglemessage_visibility('commentshow<?php echo $comment['Comment']['id']; ?>','commentcatagory<?php echo $comment['Comment']['id']; ?>');">
                                 <?php echo $comment['User']['username']; ?>
                            </a>  <p style="float:right;">Posting Date : <?php echo $comment['Comment']['posting_date']; ?> <?php if($userid == $comment['Comment']['user_id']){ ?>
				  	&nbsp; &nbsp;<img src="/img/delete.gif" onclick="deleteComment(<?= $comment['Comment']['id'] ?>,<?= $comment['Comment']['id'];?>)" height="15" width="15" style="cursor:pointer;"> 
				  <?php } ?>
				</p>
                    </li>
                    <li class="collapse" id="commentshow<?php echo $comment['Comment']['id']; ?>" style="display:none;">
                            <a href="javascript:void(0);" onclick="togglemessage_visibility('commentshow<?php echo $comment['Comment']['id']; ?>','commentcatagory<?php echo $comment['Comment']['id']; ?>');" > 
                                   <?php echo $comment['User']['username']; ?>
                            </a>
                            <ol>
                               <?php echo $comment['Comment']['comment']; ?>
                            </ol>
                    </li>
                <?php } }?>
            </ul>
            
	    </div>
	   </li>
	 <?php } } else { ?>
	  <ul class="flash-fields">
              <li> 
                <h2>No Events Found !</h2>
              </li>
	      </ul>
	 <?php } ?>
  
        <!--/************/--> 
      </ul>
  <!--Bottom Pagination Starts Here-->
   <?php if(!empty($events)) {?>
      <nav class="pagination">
        <p>Showing Page <?php echo $paginator->counter(); ?></p>
      <ul>
          <li> <?php echo $paginator->prev('<<', array('escape'=>false)); ?>  </li> 
          <li> <a class="current"> <?php echo $paginator->numbers(array('separator'=>'','escape'=>false)); ?>  </a></li>
          <li>   <?php echo $paginator->next('>>', array('escape'=>false)); ?>  </li> 
        </ul>
      </nav>
      <?php } ?> 
</div>      
 
      <!--Bottom Pagination Ends-->     
 <!--Event By Search Result Ends-->
