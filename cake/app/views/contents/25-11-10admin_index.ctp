<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Member Management"> Content Managment</h2>								 		
	</div>
	<div style="padding:20px">
	<?php  echo $html->link('Home','/admin/users/home').' >> ';
	echo '<span class="mediumFontf">View Content<span>'; ?>
	</div>
	

                
<!-- Start: Content -->
<table width="100%" cellpadding="0" cellspacing="2" border="0">
<?php if($session->check('message')) { ?>
<tr><td align="center" align="center" colspan="9"><font color="red"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
<?php } ?>
<?php
if(!empty($data)) {
$pagination->setPaging($paging); // Initialize the pagination variables
$pagination->result();

	echo '<tr bgcolor=#f3f3f3 class="lft_link">
			<td height="30px" width=5%>S.No.</td>
			<td width=25%>'.$pagination->sortBy('pagename','Page Name','Content',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>
      <td width=30%>'.$pagination->sortBy('title','Page Title','Content',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>			
			<td width=20%>'.$pagination->sortBy('created','Date','Content',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td> 		
			
			<td width=5% align="center">Edit</td>
			
			<!--<td width=5% align="center">Delete</td>-->
	</tr>
';
//Start: Row
	foreach ($data as $output)
	{ 
		echo '<table id='.$output['Content']['id'].' width="100%" cellpadding="2" cellspacing="0" border="0" style="border-bottom: 1px solid #666">';
		echo '<tr';
		if( (@$pagination->start_row_n) %2 == 0){echo ' class=';}else{echo ' class=altRow';}
		echo '>';
		echo '<td width=5% class=mediumFont>'.++$pagination->start_row_n.'</td>';	
		echo '<td width=25%>'.$html->link(ucwords($output['Content']['pagename']), "/admin/contents/edit/{$output['Content']['id']}",array('class'=>'lft_link')).'</td>';	
		echo '<td width=25%>'.$html->link(ucwords($output['Content']['title']), "/admin/contents/edit/{$output['Content']['id']}",array('class'=>'lft_link')).'</td>';	
		echo '<td width=20% class=mediumFont>'.date('M j, y',strtotime($output['Content']['created'])).'</td>';
	
		echo '<td width=5% align="center">'.$html->link($html->image("image_edit.png",array("border"=>0,"alt"=>"Edit user","title"=>"Edit user")),"/admin/contents/edit/".$output['Content']['id'],null,false,false).'</td>';
	
		//echo '<td width=5% align="center">'.$ajax->link($html->image('close.gif',array('border'=>'0','alt'=>'Delete','title'=>'Delete')), '#', array('update'=>'content', 'url' => "/admin/contents/delete/".$output['Content']['id']),'Are you sure you want to delete?',null,null).'</td>';	
		
	    echo '</tr>';
	    echo '</table>';

	}
//End: Row
?>
<?php echo $this->element('pagination'); // Render the pagination element
} else { ?>
 <font color="green" size="3px">No Member Found..</font>
<?php } ?>
</td>
</tr>
</table>
</div>               
