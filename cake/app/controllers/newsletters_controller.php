<?php
ob_start();
/**
	* Newsletter Controller class
	* 
	*
	* PHP versions 5.1.4
	* @filesource
	* @author     Saurabh S
	* @link       http://www.smartdatainc.net/
	* @copyright  Copyright � 2009 
	* @version 0.0.1 
	*   - Initial release
	*/
class NewslettersController extends AppController {
     	var $name			= "Newsletters";
	 var $uses 			= array("Newsletter");
	 var $helpers 		= array('Html', 'Javascript', 'Ajax','Pagination','Time','Fck');
	 public $components	= array('Pagination','RequestHandler','Email');
	var $paginate = array('limit' => 20, 'page' => 1, 'order'=>array('id'=>'desc'));

/****************************** START ADMIN AREA ******************************/

	/**
	* @method      : beforeFilter
	* @description : Default check session of admin(Table: )
	* @param       : none
	* return       : none
	**/

	function beforeFilter(){
	  
	    if(isset($this->params['prefix']) && $this->params['prefix']=='admin'){
	      $this->checkSessionAdmin();
	    }
	}
  

	/**
    * @method      : Index
    * @description : Home page of content listing (Table: newsletter_subscriptions )
    * @param       : none
    * return       : none
  **/
  
