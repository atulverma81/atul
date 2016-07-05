<?php
class AppController extends Controller {

		function checkUserSession(){
		      $front_dont_apply_on =   array("postComment","webSearch","Verify","login", "logout","ForgotPassword","ForgotUsername","register","Payment","activate_account","index","SearchResult","ListEvent","ForgotUsername","forgotPassword","reset","Question","ContactUs","AboutUs","ViewEvent",'AccountCreated',"update_state");
		      $admin_dont_apply_on =   array("admin_login", "admin_logout","admin_forgot_password");
		      $action        	    =   $this->params["action"];
		
		// If User, check User session
		if(!empty($this->params['prefix']) && $this->params['prefix'] == "admin"){
			$loggedInUser = $this->Session->read("AdminId");
			if(empty($loggedInUser) && !in_array($action,$admin_dont_apply_on)){ 
				$this->redirect('/admin/users/login?return='.Router::url()); 
			}
		}else{ // Check User session
			 $loggedInUser = $this->Session->read("loginId"); 
			if(empty($loggedInUser) && !in_array($action,$front_dont_apply_on)){ 
				$this->redirect('/default/index?return='.Router::url()); 
			}
		     }
		}
			
	 	  
	  
}
?>