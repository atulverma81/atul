
<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management">    State Management  </h2>								 		
	</div>
	<div style="padding:2px">
	<?php  
 echo $html->link(' State Management','/admin/States/index').' >> ';
 
 echo '<span class="mediumFontf">Update State<span>';
?>
	</div><?php echo $form->create('states',array('action'=>"editState/$stateId",'method'=>'POST','name'=>'frmCreateNews','onSubmit'=>'return validState();') )?>
	 
 
	<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr><td width="100%" colspan="2" align="right">&nbsp;<font color="red">* </font><b>marked are mandatory.</b></td>
					</tr>
					<tr><td width="30%">&nbsp;</td><td style="color:red" id="jsError"><?php $session->flash(); ?></td></tr>
					
	<tr>
	<td align="right" width="30%"><font color="red">*</font><?php echo __("State Name",true)?></td>
						<td width="50%"><?php echo $form->input('State.state', array('maxlength'=>'150','size'=>'20','label'=>'',  'class'=>'textbox','errors'=>true))?></td>	
						
					</tr>
					 
				 

<tr>
						<td align="right" width="30%"><font color="red">*</font><?php echo __("Country",true)?><font class="requiredField"></font></td>
<td width="50%">
<?php echo $form->select('State.country_id',$countries,
null,array('label'=>'', 'class'=>'textbox','errors'=>true),'Please select')?>
</td>
		                         </tr>

 <tr>
						<td align="right" width="30%">&nbsp;</td>
						<td width="50%">&nbsp;</td>
</tr>
					<tr>
 				
						<td align="right"><?php echo $form->submit(__("Update",true),array('class'=>'btn','style'=>'float:right', 'onclick'=>'window.scroll(0,0)'))?></td>
						
						<td align="left"><?php echo $html->link(__("Cancel",true),array('action'=>'/'),array('class'=>'btn', 'onclick'=>'window.scroll(0,0)'))?></td>
					</tr>
					</table>
						<?php echo $form->end(); ?>
</div>