<footer>  	<nav>  	        <ul>       <li <?php if(($this->params['url']['url']=='users/index') || ($this->params['url']['url']=='/')){?>  class="current" <?php } ?>> <a href="/users/index"><b>Home</b></a></li>    	<li <?php if($this->params['url']['url']=='users/index/sectors'){?>  class="current" <?php } ?>><a href="/users/index/sectors"><b>Sectors</b></a></li>    	<li <?php if($this->params['url']['url']=='users/index/solutions'){?>  class="current" <?php } ?>><a href="/users/index/solutions"><b>Solutions</b></a></li>    	<li <?php if($this->params['url']['url']=='users/index/partners'){?>  class="current" <?php } ?>><a href="/users/index/partners"><b>Customers</b></a></li>    	<li <?php if($this->params['url']['url']=='users/index/company'){?>  class="current" <?php } ?>><a href="/users/index/company"><b>Company</b></a></li>	    	<li <?php if($this->params['url']['url']=='contacts/enquiry'){?>  class="current" <?php } ?>><a href="/contacts/enquiry"><b>Contacts</b></a></li>	       <li>  <a href="/admin">Member Login</a> </li>      </ul>  	</nav><div class="vlinks">Copyright &copy; <?php echo date('Y'); ?>. Competitive Communication Services. All Rights Reserved.</div></footer>