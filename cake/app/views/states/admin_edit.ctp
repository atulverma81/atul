<div  class="single" >
	<h2><img src="/img/users.gif" alt="Currency Management"> State Managment</h2>			 					 		
</div>
<div style="padding:2px">
                
<?php  

 echo $html->link('Home','/admin/users/home').' >> ';
 echo $html->link('State Manangement','/admin/States/index').' >> ';
 echo '<span class="mediumFontf">Edit State<span>';
?>
<script langauge="javascript">
function checkform()
{
if (document.getElementById("StateStateName").value=="" || document.getElementById("StateStateName").value==" ")
{
  alert("please enter  a State name ");
  return false;

}
else if (document.getElementById("StateCountryId").value=="" || document.getElementById("StateCountryId").value==" ")
{
  alert("please Select  a Country name ");
  return false;

}

else
{
return true;
}
}
</script>


 </div>               

     		
			<!-- START: If Error Message is populated by JAVASCRIPT -->
			<div id="divMessageJS" style="display: none;"></div>
		
<?php 
   if (! empty($userMessage))
      echo $userMessage;
?>
<br>
								
<fieldset><legend>Edit State</legend> 
<?php echo $form->create('State',array('action'=>'/edit','name'=>'addstate','enctype'=>'multipart/form-data'))?>

<table width="90%" cellpadding="3" border="0" cellspacing="0" style="border: 1px solid #66666" align="center">
 <?php if($session->check('message')) { ?>
  <tr><td align="center" align="center" colspan="9"><font color="red"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
  <?php } ?>
    <tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>State Name : </td>
	   <td>
	    <?php echo $form->hidden('State.id', array('maxlength'=>'50','size'=>'20','class'=>'textbox','value'=>$data[0]['states']['id'])); ?>
	     
	      <?php echo $form->input('State.state_name', array('maxlength'=>'50','size'=>'20','class'=>'textbox','label'=>'','value'=>$data[0]['states']['state_name'])); ?>
	      <?php echo '<span class=link_red>'.$form->error('CurrencyRate.name','Please enter name for currency.').'</span>' ?>
	   </td>
	   </tr>
	   
	    <tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>Country Name : </td>
	   <td>
	   <select name ="StateCountryId" id="StateCountryId">
	   <?php
	   for ($i=0;$i<=count($countries);$i++)
	   {
        if ($data[0]['states']['country_id']==$i)
        {
        echo"<option value='$i' selected='selected'>$countries[$i]</option>";
        
        }
     else
      echo"<option value='$i' >$countries[$i]</option>";
        
     }
	   ?>
     
     </select>
	   
	   
	     
	     
     </td>
	   </tr>
			
	<tr>
	
	  <td colspan="2" align="center"></td>
	  </tr>
	  <tr>
	  <td>&nbsp;</td>
	  <td>
			
      <input type = "submit" name = "save" id ="save " value="save" onclick = "return checkform();"/>
      
      	</td>
	</tr>
	</table>

<!-- And finally, the submit button-->

<?php echo $form->end();?>          
</fieldset>
<!-- End: Content -->