<?php echo $javascript->link('listing.js',false);?>
<?php //echo $javascript->link('prototype.js');?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td width="80%" valign="top">
			<div id="bluebox">	
				<div class="top-left"><span><?php echo $html->link("Manage Contents","/admin/users/home",array('class'=>'newHeader')); ?> &gt;  View Contents</span></div>
				<div class="top-right"></div>
				<div id="inside" style="padding:10px;">
					<div id="listingJS" style="display: none; color:#3333FF;" ></div>
					<div id="loaderID" style="display:none;position:absolute;margin-left:300px;margin-top:50px"><?php echo $html->image("loader_large_blue.gif"); ?></div>
					<?php if($session->check('message')){
						echo "<div class='SuccessMsgBox success' style='color:#3333FF' 'id='msgID'><ul><li>".$session->read('message')."</li></ul></div>";
						$session->del('message');
					}?>
					<?php
					echo $form->create(NULL,array("url"=>"/admin/contents/list","method"=>"Post"));
					?>
					<table width="100%" border="0" class="tableBorder" cellpadding="3" cellspacing="1">
						<tr>							
							<td align="right"></td>
							<td align="left" id="jsError"></td>
						</tr>
						<tr>
							<td align="right" width="15%">Title</td>
							<td align="left">
									<?php	echo $form->text('Content.searchRecord', array('maxlength'=>'80','value'=>'records','type'=>'hidden','size'=>'30','label'=>'','id'=>'title','div'=>false));
										echo $form->text('Content.title', array('maxlength'=>'80','size'=>'30','label'=>'','div'=>false));
										//echo $form->select('Course.Catalogue',$categories,null,array('class'=>'select-input','errors'=>true),'Please select');
									?></td>
						</tr>
						<tr>						
							<td align="right">Status</td>
							<td align="left"><?php echo $form->select('Content.status', array('1'=>'Active','2'=>'Inactive'),null,null,'Select')?></td>
						</tr>
						<tr>
							<td align="left">&nbsp;</td>
							<td align="left"><?php echo $ajax->submit(__("Search",true),array('div' => false,'class' => 'btn','url' => "/admin/contents/index",'update' => 'listID','onclick'=>"return isContentSearch();"));?></td>
						</tr>
					</table>
					<?php echo $form->end();?>
	<table width="100%" class="tableBorder1" cellpadding="3" cellspacing="1" style="padding:5px 0;" >
		<tr>
		        <td align="left" style="color:red">				
				<?php $session->flash(); ?>
		        </td>
			
			<td align="right" style="font-weight:bold;">
			<?php   
				echo $html->link('Add Content', $html->url("/admin/contents/addContent"));  
			?>
			</td>
		</tr>
	</table>
					<?php echo $this->renderElement("admin/contents/list"); ?>
				</div>
				<!-- Legend Start -->
				<table align="center" width="70%" border="0">
					<tr>
						<td align="center" width="65%"><table width='70%' cellspacing='1' cellpadding='2' style="border:1px solid #FBE9BD;">
					<tr>
					<td align='center' ><img src="/img/icon_0.gif" border="0" title="Deactive" alt="" /></td>
					<td align='left' style="border-right:1px solid #FBE9BD;">Deactive</td>
					<td align='center' ><img src="/img/icon_1.gif" border="0" title="Active" alt="" /></td>
					<td align='left' style="border-right:1px solid #FBE9BD;">Active</td>
					<td align="center"><img src="/img/view.png" border="0" title="View Detail" alt="" /></td>
					<td align='left' style="border-right:1px solid #FBE9BD;">View Detail</td>
					<td align="center"><img src="/img/image_edit.png" border="0" title="Edit" alt="" /></td>
					<td align='left' style="border-right:1px solid #FBE9BD;">Edit</td>

					
				</tr>
			</table></td>
					</tr>
				</table>
				<!-- Legend End -->
				<div class="bottom"></div>
			</div>
		</td>
  </tr>
</table>
			
			
