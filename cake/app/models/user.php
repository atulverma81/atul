<?php

   class User extends AppModel{
    	var $name = 'User';
	 
	/**
        * @method      : CheckUserExists
        * @description : Used to check user email , username , alternate email already exists
        * @param       : none
        * return       : $err
        **/
    function CheckUserExists($userData){
	    $err = 0;
	    $this->msgArr[0] = 0;

	     // checking username already exists
	    if(!empty($userData['User']['username'])){
		  $checkUsername = $this->find('first',array('conditions'=>array('User.username'=>$userData['User']['username'],'User.usertype'=>$userData['User']['usertype']),'fields'=>array('User.username')));
		  if(!empty($checkUsername)){
				$err = 1;
				$this->msgArr[] = CHECK_USER;
			}	
	    }
	    // checking email already exists
	    if(!empty($userData['User']['email'])){
		  $checkEmailname = $this->find('first',array('conditions'=>array('User.email'=>$userData['User']['email'],'User.usertype'=>$userData['User']['usertype']),'fields'=>array('User.email')));
		if(!empty($checkEmailname)){
				$err = 1;
				$this->msgArr[] = CHECK_EMAIL_ADDRESS;
			}	
	    }
	    // checking alternate email already exists
	    if(!empty($userData['User']['alternate_email'])){
		  $checkAltEmailname = $this->find('first',array('conditions'=>array('User.alternate_email'=>$userData['User']['alternate_email'],'User.usertype'=>$userData['User']['usertype']),'fields'=>array('User.alternate_email')));
		  if(!empty($checkAltEmailname)){
				$err = 1;
				$this->msgArr[] = CHECK_ALT_EMAIL_ADDRESS;
			}
	    }
	            if($err){
			$this->msgArr[0] = 1;
		    }
			return $this->msgArr;
	    }

	/**
        * @method      : revocerUserDetails
        * @description : Used to forgot password email notigication to the client with unique token
        * @param       : $userData
        * return       : $token
        **/
	   function revocerUserDetails($userData){
		App::import('Model', 'Token');
      	  	$this->Token = & new Token();
      	        $userDetails = $this->findByEmail($userData['User']['email']);
		if(!empty($userDetails)){
      	        $token = $this->Token->generate(array('User' => $userDetails['User']));
		return array($token,$userDetails);
		}else{
		return null;
		}
		} // end of function
	/**
        * @method      : resetPassword
        * @description : Used to reset new password
        * @param       : $token
        * return       : $password
        **/	
	   function resetPassword($token) { 
		App::import('Model', 'Token');
      	  	$this->Token = & new Token();
    		if($data = $this->Token->get($token)) {
    		// Update the users password
		$password = $this->generatePassword();
		$this->id = $data['User']['id'];
		// create hash string before save it to the database
		$hashPass = Security::hash($password);
		$this->saveField('password',$hashPass);
		$this->saveField('is_password_set',1);
			return array($data,$password);
		}else{
			return null;
			}
		} // end of function

	 
	
	/**
        * @method      : generatePassword
        * @description : Used to generate new password
        * @param       : $length
        * return       : $password
        **/	
	   function generatePassword($length = 10) {
			srand((double) microtime()*1000000);
			$vowels = array('a', 'e', 'i', 'o', 'u');
			$cons = array('b', 'c', 'd', 'g', 'h', 'j', 'k', 'l', 'm', 'n',
			'p', 'r', 's', 't', 'u', 'v', 'w', 'tr',
			'cr', 'br', 'fr', 'th', 'dr', 'ch', 'ph',
			'wr', 'st', 'sp', 'sw', 'pr', 'sl', 'cl');
			
			$num_vowels = count($vowels);
			$num_cons = count($cons);
			
			$password = '';
			for ($i = 0; $i < $length; $i++){
			$password .= $cons[rand(0, $num_cons - 1)] . $vowels[rand(0, $num_vowels - 1)];
			}
			return substr($password, 0, $length);
			} // end of function

	/**
        * @method      : CheckAdminUserExists
        * @description : Used to check admin user  username already exists
        * @param       : none
        * return       : $err
        **/
    function isAdminExists($userData){
		$userDetails=array();
	    $err = 0;
	    $this->msgArr[0] = 0;
	    $userType = 3;
	    // checking username already exists
	    if(!empty($userData['User']['username'])){
		  $userDetails = $this->find('first',array('conditions'=>array('User.username'=>$userData['User']['username'],'User.usertype'=>$userType,'User.status'=>1)));  
		  if(empty($userDetails)){
				$err = 1; 
			}
	        }
	       	if($err == 1){		
			return false;
		}else{
			return $userDetails;
		}
	    }
	/**
        * @method      : CheckAdminUserExists
        * @description : Used to check admin user email , username  
        * @param       : none
        * return       : $err
        **/
    function CheckAdminUserExists($userData){
	    $err = 0;
	    $this->msgArr[0] = 0;
	    $userType = 3;	
	     // checking username already exists
	    if(!empty($userData['User']['username'])){
		  $checkUsername = $this->find('first',array('conditions'=>array('User.username'=>$userData['User']['username'],'User.usertype'=>$userType),'fields'=>array('User.username')));
		  if(!empty($checkUsername)){
				$err = 1;
				$this->msgArr[] = CHECK_USER;
			}	
	    }
	    // checking email already exists
	    if(!empty($userData['User']['email'])){
		  $checkEmailname = $this->find('first',array('conditions'=>array('User.email'=>$userData['User']['email'],'User.usertype'=>$userType),'fields'=>array('User.email')));
		if(!empty($checkEmailname)){
				$err = 1;
				$this->msgArr[] = CHECK_EMAIL_ADDRESS;
			}	
	    } 
	            if($err){
			$this->msgArr[0] = 1;
		    }
			return $this->msgArr;
	    }
	
	/**
        * @method      : getAdminDetail
        * @description : Used to get users details for view section
        * @param       : $adminId
        * return       : $err
        **/
    	function getAdminDetail($adminId){
	   $data = $this->find('first',array('conditions'=>array('User.id'=>$adminId)));
	   return $data;
	}

	/**
        * @method      : updateUserRecord
        * @description : Used to update user status , active , deactive , delete
        * @param       : $listId
        * return       : $redult
        **/
    	function updateUserRecord($listId){
	 $condition[] = array('User.usertype'=>1);
	  $idList = $listId['idList'];
		  if($idList){
			   $actionCondition=array("User.id IN ($idList) ");	
		  if($listId['action']=="activate"){ 
		     $this->updateAll(array('User.status' =>"'1'"),$actionCondition);
		     return $condition;
		     }elseif($listId['action']=="deactivate"){
			     	$this->updateAll(array('User.status' =>"'2'"),$actionCondition);
				return $condition;	
      		      }else
      			  if($listId['action']=="delete"){
      			    $this->deleteAll($actionCondition);
			    return $condition;
			  }
		    }
	  } // end of function

	/**
        * @method      : serachUserRecord
        * @description : Used to search user on basis of email and name
        * @param       : $data
        * return       : $condition
        **/
    	function serachUserRecord($data){
		$condition[] = array('User.usertype'=>1);
		if(!empty($data['User']['field'])) {
			$field = trim($data['User']['field']);
 		  }
		else{
			$field = "firstname";
		}
		if(!empty($this->data['User']['name'])) {
			$searchText = trim($data['User']['name']);
 		  }else{
			$searchText = trim($data['User']['name']);
		      }
		$condition[] ="User.".$field." like '".addslashes($searchText)."%'";
		return $condition;
	  } // end of function

	/**
        * @method      : savePaidUserInfo
        * @description : Used to search user on basis of email and name
        * @param       : $data
        * return       : $condition
        **/
    	function savePaidUserInfo($userdata , $paymentdata , $result){
		App::import('Model', 'Payment');
      	  	$this->Payment = & new Payment();
		// save paid user info in user table
		$this->save($userdata);
		$userId = mysql_insert_id();
		// save payment info in payment table
		$this->data['Payment']['user_id'] = $userId;
		$this->data['Payment']['amount'] = $paymentdata['Payment']['amount'];
		$this->data['Payment']['payment_result'] = $result;
		$this->Payment->save($this->data); 
		return $userId;		
	  } // end of function

       } // end of class
?>