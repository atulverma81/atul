<?php ob_start();
       /**
	* Admin Controller class
	* PHP versions 5.1.4
	* @filesource
	* @author     Saurabh S
	* @link       http://www.smartdatainc.com/
	* @copyright  Copyright � 2009 
	* @version 0.0.1 
	*   - Initial release
	*/
class AdminsController extends AppController{
	 var $uses	    = "";
    	 
	 var $helpers 	    = array('Html','Javascript','Ajax','utility','Time');
	 var $components = array('Common','Pagination', 'RequestHandler');
          var $paginate = array('limit' =>10, 'page' => 1, 'order'=>array('User.id'=>'desc'));


	/**
	* @method      : beforeFilter
	* @description : Default check session of admin(Table: )
	* @param       : none
	* return       : none
	**/

	function beforeFilter(){
		   $this->checkUserSession();
	    }
	 	

/****************************** START ADMIN AREA ******************************/	
	 /**
	* @method       : admin_index
	* @description  : used to list all admin users
	* @param        : null
	* return        : none
	**/

function admin_index(){
        //setting layout
	App::import('Model', 'User');
      	$this->User = & new User();
	$this->layout = 'admin';
        $this->set("expand_menu_links","admins"); 
      	$condition	=array();
      	$actionCondition=array();
      	$separator	=array();
      	$urlSeparator	=array();
      	$totalRecord	=0;
	
	if(!empty($this->data)){  
            if(isset($this->data['action'])){ 
               $idList=$this->data['idList'];
		  if($idList){
			   $actionCondition=array("User.id IN ($idList) ");	
		  if($this->data['action']=="activate"){ 
		     $this->User->updateAll(array('User.status' =>"'1'"),$actionCondition);
		     }elseif($this->data['action']=="deactivate"){ 
			     $this->User->updateAll(array('User.status' =>"'2'"),$actionCondition);
      		      }else
      			  if($this->data['action']=="delete"){
      			   $this->User->deleteAll($actionCondition);
			  }
		    }
	         }
	     } // end of check empty data
	 $condition = array('User.usertype'=>3);
	 $totalRecord = $this->User->find('count',array('fields'=>'User.id','conditions'=>$condition));
	 if(!empty($totalRecord)){
	 	$this->set('totalRecords', $totalRecord); 
         	}   
         if(!empty($this->passedArgs)){
                		if(isset($this->passedArgs["page"])){
                		    $urlSeparator[]='page:'.$this->passedArgs["page"];
                		}
                		if(isset($this->passedArgs["sort"])){
                		    $urlSeparator[]='sort:'.$this->passedArgs["sort"];
                		}
                		if(isset($this->passedArgs["direction"])){
                		    $urlSeparator[]='direction:'.$this->passedArgs["direction"];
                		}
        	    } 
	     $urlSeparator=implode("/",$urlSeparator);
	     $this->set('separator','');
	     $this->set('urlSeparator',$urlSeparator); 
	     $this->set('admins', $this->paginate('User',$condition));
            if($this->RequestHandler->isAjax()) {
                           	$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/admins/';
        			$this->render('index');
                   	}
		  }
		  
	public function admin_add(){	
		$this->layout='admin';
		$this->set("expand_menu_links","admins");
		App::import('Model', 'User');
		$this->User = & new User();
		if(!empty($this->data)){
		  // check username or email exists
		  $this->retArr= $this->User->CheckAdminUserExists($this->data);
		  if($this->retArr[0] == 1) {
				$this->data['User']['password'] = "";
				$this->data['User']['confirmpassword'] = "";
				$this->set('msg', $this->retArr);
		      }else{
			   $password = $this->Common->CreateHashString($this->data['User']['password']);
			   $this->data['User']['password'] = $password;
			   $this->data['User']['createdDate']  = date('y-m-d');
			   $this->data['User']['modifiedDate'] = date('y-m-d');
			   $this->data['User']['usertype'] = 3;
			   $this->User->save($this->data);
			   $this->Session->setFlash(ADMIN_USER_REGISTER);
			   $this->redirect(array('action'=>'index'));
		      }		  
		}
	} //end of Add Member
	function admin_viewAdmin($id = NULL){
		     App::import('Model', 'User');
		     $this->User = & new User();
	             $this->layout='admin';
		     $data = $this->User->getAdminDetail($id);
		     $this->set(compact('data')); 
	 }
	 
	public function admin_editAdmin($admiId = null){	
		$this->layout='admin';
		$this->set("expand_menu_links","admins");
		App::import('Model', 'User');
		$this->User = & new User();
		if(empty($this->data)){
		  $this->User->id = $admiId;
		  $this->data = $this->User->read();
		 }elseif(!empty($this->data)){
		  // check username or email exists
		  $this->retArr= $this->User->CheckAdminUserExists($this->data);
		  if($this->retArr[0] == 1) {
				$this->data['User']['password'] = "";
				$this->data['User']['confirmpassword'] = "";
				$this->set('msg', $this->retArr);
		      }else{
			   $password = $this->Common->CreateHashString($this->data['User']['password']);
			   $this->data['User']['password'] = $password;
			   $this->data['User']['usertype'] = 3;
			   $this->User->save($this->data);
			   $this->Session->setFlash(ADMIN_USER_REGISTER);
			   $this->redirect(array('action'=>'index'));
		       }
		    } 
	    } //end of edit admin memeber
	public function admin_changePassword(){
		$this->layout='admin';
		$this->set("expand_menu_links","admins");
		App::import('Model', 'User');
		$this->User = & new User();
		$adminId = $this->Session->read("AdminId");
		if(!empty($this->data)){  
		 // create hash string of old password
			$hashstring = $this->Common->CreateHashString(trim($this->data['User']['old_password']));
			// match enter old  password with database password
			$userExists = $this->User->findById($adminId);
			if($hashstring == $userExists['User']['password']){
				// create hash string of new password
				$newpassword = $this->Common->CreateHashString(trim($this->data['User']['password']));
				$this->User->id = $adminId;
				$this->data['User']['password'] = $newpassword;
				$this->User->save($this->data);
				$this->Session->setFlash(PASWORD_CHANGE);
				$this->redirect(array('controller'=>'users','action'=>'home'));
			}else{
				$this->Session->setFlash(OLD_PASSWOD_NOT_MATCH);
			}
		    }
	    } //end of edit admin memeber

    /**
    * @method      : logout
    * @description : use to logout for admin users
    * @param       : none
    * return       : none
    **/

   public function admin_logout() {
        $this->Session->delete('AdminId');
		$this->Session->destroy();
        $this->redirect('/admin/users/login');
    } // end of logout
	
  }//end of class
?>