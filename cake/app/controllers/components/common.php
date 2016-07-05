<?php
    /**
        * CommonComponent  class
        * PHP versions 5.1.4
        * @date 03rd-Feb-2011
        * @Purpose: These are common function used  in whole application
        * @filesource
        * @author     Sachin Sharma
        * @revision   
        * @copyright  Copyright � 2010 smartData
        * @version 0.0.1 
    **/

 class CommonComponent extends Object {
     var $components = array('File','Thumb','Email');
     var $controller = null;
     var $helpers    = array('Html','Javascript','Ajax','Time');	

     function startup(&$controller) {
	$this->controller = $controller;
    }

       

    /**
     * @Date: 03rd-Feb-2011
    * @Method : CreateHashString
    * @Purpose: Used to create encrypt datausing hashing technique
    **/

    function CreateHashString($key){
	$hashstring = Security::hash($key);
        return $hashstring;
     }

    /**
    * @Date: 03rd-Feb-2011
    * @Method : UserEmailNotification
    * @Purpose: Used to send email notification the client after registration
    **/

    function UserEmailNotification($userData,$password,$userId){ 
		$clientName 	 = $userData['User']['firstname'].$userData['User']['lastname'];
		$username   	 = $userData['User']['username'];
		$real_password   = $password;
		$orgName   	 = $userData['User']['organization_name'];
		$userEmail   	 = $userData['User']['email'];
		$siteURL	 ='<a href="http://'.$_SERVER['HTTP_HOST'].'/users/Verify/'.$userId.'">http://'.$_SERVER['HTTP_HOST'].'/users/Verify/'.$userId.'</a>';

		// here we are sending verify account details notification to the client.
		
		$verifyContent = array("{ClientName}","{UserName}","{Password}","{OrgName}","{siteurl}"); //These are the variables that are used in email
          	$accountContent     = array($clientName,$username,$real_password,$orgName,$siteURL); //user details variables with message
		//replacing the variables with user variables
          	$finalConfirmEmail     = str_replace($verifyContent,$accountContent,USER_REGISTER_CONFIRM_MESSAGE);
		$bodyContent = array("{BodyContent}");
		$bodyEmailContent = array($finalConfirmEmail);
		//replacing the variables with final email body content
		$finalbodyContent = str_replace($bodyContent,$bodyEmailContent,EMAIL_BODY_CONTENT);
		// here we are sending successfully registration notification to the client,
	 
		
			    $subject 		    	 =   VERIFY_ACCOUNT_CREATED;
			    $headers			 =  'MIME-Version: 1.0' . "\r\n";
          		    $headers 			.=  'Content-type: text/html;charset=iso-8859-1' . "\r\n";
          		    $headers 			.=  'From: ChurchPatrol<admin@dealership.com>' . "\r\n";
          		    $this->Email->from 	    	 =  'info@churchpatrol.com';
          		    $this->Email->fromName  	 =  'ChurchPatrol Online Support';
          		    $this->Email->to 	    	 =   $userEmail; 
          		    $this->Email->subject   	 =   $subject;
          		    $this->Email->message   	 =   $finalbodyContent;
			    $this->Email->send();
			    return true;    	
       		} // end of function
	
	  /**
    * @Date: 15rd-Feb-2011
    * @Method : PaidUserEmailNotification
    * @Purpose: Used to send email notification the paid user after registration
    **/

    function PaidUserEmailNotification($userData,$password,$userId){ 
		$clientName 	 = $userData['firstname'].$userData['lastname'];
		$username   	 = $userData['username'];
		$real_password   = $password;
		$orgName   	 = $userData['organization_name'];
		$userEmail   	 = $userData['email'];
		$siteURL	 ='<a href="http://'.$_SERVER['HTTP_HOST'].'/users/Verify/'.$userId.'">http://'.$_SERVER['HTTP_HOST'].'/users/Verify/'.$userId.'</a>';

		// here we are sending verify account details notification to the client.
		
		$verifyContent = array("{ClientName}","{UserName}","{Password}","{OrgName}","{siteurl}"); //These are the variables that are used in email
          	$accountContent     = array($clientName,$username,$real_password,$orgName,$siteURL); //user details variables with message
		//replacing the variables with user variables
          	$finalConfirmEmail     = str_replace($verifyContent,$accountContent,USER_REGISTER_CONFIRM_MESSAGE);
		$bodyContent = array("{BodyContent}");
		$bodyEmailContent = array($finalConfirmEmail);
		//replacing the variables with final email body content
		$finalbodyContent = str_replace($bodyContent,$bodyEmailContent,EMAIL_BODY_CONTENT);
		// here we are sending successfully registration notification to the client,
	 
		
			    $subject 		    	 =   VERIFY_ACCOUNT_CREATED;
			    $headers			 =  'MIME-Version: 1.0' . "\r\n";
          		    $headers 			.=  'Content-type: text/html;charset=iso-8859-1' . "\r\n";
          		    $headers 			.=  'From: ChurchPatrol<admin@dealership.com>' . "\r\n";
          		    $this->Email->from 	    	 =  'info@churchpatrol.com';
          		    $this->Email->fromName  	 =  'ChurchPatrol Online Support';
          		    $this->Email->to 	    	 =   $userEmail; 
          		    $this->Email->subject   	 =   $subject;
          		    $this->Email->message   	 =   $finalbodyContent;
			    $this->Email->send();
			    return true;    	
       		} // end of function

	/**
     	* @Date: 09th Feb-2011
    	* @Method : ForgotUsernameEmailNotification
    	* @Purpose: Used to send email notification to the user for forgot username instruction.
    	**/

    	function ForgotUsernameEmailNotification($userData = null){
		$clientName 	 = $userData['User']['firstname'].$userData['User']['lastname']; 
		$userEmail   	 = $userData['User']['email'];
		$userName   	 = $userData['User']['username'];
		$loginURL	 ='<a href="http://'.$_SERVER['HTTP_HOST'].'/default/index">http://'.$_SERVER['HTTP_HOST'].'/default/index</a>';
		//These are the variables that are used in email
          	$emailContent 		= array("{ClientName}","{UserEmail}","{LoginUrl}","{UserName}"); 
		//user details variables with message replacing the variables with user variables
          	$userContent     	= array($clientName,$userEmail,$loginURL,$userName); 
          	$finalEmail= str_replace($emailContent,$userContent,FORGOT_USERNAME_EMAIL);
		$bodyContent = array("{BodyContent}");
		$bodyEmailContent = array($finalEmail);
		//replacing the variables with final email body content
		$finalbodyContent = str_replace($bodyContent,$bodyEmailContent,EMAIL_BODY_CONTENT);
		$body  = '';
      		$body .=''.$finalbodyContent.''; 
		
  	 		    $subject 		  =  RECOVER_USERNAME;
      			    $headers		  = 'MIME-Version: 1.0' . "\r\n";
      			    $headers 		 .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
      			    $headers 		 .=  FROM_HEADER. "\r\n";
          		    $this->Email->from 	  =  FROM;
          		    $this->Email->fromName=  FROM_NAME;
          		    $this->Email->to 	  =  $userEmail; 
          		    $this->Email->subject =  $subject;
      			    $this->Email->message =  $body;
      			    $this->Email->send();
			    return true;
	}

	/**
     	* @Date: 04th Feb-2011
    	* @Method : ForgotpasswordEmailNotification
    	* @Purpose: Used to send email notification to the user for forgot password instruction.
    	**/

    	function ForgotpasswordEmailNotification($userData = null,$token = null){
		$clientName 	 = $userData['User']['firstname'].$userData['User']['lastname']; 
		$userEmail   	 = $userData['User']['email'];
		$resetURL	 ='<a href="http://'.$_SERVER['HTTP_HOST'].'/users/reset/'.$token.'">http://'.$_SERVER['HTTP_HOST'].'/users/reset/'.$token.'</a>';
		$loginURL	 ='<a href="http://'.$_SERVER['HTTP_HOST'].'/default/index">http://'.$_SERVER['HTTP_HOST'].'/default/index</a>';
		//These are the variables that are used in email
          	$emailContent 		= array("{ClientName}","{UserEmail}","{ResetUrl}","{LoginUrl}"); 
		//user details variables with message replacing the variables with user variables
          	$userContent     	= array($clientName,$userEmail,$resetURL,$loginURL); 
          	$finalEmail= str_replace($emailContent,$userContent,FORGOT_PASS_EMAIL);
		$bodyContent = array("{BodyContent}");
		$bodyEmailContent = array($finalEmail);
		//replacing the variables with final email body content
		$finalbodyContent = str_replace($bodyContent,$bodyEmailContent,EMAIL_BODY_CONTENT);
		$body  = '';
      		$body .=''.$finalbodyContent.''; 
		
  	 		    $subject 		  =  RECOVER_PASSWORD;
      			    $headers		  = 'MIME-Version: 1.0' . "\r\n";
      			    $headers 		 .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
      			    $headers 		 .=  FROM_HEADER. "\r\n";
          		    $this->Email->from 	  =  FROM;
          		    $this->Email->fromName=  FROM_NAME;
          		    $this->Email->to 	  =  $userEmail; 
          		    $this->Email->subject =  $subject;
      			    $this->Email->message = $body;
      			    $this->Email->send();
			    return true;
		}
	
	/**
     	* @Date: 04th Feb-2011
    	* @Method : NewPasswordEmailNotification
    	* @Purpose: Used to send new password to the user
    	**/

    	function NewPasswordEmailNotification($userData = null,$password = null){
		$clientName 	 = $userData['User']['firstname'].$userData['User']['lastname']; 
		$userName   	 = $userData['User']['username'];
		$userEmail   	 = $userData['User']['email'];
		$userPassword  	 = $password;
		$loginURL	 ='<a href="http://'.$_SERVER['HTTP_HOST'].'/default/index">http://'.$_SERVER['HTTP_HOST'].'/users/login</a>';
		//These are the variables that are used in email
          	$emailContent 		 = array("{ClientName}","{UserName}","{Password}","{LoginUrl}"); 
		//user details variables with message replacing the variables with user variables
          	$userContent     	 = array($clientName,$userName,$userPassword,$loginURL); 
          	$finalEmail = str_replace($emailContent,$userContent,RESET_PASS_EMAIL);
		$bodyContent = array("{BodyContent}");
		$bodyEmailContent = array($finalEmail);
		//replacing the variables with final email body content
		$finalbodyContent = str_replace($bodyContent,$bodyEmailContent,EMAIL_BODY_CONTENT);
		$body  = '';
      		$body .=''.$finalbodyContent.'';
		
  	 		    $subject 		  =  VERIFY_PASSWORD;
      			    $headers		  = 'MIME-Version: 1.0' . "\r\n";
      			    $headers 		 .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
      			    $headers 		 .=  FROM_HEADER. "\r\n";
          		    $this->Email->from 	  =  FROM;
          		    $this->Email->fromName=  FROM_NAME;
          		    $this->Email->to 	  =  $userEmail; 
          		    $this->Email->subject =  $subject;
      			    $this->Email->message =  $body;
      			    $this->Email->send();
			    return true;
		}

      /**
      * @Date: 07-Feb-2011
      * @Method :set_country_list
      * @Purpose: Used to fetch country list
      **/

      function set_country_list() {
		// importing model Country
		App::import("Model","Country");
		$this->Country = & new Country();
		$countries=array();	
		//fetching record from Country table
		$countries = $this->Country->find("list",array('fields'=>array('id','name'),'order'=>'name ASC'));
		return($countries);
      }//end of set_country_list function


     /**
      * @Date: 07-Feb-2011
      * @Method :set_country_list
      * @Purpose: Used to fetch country list
      **/

      function set_state_list($countryId = null) {
          // import state table
      	     App::import("Model","State");
      	     $this->State = & new State();
      	     $condition='';
      	     //checking countryid is null or not
      	     if($countryId != null) {
      		  $condition .= 'country_id = '.$countryId;
      		}
      	     //fetching record from state table
      		$states = $this->State->find("list",array('fields'=>array('id','name'),'conditions'=>$condition,'order'=>'name ASC'));
      		return($states);
	    } //end of set_state_list function

     /**
      * @Date: 08-Feb-2011
      * @Method : checkImageFile    
      * @Purpose: Used to check image file format
    **/ 

	function checkImageFile($input){  
	$ext = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPEG', 'JPG', 'GIF', 'PJPEG');
	$extfile = substr($input['name'],-4);
	$extfile = explode('.',$extfile);
	$good = array();
	if(!empty($extfile[1])){
	$extfile = $extfile[1];
	}
	if(in_array($extfile, $ext)){
		$good['safe'] = 1;
	}else{
		$good['safe'] = 0;
	}
	return $good;
	}

    /**
      * @Date: 08-Feb-2011
      * @Method : uploadImageFile
      * @Purpose: Used to upload image file on server
    **/

    function uploadImageFile($input){ 
       $file_name = $input['name']; 
       $original  = time().$file_name;
       $big_file  = time().$file_name;
       $height	  = 100;
       $width	  = 144;
       $tmpname   = $input['tmp_name'];
       $imagetype = $input['type'];
       $this->File->destPath  = $_SERVER['DOCUMENT_ROOT']."/app/webroot/img/eventImages/";
       $this->File->thumbPath = $_SERVER['DOCUMENT_ROOT']."/app/webroot/img/eventImages/thumbs/";
	 //get extension of file
       $ext=substr($input['type'],strpos($input['type'],"/")+1);
       if($ext == "jpeg") $ext = "jpg"; 
       $this->File->setFilename($original); 
       $file = $this->File->uploadFile($original,$input['tmp_name']);
       if($file){
		  	$fileSize = getimagesize($this->File->destPath.'/'.$file); 
			@copy($this->File->destPath.'/'.$file,$this->File->thumbPath.'/'.$big_file);
			$mime='';
			$this->Thumb->getResized($big_file, $mime, $this->File->thumbPath, $width, $height, 'ffffff', true, true,$this->File->thumbPath, false);   
			return  $big_file;
		  }
	   }

	function createExcel($userType){
		  App::import("Model","User");
      	     	  $this->User = & new User();
		if($userType == 1 ){
			$fileName = "paidUserData";
			$render = "export_xls";
			}else{
			$fileName = "freeUserData";
			$render = "export_xls";
			}
		$data = $this->User->find('all',array('conditions'=>array('User.usertype'=>$userType)));
		return array($render , $fileName ,$data);
	
		}
function findCountryName($countryId){
	App::import('Model','Country');
    	$this->Country = & new Country();
	$name = $this->Country->find('first',array('conditions'=>array('Country.id'=>$countryId),'fields'=>array('name')));
	return $name['Country']['name'];
	}
	function findStateName($stateId){
	App::import('Model','State');
    	$this->State = & new State();
	$name = $this->State->find('first',array('conditions'=>array('State.id'=>$stateId),'fields'=>array('name')));
	return $name['State']['name'];
	}


     }// end of class
?>
