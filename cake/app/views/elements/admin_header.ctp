<!-- START: TOP HEADER -->
<div id="topheader">
       <a href="/admin/users/home">
         <img id="mlogo" src="/img/admin_area.gif"  alt="Lifestyle Holiday Rental" />
      </a>
	<div id="top-links">
	       <ul>    <?php
		       //Show logout if admin has logged in
		       if($session->check('Admin')){ ?>	
		       <li><a href="/admin/users/home" class="pipe">Home</a></li>
		       <?php echo $html->link('Logout','/admin/users/logout',array('class'=>'pipe'));?>			
		       <?php }  ?>					
		       </li>
	       </ul>
       </div>
  </div>	 <!--/end topheader-->

<?php
//If admin logged in .. then show him top bar
if($session->read('Admin')) { ?>
<div id="dropmenu"></div>
<?php } //End: If admin logged in .. then show him top bar ?>
<!-- END: TOP HEADER -->