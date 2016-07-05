
<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management"> Content Details</h2>								 		
	</div>
	<div style="padding:2px">
	<?php  echo $html->link('Contents','/admin/contents/').' >> ';
	echo '<span class="mediumFontf">View Content Details<span>'; ?>
	</div>

<table align="left" cellspacing="2"  cellpadding="2" height="10" width="100%">
    
<tr><td><b>Page Title</b></td><td><?php echo $data[0]['Content']['pagetitle']; ?></td></tr>
 <tr><td><b>Meta Title</b></td><td><?php echo  $data[0]['Content']['meta_title']; ?></td></tr>
 <tr><td><b>Meta Keywords</b></td>
<td><?php echo  substr($data[0]['Content']['meta_keywords'],0,200); ?></td>
</tr>
 <tr><td><b>Meta Description</b></td>
<td>
<?php echo  $data[0]['Content']['meta_description'];  ?>
</td>
</tr>
<tr><td><b>status</b></td> <?php if($data[0]['Content']['status']=="1"){  ?>


<td>
<?php echo "Active";  ?>
</td>



<?php }else{ ?>

<td>
<?php echo "Inactive";  ?>
</td>

<?php } ?>
</table>			 
				 
	</div>						 
			 