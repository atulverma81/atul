 <?php echo $javascript->link('jquery-1.3.2.min.js'); ?>	
<?php  echo $javascript->link('fckeditor');?>

<div  class="single" >
	<h2>
<img src="/img/users.gif" alt="Newsletter"> Newsletter Subscription Details</h2>
</div>
<div style="padding:2px">
<?php  
 echo $html->link('Newsletter Subscription','/admin/newsletters/index').' >> ';

 echo '<span class="mediumFontf">Send Newsletter<span>';
?>
 </div>	<?php echo $form->create('Newsletter',array('action'=>'send','method'=>'POST','name'=>'frmSendNewsletter','onSubmit'=>'return validateSendNewsletter();'))?>

				<table width="100%" border="0" cellpadding="5" cellspacing="0">
					<tr><td width="100%" colspan="2" align="right">&nbsp;<font color="red">* </font><b>marked are mandatory.</b></td>
					<tr><td width="20%">&nbsp;</td><td style="color:red" id="jsError"><?php $session->flash(); ?></td></tr>
					</table>
					
					<table width="100%" border="0" cellpadding="5" cellspacing="0" id="NewsLetterDiv">
					<tr>
						<td align="right" width="20%"><?php echo __("Newsletter Title",true)?><font color="red">* </font></td>
						<td width="50%"><?php echo $form->input('Newsletter.title', array('maxlength'=>'150','size'=>'40','label'=>'', 'div'=>false,'errors'=>true))?></td>
					</tr>
					
					<tr>
						<td align="right" width="20%"><?php echo __("Description",true)?><font color="red"> </font></td>
						<td width="50%">
						 <!--Fckeditor content starts from here-->
						<?php 
							echo $form->textarea('Newsletter.description',array('rows'=>'15','cols'=>'80','error'=>false)); 
							echo $fck->load('Newsletter/description'); 
							echo $form->error('Newsletter.description',array('class'=>'error_msg'));
						?>
						</td>
					</tr>
					</table>
					
	<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#FBE9BD" style="border:#FBE9BD solid 1px" rules="all" class='tableBorder'>
			<tr class="formSectHeader" align="center">

			 <td class="thclass" style="text-align:center;"><input type="button" name="master" class="btn" id="master"  
 value="Check/Uncheck" onClick="chkBoxes(document.frmSendNewsletter);"></td>
			<td class="thclass">Email Address</td>
		       </tr>
			<?php if(!empty($emailids)){ ?>	
				<?php
				// list all users
				$counter=0;
				
				foreach($emailids as $emails){
				if($counter%2 == 1) $bgColor = "#ffffff"; else $bgColor = "#F4F8FE";
				?>	
				<tr bgcolor="<?=$bgColor?>">
					<td class="list" style="text-align:center;">
						 <?php echo $form->checkbox("Newsletter.email.$counter", array('value' => $emails['Newsletter']['email']));?>				
					</td>
					<td class="list" style="text-align:center;">
						<?php echo $emails['Newsletter']['email'];?>
					</td>
					
						
				</tr>
				<?php
				$counter++; }}//end of foreach
				?>		
		</table>
					<table width="100%" border="0" cellpadding="5" cellspacing="0">
					<tr>
						<td align="right" width="20%">&nbsp;</td>
						<td width="50%">&nbsp;</td>
					</tr>
					<tr>
					
					
						
						<td align="right"><?php echo $form->submit(__("Send",true),array('class'=>'btn', 'onclick'=>'window.scroll(0,0)'))?></td>
						
						<td align="left"><?php echo $html->link(__("Cancel",true),array('action'=>'/'),array('class'=>'btn', 'onclick'=>'window.scroll(0,0)'))?></td>
					</tr>
					</table>
						<?php echo $form->end(); ?>
						<div class="clear"></div>
				</div>
				<div class="bottom">
					
				</div>
			</div>
		</td>
  </tr>
</table>
 <script type="text/javascript"> 
 function chkBoxes (form) { 
 var state; 
 for (i=0;i<form.elements.length;i++) {  
 var obj = form.elements[i]; 
 if ((obj.type == 'checkbox') && (obj.name!= 'master')) {  
 state = obj.checked; // true or false 
 obj.checked = (state==true)?false:true; 
 } 
 } 
 } 
 </script>