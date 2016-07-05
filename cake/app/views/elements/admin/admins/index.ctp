<?php
$paginator->options(array('update'=>'listID','url'=>array('controller'=>'admins','action'=>'index',$separator),'indicator' =>'loaderID'));
$ascImage = $html->image('sort_up.gif',array('border'=>0));
$descImage = $html->image('sort_down.gif',array('border'=>0));
?>

<div id='listID'>
<?php 
 echo $form->create(NULL,array('url'=>'index','method'=>'POST','name'=>'frmList') );
?>
	<div style="padding:5px 0;">	
		<table width="100%" class="tableBorder1" cellpadding="3" cellspacing="1" style="padding:5px 0;" >
			<tr>
				<td align="left">				
					Total Records: <?php if(!empty($totalRecords)){
					echo $totalRecords;
				    }else{
					echo '0';
					}	
					?> </td>
				<td align="right">
					<div id="pagingLinks" align="right">Showing Page <?php echo $paginator->counter(); ?>&nbsp;<span class="custom_link">
					<?php echo $paginator->prev('<<'); ?>&nbsp;
					<?php echo $paginator->numbers(array('separator'=>' - ')); ?>
					&nbsp;
					<?php echo $paginator->next('>>'); ?></span>
					</div>
				</td>
			</tr>
 
 

		</table>

	</div>
	<?php 
if(!empty($admins)){
?>	
<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#FBE9BD" style="border:#FBE9BD solid 1px" rules="all" class='tableBorder'>




<tr class="formSectHeader" align="center">
 <td class="thclass" width="1%" ><input name="chkRecordId" value="0" onClick="checkAll(this.form)" type='checkbox'></td>
      <td class="thclass">
<?php echo $paginator->sort('User Name','User.username',array('escape'=>false,'class'=>'custom_link'));
?>
        </td>
	<td class="thclass">
<?php echo $paginator->sort('First Name','User.firstname',array('escape'=>false,'class'=>'custom_link'));?>
      </td>
<td class="thclass">
         <?php echo $paginator->sort('Last Name ','User.lastname',array('escape'=>false,'class'=>'custom_link'));?>
          </td>  
      	<td class="thclass">
           <?php echo $paginator->sort('Status','User.status',array('escape'=>false,'class'=>'custom_link'));?>
         </td>
        
       <td class="thclass">Action</td>
        </tr>
	<?php
		 // list all users
		 	$counter=0;
			$CounterItem = 1;
			foreach($admins as $content){
			if($counter%2 == 1) $bgColor = "#ffffff"; else $bgColor = "#ccffcc";
                 	?>	
		<tr id="deleted<?php echo $content['User']['id'];?>" bgcolor="<?=$bgColor?>">
				<td class="list">
			<input type="checkbox" onclick="javascript:isAllSelect(this.form);" name="chkRecordId" value="<?php echo $content['User']['id'];?>" />					</td>
			<td class="list">
<?php
echo   $content['User']['username'];  ?>
</td>
<td class="list">
<?php 
echo     $content['User']['firstname'];
?> 
</td>
<td class="list">
<?php 
echo     $content['User']['lastname'];
?> 
 </td>
 <?php 
					  if($content['User']['status']==1) {
						?>
						<td align="center" id="status<?php echo $content['User']['id'];?>">
						<?php
							
							echo $html->image("icon_1.gif");
						?>
						</td>
						<?php }
							elseif($content['User']['status']==2)
						{?>
						<td align="center" id="status<?php echo $content['User']['id'];?>">
						<?php				
							       echo $html->image("icon_0.gif");?>
						</td>
						<?php  }?>
          <td class="list" align="center">
 <?php 
echo $html->link($html->image('view.png',array('title'=>'View')),array( 'controller' => 'admins','action' => 'viewAdmin/',$content['User']['id']),null,null,false);
?> </span>
				 
 
	</td>
 
				<!--Popup box bottom closed-->
				 
				</tr>
				<?php
				$counter++; $CounterItem++;}//end of foreach
				?>		
		</table>
		<div style="padding:4px 0;">	
		<table width="100%" class="tableBorder1" cellpadding="3" cellspacing="1" style="padding:5px 0;" >
			<tr>
				
				<td align="right">
					<div id="pagingLinks" align="right">Showing Page <?php echo $paginator->counter(); ?>&nbsp;<span class="custom_link">
					<?php echo $paginator->prev('<<'); ?>&nbsp;
					<?php echo $paginator->numbers(array('separator'=>' - ')); ?>
					&nbsp;
					<?php echo $paginator->next('>>'); ?></span>
					</div>
				</td>
			</tr>
		</table>
		</div>
<table cellspacing="2" cellpadding="2" width="100%">
<tr>
     <td>
<?php echo $form->text('idList', array('type'=>'hidden','value'=>'','id'=>'idList'));?>
<?php echo $form->text('action', array('type'=>'hidden','value'=>'activate','id'=>'action'));?>
<?php echo $ajax->submit("Activate",array('div' => false,'class' => 'btn','url' => array('controller'=>'Admins','action'=>'/index',$urlSeparator),'update' => 'listID','indicator' =>'loaderID','before'=>"setAction('activate');",'condition'=>"isAnySelected(this.form,'activate')","complete"=>"showMessage('activated');"));?>
<?php echo $ajax->submit("Deactivate",array('div' => false,'class' => 'btn','url' => array('controller'=>'Admins','action'=>'index',$urlSeparator),'update' => 'listID','indicator' =>'loaderID','before'=>"setAction('deactivate');",'condition'=>"isAnySelected(this.form,'deactivate')","complete"=>"showMessage('deactivated');"));?>
<?php echo $ajax->submit("Delete",array('div' => false,'class' => 'btn','url' => array('controller'=>'Admins','action'=>'index'),'update' => 'listID','indicator' =>'loaderID','before'=>"setAction('delete');",'condition'=>"isAnySelected(this.form,'delete')","complete"=>"showMessage('deleted');"));?>
      </td>
 </tr>
</table>
<?php echo $form->end(); ?>
	<!-- Legend Start -->
	<table align="center" width="60%" border="0" cellspacing="5" cellpadding="10">
		<tr>
		<td align="center" width="65%"><table width='70%' cellspacing='1' cellpadding='2' style="border:0px solid #FBE9BD;">
		<tr>
	<td align='center' >
<img src="/img/icon_0.gif" border="0" title="Inactive" alt="" /></td>
        <td align='left' style="border-right:0px solid #FBE9BD;">Inactive</td>
	<td align='center' ><img src="/img/icon_1.gif" border="0" title="Active" alt="" /></td>
	<td align='left' style="border-right:0px solid #FBE9BD;">Active</td>
	<td align="center"><img src="/img/view.png" border="0" title="View Detail" alt="" /></td>
	<td align='left' style="border-right:0px solid #FBE9BD;">View Detail</td>
	<td align="center"><img src="/img/image_edit.png" border="0" title="Edit" alt="" /></td>
	<td align='left' style="border-right:0px solid #FBE9BD;">Edit</td>
		</tr>
       </table>
                </td>
</tr>
		</table>
                 <!-- Legend End -->
		</div>
		<?php
		}else{
		?>
		<div style="padding:5px 0;">
			<table width="100%" class="tableBorder" valign='top' cellpadding="3" cellspacing="1">
				<tr>
					<td><div id="noUser" align="center" style="font-weight:bold; padding-top:30px;">No Users Found</div></td>
				</tr>
			</table>
		</div>
             <?php	} ?>