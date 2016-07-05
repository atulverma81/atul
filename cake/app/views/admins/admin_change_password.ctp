<div  class="single" >
	<h2>Admin Managment</h2>	</div>
<div style="padding:2px">            
<?php  
 echo $html->link('Admin Management','/admin/admins/index').' >> ';
 
 echo '<span class="mediumFontf">Change Password<span>';
?>
 </div>               
   <!-- START: If Error Message is populated by JAVASCRIPT -->
	<div id="divMessageJS" style="display: none;"></div>
	<script type="text/javascript">if(!document.body || !document.body.innerHTML) document.write("")</script>
 <!-- END  : If Error Message is populated by JAVASCRIPT -->
<!-- User Register Form -->	
<table width="94%" border="0" cellpadding="5" cellspacing="0">
	<tr>
              <td width="100%" colspan="2" align="right">&nbsp;<font color="red">* </font><b>marked are mandatory.</b>
              </td>
	</tr>
 	 
	<tr>
                
                  <td id="jsError" class="requiredField" colspan="2"> 
		   <?php $session->flash(); ?>
		        </td>
        </tr>
	<tr> <td>&nbsp; </td></tr>
</table>
<?php 
 echo $form->create('Admin',array('action'=>'admin_changePassword','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'chnagePasswordAdmin'));
?>
<table width="80%" cellpadding="3" border="0" cellspacing="0" style="border: 1px solid #66666" align="center">
 
 
<tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>Old Password : </td>
	  <td> 
	    <?php echo $form->input('User.old_password',array('id'=>'old','class'=>'validate[required]','type'=>'password','label'=>false,'div'=>false,'errors'=>true)) ?> 
	   </td> 
</tr>
	<tr></tr> 
	    
	<tr>
		<td align="right"><font color="red">*</font>New Password : </td>
		<td>
		  <?php echo $form->input('User.password',array('id'=>'password','class'=>'validate[required,length[6,11]] text-input','type'=>'password','label'=>false,'div'=>false,'errors'=>true)) ?> 
		</td>
		</tr>
		<tr>
		<td align="right"><font color="red">*</font>Confirm Password : </td>
		<td>
		 <?php echo $form->input('User.confirm_password',array('id'=>'passsword2','class'=>'validate[required,confirm[password]] text-input','type'=>'password','label'=>false,'div'=>false,'errors'=>true)) ?> 
				</td>
			</tr>  
	
	</table>
		<table align="center" cellpadding="0" border="0" cellspacing="0"> <tr>
	 <td><?php echo $form->submit('Change Password',array('class'=>'button'));?></td>
	</tr> </table>
<!-- And finally, the submit button-->

<?php echo $form->end();?>          
<!-- End: Content -->


