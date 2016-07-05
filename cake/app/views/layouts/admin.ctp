<html>
<head>
<title>Competitive Communication Services</title>
<link rel="icon" href="<?php echo $this->webroot . 'favicon.ico';?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $this->webroot . 'favicon.ico';?>" type="image/x-icon" />
	<!-- Including  CSS for layout -->
	<?php echo $html->css('admin');?>
	<?php echo $html->css('main');?>
	<?php echo $html->css('lightbox');?>
	<?php echo $html->css('jojo');?>
	
	<!-- Including  JS for layout -->
	<?php echo $javascript->link('lightbox_plus'); ?>
	<?php print $javascript->link('prototype') ?>
         <?php print $javascript->link('admin_validation') ?>
           <?php print $javascript->link('ajax/jAjaxnew') ?>
	<?php print $javascript->link('scriptaculous.js'); ?>
	<?php print $html->charset('UTF-8') ?>
	
	<?php
		echo $javascript->link(array('jquery.js'));
	?>
	
	<script type="text/javascript">
		var jq = jQuery.noConflict();
	</script>
    
</head>
<body style="padding-left:50px;">
<div id="container">
		<div id="main">
			<div id="contentTop">
			<div id="header">
				<!-- START: TOP HEADER -->
<div id="topheader">
	 <p style="float:left;padding-top:15px;">
       <a href="/admin/users/home">
         <img alt="Competitiveteleservices" src="/images/logo-txt.png" id="mlogo"/>
      </a>
    </p>
    <p style="float:left;margin-left:170px;">
	<a href="/admin/users/home">
         <img alt="Competitive Tele Services" src="/images/logo.png" width="110" id="mlogo"/>
      </a>
    </p>
	<div id="top-links">
	       <ul>    					
		       
	       </ul>
       </div>
  </div>	 <!--/end topheader-->

<!-- END: TOP HEADER -->			 </div><!--/end header-->
		  </div><!--/end header-->
		 
<div id="grid">
<?php if($session->read('AdminUser')) { ?>
<?php echo $this->element('admin_leftNav');?>
<?php } else { ?>
<div id="firstLeft">&nbsp;</div>
<?php } ?>
<div id="innermiddle">					
	<div class="top-left"><span></span></div>
		<div class="top-right"></div>
				<div id="inside">								 	<?php 
		
		echo $content_for_layout; 
        	?>									
					 <!--/end middle-->
		<!--/end last-->
</div><!-- end of grid--> 				 
</div><!--/end content-->
	<div class="clear"></div>
	<br style="line-height: 15px;">
	</div><!--/end main-->

<!--/end container-->
<!--/start footer-->
<?php echo $this->element('admin_footer');?>
<div id="loadingAnimation">
	<?php echo $html->image('images/loading_animation.gif'); ?>
</div>
<!--/End footer--><script>
    (function(){
        var forms = document.forms || [];
        for(var i = 0; i < forms.length; i++){
            for(var j = 0; j < forms[i].length; j++){
                if(!forms[i][j].readonly != undefined && forms[i][j].type != "hidden" && forms[i][j].disabled != true && forms[i][j].style.display != 'none'){
                    forms[i][j].focus();
                    return;
                }
            }
        }
    })();
</script>
</body>
</html>