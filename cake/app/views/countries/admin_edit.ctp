<div  class="single" >
	<h2><img src="/img/users.gif" alt="Currency Management"> Currency Managment</h2>			 					 		
</div>
<div style="padding:2px">
                
<?php 

 echo $html->link('Home','/admin/users/home').' >> ';
 echo $html->link('country Manangement','/admin/countries/index').' >> ';
 echo '<span class="mediumFontf">Edit Currency<span>';
?>
<script langauge="javascript">
function checkform()
{
if (document.getElementById("CountryName").value=="" || document.getElementById("CountryName").value==" ")
{
  alert("please enter  a Country name ");
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
								
<fieldset><legend>Add Country</legend> 
<?php echo $form->create('Country',array('action'=>'/edit','name'=>'addCurrency','enctype'=>'multipart/form-data'))?>

<table width="90%" cellpadding="3" border="0" cellspacing="0" style="border: 1px solid #66666" align="center">
 <?php if($session->check('message')) { ?>
  <tr><td align="center" align="center" colspan="9"><font color="red"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
  <?php } ?>
    <tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>Country Name : </td>
	   <td>
 
	     <?php echo $form->input('Country.id', array('maxlength'=>'50','size'=>'20','class'=>'textbox','value'=>$data[0]['countries']['id'])); ?>
	     
        <?php echo $form->input('Country.name', array('maxlength'=>'50','size'=>'20','class'=>'textbox','value'=>$data[0]['countries']['name'])); ?>
	      <?php echo '<span class=link_red>'.$form->error('Country.name','Please enter name for currency.').'</span>' ?>
	   </td>
	
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