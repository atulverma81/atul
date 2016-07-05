
<?php echo $form->create('User',array('action'=>'ManageProfile/'.$id,'id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateUser','onSubmit'=>'return validateUser();') )?>   
 <!--Search Result Starts Here-->
    <section class="search-result">
      <div class="register-fields">
        <h3>Manage Profile</h3>
	<ul class="mand-fields">
	<li> <?php  $session->flash(); ?>  <font class="requiredField">*</font> marked are mandatory</li>
	</ul> 
        <ul class="login-fields"> 
         
          <li>
          <?php echo $form->input('User.firstname',array('id'=>'firstname','class'=>'validate[required,custom[onlyLetter],length[0,50]] text-input','type'=>'text','label'=>'First Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
           <?php echo $form->input('User.lastname',array('id'=>'lastname','class'=>'validate[required,custom[onlyLetter],length[0,50]] text-input','type'=>'text','label'=>'Last Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          </li>
          
          <?php $usertype = $session->read("usertype"); if(!empty($userType) && $userType == 1){  ?>
          <li>
           <?php echo $form->input('User.organization_name',array('id'=>'orgname','class'=>'validate[required,custom[onlyLetter],length[0,50]] text-input','type'=>'text','label'=>'Organization Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
             <label>Organization Size<font class="requiredField">*</font></label>
           <?php 
			echo $form->select('User.organization_size',array('1'=>'Less than 25 members','2'=>'Between 25 and 50 members','3'=>'Between 50 and 100 members','4'=>'Between 100 and 250 members','5'=>'Between 250 and 500 members','6'=>'Between 500 and 1,000 members','7'=>'More than 1000 members'), $this->data['User']['organization_size'],array('id'=>'orgsize','class'=>'validate[required]','errors'=>true),'Select Size');
		 ?>
          </li>
          <?php } ?>
          <li>
           <?php echo $form->input('User.street',array('id'=>'street','class'=>'validate[required]','type'=>'text','label'=>'Street Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
            <?php echo $form->input('User.city',array('id'=>'city','class'=>'validate[required]','type'=>'text','label'=>'City <font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
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
			echo $form->select('User.country_id',$countries,null,array('id'=>'country','class'=>'validate[required]','default' => $this->data['User']['country']),'Please select');
			}
			//echo $ajax->observeField("UserCountryId",array("url"=>"update_state","update"=>"StateDiv"));
			?>
          </li>
          <li>
           <label>State<font class="requiredField">*</font></label>
		<?php 
			 
				$otherstate = array('1110'=>'Other');
		  		$states=$states+$otherstate; 		
			 
			if(!empty($this->data['User']['state_id']))	{
				e('<div id="StateDiv">');
			echo $form->select('User.state_id',array($states),$this->data['User']['state_id'],array('id'=>'state','class'=>'validate[required]','onChange'=>'return showOtherState()'),'Please select');
			e('</div>');			 
			}else{
			e('<div id="StateDiv">');
			echo $form->select('User.state_id',array($states),$this->data['User']['state'],array('id'=>'state','class'=>'validate[required]','onChange'=>'return showOtherState()'),'Please select');
			e('</div>');			 	
			}
		?>
          </li>
	  <?php 
	  if(!empty($this->data['User']['otherstate']) && $this->data['User']['state'] == 1110) {  ?> 
	  <li id="showOtherStateBox" >
	      <label>State Name<font class="requiredField">*</font></label>
		<?php echo $form->input('User.otherstate',array('value'=>$this->data['User']['otherstate'],'id'=>'statename','type'=>'text','label'=>false,'div'=>false,'errors'=>true)) ?>  
	 </li>	
	 <?php } ?>
	  <li id="showOtherStateBox" style="display:none;" >
	      <label>State Name<font class="requiredField">*</font></label>
		<?php echo $form->input('User.otherstate',array('value'=>$this->data['User']['otherstate'],'id'=>'statename','type'=>'text','label'=>false,'div'=>false,'errors'=>true)) ?>  
	 </li>	
          <li>
           <?php echo $form->input('User.phone',array('id'=>'phone','class'=>'validate[required]','type'=>'text','label'=>'Phone <font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
            
           <input type="hidden" name="data[User][usertype]" id="usertype" value="<?php echo $this->data['User']['usertype'];?>" class="validate[required]"/>
          </li>
          <li><label></label><a href="#"><input type="submit" value=" " class="register-btn"></a></li>
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->
