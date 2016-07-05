<?php echo $form->create('User',array('action'=>'register','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateUser','onSubmit'=>'return validateUser();') )?>   
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3>FAQ</h3>  

	<ul class="mand-fields">
	<li> <?php  $session->flash(); ?>  <font class="requiredField">*</font> marked are mandatory</li>
	</ul>

        <ul class="login-fields">
	 
          <li> 
	 PAGE UNDER CONSTRUCTION !
          </li>
          
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->
