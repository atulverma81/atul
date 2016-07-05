<?php echo $javascript->link('jquery-1.3.2.min.js'); ?>	
<?php  echo $javascript->link('fckeditor');?>
<script>
	var current = 1;
	jQuery.noConflict();
	function addPhoto() {
	//current keeps track of how many people we have.	
	current++;
	var strToAdd = '<p style="float:left;"><input id="fileName1" type="file" name="data[Article][fileName1][]"><input type="button" class="CLEARREM" onclick="this.parentNode.parentNode.removeChild(this.parentNode);"/></p>'
	jQuery('#mainField').append(strToAdd)
	}
	
	jQuery(document).ready(function(){	
	jQuery('#addPhoto').click(addPhoto);	
	});

</script>


<?php 
            $url=$this->here; 

             $data=explode("editContent/",$url);
               $contentId=$data[1];

?>
<div class="single">
<h2>
<img alt="Property Management" src="/img/users.gif"/>
Update Content Details
</h2>
</div>

<div style="padding:2px">
	<?php  echo $html->link('Contents','/admin/contents/').' >> ';
	echo '<span class="mediumFontf">Update Content<span>'; ?>
	</div>
<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr>
              <td width="100%" colspan="2" align="right">&nbsp;<font color="red">* </font><b>marked are mandatory.</b>
              </td>
	</tr>
 	<tr>
         <td width="20%">&nbsp;</td>
             <td>
              		<?php if(isset($msgString)){
					echo "<div class='ActionMsgBox error' align='left' id='msgID'>".$msgString."</div>";
					}?> 
                   	<!-- START: If Error Message is populated by JAVASCRIPT -->
						<div id="divMessageJS" style="display: none;margin-bottom:100px;background-color:#FFFF00;border:#FF0000" >
						</div>


	     </td>
         </tr>
	<tr>
                     <td width="20%">&nbsp;</td>
                    <td style="color:red" id="jsError"> 
					<?php if(isset($msgString)){
					echo "<div class='ActionMsgBox error' align='left' id='msgID'>".$msgString."</div>";
					}?> 
					</td>
                                          </tr>
</table>
				 
		<!-- START: If Error Message is populated by JAVASCRIPT -->
						<div id="divMessageJS" style="display: none;margin-bottom:100px;background-color:#FFFF00;border:#FF0000" >
						</div>
	<!-- End: If Error Message is populated by JAVASCRIPT -->
						<?php echo $form->create('Contents',array('action'=>"editContent/$contentId",'method'=>'POST','enctype'=>'multipart/form-data','name'=>'frmCreateNews','onSubmit'=>'return  validateContent();') )?>
			 <?php if(isset($msgString)){
				echo "<div class='ActionMsgBox error' align='center' id='msgID'>".$msgString."</div>";
						}?>

				<table width="100%" border="0" cellpadding="5" cellspacing="0">
					 
					
					
					 
					<tr>
						<td align="right" width="15%"><?php echo __("Page Title",true)?><font class="requiredField" color="red">*</font></td>
						<td width="80%"><?php echo $form->input('Content.pagetitle', array('maxlength'=>'200','size'=>'40','label'=>'', 'div'=>false,'errors'=>true))?></td>
					</tr>
						<tr>
						<td align="right" width="15%"><?php echo __("Type",true)?><font class="requiredField" color="red">*</font></td>
						<td width="80%"><?php echo $form->select('Content.sub_link',array('1'=>'Sectors','2'=>'Solutions','3'=>'Partners','4'=>'Company','5'=>'Connect','6'=>'Company Profile','7'=>'24x7 Tec. Support','8'=>'Major projects'),null,array('label'=>'','div'=>false,'errors'=>true,'style'=>'width:290px;'),'Please select')?>
						<div class="error-message"><?php echo $form->error('sub_link'); ?></div>
						</td>
					</tr>
					<tr>
						<td align="right" width="20%"><?php echo __("Header Title",true)?><font class="requiredField" color="red">*</font></td>
						<td width="80%"><?php echo $form->input('Content.meta_title', array('maxlength'=>'500','size'=>'40','label'=>'', 'div'=>false,'errors'=>true))?></td>	
						
					</tr>
					<tr>
						<td align="right" width="15%"><?php echo __("Meta Keywords",true)?><font class="requiredField" color="red">*</font></td>
						<td width="80%"><?php echo $form->input('Content.meta_keywords', array('type'=>'textarea','rows'=>'4','cols'=>'52','label'=>'', 'div'=>false,'errors'=>true))?></td>
					</tr>
					<tr>
						<td align="right" width="15%"><?php echo __("Meta Description",true)?><font class="requiredField" color="red">*</font></td>
						<td width="80%">

<?php echo $form->input('Content.meta_description', array('type'=>'textarea','rows'=>'4','cols'=>'52','label'=>'', 'div'=>false,'errors'=>true))?></td>
					</tr>
					<tr>
						<td align="right" width="15%"><?php echo __("Description",true)?><font class="requiredField"></font></td>
						<td width="80%" colspan="2">
						<div>
						 <!--Fckeditor content starts from here-->
						<?php 
							echo $form->textarea('Content.description',array('error'=>false)); 
							echo $fck->load('Content/description'); 
							echo $form->error('Content.description',array('class'=>'error_msg'));
						?>
						</div>
						</td>
					</tr>
					 
					 
					<tr>
						<td align="right" width="15%"><?php echo __("Status",true)?><font class="requiredField" color="red">*</font></td>
						<td width="40%"><?php echo $form->select('Content.status',array('1'=>'Active','2'=>'Inactive'),null,array('label'=>'','div'=>false,'errors'=>true),'Please select')?>
						<div class="error-message"><?php echo $form->error('status'); ?></div>
						</td>
					</tr>
					<tr>
						<td align="right" width="15%">&nbsp;</td>
						<td width="80%">&nbsp;</td>
					</tr>
				
					<tr>
						
						<td><?php echo $form->submit(__("Update",true),array('class'=>'btn', 'onclick'=>'window.scroll(0,0)'))?></td><td><?php echo $html->link(__("Cancel",true),array('action'=>'/'),array('class'=>'btn', 'onclick'=>'window.scroll(0,0)'))?></td>
					</tr>
					</table>

						<?php echo $form->end(); ?>

 
						 
			
		 