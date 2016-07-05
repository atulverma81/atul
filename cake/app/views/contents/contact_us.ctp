<?php echo $javascript->link('jquery-1.3.2.min.js'); ?>		
<?php echo $javascript->link('jquery.dodosTextCounter-0.1.pack.js'); ?>	
<script type="text/javascript">
jQuery(function($){
	$("textarea.textareacontact").dodosTextCounter(500, {counterDisplayElement: "span",counterDisplayClass: "test3CounterDisplay"});
});
</script>	
 <!--body starts-->
     <div class="bodymain-cont pad-top">
     	
        <!--body middle log in starts-->
        	            	
                	<div class="loginbg">
                    	<div class="each-sec">
                        	<div class="login-topbg"></div>
                            	<div class="login-middlebg">
                                	<div class="newsletter-middle-pad">
                                    	<div class="news-form-main">
				  <?php echo $form->create('Contents',array('action'=>'contactUs','method'=>'POST','name'=>'frmCreateContact','onSubmit'=>'return validateContactUs();'))?>
                                        	<ul>
                                            	<li class="user-info bdr-right"><img src="/images/logo-login.png" alt="" /></li>
                                                <li class="group_manager extra-width">
                                                	<h1>Contact Us</h1>
						<div class="contact-error-space">Fields marked with <font color="red">*</font> are required.</div>

						<div id="jsError" style="color:#FF0000"></div>

                                                    <label class="username">Comments, Suggestions, Inquiries <font color="red">*</font></label>
                                                    <div>
                                                    	<?php echo $form->input('comments', array('label'=>false, 'div'=>false,'class'=>'textareacontact','cols'=>'42','rows'=>'5'))?>
							You have <span class="test3CounterDisplay">500 </span> characters left.
                                                    </div>
 
                                                   <label class="username">Email Address <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('email', array('maxlength'=>'20','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
							<label class="username">First Name <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('firstname', array('maxlength'=>'30','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
						<label class="username">Last Name <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('lastname', array('maxlength'=>'30','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
						<label class="username">Company Name</label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('company', array('maxlength'=>'80','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
						<label class="username">Address <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('address', array('maxlength'=>'60','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>

							<label class="username">City <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('city', array('maxlength'=>'40','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>

							<label class="username">State <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('state', array('maxlength'=>'40','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
							<label class="username">Country <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('country', array('maxlength'=>'40','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>

						<label class="username">Post Code <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('post_code', array('maxlength'=>'7','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>

						<label class="username">Owner Type <font color="red">*</font></label>
                                                    <div>
                                                    	 <?php							
                    						echo $form->select('owner',array('holidamaker'=>'Holidamaker','homeowner'=>'Homeowner','general Enquiry'=>'General Enquiry'),null,array('default'=>'holidamaker','class'=>'contact_combo_box'),'Select Owner');
                					?>
                                                    </div>
							<label class="username">Phone <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('phone', array('maxlength'=>'20','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
						
							
							
                                                    <button type="submit" class="login-btn"><span>SUBMIT</span></button>
                                                </li>
                                            </ul>
					 <?php echo $form->end(); ?>
                                        </div>
                                    </div>
                                </div>
                            <div class="login-bottombg"></div>
                        </div>
                    </div>
               
        <!--body middle log in ends-->
        
     </div>
     <!--body ends-->