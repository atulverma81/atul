<STYLE type="text/css">
	.tableTd {
	   	 color:blue;
		font-size:12px;
		font-weight:bold;
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bolder;
	}
   
</STYLE>
<table>
	<tr>
		<?php if($type == 1){?>
		<td><b>Organization Data<b></td>
		<?php } else{ ?>
		<td><b>Users Data<b></td>
		<?php } ?>
	</tr>
	<tr>
		<td><b>Date:</b></td>
		<td><?php echo date('Y/m/d');  ?></td>
	</tr>
	<tr>
		<td><b>Number of Rows:</b></td>
		<td style="text-align:left"><?php echo count($rows);?></td>
	</tr>
	<tr>
		<td></td>
	</tr>
		<tr id="titles">
			<td class="tableTd">User Name</td>
			<td class="tableTd">First Name</td>
			<td class="tableTd">Last Name</td>
			<td class="tableTd">Email Id</td>
			<td class="tableTd">Address1</td>
			<td class="tableTd">Address2</td>
			<td class="tableTd">City</td>
			<td class="tableTd">Country</td>
			<td class="tableTd">State</td>
			<td class="tableTd">Telephone Number</td>
			<td class="tableTd">Company Name</td>
			<?php
			if($type == 1){
			?>
			<td class="tableTd">License Period</td>
			<td class="tableTd">Expiry Date</td>
			<?php } ?>
			<td class="tableTd">Status</td>
			 
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['User']['username'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['firstname'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['lastname'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['email'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['address1'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['address2'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['city'].'</td>';
			echo '<td class="tableTdContent">'.$row['Country']['name'].'</td>';
			echo '<td class="tableTdContent">'.$row['State']['state_name'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['telephone_number'].'</td>';
			echo '<td class="tableTdContent">'.$row['User']['company_name'].'</td>';
			
			if($type == 1){
			echo '<td class="tableTdContent">'.$row['User']['license_name'].'</td>';
			echo '<td class="tableTdContent">'.$time->niceDateFormat($row['User']['subscription_expiry']).'</td>';
			}
			
			if($row['User']['status'] == 1){
			echo '<td class="tableTdContent">Active</td>';	
			}else{
				echo '<td class="tableTdContent">De-Active</td>';
			}
			echo '</tr>';
			endforeach;
		?>
</table>

