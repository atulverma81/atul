<div class="container_12">
 <?php $linkContents=array(); $linkContents= $this->requestAction("/requests/getContentSunLink");         
          
			      ?>
      <div class="wrapper">
        <div class="grid_13 divider1">
              <div class="box">
            	
              <img src='/images/logofooter.png' width='122px' style='margin-top:20px' >       
          </div>
        </div>
        <div class="grid_13 divider1">
              <div class="box">
            	<h2>Sectors</h2>
              <ul class="list1">
              <?php
              if(!empty($linkContents)) { $count=1;
			           foreach($linkContents as $link){
                    if($link['Content']['sub_link']=='1') {
                     ?>
			              <li>
                <a href="/contents/<?php	echo @$link['Content']['page_code'];?>"><?php	echo @$link['Content']['pagetitle'];?> </a>
                
                  </li>
			           <?php
			           }
			        }}
               ?>              	              
              </ul>          
          </div>
        </div>
        <div class="grid_13 divider1">
              <div class="box">
            	<h2>Solutions</h2>
              <ul class="list1">
              <?php
              if(!empty($linkContents)) { $count=1;
			           foreach($linkContents as $link){
                    if($link['Content']['sub_link']=='2') {
                     ?>
			              <li>
                <a href="/contents/<?php	echo @$link['Content']['page_code'];?>"><?php	echo @$link['Content']['pagetitle'];?> </a>
                
                  </li>
			           <?php
			           }
			        }}
               ?>                      
              </ul>          
          </div>
        </div>
        <div class="grid_13 divider1">
              <div class="box">
            	<h2>Customers</h2>
              <ul class="list1">
              <?php
              if(!empty($linkContents)) { $count=1;
			           foreach($linkContents as $link){
                    if($link['Content']['sub_link']=='3') {
                     ?>
			              <li>
                <a href="/contents/<?php	echo @$link['Content']['page_code'];?>"><?php	echo @$link['Content']['pagetitle'];?> </a>
                
                  </li>
			           <?php
			           }
			        }}
               ?>                     
              </ul>          
          </div>
        </div><div class="grid_13 divider1">
              <div class="box">
            	<h2>Company</h2>
              <ul class="list1">
              	<?php
              if(!empty($linkContents)) { $count=1;
			           foreach($linkContents as $link){
                    if($link['Content']['sub_link']=='4') {
                     ?>
			              <li>
                <a href="/contents/<?php	echo @$link['Content']['page_code'];?>"><?php	echo @$link['Content']['pagetitle'];?> </a>
                
                  </li>
			           <?php
			           }
			        }}
               ?>                    
              </ul>          
          </div>
        </div><div class="grid_13 divider1">
              <div class="box">
            	<h2>Others</h2>
              <ul class="list1">
              <?php
              if(!empty($linkContents)) { $count=1;
			           foreach($linkContents as $link){
                    if($link['Content']['sub_link']=='5') {
                     ?>
			              <li>
                <a href="/contents/<?php	echo @$link['Content']['page_code'];?>"><?php	echo @$link['Content']['pagetitle'];?> </a>
                
                  </li>
			           <?php
			           }
			        }}
               ?>
               <li>
                <a href="http://webmail.ccsorg.com">Web mail </a>
                
                  </li>                    
              </ul>          
          </div>
        </div>
      </div>
    </div>