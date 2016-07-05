<?php
 	/**
		* Category Controller class
		* PHP versions 5.1.4
		* @date 04-Feb-2011
		* @Purpose:This controller handles all the functionalities of User postings
		* @filesource
		* @author     Sachin Sharma
		* @revision
		* @copyright  Copyright @ 2011 smartData
		* @version 0.0.1
 	**/

 class EventsController extends AppController{
	
	var $helpers 	  = array('Html','Form','Javascript','Ajax',"time",'Session','utility'); 
	var $components   = array('RequestHandler','Common','Paypal','Service');

	/**
	* @method      : beforeFilter
	* @description : Default check session of admin(Table:User )
	* @param       : none
	* return       : none
	**/
	function beforeFilter(){
		 $this->checkUserSession();
	}

        /**
	* @method      : index
	* @description : used to show all show all evnets posting list of user
	* @param       : none
	* return       : none
	**/
	function index(){
        }// end of function

        /**
	* @method      : create
	* @description : used to create new event posting
	* @param       : none
	* return       : none
	**/
	public function CreateEvent(){
	   	$this->pageTitle = "Post New Event!";
		$this->layout	 = 'home';
		$userid = $this->Session->read("loginId");
		$countries = $this->Common->set_country_list();
        	if(!empty($this->data['User']['country_id'])){	
        		$states = $this->Common->set_state_list($this->data['User']['country_id']);
        	}else{
              		$states = $this->Common->set_state_list(DEFAULT_COUNTRY); 
        	}
          	$this->set(compact('countries', 'states'));
		  
	if(!empty($this->data)){
		if(strtotime($this->data['Event']['start_date']) > strtotime($this->data['Event']['end_date'])){
			      $this->Session->setFlash(EVENT_DATE);	
			}else{
				
				if($this->data['User']['state_id'] == 1110 && !empty($this->data['User']['otherstate'])) {
				   $this->data['Event']['state'] = null;
				}else{
				   $this->data['Event']['state']  = $this->data['User']['state_id'];
				 }	
				$this->data['Event']['country']      = $this->data['User']['country_id'];
				$this->data['Event']['user_id']      = $userid;
			  	$this->data['Event']['posting_date']  = date('y-m-d');
			  	$this->data['Event']['modified_date'] = date('y-m-d'); 

				if(!empty($this->data['Event']['image']['name'])){
				 // here we are checking Image file format
      	    		  	$safe_imageFile = $this->Common->checkImageFile($this->data['Event']['image']); 
				if($safe_imageFile['safe'] == 0){
					$this->Session->setFlash(EVENT_FILE_TYPE);
					}else{
					$upload_imageFile = $this->Common->uploadImageFile($this->data['Event']['image']);
					$this->data['Event']['image']   = $upload_imageFile; 
					$this->Event->save($this->data); 
					$this->Session->setFlash(EVENT_POST);
					$this->redirect(array('action'=>'ListEvent'));
					}
				} // end of check empty image fie	
				else{	
					$this->data['Event']['image'] = null;
					$this->Event->save($this->data);
					$this->Session->setFlash(EVENT_POST);
					$this->redirect(array('action'=>'listEvent'));
				    }
				} // end of else 
			} // end of empty data
        	}// end of function
	
	/**
	* @method      : SearchResult
	* @description : used to search events
	* @param       : none
	* return       : none
	**/
	public function SearchResult(){
		$this->pageTitle = "Search Event!";
		$this->layout	 = 'home'; 
		//declare variables
          	$totalRecord=0;
          	$separator=array();
          	$urlSeparator=array();
          	$totalRecord=array();
          	$condition=array();
          	$actioncondition=array();
          	$this->set('separator', '');
          	$this->set('urlSeparator', '');
			$find_keyword = "";
			$find_zipcode = "";
      	 	 if(!empty($this->data)){ 
      				//declares variables
      				$find_value='';
      				$find_field='';
      				$admin_viewSubscriptionstatus='';
      				  if(!empty($this->data['Event']['keyword'])){  
      					    $find_keyword= trim($this->data['Event']['keyword']);
      				  }
      				  if(!empty($this->data['Event']['zipcode'])){
      					    $find_zipcode= trim($this->data['Event']['zipcode']);
      				    }
      			 	  if(!empty($find_keyword) && !empty($find_zipcode)){
							$condition[] ="Event.event_keyword like '%".addslashes($find_keyword)."%' OR Event.zipcode like '%".addslashes($find_zipcode)."%'";
						    }
				  elseif(!empty($find_keyword)){
						$condition[] ="Event.event_keyword like '%".addslashes($find_keyword)."%'";
				 	}
				  elseif(!empty($find_zipcode)){
						$condition[] ="Event.zipcode like '%".addslashes($find_zipcode)."%'";
				 	}
				  else{
					$condition[] = "";
				      }
   				}  // end of check searchRcord 
    	 		  //end of check not empty data 
 
    		//count total records
		 
		$totalRecord = $this->Event->find('count',array('conditions'=>$condition));
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

		$this->paginate	= array('Event'=>array('limit'=> '4', 'page' => '1', 'order'=>array('Event.id'=>'desc')));

                $this->set('events',$events = $this->paginate('Event',$condition));
		 if($this->RequestHandler->isAjax()) {
                     $this->layout= ''; 
                     $this->viewPath = 'elements'.DS.'event';
                     $this->render('search_list');
                    }
	}	

	/**
	* @method      : editEvent
	* @description : used to edit event
	* @param       : $eventId
	* return       : none
	**/

	public function editEvent($eventId = null){
		$this->pageTitle = "Update Event!";
		$this->layout	 = 'home';
		$countries = $this->Common->set_country_list();
        	
		if(empty($this->data)){
			$this->Event->id = $eventId;
			$this->set('id',$eventId);
			$this->data = $this->Event->read();			 
            $states = $this->Common->set_state_list($this->data['Event']['country']); 
        	 
          	$this->set(compact('countries', 'states'));
		}elseif(!empty($this->data)){ 
			
			if(!empty($this->data['User']['country_id'])){	
        		$states = $this->Common->set_state_list($this->data['User']['country_id']);
        	} 
          	$this->set(compact('countries', 'states'));
          	
			if(strtotime($this->data['Event']['start_date']) > strtotime($this->data['Event']['end_date'])){
			      $this->Session->setFlash(EVENT_DATE);	
			}else{
			
				if($this->data['User']['state_id'] == 1110 && !empty($this->data['User']['otherstate'])) {
					$this->data['Event']['state'] = 1110;
					}else{
					$this->data['Event']['state']  = $this->data['User']['state_id'];	
					}	
				$this->data['Event']['country']      = $this->data['User']['country_id'];
				 
			  
				$this->data['Event']['id'] = $eventId;
				$this->data['Event']['modified_date'] = date('y-m-d'); 
				
			if(!empty($this->data['Event']['image']['name'])){
				 // here we are checking Image file format
      	    		  	$safe_imageFile = $this->Common->checkImageFile($this->data['Event']['image']); 
				if($safe_imageFile['safe'] == 0){
					$this->Session->setFlash(EVENT_FILE_TYPE);
					}else{
					$upload_imageFile = $this->Common->uploadImageFile($this->data['Event']['image']);
					$this->data['Event']['image']   = $upload_imageFile; 
					$this->Event->save($this->data); 
					$this->Session->setFlash(EVENT_UPDATE);
					$this->redirect(array('action'=>'ListEvent'));
					}
				} // end of check empty image fie	
				else{ 
					$this->data['Event']['image']   = $this->data['Event']['preimage'] ;   
					$this->Event->save($this->data);
					$this->Session->setFlash(EVENT_UPDATE);
					$this->redirect(array('action'=>'listEvent'));
				    }
				} // end of else
		 	} // end of empty data
		}
	
	/**
	* @method      : deleteEvent
	* @description : used to delete event
	* @param       : $eventId
	* return       : none
	**/

	public function deleteEvent($eventId = null){
		if(!empty($eventId)){
				$this->Event->del($eventId);
				$this->Session->setFlash(EVENT_DELETE);
				$this->redirect(array('action'=>'listEvent'));
			}
	}
	
	/**
	* @method      : ListEvent
	* @description : used to show all list of user event
	* @param       : none
	* return       : none
	**/
	public function ListEvent(){
	   	$this->pageTitle = "Events List!";
		$this->layout	 = 'home';
		$userid = $this->Session->read("loginId");
		//declare variables
          	$totalRecord=0;
          	$separator=array();
          	$urlSeparator=array();
          	$totalRecord=array();
          	$condition=array();
          	$actioncondition=array();
          	$this->set('separator', '');
          	$this->set('urlSeparator', '');
      		 //if data is not empty
      		  if(!empty($this->data)){
      		      if(isset($this->data['action'])){ 
      				      $idList=$this->data['idList'];
      				      if($idList) {
      					 $actioncondition=array("Subscription.id IN ($idList) ");
      						  if($this->data['action']=="activate"){
      						      $actioncondition=array("Subscription.id IN ($idList) ");
      						      $this->User->updateAll(array('User.status' =>"'1'"),$actioncondition);
      						      $parentArry=array("User.parent_id IN ($idList) ");
      						      $this->User->updateAll(array('User.status' =>"'1'"),$parentArry);
      						  }else{ 
      							  if($this->data['action']=="deactivate"){
      								$this->User->updateAll(array('User.status' =>"'2'"),$actioncondition);
      								 $parentArry=array("User.parent_id IN ($idList) "); 
      						     $this->User->updateAll(array('User.status' =>"'2'"),$parentArry);
      							  }else if($this->data['action']=="delete"){  
      									   $this->Subscription->deleteAll($actioncondition);
								}
      							  }
      						} // end of check idList
      			    }else if(!empty($this->data['User']['searchRecord'])){
      				//declares variables
      				$find_value='';
      				$find_field='';
      				$admin_viewSubscriptionstatus='';
      				  if(!empty($this->data['User']['title'])){
      					    $find_value= trim($this->data['User']['title']);
      				  }
      				  if(!empty($this->data['User']['field'])){
      					    $find_field= trim($this->data['User']['field']);
      				    }
      			 	  if(!empty($this->data['User']['title']) && !empty($this->data['User']['field'])){
						  if($this->data['User']['field'] == "username"){
							$condition[] ="User.".$find_field." like '%".addslashes($find_value)."%'";
						    }else{
							$condition[] ="Subscription.".$find_field." like '%".addslashes($find_value)."%'";
						    }
   					 }else if(!empty($this->data['User']['title'])){  
							$condition[] ="User.username like '%".addslashes($find_value)."%'";
						}
      				  } // end of check searchRcord 
    	 		} //end of check not empty data 

    		//count total records
		$condition = array('Event.user_id'=>$userid);
		$totalRecord = $this->Event->find('count',array('conditions'=>$condition));
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

		$this->paginate	= array('Event'=>array('limit'=> '4', 'page' => '1', 'order'=>array('Event.id'=>'desc')));

                $this->set('events',$events = $this->paginate('Event',$condition)); 
		 if($this->RequestHandler->isAjax()) {
                     $this->layout= ''; 
                     $this->viewPath = 'elements'.DS.'event';
                     $this->render('event_list');
                    }
        }// end of function
 
    /**
	* @method      : view
	* @description : used to view event posting by users
	* @param       : none
	* return       : none
	**/
	public function ViewEvent($id = null){
	    $this->layout	 = '';
		$this->pageTitle = "View Event"; 
		$events = $this->Event->findById($id); 
		$this->set('events',$events);
        }// end of function
        
        
    public function postComment($eventId = null){
		$this->layout = "";
		$userId = $this->Session->read('loginId');
		App::import('Model','Comment');
		$this->Comment = & new Comment();
		if(isset($_POST['comment'])) {
			 $allComments =  $this->Comment->saveComment($_POST['comment'],$userId, $eventId);
			 $this->set('comments',$allComments);
			 $this->set('userId',$userId);
		   }
	    }
     
     /**
	* @method      : webSearch
	* @description : used to get result for android application
	* @param       : $postXML
	* return       : none
	**/      
     public function webSearch($postXML = null) {
     		   App::import('helper', 'Time');
			   $time = new TimeHelper();
       	       $this->layout=null ;
               $content = '<?xml version="1.0" encoding="ISO-8859-1"?>';
               $content.='<search>';
               $content.='<keyword></keyword>';
               $content.='<zipcode> </zipcode>';
               $content.='</search>';   
 			   $searchData = $this->Service->processWebservce($content);
 			   if(!empty($searchData)) { 
 			   		// create xml
				    $search_xml = '<?xml version="1.0" encoding="ISO-8859-1"?>'; 
				    $search_xml .='<search>';
				    foreach($searchData as $data): 	
					$search_xml .='<event>';				    			    				    
				    $search_xml.='<name>'.$data['Event']['event_name'].'</name>';				    
				    $search_xml.='<city>'.$data['Event']['city'].'</city>';
				    $search_xml.='<country>'.trim($this->Common->findCountryName($data['Event']['country'])).'</country>';
				    $search_xml.='<state>'.trim($this->Common->findStateName($data['Event']['state'])).'</state>';
				    $search_xml.='<zipcode>'.trim($data['Event']['zipcode']).'</zipcode>';
				    $search_xml.='<phone>'.trim($data['Event']['phone']).'</phone>';
				    $startDate = $time->format('D, M d, Y',$data['Event']['start_date']);
				    $search_xml.='<startdate>'.$startDate.'</startdate>';
				    $endDate = $time->format('D, M d, Y',$data['Event']['end_date']);
				    $search_xml.='<enddate>'.$endDate.'</enddate>';
				    $search_xml.='<starttime>'.$time->format('H:i a',$data['Event']['start_date']).'</starttime>';
				    $search_xml.='<endtime>'.$time->format('H:i a',$data['Event']['end_date']).'</endtime>';
				    $search_xml.='<description>'.trim($data['Event']['description']).'</description>';
				    $search_xml.='<image>'.trim($data['Event']['image']).'</image>';				    
				    $search_xml .='</event>';
                    endforeach ;  
				    $search_xml .='</search>';  
					return $search_xml;
 			   } // end of check empty data
 			   else{
 			   		$search_xml = '<?xml version="1.0" encoding="ISO-8859-1"?>'; 
				    $search_xml .='<search>';
				    $search_xml .='<event> null</event>' ;
				    $search_xml .='</search>';
				    return $search_xml; 
 			       }
             } // end of webSearch finction
   } // end of class