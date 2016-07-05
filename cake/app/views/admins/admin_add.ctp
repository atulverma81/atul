<div  class="single" >
	<h2>Admin Managment</h2>	</div>
<div style="padding:2px">            
<?php  
 echo $html->link('Admin Management','/admin/admins/index').' >> ';
 
 echo '<span class="mediumFontf">Add Account<span>';
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
					<?php if(isset($msg)) {  echo $utility->showArr($msg); } ?>
		        </td>
        </tr>
	<tr> <td>&nbsp; </td></tr>
</table>
<?php 
 echo $form->create('Admin',array('action'=>'admin_add','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'addAdmin'));
?>
<table width="80%" cellpadding="3" border="0" cellspacing="0" style="border: 1px solid #66666" align="center">
 
 
<tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>User Name : </td>
	  <td> 
	     <?php echo $form->input('User.username', array('id'=>'user','size'=>'20','class'=>'validate[required,custom[noSpecialCaracters],length[0,20]] textbox','label'=>'','maxlength'=>'50')); ?>
	   </td> 
</tr>
	<tr></tr>
	<tr >
	  <td align="right" valign="top"><font color="red">*</font>Email : </td>
	  <td>
	  	<?php echo $form->input('User.email',array('id'=>'email','size'=>'20','class'=>'validate[required,custom[email]] textbox','label'=>'','maxlength'=>'100')); ?> 
	  </td>
	  </tr>
 
           <tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>First Name : </td>
	  <td>
	     <?php echo $form->input('User.firstname', array('id'=>'firstname','class'=>'validate[required,custom[onlyLetter],length[0,50]] textbox','size'=>'20','label'=>'','maxlength'=>'50')); ?> 
	   </td>
	</tr>
	        <tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>Last Name : </td>
	  <td>
	     <?php echo $form->input('User.lastname', array('id'=>'lastname','class'=>'validate[required,custom[onlyLetter],length[0,50]] textbox','size'=>'20','label'=>'','maxlength'=>'50')); ?> 
	   </td>
	</tr>
	<tr>
		<td align="right"><font color="red">*</font>Password : </td>
		<td>
		<?php echo $form->password('User.password', array('id'=>'password','class'=>'validate[required,length[6,11]] textbox')); ?>
		</td>
		</tr>
		<tr>
		<td align="right"><font color="red">*</font>Confirmed Password : </td>
		<td>
		<?php echo $form->password('User.password', array('id'=>'password2','class'=>'validate[required,confirm[password]] textbox')); ?>
				</td>
			</tr> 
	<tr>
		<td align="right"> Status : </td>
		<td><?php echo $form->select('User.status',array('1'=>'Active','2'=>' Inactive' ),@$this->data['Admin']['active'],array('id'=>'status','class'=>'validate[required] small_combo_box','style'=>'width:300px;border:1px solid black;'),'Select Your Status');?> </td>
	</tr>
	
	</table>
		<table align="center" cellpadding="0" border="0" cellspacing="0"> <tr>
	 <td><?php echo $form->submit('Add',array('class'=>'button'));?></td>
	</tr> </table>
<!-- And finally, the submit button-->

<?php echo $form->end();?>          
<!-- End: Content -->


