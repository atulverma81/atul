 

<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management">  State   Details  </h2>								 		
	</div>
	<div style="padding:2px">
	<?php  echo $html->link('State','/admin/states').' >> ';
	echo '<span class="mediumFontf">View   State Details<span>'; ?>
	</div>

 
<table align="left" cellspacing="2"  cellpadding="2" height="10%">
     
<tr><td><b>State</b></td><td><?php echo  $data[0]['State']['state']; ?></td></tr>
 <tr><td><b>Country</b></td><td><?php echo  $country; ?></td></tr>
  
  
</table>
</div>