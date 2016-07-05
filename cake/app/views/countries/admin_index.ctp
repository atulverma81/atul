<?php echo $javascript->link('listing.js');?>
<?php echo $javascript->link('prototype.js');?>
<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management">   Country  Management</h2>	
        </div>
	<div style="padding:2px">
	<?php  echo $html->link('Country Management','/admin/countries/index').' >> ';
	echo '<span class="mediumFontf">View Country Listing<span>'; ?>
	</div>
<div id="listingJS" style="display: none; color:#3333FF;" ></div>

		<div id="loaderID" style="display:none;position:absolute;margin-left:300px;margin-top:50px"><?php echo $html->image("loader_large_blue.gif"); ?></div>

		<?php if($session->check('message')){

			echo "<div class='SuccessMsgBox success' style='color:#3333FF' 'id='msgID'><ul><li>".$session->read('message')."</li></ul></div>";

			$session->del('message');

		}?>
<?php
echo $form->create(NULL,array("url"=>"/admin/countries/index","method"=>"Post"));
?>
<table width="100%" border="0" class="tableBorder" cellpadding="3" cellspacing="1">
 
<tr>						
<td align="right" width="10%">Name</td>
<td align="left" colspan="2">
<?php echo $form->text('Country.country', array('maxlength'=>'40'),null,null )?>
</td>
</tr>
 



<?php
echo $form->text('Country.searchRecord', array('maxlength'=>'80','value'=>'records','type'=>'hidden','size'=>'30','label'=>'','id'=>'title','div'=>false));
?>
	<tr>
	      <td align="left">&nbsp;</td>
	      <td align="left" colspan="2">
<?php echo $ajax->submit(__("Search",true),array('div' => false,'class' => 'btn','url' => "/admin/countries/index",'update' =>'listID','indicator' =>'loaderID'));?>
               </td>
	</tr>
 </table>
       <?php echo $form->end();?>


<div style=" border:0px solid red; font-size:12px;  margin:20px 0px 0px 0px;  Color:#ff0000;">
                 <?php   $session->flash(); ?> 
       </div>
 <?php echo $this->renderElement("admin/countries/index"); ?>
	</div>	             