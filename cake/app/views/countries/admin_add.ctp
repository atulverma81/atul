<div  class="single" >
	<h2><img src="/img/users.gif" alt="Country Management">  Country Management</h2>			 					 		
</div>
<div style="padding:2px">
                
<?php  
 echo $html->link('Country Management','/admin/countries/index').' >> ';
 
 echo '<span class="mediumFontf">Add  Country<span>';
?>
 


 </div>               

     		
			<!-- START: If Error Message is populated by JAVASCRIPT -->
			<div id="divMessageJS" style="display: none;"></div>
		
 
<br>
								
<fieldset> 
  <!-- START: If Error Message is populated by JAVASCRIPT -->
	<div id="divMessageJS" style="display: none;"></div>
	<script type="text/javascript">if(!document.body || !document.body.innerHTML) document.write("")</script>
 <!-- END  : If Error Message is populated by JAVASCRIPT -->
<!-- User Register Form -->	
<table width="94%" border="0" cellpadding="5" cellspacing="0">
	<tr>
              <td width="100%" colspan="2" align="right">&nbsp;
<font color="red">* </font><b>marked are mandatory.</b>
              </td>
	</tr>
 	<tr>
         <td width="30%">&nbsp;</td>
             <td>
       <!-- START: If Error Message is populated by JAVASCRIPT -->
<div id="divMessageJS" style="display: none;margin-bottom:100px;background-color:#FFFF00;border:#FF0000" >
	</div>
	    </td>
         </tr>
      <tr>
	        <td align="left" style="color:red" colspan="2">			
				<?php $session->flash(); ?>
		        </td>
    </tr>
    <tr>
               <td width="30%">&nbsp;</td>
             <td style="color:red" id="jsError"> 
		<?php 
                               if(isset($msgString)){
					echo "<div class='ActionMsgBox error' align='left' id='msgID'>".$msgString."</div>";
					}
                ?> 
	     </td>
        </tr>
</table>
<?php echo $form->create('Country',array('action'=>'/add','name'=>'addCurrency','enctype'=>'multipart/form-data','onSubmit'=>'return validUpdateCountry();'))?>

<table width="90%" cellpadding="3" border="0" cellspacing="0" style="border: 1px solid #66666" align="center">
 <?php if($session->check('message')) { ?>
  <tr><td align="center" align="center" colspan="9"><font color="red"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
  <?php } ?>
    <tr>
	   <td align="right" valign="top" width="30%">
<font color="red">*</font>Country Name : </td>
	   <td>
	      <?php 
echo $form->input('Country.country', array('maxlength'=>'50','size'=>'20','class'=>'textbox','label'=>''),$this->data['Country']['country']);
echo $ajax->observeField("CountryCountry",array("url"=>"check_country","update"=>"CountryDiv"));
 ?>
	      <?php echo '<span class=link_red>'.$form->error('CurrencyRate.name','Please enter name for currency.').'</span>' ?>
	   </td>
	  </tr>

<tr id="CountryDiv">

</tr>
       
       <tr>
		<td align="right" width="30%"><font color="red">*</font><?php echo __("Country Code",true)?><font class="requiredField"></font></td>
		<td width="50%">

<?php echo $form->input('Country.code', array('maxlength'=>'50','class'=>'textbox','size'=>'20','label'=>'', 'div'=>false,'errors'=>true),@$this->data['Country']['code'])?></td>
		                         </tr>

	<tr>
	  <td colspan="2" align="center"></td>
	  </tr>
	  <tr>
	  <td>&nbsp;</td>
	  <td>
			
      <input type = "submit" name = "save" id ="save" value="Add" class="btn"  />
      
      	</td>
	</tr>
	</table>

<!-- And finally, the submit button-->

<?php echo $form->end();?>           
</fieldset>
<!-- End: Content -->