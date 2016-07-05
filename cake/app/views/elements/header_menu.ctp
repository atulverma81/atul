<nav>
 <?php $linkContents=array(); $linkContents= $this->requestAction("/requests/getContentSunLink");     ?> 
    <ul id="coolMenu">	
    <li <?php if(($this->params['url']['url']=='users/index') || ($this->params['url']['url']=='/')){?>  class="current" <?php } ?>> <a href="/users/index"><b>Home</b></a></li>
    	<li <?php if($this->params['url']['url']=='users/index/sectors'){?>  class="current" <?php } ?>><a href="/users/index/sectors"><b>Sectors</b></a>
       <ul class="noJS">
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
      </li>
    	<li <?php if($this->params['url']['url']=='users/index/solutions'){?>  class="current" <?php } ?>><a href="/users/index/solutions"><b>Solutions</b></a>
      <ul class="noJS">
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
      </li>
    	<li <?php if($this->params['url']['url']=='users/index/partners'){?>  class="current" <?php } ?>><a href="/users/index/partners"><b>Customers</b></a>
      
      <ul class="noJS">
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
              </ul> </li>
    	<li <?php if($this->params['url']['url']=='users/index/company'){?>  class="current" <?php } ?>><a href="/users/index/company"><b>Company</b></a>
      <ul class="noJS">
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
      </li>	
    	<li <?php if($this->params['url']['url']=='contacts/enquiry'){?>  class="current" <?php } ?>><a href="/contacts/enquiry"><b>Contact Us</b></a></li>	
			
		</ul>

</nav 
<?php echo $javascript->link('scripts.js'); ?>