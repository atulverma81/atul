 <section class="search-result">
      <h3> <?php $orgaName = $session->read("orgName"); if(!empty($orgaName)){ echo ucfirst($orgaName); }else{ echo ucfirst($session->read("UserName"));}?>  Dashboard!</h3>
  	 <ul class="flash-fields">
	<li> <?php  $session->flash(); ?>  </li>
	</ul> 
      <!--Event By Search Result Starts Here-->
      <ul class="home-dash">
        <!--/*****************/-->
        <li>
         
          <div class="dash-descp">

            <ul class="dashboard">             
                <li>
		 <?php $userid = $session->read("loginId"); ?>
            	  <a href="/Users/ManageProfile/<?php echo $userid; ?>"> <p> <img src="/images/manageprofile.gif"></p><p> Manage Profile</p></a>
            	</li>
		<li>
            	  <a href="/Events/ListEvent"> <p> <img src="/images/manageposting.gif"></p><p> Manage Postings</p> </a>
            	</li>
		<li>
            	 <a href="/Events/CreateEvent"> <p> <img src="/images/eventcreate.gif"></p><p> Create Event</p> </a>
            	</li>
		<li>
            	  <p> <img src="/images/advancesearch.gif"></p><p> Advance Search</p>
            	</li>
		<li>
            	 <a href="/Users/ChangePassword">  <p> <img src="/images/change_password.gif"></p><p>Change Password</p> </a>
            	</li>  
            </ul>
	    
	    
          </div>
        </li>
        <!--/************/-->
      </ul>

      <!--Event By Search Result Ends--> 
    </section>