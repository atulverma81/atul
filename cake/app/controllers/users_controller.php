<?php
 /**
	* Category Controller class
	* PHP versions 5.1.4
	* @date 02-Feb-2011
	* @Purpose:This controller handles all the functionalities of Users section
	* @filesource
	* @author     Sachin Sharma
	* @revision
	* @copyright  Copyright @ 2011 smartData
	* @version 0.0.1
 **/

 class UsersController extends AppController{ 
	var $helpers 	  = array('Html','Form','Javascript','Ajax',"time",'Session','utility'); 
	var $components   = array('RequestHandler','Common','Paypal');

 	/**
	* @method      : beforeFilter
	* @description : Default check session of admin(Table:User )
	* @param       : none
	* return       : none
	**/
	function beforeFilter(){
		// $this->checkUserSession();
	}
	
	/**
	* @method      : beforeFilter
	* @description : Default check session of admin(Table:User )
	* @param       : none
	* return       : none
	**/
	
   	 public function admin_login(){
    		 $this->layout="admin";
    		App::import('Model','User');
    		$this->User = & new User();
    		$adminDetail=array();
    		$errClass = "";
      		// If a user has submitted form data:
        	if (!empty($this->data)){
		    $adminDetail = $this->User->isAdminExists($this->data);
			
      		  if($adminDetail == false ){
					$this->Session->setFlash(ADMIN_CHECK_USER);
      			}else{
				$hashInputPassword = $this->Common->CreateHashString(trim($this->data['User']['password']));
				
      		      		if(!empty($adminDetail['User']['password']) && $adminDetail['User']['password'] == $hashInputPassword){
						 
      					//if username and password matched then redirect to home page
      					$this->Session->write('AdminUser',$adminDetail['User']['username']);
      		   			$this->Session->write('AdminId',$adminDetail['User']['id']);
      					if(isset($this->data['Admin']['return']) && $this->data['Admin']['return']!=''){
      						$this->redirect($this->data['Admin']['return']);
      						}else{
      							$this->redirect('/admin/users/home');
      						}
      				}else{
      					$this->Session->setFlash(PASSWORD_NOT_MATCH); 
      				}
      			     }
      			}
		} // end of admin login function
	 
	/**
	* @method      : register
	* @description : used to register free and paid users
	* @param       : none
	* return       : none
	**/
	function index($pageCode=null){
		$this->layout	 = 'home';
		App::import('Model','Content');
    	$this->Content = & new Content();
		if(empty($pageCode)){
			$pageCode='home-meta';
		}
		$contents=$this->Content->find('first',array('conditions'=>array('Content.page_code'=>$pageCode)));
		
		$this->set('metakeywords',$contents['Content']['meta_keywords']);
		$this->set('metadescription',$contents['Content']['meta_description']);
		$this->set('metatitle',$contents['Content']['meta_title']);
		$this->set('pagetitle',$contents['Content']['pagetitle']);
		$this->set('contents',$contents);
	}
	

	/**
	* @method      : admin_home
	* @description : used to show admin home page
	* @param       : none
	* return       : none
	**/
	function admin_home() {
		   // Allow only authenticated users to access this action.
		  
		   $this->layout = 'admin';
		}// end of function admin_home

	/**
	* @method      : register
	* @description : used to register free and paid users
	* @param       : $type
	* return       : none
	**/
   public  function register($type=null){
		$this->pageTitle = "User Registration";
		$this->layout	 = 'home';
		$countries = $this->Common->set_country_list();
        	if(!empty($this->data['User']['country_id'])){	
        		$states = $this->Common->set_state_list($this->data['User']['country_id']);
        	}else{
              		$states = $this->Common->set_state_list(DEFAULT_COUNTRY); 
        	}
          	$this->set(compact('countries', 'states'));
		$this->set('userType',$type);
		if(!empty($this->data)){

		
		//check user exist by username and email address
		$this->retArr= $this->User->CheckUserExists($this->data); 
		 
		if($this->retArr[0] == 1) {
				$this->data['User']['password'] = "";
				$this->data['User']['confirmpassword'] = "";
				$this->set('msg', $this->retArr);
				$this->set('userType', $this->data['User']['usertype']);
			   }else{
					// save user data in user table
				if($this->data['User']['state_id'] == 1110 && !empty($this->data['User']['otherstate'])) {
				   $this->data['User']['state'] = null;
				}else{
				   $this->data['User']['state']  = $this->data['User']['state_id'];
				 }	
					$this->data['User']['country']      = $this->data['User']['country_id'];
					$this->data['User']['createdDate']  = date('y-m-d');
					$this->data['User']['modifiedDate'] = date('y-m-d');
					$this->data['User']['status'] 	    = 2;
					
					// here are checking if usertype is paid then go to paymant page
					if($this->data['User']['usertype'] == 1){
						$this->Session->write('userData',$this->data['User']);
						$this->redirect(array('action'=>'Payment'));
					}else{
						// create hash of user password
						$password = $this->Common->CreateHashString($this->data['User']['password']);
						$real_password	= $this->data['User']['password'];
						$this->data['User']['password'] = $password;
						$this->User->save($this->data);
						$userId = mysql_insert_id(); 
						$this->Common->UserEmailNotification($this->data,$real_password,$userId);
						$this->Session->setFlash(USER_REGISTER_MESSAGE);
						$this->redirect(array('action'=>'AccountCreated'));
					}
				}
		 } // end of check empty data
	 } // end of register function
	
	/**
	* @method      : Payment
	* @description : Used to make payment for paid users
	* @param       : none
     	* return       : none
 	**/	

   public function payment() {
		$this->pageTitle = "Registration Payment";
		$this->layout	 = 'home';
		$userData = $this->Session->read('userData');
		$countries = $this->Common->set_country_list();
        	if(!empty($this->data['User']['country_id'])){	
        		$states = $this->Common->set_state_list($this->data['User']['country_id']);
        	}else{
              		$states = $this->Common->set_state_list($userData['country_id']);
        	} 
		
		  $this->set(compact('countries', 'states','userData'));
		if(!empty($this->data)){  
			// get country & state name
			$countryName = $this->Common->findCountryName($this->data['User']['country_id']);
			if(!empty($this->data['Payment']['otherstate'])){
			$stateName = $this->data['Payment']['otherstate'];
			}else{
			$stateName = $this->Common->findStateName($this->data['User']['state_id']);
			}
		    $paymentInfo = array('Member'=>
					     array(
						 'first_name'=>$this->data['Payment']['firstname'],
						 'last_name'=>$this->data['Payment']['lastname'],
						 'billing_address'=>$this->data['Payment']['street'],
						 'billing_address2'=>$this->data['Payment']['street2'],
						 'billing_country'=>$countryName,
						 'billing_city'=>$this->data['Payment']['city'],
						 'billing_state'=>$stateName,
						 'billing_zip'=>$this->data['Payment']['zip']
					     ),
					    'CreditCard'=>
					     array(
					         'credit_type'=>$this->data['Payment']['card_type'],
						 'card_number'=>$this->data['Payment']['cardno'],
						 'expiration_month'=>$this->data['Payment']['month']['month'],
						 'expiration_year'=>$this->data['Payment']['year']['year'],
						 'cv_code'=>$this->data['Payment']['cvcode'],
						 'amount'=>$this->data['Payment']['amount']
					     )
				    	); 
				    $result = $this->Paypal->processPayment($paymentInfo,"DoDirectPayment");
				    $ack = strtoupper($result["ACK"]);
				    if($ack!="SUCCESS")
				    {
					// create hash of user password
					$password = $this->Common->CreateHashString($userData['password']);
					$real_password	= $userData['password'];
					$userData['password'] = $password;
					// save payment & user information in user table
					$userId = $this->User->savePaidUserInfo($userData,$this->data,$ack);
					$this->Common->PaidUserEmailNotification($userData,$real_password,$userId);
					$this->Session->setFlash(USER_REGISTER_MESSAGE);
					$this->redirect(array('action'=>'AccountCreated'));
					//$this->Session->setFlash($result['L_LONGMESSAGE0']);
				    }else{
					// create hash of user password
					$password = $this->Common->CreateHashString($userData['password']);
					$real_password	= $userData['password'];
					$userData['password'] = $password;
					// save payment & user information in user table
					$userId = $this->User->savePaidUserInfo($userData,$this->data,$ack);
					$this->Common->PaidUserEmailNotification($userData,$real_password,$userId);
					$this->Session->setFlash(USER_REGISTER_MESSAGE);
					$this->redirect(array('action'=>'AccountCreated'));
				    }
		} // end of check empty data
	} // end of function

	/**
	* @method      : update_select
	* @description : Used to update state list on select of country in system admin
	* @param       : none
     	* return       : none
 	**/	

   public function update_state($id=null) {
  		$country_id = 0;
  		$options=array();
  		$this->layout = 'ajax';
  		Configure::write('debug',0);
  		App::import('Model','Country');
  		$this->Country = & new Country();
  		App::import('Model','State');
  		$this->State = & new State();
  		if(!empty($id)) { 
  			$country_id = (int)$id;
  			$options = $this->State->find('list', array('conditions' => array('State.country_id' => $country_id),'fields'=>array('State.name'),'order'=>'name ASC'));
  			$this->set('options',$options);
		}
  	}
	
	/**
	* @method      : ManageProfile
	* @description : used to Update users profile
	* @param       : $id
	* return       : none
	**/
   public  function manageProfile($id=null){
		$this->pageTitle = "User Registration";
		$this->layout	 = 'home';
		$this->User->id = '';
      	$this->User->id = $id;
      	 //get and set country state list
        $countries = $this->Common->set_country_list();
        
		if(empty($this->data)){
			 $this->data = $this->User->read();  
			 $states = $this->Common->set_state_list($this->data['User']['country']); 
          	 $this->set(compact('countries', 'states','id'));
		}elseif(!empty($this->data)){
			
			if(!empty($this->data['User']['country_id'])){	
        		$states = $this->Common->set_state_list($this->data['User']['country_id']);
        	} 
          	$this->set(compact('countries', 'states','id'));
          	
          	 
				
			//check user exist by username and email address
			$this->retArr= $this->User->CheckUserExists($this->data); 
			if($this->retArr[0] == 1) {
				$this->set('msg', $this->retArr);
			   }else{
					if($this->data['User']['state_id'] == 1110 && !empty($this->data['User']['otherstate'])) {
					$this->data['User']['state'] = 1110;
					}else{
					$this->data['User']['state']  = $this->data['User']['state_id'];	
					}	
					$this->data['User']['country']  = $this->data['User']['country_id']; 
					$this->data['User']['modifiedDate'] = date('y-m-d');  
					$this->User->save($this->data); 
					$this->Session->setFlash(UPDATE_ACCOUNT);
					$this->redirect(array('action'=>'home')); 
				}
		         } 
		}	
	/**
	* @method       : ChangePassword
	* @description  : used to chnage password
	* @param        : null
	* return        : none
	**/

    public function changePassword(){
		$this->pageTitle = "Change Password!";
		$this->layout	 = 'home'; 
		$userid = $this->Session->read("loginId");
		if(!empty($this->data)){
			// create hash string of old password
			$hashstring = $this->Common->CreateHashString(trim($this->data['User']['old_password'])); 
			// match enter old  password with database password
			$userExists = $this->User->findById($userid);
			if($hashstring == $userExists['User']['password']){
				// create hash string of new password
				$newpassword = $this->Common->CreateHashString(trim($this->data['User']['password']));
				$this->User->id = $userid;
				$this->data['User']['password'] = $newpassword;
				$this->User->save($this->data);
				$this->Session->setFlash(PASWORD_CHANGE);
				$this->redirect(array('action'=>'home'));
			}else{
				$this->Session->setFlash(OLD_PASSWOD_NOT_MATCH);
			}	
		}
	}
	/**
	* @method       : login
	* @description  : used to login with free and paid users free and paid users
	* @param        : $userTpe
	* return        : none
	**/

    public function login($userType = null){
		$this->layout = "";
		if(!empty($this->data)){
		// create hash string of password
		$hashstring = $this->Common->CreateHashString(trim($this->data['User']['password']));
		$usertype = $this->data['User']['usertype'];
		// checking if username exists in database
		$userExists = $this->User->find('first',array('conditions'=>array('User.username'=>$this->data['User']['username'],'User.usertype'=>$usertype)));

		if(!empty($userExists['User']['password'])) {
             		if($hashstring == $userExists['User']['password']){
				if($userExists['User']['status'] == 1 ){
					$this->Session->write('UserName',$userExists['User']['username']);
                    $this->Session->write('loginId',$userExists['User']['id']);
                    $this->Session->write('orgName',$userExists['User']['organization_name']);
                    $this->Session->write('userType',$usertype);
					if($userExists['User']['is_password_set'] == 1 ){
						$this->redirect('/users/setPassword');
					} //reset password login after forget password
					else{						
						$this->redirect('/users/home');
					    }
				} // end of check user status
				else{
					$this->Session->setFlash(NOT_ACTIVATE);
					$this->redirect(array('controller'=>'default','action'=>'index'));
				  }
			}  // end of check password matching
			else{
				$this->Session->setFlash(PASSWORD_NOT_MATCH);
				$this->redirect(array('controller'=>'default','action'=>'index'));
			}
		 }  // end of check empty password
		else{
			$this->Session->setFlash(INVALID_USERNAME);
			$this->redirect(array('controller'=>'default','action'=>'index'));
		}
	     }  // end of check empty data
	}  // end of login function
	
        public  function setPassword(){
	$this->pageTitle = "Set Your Password!";
	$this->layout	 = 'home';
	$userid = $this->Session->read("loginId");
	if(!empty($this->data)){
	$password = $this->Common->CreateHashString($this->data['User']['password']);
	$this->User->id = $userid;
	$this->data['User']['password'] = $password;
	$this->data['User']['is_password_set'] = 2;
	$this->User->save($this->data);
	$this->Session->setFlash("Your Password has been changed successfully !");
	$this->redirect(array('controller'=>'users','action'=>'home'));
	}
	}	
	
   public  function AccountCreated(){
	$this->pageTitle = "Account Created Successfully!";
	$this->layout	 = 'home'; 
	}
    /**
    * @method      : logout
    * @description : use to logout for users
    * @param       : none
    * return       : none
    **/

   public function logout() {
        $this->Session->delete('loginId');
		 $this->Session->destroy();
        $this->redirect('/default/index');
    } // end of logout
	

    /**
    * @method      : ForgotUsername 
    * @description : Used to recover username of users
    * @param       : none
    * return       : none
    **/
    public function forgotUsername(){
      	      	$this->layout="home";
      	      	if(!empty($this->data)){
		$email = $this->data['User']['email'];
	      	$userDetails = $this->User->findByEmail($email);
		if(!empty($userDetails)){
	   		$this->Common->ForgotUsernameEmailNotification($userDetails); 
      	      		$this->redirect(array('controller'=>'Users','action'=>'reset'));
			}else{
			$this->Session->setFlash(WRONG_EMAIL);
			 }
	    	     } // end of check empty data
	      } // end of function
	
    /**
    * @method      : ForgotPassword 
    * @description : Used to recover password / username of users
    * @param       : none
    * return       : none
    **/
    public function forgotPassword(){
      	      	$this->layout="home";
      	      	if(!empty($this->data)){
	      	list($token,$userDetails) = $this->User->revocerUserDetails($this->data);
		if(!empty($token) && !empty($userDetails)){
      	      		$this->Session->setFlash(FORGOT_PASS_EMAIL);
	   		$this->Common->ForgotpasswordEmailNotification($userDetails,$token);
			$this->Session->setFlash(SEND_FORGOT_MESSAGE);			
      	      		$this->redirect(array('controller'=>'default','action'=>'index'));
			}else{
			$this->Session->setFlash(WRONG_EMAIL);
			     }
	    	     } // end of check empty data
	      } // end of function

    /**
    * @method      : reset
    * @description : Accepts a valid token and resets the users password
    * @param       : $token
    * return       : none
    **/
   public function reset($token = null){
	   $this->layout="home";
	    list($resetData,$password) = $this->User->resetPassword($token);
	    if(!empty($resetData)){
		// send email notification to the user with new password
		$this->Common->NewPasswordEmailNotification($resetData,$password);
		$this->set('success', true);
		} // end of check resetData 
         }
	 
	 /**
    * @method      : Verify
    * @description : Accepts a valid token and resets the users password
    * @param       : $token
    * return       : none
    **/
   public function verify($userId = null){
	   $this->layout="home";
	   $this->User->id = $userId;
	   $this->data['User']['status'] = 1;
	   $this->User->save($this->data);
         }   
         
         
         
         /** 

	@function	:	search

	@description	:	to display list of searches

	@params		:	NULL

	@created	:	June 29, 2012

	@created by	:	Atul Verma

	**/

    function search() {
		    App::import('Model','Content');
		    $this->Content = new Content(); 
      	
      		$this->layout="home";
		
        	
      	$criteria = "Content.pagetitle LIKE 'ATUL%'"; 
      
      		/** for paging and sorting we are setting values */
      	
         
          if(!empty($this->data['User']['text_search'])){
                $textSearch=trim($this->data['User']['text_search']);
                $criteria = "Content.pagetitle LIKE '".$textSearch."%'";        
          }
		
		       

      		/** **************************************** **/
      
      		$this->set('title_for_layout','Search Result');
      
      		$value = '';	
      
      		$show = '';
      
      		$matchshow = '';
      
      		$fieldname = '';

		

      		/** SEARCHING **/
      
      		//$reqData = $this->data;
      
      		

      		$this->set('keyword', $value);
      
      		$this->set('show', $show);
      
      		$this->set('fieldname',$fieldname);
      
      		$this->set('heading','Search Result');
      
      		   $this->set('metakeywords','Search');
		$this->set('metadescription','Search');
		$this->set('metatitle','Search');
		$this->set('pagetitle','Search');
		$this->set('contents','Search');
      
      		/* ******************* page limit sction **************** */
      
      	
      
      		$this->data['Record']['limit'] = 20;
      
      		/* ******************* page limit sction **************** */
      
      		$this->paginate = array(


      
       			'limit' => 20,
      
      			
      			'order' => array(
      
      				'Content.pagetitle' => 'ASC'
      			),
      			'fields' => array(
      				'Content.pagetitle',      			
      				'Content.description',
      				'Content.page_code',
      				
      			)
      		); 

      		$this->set('searches',$this->paginate('Content',$criteria));
      		

	}
	 
	 
   } // end of class

?>
