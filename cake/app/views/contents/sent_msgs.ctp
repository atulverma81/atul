<?php echo $javascript->link('checkallbox.js'); ?>
<div id="content">
<!--  right-content div starts here -->
		<div class="right-content">
			<div class="banner">
				<img src="/img/vacation/banner.gif" width="186" height="170" alt="" />
			</div>
			<div class="travel-offers">
			<!--
				<h4>Travel Offers</h4>
				<ul>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
					<li><a href="#">Lorem ipsum dolor</a></li>
				    <li><a href="#">Lorem ipsum dolor</a></li>  
				</ul>
				<p>
					<a href="#">read more</a>
				</p>
				-->
			</div>
		</div>
		<!--  right-content div ends here -->

		<!--  center-content div starts here -->
		<div class="left-innercontent">
            <?php echo $this->element('inner_header');?>
			
        <div  class="single" >
            <h2 class="aboutus">My Messages</h2>								 		
        </div>	
        
    <!-- search form-->            
    <?php /*echo $form->create('Property',array('action'=>'/listAll','name'=>'view'))?>
    <table width="100%" cellpadding="0" cellspacing="2" border="0">  
      <tr>
        <td width="20%" align="right"><b>Enter keyword:  </b> </td>
        <td width="30%" align="center"><?php echo $form->text('Property.keyword', array('maxlength'=>'80','class'=>'txtbox','size'=>'30','label'=>'','id'=>'title','div'=>false))?></td>
        <td width="25%" align="left"> <?php echo $form->submit('Search',array('class'=>'button'))?> </td>
        <td width="15%" align="left"><?php echo $html->link('Add Property','/properties/newProperty'); ?></td>
      </tr>
      <tr>
        <td align="right" colspan="4">&nbsp;</td>	
      </tr>
    </table>	
    <?php echo $form->end();*/?>
    <!--end of search form-->
    
    <?php echo $this->element('inbox_menu');?>
                    
    <!-- Start: Content -->
	<?php echo $form->create('Content',array('action'=>'/update/'.$userInfo['id'],'name'=>'showMsgsForm','onSubmit'=>''))?>
	<div>
		<?php 			
				$options = array("class"=>"dropdown",
								'onChange'=>"document.showMsgsForm.submit()",
								'url'=>'/contents/update');							
				echo $form->select('Message.action',array('delete'=>'Delete'),@$this->data['Message']['action'],$options, '--- Select ---');
				//echo $ajax->observeField('MessageAction',$options);
			?>
	<br class="clear" />
    </div>
    <table width="100%" cellpadding="0" cellspacing="2" border="0">
    <?php if($session->check('message')) { ?>
    <tr><td align="center" align="center" colspan="9"><font color="green"><?php echo $session->read('message'); $session->del('message');  ?></font></td></tr>
    <?php } ?>
    <?php
    if(!empty($data)) {
    $pagination->setPaging($paging); // Initialize the pagination variables
    $pagination->result();
        echo '<tr bgcolor=#f3f3f3 class="lft_head">
                <td width=5%></td>';?>
				<td width="5%"><input type="checkbox" name="check_all" onclick="checkall('showMsgsForm','check_request','true','check_all')" ></td>
                <?php echo '<td width=20%>'.$pagination->sortBy('username','Recipient','User',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>
                <td width=40%>'.$pagination->sortBy('subject','Subject','MessageContent',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>
                <td width=14%>'.$pagination->sortBy('created','Date','Message',array('class'=>'lft_link','escape'=>false),'&nbsp;'.$html->image('paging_up.png',array('border'=>'0')),'&nbsp;'.$html->image('paging_down.png',array('border'=>'0'))).'</td>
        </tr>
    ';
    //Start: Row
        foreach ($data as $output)
        {
            $class = 'mail-link';			
			echo '<table id='.$output['Message']['id'].' width="100%" cellpadding="2" cellspacing="0" border="0" style="border-bottom:1px solid #666;">';            	
			echo '<tr';
            if( (@$pagination->start_row_n) %2 == 0){ echo ' class=""';}else{ echo ' class="altRow"';}
            echo '>';
            echo '<td width=5% class=mediumFont></td>';
			echo '<td width=5% class=mediumFont><input type="checkbox" name = "check_request[]" id="check_request" value='.$output['Message']['id'].'></td>';	
            echo '<td width=20%>'.$html->link(ucwords($output['User']['username']), "/contents/viewMsg/{$output['Message']['id']}/{$output['Message']['sender_id']}",array('class'=>$class)).'</td>';	
			echo '<td width=40%>'.$html->link(ucwords($output['MessageContent']['subject']), "/contents/viewMsg/{$output['Message']['id']}",array('class'=>$class)).'</td>';
			echo '<td width=14%>'.$html->link(date('M j, y',strtotime($output['Message']['created'])), "/contents/viewMsg/{$output['Message']['id']}",array('class'=>$class)).'</td>';
			echo '</tr>';
			echo '</table>';
			++$pagination->start_row_n;
        }
    //End: Row
    ?>
    <?php echo $this->element('pagination'); // Render the pagination element
    } else { ?>
     <font color="green" size="3px">No sent messages..</font>
    <?php } ?>
    </td>
    </tr>
    </table>
	<?php echo $form->end();?>   
    </div>
    </div>
    <!--  center-content div ends here -->
			
	
		