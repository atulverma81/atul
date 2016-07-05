<?php echo $javascript->link('checkallbox.js'); ?>
<div id="content">
<!--  right-content div starts here -->
		<div class="right-content">
			<div class="banner">
				<img src="/img/vacation/banner.gif" width="186" height="170" alt="" />
			</div>
			<div class="travel-offers">
				<h4>Travel Offers</h4>
				<ul>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
				    <li><a href="#">Lorem ipsum dolor</a></li>  
				</ul>
				<p>
					<a href="#">read more</a>
				</p>
			</div>
		</div>
		<!--  right-content div ends here -->

		<!--  center-content div starts here -->
		<div class="left-innercontent">
            <?php echo $this->element('inner_header');?>
			
        <div  class="single" >
            <h2 class="aboutus">My Messages</h2>								 		
        </div>	        
    
    <?php echo $this->element('inbox_menu');?>
                    
    <div class="contactUpperbg"></div>
    
    <div class="contactMainbg">
    
    <div class="contactcontentpad">
    
    <?php foreach ($data as $output) { ?>
    <div class="info" id="content">
            <span class="left-txt">Subject :</span>
            <span class="right-txt"><?php  echo $output['MessageContent']['subject']; ?></span><br class="clear" />
            <span class="left-txt">From :</span> <span class="right-txt"><?php echo $sender; ?></span><br class="clear" />
            <span class="left-txt">Date :</span> <span class="right-txt"><?php echo date('M j, y',strtotime($output['Message']['created'])); ?></span><br class="clear" />
            <span class="left-txt">To :</span> <span class="right-txt"><?php echo $receiver; ?></span><br class="clear" />
            <span class="left-txtex">Message :</span> <span class="right-txtex"></span>
    </div>
    <br class="clear" />
    <p class="offerDesc">       
        <?php echo $output['MessageContent']['body']; ?><br class="clear" />                     
    </p>
    <?php } ?>
  
    </div>
    
    </div>
    
    <div class="contactLowerbg"></div>
    </div>
    </div>
    <!--  center-content div ends here -->
		
	
		