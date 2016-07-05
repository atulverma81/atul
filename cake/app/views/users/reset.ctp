<?php echo $form->create('User',array('action'=>'ForgotPassword','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateUser','onSubmit'=>'return validateUser();') )?>   
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3>RECOVER USERNAME/PASSWORD </h3> 
	 

        <ul class="flash-fields"> 
          <li> 
	 <p >Your username / password has been sent to your email address , please check your email account. </p> 
          </li> 
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->
