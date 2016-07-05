<?php echo $form->create('Event',array('action'=>'CreateEvent','id'=>'formID','method'=>'POST','enctype'=>'multipart/form-data','class'=>'formular','name'=>'frmCreateEvent') )?>
 <!--Search Result Starts Here-->
 
    <section class="search-result">
      <div class="register-fields">
        <h3>Post New Event! </h3> 
	<ul class="flash-fields">
	<li> <?php  $session->flash(); ?> </li>
	</ul> 
	<ul class="mand-fields">
	<li>   <font class="requiredField">*</font> marked are mandatory</li>
	</ul> 
        <ul class="login-fields"> 
          <li> 
	    <?php echo $form->input('Event.event_name',array('id'=>'name','class'=>'validate[required,custom[noSpecialCaracters]','type'=>'text','label'=>'Event Name<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>
          </li>
	 <li>
	 <?php echo $form->input('Event.event_keyword',array('id'=>'keyword','class'=>'validate[required]','type'=>'text','label'=>'Event Keyword<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>
		<label></label><p class="color-red">Enter multiple words, separated by commas ( e.g. love, peace, house )</p></li> 
          </li>
	<li>
            <label>Event Frequency<font class="requiredField">*</font></label>
           <?php 
			echo $form->select('Event.event_frequency',array('o'=>'One time only','d'=>'Daily','w'=>'Weekly','b'=>'Bi-Weekly','m'=>'Monthly','ot'=>'Other'),null,array('id'=>'frequency','class'=>'validate[required]','errors'=>true,'onChange'=>'return showOtherFrequency()'),'Select Frequency');
		 ?>
          </li>
	 <li id="showOtherFrequency" style="display:none"> 
		<?php echo $form->input('Event.otherFrequency',array('id'=>'otherFrequency','type'=>'text','label'=>'Enter Frequency<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>  
	 </li>	
          <li>
	   <?php echo $form->input('Event.start_date',array('id'=>'start_date_a','class'=>'validate[required]','type'=>'text','label'=>'Event Start Date<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
		<script type="text/javascript">
				function catcalc(cal) {
					var date = cal.date;
					var time = date.getTime()
					// use the _other_ field
					var field = document.getElementById("start_date_a");
					if (field == cal.params.inputField) {
					field = document.getElementById("start_date_a");
					//time -= Date.WEEK; // substract one week
					} else {
					//time += Date.WEEK; // add one week
					}
					var date2 = new Date(time); 
					field.value = date2.print("%Y-%m-%d %H:%M");
				}
				Calendar.setup({
					inputField     :    "start_date_a",   // id of the input field
					ifFormat       :    "%Y-%m-%d %H:%M",       // format of the input field
					showsTime      :    true,
					timeFormat     :    "24",
					onUpdate       :    catcalc
				}); 
		</script> 	
          </li>
          <li>
             <?php echo $form->input('Event.end_date',array('id'=>'end_date_a','class'=>'validate[required]','type'=>'text','label'=>'Event End Date<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>
		<script type="text/javascript">
				function catcalc(cal) {
					var date = cal.date;
					var time = date.getTime()
					// use the _other_ field
					var field = document.getElementById("end_date_a");
					if (field == cal.params.inputField) {
					field = document.getElementById("end_date_a");
					//time -= Date.WEEK; // substract one week
					} else {
					//time += Date.WEEK; // add one week
					}
					var date2 = new Date(time);
					field.value = date2.print("%Y-%m-%d %H:%M");
				}
				Calendar.setup({
					inputField     :    "end_date_a",   // id of the input field
					ifFormat       :    "%Y-%m-%d %H:%M",       // format of the input field
					showsTime      :    true,
					timeFormat     :    "24",
					onUpdate       :    catcalc
				}); 
		</script> 	
          </li>
	  <li>
            <label>Event Image</label> 
           <?php echo $form->file('Event.image'); ?>
          </li> 
          <li>
           
	     <?php echo $form->input('Event.description', array('id'=>'description','maxlength'=>'255','size'=>'40', 'label'=>'Event Description','rows'=>'6','cols'=>'44','div'=>false,'errors'=>true)) ?>
          </li> 
          <li> 
	   <label><b>Event Venue</b></label>
	</li>
	
	<li> 
	   <?php echo $form->input('Event.street',array('id'=>'street','class'=>'validate[required]','type'=>'text','label'=>'Street Address<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
	<li> 
	   <?php echo $form->input('Event.city',array('id'=>'city','class'=>'validate[required]','type'=>'text','label'=>'City<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?>
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
		<?php echo $form->input('Event.otherstate',array('id'=>'statename','type'=>'text','label'=>false,'div'=>false,'errors'=>true)) ?>  
	 </li>	
	 <li> 
	   <?php echo $form->input('Event.zipcode',array('id'=>'zipcode','class'=>'validate[required]','type'=>'text','label'=>'Zip Code<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
	<li> 
	   <?php echo $form->input('Event.phone',array('id'=>'phone','class'=>'validate[required]','type'=>'text','label'=>'Phone<font class="requiredField">*</font>','div'=>false,'errors'=>true)) ?> 
          </li>
	
          <li><label></label><a href="#"><input type="submit" value=" " class="register-btn"></a></li>
        </ul>
      </div>
    </section>
<?php echo $form->end(); ?>
    <!--Search Result Ends-->

