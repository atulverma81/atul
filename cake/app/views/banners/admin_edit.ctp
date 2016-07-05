<div  class="single" >
	<h2><img src="/img/users.gif" alt="Banner Management">  Banner Management</h2>			 					 		
</div>
<div style="padding:2px">
                
<?php  
 echo $html->link('Banner Management','/admin/banners/index').' >> ';
 
 echo '<span class="mediumFontf">Edit Banner<span>';
?>
 


 </div>               

     		
		
 
<table width="94%" border="0" cellpadding="5" cellspacing="0">
	<tr>
              <td width="100%" colspan="2" align="right">&nbsp;
<font color="red">* </font><b>marked are mandatory.</b>
              </td>
	</tr>
 	<tr>
         <td width="30%">&nbsp;</td>
             <td>
       <!-- START: If Error Message is populated by JAVASCRIPT -->
<div id="divMessageJS" style="display: none;margin-bottom:100px;background-color:#FFFF00;border:#FF0000" >
	</div>
	    </td>
         </tr>
      <tr>
	        <td align="left" style="color:red" colspan="2">			
				<?php $session->flash(); ?>
		        </td>
    </tr>
    <tr>
               <td width="30%">&nbsp;</td>
             <td style="color:red" id="jsError"> 
		<?php 
                               if(isset($msgString)){
					echo "<div class='ActionMsgBox error' align='left' id='msgID'>".$msgString."</div>";
					}
                ?> 
	     </td>
        </tr>
</table>
<?php echo $form->create('Banner',array('action'=>"edit/$bannerid",'name'=>'edit','enctype'=>'multipart/form-data','onSubmit'=>'return validBanner();'))?>

<table width="90%" cellpadding="3" border="0" cellspacing="0" style="border: 1px solid #66666" align="center">
 <?php if($session->check('message')) { ?>
  <tr><td align="center" align="center" colspan="9"><font color="red"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
  <?php } ?>
    <tr>
	   <td align="right" valign="top" width="30%">
<font color="red">*</font>Banner Name : </td>
	   <td>
	      <?php 
echo $form->input('Banner.name', array('maxlength'=>'100','size'=>'20','class'=>'textbox','label'=>''));

 ?>
	    
	   </td>
	  </tr>
         <tr>
	   <td align="right" valign="top" width="30%">
<font color="red">*</font>Banner Description : </td>
	   <td>
	      <?php 
echo $form->input('Banner.content', array('class'=>'','label'=>'','div'=>false,'cols'=>38));

 ?>
	    
	   </td>
	  </tr>

       
       <tr>
						<td align="right" width="30%"><?php echo __("Upload Image",true)?><font class="requiredField"></font></td>
						<td width="50%"><?php echo $form->file('Banner.document'); ?></td>
					</tr>
					<tr>
						 <td align="right" valign="top" width="30%"><td style="color:red;">Please upload file with width 640px and height 303px only.</td>
					</tr>
				<tr>
						<td align="right" width="30%">&nbsp;</td>
						<td width="50%"><img src="/img/banner/<?php	echo @$this->data['Banner']['filename'];?>" width="100" height="40" alt="banner image" /></td>
					</tr>

					
					<tr>
						<td align="right" width="30%"><?php echo __("Status",true)?><font class="requiredField">*</font></td>
						<td width="50%"><?php echo $form->select('Banner.status',array('1'=>'Active','2'=>'Deactive'),null,array('label'=>'','div'=>false,'errors'=>true),'Please select')?>
						<div class="error-message"><?php echo $form->error('status'); ?></div>
						</td>
					</tr>
					
						
	<tr>
						
						<td align="right" width="30%"><?php echo $form->submit(__("Update",true),array('class'=>'btn','div'=>false, 'onclick'=>'window.scroll(0,0)'))?></td>
						
						<td width="50%"><?php echo $html->link(__("Cancel",true),array('action'=>'/'),array('class'=>'btn', 'onclick'=>'window.scroll(0,0)'))?></td>
					</tr>
	</table>

<!-- And finally, the submit button-->

<?php echo $form->end();?>           
</fieldset>
<!-- End: Content -->