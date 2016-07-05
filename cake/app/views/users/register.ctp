<?php echo $form->create('User',array('action'=>'register/'.$userType,'id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateUser','onSubmit'=>'return validateUser();') )?>   
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3><?php if($userType == 1){?> Paid <?php } else {?> Free <?php } ?> Registration </h3> 
	 
	<ul class="flash-fields">
	<li> <?php if(isset($msg)) {  echo $utility->showArr($msg); } ?> </li>
	</ul> 

	<ul class="mand-fields">
	<li> <?php  $session->flash(); ?>  <font class="requiredField">*</font> marked are mandatory</li>
	</ul>

        <ul class="login-fields">
	 
          <li> 
	 <?php echo $form->input('User.username',array('id'=>'user','class'=>'validate[required,custom[noSpecialCaracters],length[0,20]]','type'=>'text','label'=>'Event Name<font class="requiredField">*</font>','div'=>false,'errors'=>true,'label'=>'Username<font class="requiredField">*</font>')) ?> 
          </li>
          <li> 
	  <?php echo $form->input('User.password',array('id'=>'password','class'=>'validate[required,length[6,11]] text-input','type'=>'password','label'=>'Password<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>
          </li>
          <li>
        
	<?php echo $form->input('User.confirmpassword',array('id'=>'password2','class'=>'validate[required,confirm[password]] text-input','type'=>'password','label'=>'Confirm Password<fontclass="requiredField">*</font>','div'=>false,'errors'=>true)) ?>
          </li>
          <li>
	<?php echo $form->input('User.email',array('id'=>'email','class'=>'validate[required,custom[email]] text-input','type'=>'text','label'=>'E-mail Address<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>      
<?php echo $form->input('User.alternate_email',array('id'=>'email2','class'=>'validate[optional,custom[email]] text-input','type'=>'text','label'=>'Alternate Email Address','div'=>false,'errors'=>true)) ?> 
          </li>
     <li>   
	<?php echo $form->input('User.firstname',array('id'=>'firstname','class'=>'validate[required,custom[onlyLetter],length[0,50]] text-input','type'=>'text','label'=>'First Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
      <li>      
	<?php echo $form->input('User.lastname',array('id'=>'lastname','class'=>'validate[required,custom[onlyLetter],length[0,50]] text-input','type'=>'text','label'=>'Last Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
     <?php if($userType == 1){ ?>     
       <li>      
	<?php echo $form->input('User.organization_name',array('id'=>'orgname','class'=>'validate[required,custom[onlyLetter],length[0,50]] text-input','type'=>'text','label'=>'Organization Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> </li>
	
          <li>
            <label>Organization Size<font class="requiredField">*</font></label>
           <?php 
		echo $form->select('User.organization_size',array('1'=>'Less than 25 members','2'=>'Between 25 and 50 members','3'=>'Between 50 and 100 members','4'=>'Between 100 and 250 members','5'=>'Between 250 and 500 members','6'=>'Between 500 and 1,000 members','7'=>'More than 1000 members'),null,array('id'=>'orgsize','class'=>'validate[required]','errors'=>true),'Select Size');
		 ?>
          </li>
          <?php } ?>
          <li>
           
		<?php echo $form->input('User.street',array('id'=>'street','class'=>'validate[required]','type'=>'text','label'=>'Street Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
           
		<?php echo $form->input('User.city',array('id'=>'city','class'=>'validate[required]','type'=>'text','label'=>'City<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
           
		<?php echo $form->input('User.zipcode',array('id'=>'zipcode','class'=>'validate[required]','type'=>'text','label'=>'Zip Code<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
            <label>Country<font class="requiredField">*</font></label>
		<?php
			if(!empty($this->data['User']['country_id'])){
			echo $form->select('User.country_id',$countries,null,array('id'=>'country','class'=>'validate[required]','default' =>$this->data['User']['country_id']),'Please select');
			}else{
			echo $form->select('User.country_id',$countries,null,array('id'=>'country','class'=>'validate[required]','default' => DEFAULT_COUNTRY),'Please select');
			}
			//echo $ajax->observeField("UserCountryId",array("url"=>"update_state","update"=>"StateDiv"));
			?> 
          </li>
          <li>
            <label>State<font class="requiredField">*</font></label>
		<?php 
			if(is_array($states)){
			$otherstate = array('1110'=>'Other');
		  	$states=$states+$otherstate; 
			e('<div id="StateDiv">');
			echo $form->select('User.state_id',array($states),null,array('id'=>'state','class'=>'validate[required]','onChange'=>'return showOtherState()'),'Please select');
			e('</div>');
			}
		?>
          </li>
	  <li id="showOtherStateBox" style="display:none">
	      <label>State Name<font class="requiredField">*</font></label>
		<?php echo $form->input('User.otherstate',array('id'=>'statename','type'=>'text','label'=>'State Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>  
	 </li>	
          <li>
            
		<?php echo $form->input('User.phone',array('id'=>'phone','class'=>'validate[required]','type'=>'text','label'=>'Phone<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>       
           <input type="hidden" name="data[User][usertype]" id="usertype" value="<?php echo $userType; ?>" class="validate[required]"/>
          </li>
          <li><label></label><a href="#"><input type="submit" value=" " class="register-btn"></a></li>
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->