    public function admin_index(){    
        $this->layout='admin';
         //$this->set("expand_menu_links","newsletters");
    	$condition	=array();
    	$actionCondition=array();
    	$separator	=array();
    	$urlSeparator	=array();
	$totalRecord	=0;
	 $this->checkSessionAdmin();
	$totalRecord = $this->Newsletter->find('count',array('fields'=>'Newsletter.id'));	  
  	
	  if(!empty($totalRecord)){
  	    $this->set('totalRecords', $totalRecord); 
  	  } 
	  if(!empty($this->data)){
		
		if(isset($this->data['Newsletter']['action'])){
			$idList=$this->data['Newsletter']['idList'];		   
		if($idList){
		   $actionCondition=array("Newsletter.id IN ($idList) ");	
  		   
		     if($this->data['Newsletter']['action']=="activate"){ 		      		      
  			       $this->Newsletter->updateAll(array('Newsletter.status' =>"'1'"),$actionCondition);
  		      }else
      			if($this->data['Newsletter']['action']=="deactivate"){
      			    $this->Newsletter->updateAll(array('Newsletter.status' =>"'2'"),$actionCondition);
      			}else
      			  if($this->data['Newsletter']['action']=="delete"){				
      			   $this->Newsletter->deleteAll($actionCondition);
			  }
		    }
	      }else if (!empty($this->data['Newsletter']['searchRecord'])){
      		$title='';
      		$status='';
    		  if(!empty($this->data['Newsletter']['title'])){
    		    $title= trim($this->data['Newsletter']['title']);
    		  }
    		  if(!empty($this->data['Newsletter']['status'])){
    		    $status= trim($this->data['Newsletter']['status']);
    		  }
    		  $con[] ="Newsletter.article_category like '%".addslashes($title)."%' AND Newsletter.status like '%".addslashes($status)."%'";
    	      }	   
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
	    
	     $this->set('newsletters', $this->paginate('Newsletter',$condition));
	     
            if($this->RequestHandler->isAjax()) {
        			$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/newsletter/';
        			$this->render('index');
        		}
      
     }

/*_____________________________________________________________________________
*	@Function:	admin_view
*	@Description:	Listing of all ads
*	@param:		None
*	@return: 
*	
  �������������������������������������������������������������������������������
*/	
	
	function admin_view(){
	   
	    //Layout of the admin template. Show template as per request call.		
		if( $this->RequestHandler->isAjax()  ){
			$this->layout 			= 'ajax';
		}else{
			$this->layout 			= 'admin';
		}	
		//set conditional array       
	        $criteria=array();
		
	    // check form post data 		
		if($this->data) {
		    $title=trim($this->data['Newsletter']['title']);
		    $criteria[]="Newsletter.title like '%".$title."%'";
		    //check for id 
		} else {
		    $criteria[] = '1=1';  
		}
	       //set pagination value
	       list($order,$limit,$page) = $this->Pagination->init($criteria);
	       
	       // get records from ads table
	       $data = $this->Newsletter->findAll($criteria, NULL, $order, $limit, $page); // Extra parameters added
	       $this->set('data',$data);
	
	}// end of admin_view
	
/*_____________________________________________________________________________
*	@Function:	admin_add
*	@Description:	Insert new record in newsletters table
*	@param:		None
*	@return: 
*	
  �������������������������������������������������������������������������������
*/
    function admin_add(){
     
	    // set admin layout  
		$this->layout = 'admin';
		
		// check form post data
		if($this->data){ 				
		 // save data in newsletters table				
		 if($this->Newsletter->save($this->data)){					
				 $this->Session->write('message',SUCCESS_MESSAGE3);
				 $this->redirect('/admin/newsletters/view'); 
		 }else{
			 $this->Session->write('message',ERROR_MESSAGE3);
		 }			
		} else {
			$this->render();
		}
	}// end of function admin_add
	
/*_____________________________________________________________________________
*	@Function:	admin_edit
*	@Description:	Update record in newsletters table
*	@param:		$id
*	@return: 
*	
  �������������������������������������������������������������������������������
*/
	function admin_edit($id=NULL){
	  
	   // set admin layout
		$this->layout = 'admin';
		
		$msgString='';
		//declare conditions array
		$conditions=array();
	
		$this->Newsletter->id = $id;
		//check form post data
		if($this->data){
		 if($this->Newsletter->save($this->data)){
			 $this->Session->write('message',SUCCESS_MESSAGE4);
			 $this->redirect('/admin/newsletters/view');// redirect to view page
		 }
		} elseif($id>0) { // check id is blank or not
			$this->Newsletter->id = $id;
			$this->data =  $this->Newsletter->read();			
		}
	}// end of function admin_edit

	
/*_____________________________________________________________________________
*	@Function:	admin_active
*	@Description:	Change ad status 
*	@param:		$id
*	@return: 
*	
 ������������������������������������������������������������������������������
*/

	function admin_active($id=null) {
	  
	    $this->layout='ajax';
		$ad = $this->Newsletter->read('Newsletter.status',$id);
		if($ad['Newsletter']['status']=='1'){
			$status = 0;
		} else { 
			$status = 1;
		}
		$data = array('Newsletter' => array('id' => $id, 'status'=>$status));
		
		// update status
		$this->Newsletter->save($data);
		//setting id
		$this->set('id',$id);
		$this->set('status',$status);
		
	}	// end of function admin_active
	
/*_____________________________________________________________________________
*	@Function:	admin_delete
*	@Description:	delete records from ads table
*	@param:		$id
*	@return: 
*	
 ������������������������������������������������������������������������������
*/
	function admin_delete($id=null){
	  
	    //call ajax layout 
		$this->layout='ajax';
		
		// delete record from ads table
		$this->Newsletter->del($id);
		
		$this->Session->write('message',SUCCESS_MESSAGE5);
		if( $this->RequestHandler->isAjax()  ){
			$this->layout	= 'ajax';
		}else{
			$this->layout	= 'admin';
		}
	       //setting criteria array
	       $criteria=array();
	       
	       list($order,$limit,$page) = $this->Pagination->init($criteria); 
	       $data = $this->Newsletter->findAll($criteria, NULL, $order, $limit, $page);
	       
	       $this->set('data',$data); 
	       $this->render('admin_view');
	       
	}// end of function admin_delete
	
/*_____________________________________________________________________________
*	@Function:	admin_send
*	@Description:	send newsletter to subscribers
*	@param:		$id
*	@return: 
*	
*/
	function admin_send(){
	  
	     //call ajax layout
	     Configure::write('debug',0);
		 $this->layout='admin';
		 $this->checkSessionAdmin();
		$emailids=array();
		$emailids=$this->Newsletter->find('all',array('conditions'=>array('Newsletter.status'=>1),'fields'=>array('Newsletter.id','Newsletter.email'),'order'=>'email ASC'));
			
		$this->set(compact('emailids'));

		if(!empty($this->data)){
			
		$this->Email->subject = 'Newsletter Lifestyle Holiday Rentals-'.$this->data['Newsletter']['title'];
							
			$emails=array();
			if(!empty($this->data['Newsletter']['email'])){
				$emails = $this->data['Newsletter']['email'];
			}
									
			
							       
			 $this->Email->replyTo = 'Newsletter<no-reply>@lifestyleholidayrentals.com';
		       
			 $this->Email->from = 'LifestyleHolidayRentals<info@lhr.com>';
							       
			 $this->Email->sendAs = 'html';
							       
			 $this->Email->template = 'newsletter';
			
			 $this->set('details', $this->data['Newsletter']);
			 
			 if(!empty($emails)&&($emails[0]!='0')){
				foreach($emails as $email){
					if(!empty($email)){
					      $this->set('emailAddres',$email);
					     $this->Email->to = $email;	
					    $this->Email->send();  
					}
				}
				$this->Session->setFlash(ADMIN_SEND_NEWSLETTER); 	
				$this->redirect('/admin/newsletters/');   
			}else{
				$this->Session->setFlash('Please select at least a email address.'); 
				$this->render();
			}
			 
			 //$this->Email->delivery = 'smtp';
			 # /* Do not pass any args to send() */
			
			 
			 
		}
	 }// end of function admin_send	



/* End of admin newsletters functionality */
		 
/****************************** END ADMIN AREA ******************************/

	/**
	* @method      : subscribe
	* @description : Home page of news (Table: properties )
	* @param       : $country, $state, $city
	* return       : none
	**/
	
	public function subscribe() {
			
	       //Setting layout
		$this->layout ='index';
		$condition='';
		$email='';
		$checkVer=array();
		$checkExistance=array();
		if(empty($this->data)){
			
		}else if(!empty($this->data)){
			
			//check for already registered email address of user
			$email=trim($this->data['Newsletter']['email']);
			$condition="Newsletter.email like '%".addslashes($email)."%'";
			$checkExistance=$this->Newsletter->find('first',array('conditions'=>$condition));
			
			if((isset($this->data['Newsletter']['ver_code'])) && (trim($this->data['Newsletter']['ver_code'])==''))
	       		{ 	$this->set('check',$this->data['Newsletter']['ver_code']);
				$this->create_captcha();
		    		$this->Session->setFlash(VERIFICATION_CODE); 
	       		}
	       		elseif( (isset($this->data['Newsletter']['ver_code'])) && ($this->data['Newsletter']['ver_code']!=$_SESSION['verification']))
	       		{ 	$this->create_captcha();
		   		$this->set('check',$this->data['Newsletter']['ver_code']);
				$this->Session->setFlash(VALID_VERIFICATION_CODE); 	
	       		}elseif(!empty($checkExistance))
	       		{ 	$this->create_captcha();
		   		$this->set('check',$this->data['Newsletter']['ver_code']);
				$this->Session->setFlash('Email address has already subscribed.'); 	
	       		}else{
			
				if($this->Newsletter->save($this->data)){
					$this->set('check','');
					$this->Session->setFlash(SEND_NEWSLETTER); 		
				}

			}
		
		}

	}

	 function create_captcha(){
		App::import("Component","Captcha"); //including captcha class  
		$this->Captcha =  new CaptchaComponent(); //creating an object instance  
		$this->Captcha->controller = & $this; //assign this conroller(CaptchaController) object to its captcha object's controller property.  
		$this->set('captcha_src',$captcha_src=$this->Captcha->create()); //create a capthca and assign to a variable 
 	}
	
	
	/**
	* @method      : unsubscribe
	* @description : Home page of news (Table: properties )
	* @param       : $country, $state, $city
	* return       : none
	**/
	  function unsubscribe($email= null)
	  { 	$this->layout="index";
		//delete if email id exist in database table
		$this->create_captcha();
		if(!empty($email)){
		$this->Newsletter->deleteAll(array("Newsletter.email like '$email%' "), false);
		}
		 
	    
	  }			
				
	
		
} // end of class NewslettersController
?>
	
	