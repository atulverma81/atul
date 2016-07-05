<!--body starts-->
     <div class="bodymain-cont pad-top">
     	
        <!--body middle log in starts-->
        	            	
                	<div class="loginbg">
                    	<div class="each-sec">
                        	<div class="login-topbg"></div>
                            	<div class="login-middlebg">
                                	<div class="newsletter-middle-pad">
                                    	<div class="news-form-main">
				   <?php echo $form->create('Newsletter',array('action'=>'subscribe','method'=>'POST','name'=>'frmCreateUser','onSubmit'=>'return validateAddNewsletter();'))?>
                                        	<ul>
						  <?php  if( !empty($check)){ ?>
                                            	<div class="contact-error-space" style="float:right;">Fields marked with <font color="red">*</font> are required.</div>
                                                <li class="group_manager-div extra-width">
                                                	<h1>Newsletter Sign up</h1>
						
						<?php } ?>
						<div id="jsError" style="color:#089BD8; font-weight:bold;"><?php $session->flash(); ?></div>

                                                 <?php if( !empty($check)){ ?>
 
                                                   <label class="username">Full Name <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('Newsletter.name', array('maxlength'=>'100','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
							<label class="username">Email Address <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('Newsletter.email', array('maxlength'=>'100','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
						<label class="username">Phone Number <font color="red">*</font></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('Newsletter.phone', array('maxlength'=>'30','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
						

							<label class="username">Type verification image : <font color="red">*</font></label>
                                                    <div>
                                                    	 <?php echo $html->image('captcha/'.$captcha_src,array('alt' => 'Captcha','style'=>'width:200px;border:none;')); ?>
                                                    </div>

							<label class="username"></label>
                                                    <div class="input_bg">
                                                    	<?php echo $form->input('Newsletter.ver_code', array('maxlength'=>'40','size'=>'40','label'=>false,'class'=>'textbox', 'div'=>false,'errors'=>true))?>
                                                    </div>
							

						
							
                                                    <button type="submit" class="login-btn"><span>SUBMIT</span></button>
							 <?php } ?>
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