<div class="container_12">
<?php $flinkContents=array(); $flinkContents= $this->requestAction("/requests/getContentFooterLink");   ?>
      <div class="wrapper">
        
        <div class="grid_4 divider">
          <div class="inner">
            <h3><img src="/images/icon2.png" alt=""><?php echo $flinkContents[1]['Content']['pagetitle']; ?><span></span></h3>
            <?php echo strip_tags(substr($flinkContents[1]['Content']['description'],0,140)); ?>.. <a href="/contents/tech_support" class="link1">More Info</a>
          </div>
        </div>
<div class="grid_4 divider">
          <div class="inner">
            <h3><img src="/images/icon1.png" alt=""><?php echo $flinkContents[0]['Content']['pagetitle']; ?><span></span></h3>
            <?php echo strip_tags(substr($flinkContents[0]['Content']['description'],0,120)); ?>.. <a href="/contents/company" class="link1">More Info</a>
          </div>
        </div>
        <div class="grid_4">
          <div class="inner">
            <h3><img src="/images/icon3.png" alt=""><?php echo $flinkContents[2]['Content']['pagetitle']; ?><span></span></h3>
            <?php echo strip_tags(substr($flinkContents[2]['Content']['description'],0,140)); ?>.. <a href="/contents/achievments" class="link1">More Info</a>
          </div>
        </div>
      </div>
    </div>