<?php
/**  @class:		RequestsController 
 @description		get handle for
 @Created by: 		Atul Verma
 @Modify:		NULL
 @Created Date:		21-06-2012
*/
class RequestsController extends AppController{
	
	  var $uses    = null;
	

	

	/**
	* @method      : getContentSunLink
	* @description : get getContentSunLink 
	* @param       : none
	* return       : none
	**/
	    
	function getContentSunLink(){ 
		App::import("Model","Content");
		$this->Content = & new Content();
		$content=array();
		$content=$this->Content->find('all',array('conditions'=>array('Content.status'=>'1','sub_link != 0'),'fields'=>array('Content.page_code','Content.pagetitle','Content.sub_link'),'order'=>'order_link ASC'));
		
	  	return $content;
	  } 
	  
	  /**
	* @method      : getContentFooterLink
	* @description : get getContentFooterLink 
	* @param       : none
	* return       : none
	**/
	    
	function getContentFooterLink(){ 
		App::import("Model","Content");
		$this->Content = & new Content();
		$content=array();
		$content=$this->Content->find('all',array('conditions'=>array('Content.status'=>'1','sub_link IN (6,7,8)'),'fields'=>array('Content.page_code','Content.pagetitle','Content.sub_link','Content.description'),'order'=>'id ASC'));
		
	  	return $content;
	  } 


	 

}
?>
