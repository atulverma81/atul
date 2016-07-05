<?php echo $javascript->link('listing.js');?>
<?php echo $javascript->link('prototype.js');?>
<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management"> User Contacts</h2>	
        </div>
	<div style="padding:2px">
	<?php  echo $html->link('User Contacts','/admin/contacts/index').' >> ';
	echo '<span class="mediumFontf">View Contacts<span>'; ?>
	</div>
	<div id="listingJS" style="display: none; color:#3333FF;" ></div>

					<div id="loaderID" style="display:none;position:absolute;margin-left:300px;margin-top:50px"><?php echo $html->image("loader_large_blue.gif"); ?></div>

				
				

					<?php echo $form->end();?>
 	<?php echo $this->renderElement("admin/contact/index"); ?>
</div>