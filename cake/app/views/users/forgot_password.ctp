<?php echo $form->create('User',array('action'=>'ForgotPassword','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateUser','onSubmit'=>'return validateUser();') )?>   
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3>FORGOT PASSWORD </h3> 
	 
	<ul class="flash-fields">
	<li> <?php  $session->flash(); ?></li>
	</ul>  
	<ul class="mand-fields">
	<li>   <font class="requiredField">*</font> marked are mandatory</li>
	</ul> 
        <ul class="login-fields"> 
          <li> 
	<?php echo $form->input('User.email',array('id'=>'email','class'=>'validate[required,custom[email]] text-input','type'=>'text','label'=>'E-mail Address<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
         
          <li><label></label><a href="#"><input type="submit" value=" " class="register-btn"></a></li>
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->
