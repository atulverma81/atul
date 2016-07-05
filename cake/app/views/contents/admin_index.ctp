<?php echo $javascript->link('listing.js');?>
<?php //echo $javascript->link('prototype.js');?>
<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management"> Content Details</h2>
	</div>
	<div style="padding:2px">
	<?php  echo $html->link('Manage Contents','/admin/users/home').' >> ';
	echo '<span class="mediumFontf">View  Content Details<span>'; ?>
	</div>
	<div id="listingJS" style="display: none; color:#3333FF;" ></div>

		<div id="loaderID" style="display:none;position:absolute;margin-left:300px;margin-top:50px"><?php echo $html->image("loader_large_blue.gif"); ?></div>

		<?php if($session->check('message')){

			echo "<div class='SuccessMsgBox success' style='color:#3333FF' 'id='msgID'><ul><li>".$session->read('message')."</li></ul></div>";

			$session->del('message');

		}?>
<?php
           echo $form->create(NULL,array("url"=>"/admin/contents/index","method"=>"Post"));
?>
<table width="100%" border="0" class="tableBorder" cellpadding="3" cellspacing="1">


     <tr>						
<td align="right">Title</td>
<td align="left" colspan="2">
<?php echo $form->text('Content.pagetitle', array('1'=>'Active','2'=>'Inactive'),null,null,'Select')?>
</td>
        </tr>
<tr>						
<td align="right" width="10%">Status</td>
<td align="left" colspan="2">
<?php echo $form->select('Content.status', array('1'=>'Active','2'=>'Inactive'),array('class'=>'small_combo_box','style'=>'width: 300px; border: 1px solid black;'),null,'Select')?>
</td>
</tr>
<?php
echo $form->text('Content.searchRecord', array('maxlength'=>'80','value'=>'records','type'=>'hidden','size'=>'30','label'=>'','id'=>'title'));
?>
    <tr>
	   <td align="left">&nbsp;</td>
	<td align="left" colspan="2">
<?php echo $ajax->submit(__("Search",true),array('div' => false,'class' => 'btn','url' => "/admin/contents/index",'update' => 'listID','indicator' =>'loaderID'));?>
           </td>
     </tr>

</table>
<?php echo $form->end();?>

    <div style=" border:0px solid red; font-size:12px;  margin:20px 0px 0px 0px;  Color:#ff0000;">
                 <?php   $session->flash(); ?> 
       </div>
	<?php echo $this->renderElement("admin/contents/index"); ?>
</div>