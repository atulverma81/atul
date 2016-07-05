<?php  echo $javascript->link('listing.js');?>
<?php echo $javascript->link('prototype.js');?>
 
  
	<div  class="single" >
		<h2>Admin Details</h2>								 		
	</div>
	<div style="padding:2px">
	<?php  echo $html->link('Admin Management','/admin/admins/index').' >> ';
	echo '<span class="mediumFontf">View  Admin Details<span>'; ?>
	</div>
	<div id="listingJS" style="display: none; color:#3333FF;" ></div> 
		<div id="loaderID" style="display:none;position:absolute;margin-left:300px;margin-top:50px"><?php echo $html->image("loader_large_blue.gif"); ?></div>

		<?php if($session->check('message')){

			echo "<div class='SuccessMsgBox success' style='color:#3333FF' 'id='msgID'><ul><li>".$session->read('message')."</li></ul></div>";
			$session->del('message');
		}?> 
 
 
<div style=" border:0px solid red; font-size:12px;  margin:20px 0px 0px 0px;  Color:#ff0000;">
                 <?php   $session->flash(); ?> 
       </div>
	<?php echo $this->renderElement("admin/admins/index"); ?>
       </div>	 