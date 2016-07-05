<?php echo $javascript->link('form/common');?>
<?php echo $javascript->link('form/compose');?>
<?php  echo $javascript->link('form/rounded-corners');?>
<?php echo $javascript->link('form/form-field-tooltip');?>
<?php echo $html->css('form-field-tooltip');?>    
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
    
    <?php echo $this->element('inbox_menu');?>
    <?php echo $form->create('Content',array('action'=>'/compose','name'=>'composeMsg','onSubmit'=>'return validate_form(FRM_LABELS, FRM_CONTROLS, ERR_MESSAGES);'))?>
    <fieldset class="ftr_bg1">
        <legend>Compose Message</legend><br class="clear" />     
         <?php if($session->check('message')) { ?>
         <label class="txt"></label>
        <font color="green"><?php echo $session->read('message'); $session->del('message');  ?></font><br class="clear" />
        <?php } ?>
        <?php if($session->check('error')) { ?>
         <label class="txt"></label>
        <font color="red"><?php echo $session->read('error'); $session->del('error');  ?></font><br class="clear" />
        <?php } ?>
        
        <label class="txt"><font color="red">*</font>To : </label>
        <?php echo $form->input('Message.to', array('size'=>'20','class'=>'txtbox','tooltipText'=>'Recipient email or username is required','label'=>'','maxlength'=>'25')); ?><br class="clear" />
        
        <label class="txt"><font color="red">*</font>Subject : </label>
        <?php echo $form->input('MessageContent.subject', array('size'=>'20','class'=>'txtbox','tooltipText'=>'Subject is required','label'=>'','maxlength'=>'25')); ?><br class="clear" />
        
        <label class="txt"><font color="red">*</font>Message : </label>
        <?php echo $form->textarea('MessageContent.body', array('rows'=>'5','cols'=>'40','class'=>'textArea','tooltipText'=>'Message content is required','label'=>'','div'=>false))?><br class="clear" />
        
        <label class="txt">&nbsp; &nbsp; </label>
        <?php echo $form->submit('Send',array('class'=>'button'))?>
            
    </fieldset>            
    <?php echo $form->end();?>
    </div>
    </div>
    <!--  center-content div ends here -->
	
<script type="text/javascript">
var tooltipObj = new DHTMLgoodies_formTooltip();
tooltipObj.setTooltipPosition('right');
tooltipObj.setPageBgColor('#EEE');
tooltipObj.setCloseMessage('Exit');
tooltipObj.initFormFieldTooltip();
</script> 	
		