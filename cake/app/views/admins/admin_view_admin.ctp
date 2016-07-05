<div id="content">
	<div  class="single" >
		<h2> View  Admin Detail</h2>	
        </div>
	<div style="padding:2px">
	<?php  echo $html->link('Admin Management','/admin/admins/index/').' >> ';
	echo '<span class="mediumFontf">View  Admins<span>'; ?>
	 
	</div>
						
						
					

				<table width="80%" border="0" cellpadding="2" cellspacing="0">
					<tr>
						<td align="left" width="20%" height="5%">&nbsp;</td>
						<td width="70%"></td>
					</tr>
					<tr>
						<td align="left" width="20%"><strong><?php echo __("User Name",true)?></strong></td>
						<td width="70%">
						<?php if(!empty($data['User']['username']))		  
							echo $data['User']['username'];
							else echo 'N/A';
						?>
						</td>
					</tr>
					<tr>
						<td align="left" width="20%"><strong><?php echo __("First Name",true)?></strong></td>
						<td width="70%">
						<?php if(!empty($data['User']['firstname']))		  
							echo $data['User']['firstname'];
							else echo 'N/A';
						?>					
						</td>
					</tr>
					<tr>
						<td align="left" width="20%"><strong><?php echo __("Last Name",true)?></strong></td>
						<td width="70%">
						<?php if(!empty($data['User']['lastname']))		  
							echo $data['User']['lastname'];
							else echo 'N/A';
						?>					
						</td>
					</tr>
					<tr>
						<td align="left" width="20%" height="25"><strong><?php echo __("Email Address",true)?></strong></td>
						<td width="70%">
						<?php if(!empty($data['User']['email']))		  
							echo ucwords($data['User']['email']);
							else echo 'N/A';
						?>					
						</td>
					</tr> 
					
					<tr>
						<td align="left" width="20%" height="25"><strong><?php echo __("Created Date",true)?></strong></td>
						<td width="70%">
						<?php if(!empty($data['User']['createdDate']))		  
							echo $time->nice($data['User']['createdDate']);
							else echo 'N/A';
						?>					
						</td>
					</tr>
					<tr>
						<td align="left" width="20%" height="25"><strong><?php echo __("Modified Date",true)?></strong></td>
						<td width="70%">
						<?php if(!empty($data['User']['modifiedDate']))		  
							echo $time->nice($data['User']['modifiedDate']);
							else echo 'N/A';
						?>					
						</td>
					</tr>

					<tr>
						<td align="left" width="20%" height="25"><strong><?php echo __("Status",true)?></strong></td>
						<td width="70%">
						<?php 
							if($data['User']['status']==1) {
						
								echo "Active";
							}
							elseif($data['User']['status']==2)
							{
												
									echo "Inactive";
							
						  }?>	
						</td>				
						
					</tr>
					
					<tr>
						<td align="left" width="20%">&nbsp;</td>
						<td width="70%">&nbsp;</td>
					</tr>
					
					</table>
</div>