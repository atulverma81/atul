<?php echo $form->create('User',array('action'=>'ChangePassword','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateEvent') )?>   
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3>Change Password ! </h3> 
	<ul class="flash-fields">
	<li> <?php  $session->flash(); ?> </li>
	</ul> 
	<ul class="mand-fields">
	<li> <?php  $session->flash(); ?>  <font class="requiredField">*</font> marked are mandatory</li>
	</ul> 
        <ul class="login-fields"> 
          <li> 
	    <?php echo $form->input('User.old_password',array('id'=>'old','class'=>'validate[required]','type'=>'password','label'=>'Old Password<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li> 
	   <?php echo $form->input('User.password',array('id'=>'password','class'=>'validate[required,length[6,11]] text-input','type'=>'password','label'=>'New Password<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
 <li> 
	   <?php echo $form->input('User.confirm_password',array('id'=>'passsword2','class'=>'validate[required,confirm[password]] text-input','type'=>'password','label'=>'Confirm New Password<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
           
        
          <li><label></label><a href="#"><input type="submit" value=" " class="register-btn"></a></li>
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->

