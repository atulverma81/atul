<?php
$paginator->options(array('update'=>'listID','url'=>array('controller'=>'banners','action'=>'index',$separator),'indicator' =>'loaderID'));
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
	?>
      </td>
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
if(!empty($banners)){
 ?>	
	<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#FBE9BD" style="border:#FBE9BD solid 1px" rules="all" class='tableBorder'>
			<tr class="formSectHeader" align="center">
	<td class="thclass" width="1%" ><input name="chkRecordId" value="0" onClick="checkAll(this.form)" type='checkbox'></td>
			<td class="thclass">
<?php echo $paginator->sort('Name ','Banner.name',array('escape'=>false,'class'=>'custom_link'));?>
</td>
     <td class="thclass">
			Image
</td>  
  <td class="thclass">
           <?php echo $paginator->sort('Status','Banner.status',array('escape'=>false,'class'=>'custom_link'));?>
         </td>

                
			<td class="thclass">Action</td>
		       </tr>
		<?php
		 // list all users
		 	$counter=0;
			$CounterItem = 1;
			foreach($banners as $content){
                             //print_r($content);
			if($counter%2 == 1) $bgColor = "#ffffff"; else $bgColor = "#F4F8FE";
                 	?>	
		<tr id="deleted<?php echo $content['Banner']['id'];?>" bgcolor="<?=$bgColor?>">
		<td class="list">
		<input type="checkbox" onclick="javascript:isAllSelect(this.form);" name="chkRecordId" value="<?php echo $content['Banner']['id'];?>" />					</td>
		<td class="list">
<?php
if(!empty($content['Banner']['name']))

	echo ucfirst($content['Banner']['name']);
else echo 'N/A';

?>
</td>
<td class="list">
<img src="/img/banner/<?php	echo @$content['Banner']['filename'];?>" width="100" height="40" alt="banner image" />
</td>

<?php 
					  if($content['Banner']['status']==1) {
						?>
						<td align="center" id="status<?php echo $content['Banner']['id'];?>">
						<?php
							
							echo $html->image("icon_1.gif");
						?>
						</td>
						<?php }
							elseif($content['Banner']['status']==2)
						{?>
						<td align="center" id="status<?php echo $content['Banner']['id'];?>">
						<?php				
							       echo $html->image("icon_0.gif");?>
						</td>
						<?php  }?>

 <td class="list" align="center">

 
	<span id="status<?php echo $content['Banner']['id'];?>" >
<?php
echo $html->link($html->image('image_edit.png',array('title'=>'Edit')),array( 'controller' => 'banners','action' => 'edit/',$content['Banner']['id']),null,null,false);
?>
</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
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
<?php echo $ajax->submit("Activate",array('div' => false,'class' => 'btn','url' => array('controller'=>'banners','action'=>'/index',$urlSeparator),'update' => 'listID','indicator' =>'loaderID','before'=>"setAction('activate');",'confirm'=>"Are you sure you want to activate record(s)?",'condition'=>"isAnySelect(this.form)","complete"=>"showMessage('activated');"));?>
<?php echo $ajax->submit("Deactivate",array('div' => false,'class' => 'btn','url' => array('controller'=>'banners','action'=>'index',$urlSeparator),'update' => 'listID','indicator' =>'loaderID','before'=>"setAction('deactivate');",'confirm'=>"Are you sure you want to deactivate record(s)?",'condition'=>"isAnySelect(this.form)","complete"=>"showMessage('deactivated');"));?>
<?php echo $ajax->submit("Delete",array('div' => false,'class' => 'btn','url' => array('controller'=>'banners','action'=>'index'),'update' => 'listID','indicator' =>'loaderID','before'=>"setAction('delete');",'condition'=>"isAnySelected(this.form,'delete')","complete"=>"showMessage('deleted');"));?>
      </td>
 </tr>
</table>
<?php echo $form->end(); ?>
	<!-- Legend Start -->
	<table align="center" width="60%" border="0" cellspacing="5" cellpadding="10">
		<tr>
		<td align="center" width="65%"><table width='40%' cellspacing='1' cellpadding='2' style="border:0px solid #FBE9BD;">
		<tr>
	
	
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
		        <td>
<div id="noUser" align="center" style="font-weight:bold; padding-top:30px;">No Banner Found</div>
                         </td>
	         </tr>
	</table>
</div>
           <?php	} ?>