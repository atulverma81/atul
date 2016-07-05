<!DOCTYPE html>
<html lang="en">
<head>
<title> <?php if(!empty($metatitle)) { echo @$metatitle; } else {?> Competitive Communication Services  <?php }?> </title>
<meta name="description" content="<?php echo @$metadescription;?>" />
<meta name="keywords" content="<?php echo $metakeywords;?>" />
<meta name="author" content="Atul Verma" />
<meta name="robots" content="index, follow">
<meta name="copyright" content="competitive communication services" />
<meta name="revisit-after" content="15 days">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="Content-Language" CONTENT="english">
<meta charset="utf-8">
<?php echo $html->css("slider"); ?>
<?php echo $html->css("reset"); ?>
<?php echo $html->css("grid"); ?>
<?php echo $html->css("style"); ?> 
<?php echo $html->css("reset11"); ?>
<?php echo $html->css("96011"); ?>
<?php echo $html->css("coolMenu"); ?> 


<?php echo $javascript->link('jquery.min.js'); ?>
<?php echo $javascript->link('s3Slider.js'); ?>
<?php echo $javascript->link('jquery.easing.1.2.js'); ?> 
<?php echo $javascript->link('modernizr-1.6.min.js'); ?>   
 
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider1').s3Slider({
            timeOut: 3000
        });
    });
</script>
<!--[if lt IE 7]>
<?php echo $html->css("ie/ie6"); ?>

  <?php echo $javascript->link('ie_png.js'); ?>
  <script type="text/javascript">
      ie_png.fix('.png');
  </script>
<![endif]-->
<!--[if lt IE 9]>
  <?php echo $javascript->link('html5.js'); ?>

  <![endif]-->
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34061729-1']);
  _gaq.push(['_setDomainName', 'ccsorg.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="main">
  <!-- header -->
      <?php echo $this->element('header');?>
  <section id="main-banner">
    <div class="intro">
      <div class="inner"> <strong>trust our</strong> experience to manage your <span>business!</span> </div>
    </div>
     <!-- // slider -->
     <div class="anythingSlider">
    <div id="slider1">
        <ul id="slider1Content">
         <?php $getimages= $this->requestAction("/banners/getBannerImages"); 
          if(!empty($getimages)) { $count=1;
			      foreach($getimages as $image){
			      $class='bottom';
            if($count%2==0){$class='top';}			
			  ?>
            <li class="slider1Image">
                <a href=""><img src="/img/banner/<?php	echo @$image['Banner']['filename'];?>" alt="<?php echo $count; ?>" width='640px' height='303px' /> </a>
                <span class="<?php echo $class; ?>"><strong><?php	echo @$image['Banner']['name'];?></strong><br /><?php	echo @$image['Banner']['content']; ?>..</span>
              </li>
           <?php $count++; }}else{ ?>
		   	 <li class="slider1Image"><a href=""><img src="/images/Ban002_new.jpg" width='640px' height='303px' alt="1"></a>
          <span class="bottom"><strong>Title text 2</strong><br />Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...</span>
          </li>
		   <?php } ?>
           
            <div class="clear slider1Image"></div>
        </ul>
    </div>
    </div>
  <!-- // slider -->
 
  </section>
   <aside class="top2">
      <?php echo $this->element('news');?>
  </aside>
  <div class="wrapper">
    <!-- content -->
    <section id="content">
    	<div class="container_12">
        <div class="wrapper">
        	<aside class="grid_4">
        		  <?php echo $this->element('left');?>
          </aside>
          <div class="grid_8">
               <?php echo $content_for_layout; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
   <aside class="top">
      <?php echo $this->element('footer_menu');?>
  </aside>
  <aside class="top1">
      <?php echo $this->element('footer_link');?>
  </aside>
  <!-- footer -->
   <?php echo $this->element('footer');?>
</div>
</body>
</html>