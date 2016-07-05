<?php print $javascript->link('common');?>
<?php echo $javascript->link('tiny_mce/tiny_mce.js');  ?>
<div  class="single" >
	<h2><img src="/img/users.gif" alt="Newsletters Management"> Newsletters Management</h2>			 					 		
</div>
<div style="padding:2px">
                
 <?php  
 echo $html->link('Home','/admin/users/home').' >> ';
 echo $html->link('Newsletters Manangement','/admin/users/view').' >> ';
 echo '<span class="mediumFontf">Edit Newsletter<span>';

?>
 </div>               

     		<?php echo $javascript->link('form/common');?>
			<?php echo $javascript->link('form/adminAddNewsletter');?>		
			<!-- START: If Error Message is populated by JAVASCRIPT -->
			<div id="divMessageJS" style="display: none;"></div>
			<script type="text/javascript">if(!document.body || !document.body.innerHTML) document.write("")</script>
			<!-- END  : If Error Message is populated by JAVASCRIPT -->
                
<!-- Add Newsletters Form -->

<?php 
   if (! empty($userMessage))
      echo $userMessage;
?>
<br>
								
<fieldset><legend>Edit Newsletter</legend> 
<?php echo $form->create('Newsletter',array('action'=>'/edit','name'=>'addnewsletter','onSubmit'=>'return validate_form(FRM_LABELS, FRM_CONTROLS, ERR_MESSAGES);'))?>

<table width="90%" cellpadding="3" border="0" cellspacing="0" style="border: 1px solid #66666" align="center">
 <?php if($session->check('message')) { ?>
  <tr><td align="center" align="center" colspan="9"><font color="red"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
  <?php } ?>
    <tr>
	   <td align="right" valign="top" width="30%"><font color="red">*</font>Title : </td>
	   <td>
	      <?php echo $form->input('Newsletter.title', array('maxlength'=>'50','size'=>'20','class'=>'textbox','label'=>'')); ?>
	      <?php echo '<span class=link_red>'.$form->error('Newsletter.title','Please enter title.').'</span>' ?>
	   </td>
	</tr>
	<tr>
		<td align="right" valign="top"><font color="red">*</font>Subject : </td>
		<td> 
		  <?php echo $form->input('Newsletter.subject', array('maxlength'=>'50','size'=>'20','class'=>'textbox','label'=>'')); ?>
	      <?php echo '<span class=link_red>'.$form->error('Newsletter.subject','Please enter subject.').'</span>' ?>
		</td>
	</tr>
	<tr>
	  <td align="right" valign="top">Content : </td>
	  <td>
		<script>
		tinyMCE.init({
			mode	: "exact",
			elements : "NewsletterContent",
			theme	: "advanced",
			plugins : "html,advlink,advimage,searchreplace,insertdatetime,media,advhr,table,fullscreen,directionality,layer,style",
				theme_advanced_buttons1_add_before : "save,newdocument,separator",
				theme_advanced_buttons1_add : "fontselect",
				theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
				theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
				theme_advanced_buttons3_add_before : "tablecontrols,separator",
				theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_disable : "code",				
				content_css : "example_word.css",
			height	: "250px",
			width	: "420px"
		});		
			function fileBrowserCallBack(field_name, url, type, win) {
				// This is where you insert your custom filebrowser logic
				alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);
		
				// Insert new URL, this would normaly be done in a popup
				win.document.forms[0].elements[field_name].value = "someurl.htm";
			}
		</script>
	  <?php echo $form->textarea('Newsletter.content', array('rows'=>'5','cols'=>'40','label'=>'','div'=>false))?>
	
	  </td>
	</tr>
	<tr>
		<td align="right">Active : </td>
		<td><?php echo $form->select('Newsletter.status',array('1'=>'Yes','0'=>'No'),@$this->data['Newsletter']['status'],array('class'=>'small_combo_box'), false);?> </td>
	</tr>
		
	<tr>
	  <td colspan="2" align="center"></td>
	  </tr>
	  <tr>
	  <td>&nbsp;</td>
	  <td>
			<?php echo $form->submit('Update',array('class'=>'button'))?>
		</td>
	</tr>
	</table>

<!-- And finally, the submit button-->

<?php echo $form->end();?>          
</fieldset>
<!-- End: Content -->