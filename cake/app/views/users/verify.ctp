<?php echo $form->create('User',array('action'=>'ForgotPassword','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateUser','onSubmit'=>'return validateUser();') )?>   
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3>ACCOUNT VERIFIED</h3> 
	 

        <ul class="flash-fields"> 
          <li> 
	 <p >Dear User , <br><br>
	     Your Account has been activated , Now you may login to access your account <br><br><br><br>

	God bless You Abundantly! <br><br>
	The ChurchPatrol Team	
 </p> 
          </li> 
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->
