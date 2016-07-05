<?php

   class Event extends AppModel{
    	var $name = 'Event';

	/**
        * @method      : getEventDetail
        * @description : Used to get email event details for view section
        * @param       : $eventId
        * return       : $err
        **/
    	function getAdminDetail($eventId){ 
	   $data = $this->find('first',array('conditions'=>array('Event.id'=>$eventId)));
	   return $data;
	}

	/**
        * @method      : updateEventRecord
        * @description : Used to update event status , active , deactive , delete
        * @param       : $listId
        * return       : $redult
        **/
    	function updateEventRecord($listId , $userId){
	    $condition = array('Event.user_id'=>$userId);
	   $idList=$listId['idList'];
		  if($idList){
			   $actionCondition=array("Event.id IN ($idList) ");	
		  if($listId['action']=="activate"){ 
		     $this->updateAll(array('Event.status' =>"'1'"),$actionCondition);
				 return $condition;
		     }elseif($listId['action']=="deactivate"){ 
			     $this->updateAll(array('Event.status' =>"'2'"),$actionCondition);
				 return $condition;
      		      }else
      			  if($listId['action']=="delete"){
      			   $this->deleteAll($actionCondition);
				 return $condition;
			  }
		    }
	  } // end of function

	/**
        * @method      : serachEventRecord
        * @description : Used to search event on basis of event name , zipcode, location
        * @param       : $data
        * return       : $condition
        **/
    	function serachUserRecord($data , $userId){
		 $condition = array('Event.user_id'=>$userId);
		if(!empty($data['User']['field'])) {
			$field = trim($data['User']['field']);
 		  }
		else{
			$field = "event_name";
		}
		if(!empty($this->data['User']['name'])) {
			$searchText = trim($data['User']['name']);
 		  }else{
			$searchText = trim($data['User']['name']);
		      }
		$condition[] ="Event.".$field." like '".addslashes($searchText)."%'"; 
		return $condition;
	  } // end of function
	  
	  
	  
   }// end of class