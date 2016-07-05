 





<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management"> Country   Details  </h2>								 		
	</div>
	<div style="padding:2px">
	<?php  echo $html->link('Country','/admin/countries').' >> ';
	echo '<span class="mediumFontf">View  Country Details<span>'; ?>
	</div>






<table align="left" cellspacing="2"  cellpadding="2" height="10%">
      
<tr><td><b>Name</b></td><td><?php echo  $data[0]['Country']['country']; ?></td></tr>
 <tr><td><b>Country Code</b></td><td><?php echo  $data[0]['Country']['country_code']; ?></td></tr>

<tr><td><b>Country  Currency</b></td><td><?php echo  $data[0]['Country']['country_currency']; ?></td></tr>
 <tr><td><b>Continent</b></td>
<td><?php  echo $data[0]['Continent']['continent'];  ?></td></tr>
 

</table>
</div>