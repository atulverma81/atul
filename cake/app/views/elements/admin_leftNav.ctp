<div id="first">
<?php  $leftNav = $this->params['controller'].'_leftElement';
	echo $this->element($leftNav); ?>
<div class="clear" style="line-height:10px">&nbsp;</div>				  
      <div id="graybox">
      <div class="top-left"><span>CCS Management</span></div>
	      <div class="top-right"></div>
		      <div id="inside">
			     <div id="press">
			      <ul>
			    <li>
				      <?php echo $html->link('Admin Home','/admin/users/home/ ',array('class'=>'lft_link')); ?>	
			    </li>
                             <li>
				      <?php echo $html->link('Admin Management','/admin/admins/index/ ',array('class'=>'lft_link')); ?>	
			    </li>
			 
		          <li>
				      <?php echo $html->link('Contents Management','/admin/contents/index',array('class'=>'lft_link')); ?>	
			 </li>
                        
		 	 <li>
				      <?php echo $html->link('Contacts Management','/admin/contacts/index',array('class'=>'lft_link')); ?>	
			 </li>
			 <li>
				      <?php echo $html->link('Banners Management','/admin/banners/index',array('class'=>'lft_link')); ?>	
			 </li>
			 	 
          <!--<li>
				      <?php echo $html->link('Countries Management','/admin/countries/index',array('class'=>'lft_link')); ?>	
			 </li>
			  
			 <li>
				      <?php echo $html->link('States Management','/admin/states/index',array('class'=>'lft_link')); ?>	
			 </li>
		 			 <li>
				      <?php echo $html->link('Newsletters Management','/admin/newsletters/index',array('class'=>'lft_link')); ?>
					</li> -->
                 
				  <li>
				      <?php echo $html->link('Change Password','/admin/admins/changePassword',array('class'=>'lft_link')); ?>		
					  </li>

					 <li>
				      <?php echo $html->link('Logout','/admin/admins/logout',array('class'=>'lft_link')); ?>		
					  </li>
			      </ul>
			    </div>										
		      <div class="clear"></div>
		      </div><!--/end inside-->
		      <div class="bottom"><img src="/img/gray_bottom_rightbg.gif" align="right" /></div>			
	      
    </div>
   
</div> 