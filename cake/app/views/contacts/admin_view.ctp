<div id="content">
	<div  class="single" >
		<h2><img src="/img/users.gif" alt="Property Management"> View Contact</h2>	
        </div>
	<div style="padding:2px">
	<?php  echo $html->link('User Contacts','/admin/contacts/index').' >> ';
	echo '<span class="mediumFontf">View Contacts<span>'; ?>
	<span style="float:right; margin-right:20px;font-weight:bold;"><a href="javascript:history.go(-1)">Back</a></span>
	</div>
						
						
					

				<table width="100%" border="0" cellpadding="2" cellspacing="0">
					<tr>
						<td align="right" width="30%" height="5%">&nbsp;</td>
						<td width="50%"></td>
					</tr>
					<tr>
						<td align="right" width="30%"><strong><?php echo __("Subject",true)?></strong></td>
						<td width="50%">
						<?php if(!empty($this->data['Contact']['subject']))		  
							echo $this->data['Contact']['subject'];
							else echo 'N/A';
						?>					
						</td>
					</tr>
					<tr>
						<td align="right" width="30%"><strong><?php echo __("Email Address",true)?></strong></td>
						<td width="50%">
						<?php if(!empty($this->data['Contact']['email']))		  
							echo $this->data['Contact']['email'];
							else echo 'N/A';
						?>					
						</td>
					</tr>
					<tr>
						<td align="right" width="30%" height="25"><strong><?php echo __("Phone Number",true)?></strong></td>
						<td width="50%">
						<?php if(!empty($this->data['Contact']['phone']))		  
							echo ucwords($this->data['Contact']['phone']);
							else echo 'N/A';
						?>					
						</td>
					</tr>
					
					<tr>
						<td align="right" width="30%" height="25"><strong><?php echo __("Full Name",true)?></strong></td>
						<td width="50%">
						<?php if(!empty($this->data['Contact']['firstname']))		  
							echo ucwords($this->data['Contact']['firstname'].' '.$this->data['Contact']['lastname']);
							else echo 'N/A';
						?>					
						</td>
					</tr>
					
					
					<tr>
						<td align="right" width="30%" height="25"><strong><?php echo __("Posted Date",true)?></strong></td>
						<td width="50%">
						<?php if(!empty($this->data['Contact']['posted_date']))		  
							 echo $time->nice($this->data['Contact']['posted_date']);	
							else echo 'N/A';
						?>					
						</td>
					</tr>
					<tr>
						<td align="right" valign="top" width="30%" height="25"><strong><?php echo __("Comments/Description",true)?></strong></td>
						<td width="50%">
						<?php if(!empty($this->data['Contact']['comments']))		
							echo $content = wordwrap($this->data['Contact']['comments'], 65, "<br />\n", true); 
							else echo 'N/A';
						?>					
						</td>
					</tr>
					<tr>
						<td align="right" width="20%">&nbsp;</td>
						<td width="70%">&nbsp;</td>
					</tr>
					
					</table>
</div>