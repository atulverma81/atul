

<?php   // print_r($_REQUEST); 

          $url=$_REQUEST['url']; 


     ?>



<?php  if($url=="admin/users/homeowner"){ ?>

<div id="graybox"> 

	<div class="top-left"><span  style="color:#072957;
display:block;font-size:12px;font-weight:bolder;padding:6px 0 0 10px;">Home Owner Management</span></div>
		<div class="top-right"></div>
			<div id="inside">
				<div id="newsletter">
				   <div id="menu">
		<ul>
			<!--<li><?php //echo $html->link('Add Member','/admin/users/add'); ?></li>-->
			<li><?php echo $html->link('View Home Owner','/admin/users/homeowner'); ?></li>
	               
		</ul>
		</div>

				</div>										
			<div class="clear"></div>
			</div><!--/end inside-->
		<div class="bottom"><img src="/img/gray_bottom_rightbg.gif" align="right" /></div>			
		
</div>
	 <!--/end bluebox-->

<?php  }elseif($url=="admin/users/holidaymaker"){?>

<div id="graybox"  >
 

	<div class="top-left"><span  style="color:#072957;
display:block;font-size:12px;font-weight:bolder;padding:6px 0 0 10px;">Holiday Maker Management</span></div>
		<div class="top-right"></div>
			<div id="inside">
				<div id="newsletter">
				   <div id="menu">
		<ul>
			<!--<li><?php //echo $html->link('Add Member','/admin/users/add'); ?></li>-->
	<li><?php echo $html->link('View Holiday Maker','/admin/users/holidaymaker'); ?></li>
	
		</ul>
		</div>

				</div>										
			<div class="clear"></div>
			</div><!--/end inside-->
		<div class="bottom"><img src="/img/gray_bottom_rightbg.gif" align="right" /></div>			
		
</div>
<?php }else{}  ?>