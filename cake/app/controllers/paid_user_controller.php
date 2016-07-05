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
class PaidUserController extends AppController{
	 var $uses	    = ""; 
	 var $helpers 	    = array('Html','Form','Javascript','Ajax','utility','Time','Session');
	 var $components = array('Common','Pagination', 'RequestHandler');
        


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
	* @description  : used to list all paid users
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
		// code for activate / deactivate / delete users record
	            	if(isset($this->data['action'])){
        	       	        $condition  = $this->User->updateUserRecord($this->data);
	        	 } // end of check action

		// code for searching record
			if(!empty($this->data['User']['searchRecord'])){
				$condition = $this->User->serachUserRecord($this->data);
			 }
	     } // end of check empty data
	     else{	
	 		$condition = array('User.usertype'=>1);
		 }	
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
	     $this->paginate	= array('User'=>array('limit'=> '10', 'page' => '1', 'order'=>array('User.id'=>'desc')));
	     $this->set('admins', $this->paginate('User',$condition));
            if($this->RequestHandler->isAjax()) {
                           	$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/paidusers/';
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
	function admin_viewUser($id = NULL){
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
	
	function admin_viewEvent($userId = null){ 
        //setting layout
	App::import('Model', 'Event');
      	$this->Event = & new Event();
	$this->layout = 'admin';
        $this->set("expand_menu_links","admins");
      	$condition	=array();
      	$actionCondition=array();
      	$separator	=array();
      	$urlSeparator	=array();
      	$totalRecord	=0;
	$this->set('userId',$userId);
	if(!empty($this->data)){
		// code for activate / deactivate / delete users record
	            	if(isset($this->data['action'])){
        	       	      $condition =   $this->Event->updateEventRecord($this->data , $userId);
	        	 } // end of check action

		// code for searching record
			if(!empty($this->data['User']['searchRecord'])){
				$condition = $this->Event->serachUserRecord($this->data , $userId);
			 }
	     } // end of check empty data
	     else{	
	 		 $condition = array('Event.user_id'=>$userId);
		 }

	 $totalRecord = $this->Event->find('count',array('fields'=>'Event.id','conditions'=>$condition));
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
	      $this->paginate	= array('Event'=>array('limit'=> '10', 'page' => '1', 'order'=>array('Event.id'=>'desc')));
	     $this->set('admins', $this->paginate('Event',$condition));
            if($this->RequestHandler->isAjax()) {
                           	$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/paidusers/';
        			$this->render('event_list');
                   	}
		  } 
		
	function admin_eventDetail($eventId = null , $userId = null){
		App::import('Model', 'Event');
      		$this->Event = & new Event();
		$this->layout = 'admin';
        	$this->set("expand_menu_links","admins");
		$data = $this->Event->getAdminDetail($eventId);
		$this->set(compact('data','userId'));
		}

    /**
      * @method      : exportXls
      * @description : Used to export paideuser data in excel format
      * @param       : $userType
      * return       : none
    **/

    function admin_exportXls($userType = null) {
		$this->layout = 'excel';
  		list($render , $fileName , $data) = $this->Common->createExcel($userType);
		$this->set('filename',$fileName);
		$this->set('type',$userType); 
          	$this->set('rows',$data); 
   	     } // end of exportXLS

}//end of class
?>