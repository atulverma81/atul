<?php echo $javascript->link('jquery.validate.js'); ?>
<script>
	jQuery(document).ready(function(){
		jQuery("#contacts-form").validate();
		 
	});
	
</script>
<div class="indent">
              <article>
                <div class="inside1">
                	<h2>Contact Information</h2>
                  <div class="wrapper">
                    <img src="/images/5page-img1.jpg" alt="" class="img-indent">
                    <?php $content='';
												if(!empty($contents['Content']['description'])){
													$content=$contents['Content']['description'];
													$content=str_replace("<strong>","<b>",$content);
													$content=str_replace("</strong>","</b>",$content);
													$content=str_replace("<em>","<i>",$content);
													$content=str_replace("</em>","</i>",$content);
													$content=str_replace("/app/webroot/files/","/app/webroot/files/",$content);
									
									
												echo @$content;  
												}else {
												echo 'Home';
											}
			
								?>
                   
                  </div>
                </div>
              </article>
              <article class="last">
              	<div class="wrapper">
                	<div class="grid_4 colborder alpha">
                  	<div class="inside1">
                  	  <h2>Contact form</h2>
                  	  <?php  $session->flash(); ?>
                      <?php echo $form->create('Contacts',array('action'=>'enquiry','class'=>'contact-us','method'=>'POST','name'=>'frmCreateContact','id'=>'contacts-form'))?>
                        <fieldset>
                          <label><input name="data[Contacts][firstname]" type="text" value="Name:" class='required strings' onfocus="if(this.value=='Name:') this.value='';" onblur="if(this.value=='') this.value='Name:';"/></label>
                          <label><input name="data[Contacts][email]" type="text" value="E-mail:" class='required' onfocus="if(this.value=='E-mail:') this.value='';" onblur="if(this.value=='') this.value='E-mail:';"/></label>
                          <label><input name="data[Contacts][phone]" type="text" value="Phone:" class='required number' onfocus="if(this.value=='Phone:') this.value='';" onblur="if(this.value=='') this.value='Phone:';"/></label>
                          <label><input name="data[Contacts][subject]" type="text" value="Subject:" class='required strings' onfocus="if(this.value=='Subject:') this.value='';" onblur="if(this.value=='') this.value='Subject:';"/></label>
                          <textarea name="data[Contacts][comments]" onfocus="if(this.value=='Message:') this.value='';" onblur="if(this.value=='') this.value='Message:';">Message:</textarea>
                          <div class="wrapper"><a href="#" class="button" onclick="document.getElementById('contacts-form').submit()">Submit</a><a href="#" class="button" onclick="document.getElementById('contacts-form').reset()">Clear</a></div>
                        </fieldset>
                      </form>
                  	</div>
                  </div>
                	<div class="grid_4 omega">
                  	<div class="inside">
                  	  <?php echo @$metadescription; ?>
                  	</div>
                  </div>
                </div>
              </article>
            </div>