<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Newsletters Management"> Newsletters Management</h2>								 		
	</div>
	<div style="padding:2px">
	<?php  echo $html->link('Home','/admin/users/home').' >> ';
	echo '<span class="mediumFontf">View Newsletters<span>'; ?>
	</div>
                
 <!-- search form-->            
<?php echo $form->create('Newsletter',array('action'=>'/view','name'=>'view'))?>			
<table width="100%" cellpadding="0" cellspacing="4" border="0">
  <tr>
	<td  width="15%" align="right"><b>Enter title:  </b> </td>
	<td width="25%" align="center"><?php echo $form->text('Newsletter.title', array('maxlength'=>'80','size'=>'30','label'=>'','id'=>'title','div'=>false))?></td>
	<td width="30%" align="left"> <?php echo $form->submit('Search',array('class'=>'button'))?> </td>
  </tr>
  <tr>
	<td align="right" width="15%">&nbsp;</td>
	<td width="15%">&nbsp;</td><td align="left">&nbsp;</td>
  </tr>
</table>	
<?php echo $form->end();?>
<!--end of search form-->
  <!-- Start: Content -->
<table width="100%" cellpadding="0" cellspacing="2" border="0">
<!-- set message-->
<?php if($session->check('message')) { ?>
 <tr><td align="center" align="center" colspan="9"><font color="green"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
<?php } ?>



<?php
if(!empty($data)) {
$pagination->setPaging($paging); // Initialize the pagination variables
$pagination->result();

	echo '<tr bgcolor=#f3f3f3 class="lft_link">
			<td width=5%>S.No.</td>
			<td width=15%>'.$pagination->sortBy('title','Title','Newsletter',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>
			<td width=25%>'.$pagination->sortBy('subject','Subject','Newsletter',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>
			<td width=15%>'.$pagination->sortBy('created','Date','Newsletter',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>
			<td width=10%>Send</td>
			<td width=10%>SendTo</td>
			<td width=5%>Edit</td>
			<td width=5%>Active</td>
			<td width=5% align="center">Delete</td>
	    </tr>
';
//Start: Row
	foreach ($data as $output)
	{
		echo '<table id='.$output['Newsletter']['id'].'  width="100%" cellpadding="2" cellspacing="0" border="0" style="border-bottom: 1px solid #666">';
		echo '<tr';
		if( (@$pagination->start_row_n) %2 == 0){echo ' class=';}else{echo ' class=altRow';}
		echo '>';
		echo '<td width=5% class=mediumFont>'.++$pagination->start_row_n.'</td>';	
		echo '<td width=15%>'.$html->link(ucwords($output['Newsletter']['title']), "/admin/newsletters/edit/{$output['Newsletter']['id']}",array('class'=>'lft_link')).'</td>';	
		echo '<td width=25% class=mediumFont>'.ucwords($output['Newsletter']['subject']).'</td>';
		echo '<td width=15% class=mediumFont>'.date('M j, Y',strtotime($output['Newsletter']['created'])).'</td>';
		echo '<td width=10%>'.$html->link($html->image("page_white_text.png",array("border"=>0,"alt"=>"Send Newsletter","title"=>"Send To Newsletter Sign Ups")),"/admin/users/subscribers/".$output['Newsletter']['id'],null,false,false).'</td>';
		echo '<td width=10%>'.$html->link($html->image("page_white_text.png",array("border"=>0,"alt"=>"Send Newsletter","title"=>"Send Newsletter to Register Users")),"/admin/users/subscribe/".$output['Newsletter']['id'],null,false,false).'</td>';
		echo '<td width=5%>'.$html->link($html->image("image_edit.png",array("border"=>0,"alt"=>"Edit Newsletter","title"=>"Edit Newsletter")),"/admin/newsletters/edit/".$output['Newsletter']['id'],null,false,false).'</td>';
		if($output['Newsletter']['status']==1){
			$image = 'accept.png';
			$title = 'Deactive';
		} else {
			$image = 'delete.png';
			$title = 'Active';
		}
		echo '<td id="img_'.$output['Newsletter']['id'].'" width=5% align="center">'.$ajax->link($html->image($image, array('border' => 0,'title'=>$title,'alt'=>$title)),'', array('update' => 'img_'.$output['Newsletter']['id'], 'url' => '/admin/newsletters/active/'.$output['Newsletter']['id']), null,false).'</td>';
		echo '<td width=5% align="center">'.$ajax->link($html->image('close.gif',array('border'=>'0','alt'=>'Delete','title'=>'Delete')), '#', array('update'=>'content', 'url' => "/admin/newsletters/delete/".$output['Newsletter']['id']),'Are you sure you want to delete?',null,null).'</td>';	
		
	    echo '</tr>';
	    echo '</table>';

	}
//End: Row
?>
<?php echo $this->element('pagination'); // Render the pagination element 
} else { ?>
<font color="green" size="3px">No Newsletters Found..</font>
<?php } ?>
</td>
</tr>
</table>
</div>               
