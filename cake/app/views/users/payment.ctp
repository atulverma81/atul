<?php echo $form->create('User',array('action'=>'Payment','id'=>'formID','method'=>'POST','class'=>'formular','name'=>'frmCreateUser') )?>   
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3>Payment Information </h3> 
	 
	<ul class="flash-fields">
	<li> <?php  $session->flash(); ?> </li>
	</ul> 

	<ul class="mand-fields">
	<li>  <font class="requiredField">*</font> marked are mandatory</li>
	</ul>

        <ul class="login-fields">
	 <li><font color="red" size="2">  <b> ChurchPatrol Community  " Payment For New Paid Membership Account " </b> </font></li>
          <li>&nbsp;</li>
         <li><font color="red" size="2">Billing Information</font></li>
         <li>&nbsp;</li>
          <li> 
	 <?php echo $form->input('Payment.firstname',array('value'=>$userData['firstname'],'id'=>'fname','class'=>'validate[required]','type'=>'text','label'=>'Name On Card<font class="requiredField">*</font>','div'=>false,'errors'=>true,'label'=>'First Name<font class="requiredField">*</font>')) ?> 
          </li>
         <li> 
	 <?php echo $form->input('Payment.lastname',array('value'=>$userData['lastname'],'id'=>'lname','class'=>'validate[required]','type'=>'text','label'=>'Name On Card<font class="requiredField">*</font>','div'=>false,'errors'=>true,'label'=>'Last Name<font class="requiredField">*</font>')) ?> 
          </li>
          <li> 
	 <?php echo $form->input('Payment.street',array('value'=>$userData['street'],'id'=>'street1','class'=>'validate[required]','type'=>'text','label'=>'Street Address1<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li> 
	 <?php echo $form->input('Payment.street2',array('id'=>'street2','type'=>'text','label'=>'Street Address2<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
           <li> 
	 <?php echo $form->input('Payment.city',array('value'=>$userData['city'],'id'=>'user','class'=>'validate[required]','type'=>'text','label'=>'City<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
           <li>
            <label>Country<font class="requiredField">*</font></label>
		<?php
			if(!empty($this->data['User']['country_id'])){
			echo $form->select('User.country_id',$countries,$userData['country_id'],array('id'=>'country','class'=>'validate[required]','default' =>$this->data['User']['country_id']),'Please select');
			}else{
			echo $form->select('User.country_id',$countries,$userData['country_id'],array('id'=>'country','class'=>'validate[required]','default' => DEFAULT_COUNTRY),'Please select');
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
			echo $form->select('User.state_id',array($states),$userData['state_id'],array('id'=>'state','class'=>'validate[required]','onChange'=>'return showOtherState()'),'Please select');
			e('</div>');
			}
		?>
          </li>
          
          <li id="showOtherStateBox" style="display:none">	      
		<?php echo $form->input('User.otherstate',array('id'=>'statename','type'=>'text','label'=>'State Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>  
	  </li>
            
            <li> 
	 <?php echo $form->input('Payment.zip',array('value'=>$userData['zipcode'],'id'=>'zipcode','class'=>'validate[required]','type'=>'text','label'=>'Zip Code<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li> 
         <li>&nbsp;</li>
         <li><font color="red" size="2">Payment Information</font></li>
         <li>&nbsp;</li>
          <li> 
	 <?php echo $form->input('Payment.holdername',array('id'=>'user','class'=>'validate[required]','type'=>'text','label'=>'Name On Card<font class="requiredField">*</font>','div'=>false,'errors'=>true,'label'=>'Name On Card<font class="requiredField">*</font>')) ?> 
          </li>
          <li> 
	 <?php echo $form->input('Payment.cardno',array('id'=>'cardno','class'=>'validate[required]','type'=>'text','label'=>'Card Number<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li>
            <label>Credit Card Type<font class="requiredField">*</font></label>
           <?php 
		echo $form->select('Payment.card_type',array('Visa'=>'Visa','MasterCard'=>'Master Card','Amex'=>'American Express','Discover'=>'Discover'),null,array('id'=>'cardtype','class'=>'validate[required]','errors'=>true),'Select Type');
		 ?>
          </li>
          
           <li>
            <label>Expiration Date [month]<font class="requiredField">*</font></label>
          <?php echo $form->month("Payment.month",null,array('id'=>'month','class'=>'validate[required]'),"--Month--"); ?> <?php $current = date('Y');   ?>
          </li>
           <li>
            <label>Expiration Date [year]<font class="requiredField">*</font></label>
          <?php    $current = date('Y');$endYear = $current+16;
                  echo $form->year("Payment.year",$endYear, $current,null,array('id'=>'year','class'=>'validate[required]'),"-Year-");          ?>
          </li>
          <li> 
		<?php echo $form->input('Payment.cvcode',array('id'=>'cvcode','class'=>'validate[required]','type'=>'text','label'=>'Security Code( CVV Code)<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li> 
		<?php echo $form->input('Payment.amount',array('id'=>'amount','class'=>'validate[required]','type'=>'text','label'=>'Amount<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
          <li><label></label><a href="#"><input type="submit" value=" " class="register-btn"></a></li>
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->
