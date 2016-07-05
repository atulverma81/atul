<?php
/**
	* Content Controller class
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
class ContentsController extends AppController {
    var $name			= "Contents";
	//var $uses 			= array();
    var $helpers 		= array('Html', 'Javascript', 'Ajax','Pagination','Calendar','Fck','Time');
    var $components	= array('Pagination','RequestHandler','Email');	 
    var $paginate = array('limit' => 20, 'page' => 1, 'order'=>array('id'=>'desc'));

	 
	
	
	
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
		//Allow only authenticated users to access this action.
	    $this->checkUserSession();
		$msgString='';
		//declare conditions array
		$conditions=array();
		  App::import('Model','Content');
		    $this->Content = new Content();
		    
		$this->Content->id = $id;
		//check form post data
		if($this->data){
		 if($this->Content->save($this->data)){
			 $this->Session->write('message',"Content has been updated successfully.");
			 $this->redirect('/admin/contents/index');// redirect to view page
		 }
		} elseif($id>0) { // check id is blank or not
			$this->Content->id = $id;
			$this->data =  $this->Content->read();
			$this->set('pagename',$this->data['Content']['pagename']);
      		
		}
	} // end of function admin_edit

	
	/*_____________________________________________________________________________
*	@Function:	admin_delete
*	@Description:	delete records from contents table
*	@param:		$id
*	@return:
*	
  �������������������������������������������������������������������������������
*/

	function admin_delete($id=null){
		  
		   //Allow only authenticated users to access this action.
		  $this->checkUserSession();
	     

                  //setting layout
		  $this->layout='ajax';
        App::import('Model','Content');
		    $this->Content = new Content(); 
		
		 //delete records	
		 $this->Content->del($id);
	
		 
		 //setting sucess message
		 $this->Session->write('message',"Content deleted successfully.");
		 if( $this->RequestHandler->isAjax()  ){
			 $this->layout	= 'ajax';
		 }else{
			 $this->layout	= 'admin';
		 }
		 
		 //setting criteria array
		 $criteria = array();
		 list($order,$limit,$page) = $this->Pagination->init($criteria);
		 
		 //get records from users table  
		 $data = $this->Content->findAll($criteria, NULL, $order, $limit, $page); 
		 $this->set('data',$data); 
		 $this->render('admin_index');
	 
	}// end of function admin_delete
	


/**
    * @method      : Index
    * @description : Home page of content listing (Table: contents )
    * @param       : none
    * return       : none
  **/
public function admin_index(){ 
        $this->layout='admin';
        $this->set("expand_menu_links","contents");
        //Allow only authenticated users to access this action.
	    $this->checkUserSession();
      	$condition	=array();
      	$actionCondition=array();
      	$separator	=array();
      	$urlSeparator	=array();
      	$totalRecord	=0;
        App::import('Model','Content');
    	if(!empty($this->data)){
                   if(isset($this->data['Content']['action'])){
                    $idList=$this->data['Content']['idList'];
                   if($idList){
		   $actionCondition=array("Content.id IN ($idList) ");	
  		if($this->data['Content']['action']=="activate"){
          $this->Content->updateAll(array('Content.status' =>"'1'"),$actionCondition);
  		}elseif($this->data['Content']['action']=="deactivate"){
  	    $this->Content->updateAll(array('Content.status' =>"'2'"),$actionCondition);
      	      }else if($this->data['Content']['action']=="delete"){
      			   $this->Content->deleteAll($actionCondition);
			  }
          }
     }elseif(!empty($this->data['Content']['searchRecord'])){

         if(!empty($this->data['Content']['status'])){
                  	    $status= trim($this->data['Content']['status']);
                             $condition[] ="Content.status like '%".addslashes($status)."%'";
        		  }

           if(!empty($this->data['Content']['pagetitle'])){
                  	    $title= trim($this->data['Content']['pagetitle']);
           $condition[] ="Content.pagetitle like '".addslashes($title)."%' ";
        	          }
                   }
 }
 
   $totalRecord = $this->Content->find('count',array('conditions'=>$condition,'fields'=>'Content.id'));

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
	     $this->set('contents', $this->paginate('Content',$condition));
            if($this->RequestHandler->isAjax()) {
                           	$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/contents/';
        			$this->render('index');
                   	}
}
 /**
    * @method      : addContent
    * @description : addContent page function (Table: contents )
    * @param       : $catId
    * return       : none
  **/
public function admin_addContent(){
          $this->layout='admin';
          $this->set("expand_menu_links","contents");
 // Allow only authenticated users to access this action.
  	   $this->checkUserSession();
          $pageCodeExist=array();
          $pageCode='';
         if(!empty($this->data)){
		//check valid file and size
		 
			$this->Content->set($this->data);
			$pageCode=trim($this->data['Content']['page_code']);
			$pageCodeExist=$this->Content->find('first',array('conditions'=>"page_code like '.$pageCode.'"));
			if(empty($pageCodeExist)){
			if($this->Content->validates()) {
				$this->data['Content']['created_date']= date("Y-m-d H:i:s");
					if($this->Content->save($this->data)){
					
					//$this->Content->saveField('page_code','link-'.$docId);
				$this->Session->setFlash("Content has been added successfully"); 	
						$this->redirect('/admin/contents/');         
					}
				}
        }else{
           $this->Session->setFlash("Page code already exist."); 
        } 
                      
      	 	}
}
//end of add content
 /**
      * @method      : editContent
      * @description : Edit content (Table: contents )
      * @param       : $contentId
      * return       : none
 **/    
    public function admin_editContent($contentId=null){
	    $this->layout='admin';
	    $this->set("expand_menu_links","contents");
  	   App::import('Model','ContentCategory');

     // Allow only authenticated users to access this action.
		   $this->checkUserSession();
  	 
	    
    	 if(empty($this->data)){
	    $this->data = $this->Content->read();	
	  
	 }else if(!empty($this->data)){	
		 
                        //upload content file 
			  //for single document file upload	    
			//end of upload content file	
			$this->Content->set($this->data);
			if($this->Content->validates()) {
				$this->data['Content']['modified_date']= date("Y-m-d H:i:s");
	
				if($this->Content->save($this->data)){
					$this->Session->setFlash("Content has been  updated successfully"); 
					$this->redirect('/admin/contents/');         
				}
    		  	}
	      	 //check if file is not valid
		}
	  }

//end of edit content
/**
      * @method      :  viewContent
      * @description :  View content (Table: contents )
      * @param       : $contentId
      * return       : none
 **/
public function admin_viewContent($id=NULL)
     {
             $this->layout='admin';		
 	     $this->Content->id=$id;
             // Allow only authenticated users to access this action.
		   $this->checkUserSession();
              $conditions = array('Content.id'=>$id);
             $data=$this->Content->getContentDetail($conditions);         
             $this->set(compact('data'));
     }
//end of view content
	public function contactUs()
	{	
		App::import('Model','Content');
  		$this->Content = & new Content();
		$conditions=array();	
		$contactDescs=array();
		$conditions = array('Content.id'=>3);
		$contactDescs=$this->Content->find('first',array('conditions'=>$conditions,'fields'=>'description'));
		return $contactDescs;
		
	}
	
	/**
      * @method      : index
      * @description : Used to view pages (Table: pages )
      * @param       : none
      * return       : none
    **/ 

	 public function index($pageCode=null){

		
		$this->layout='home';
		
		if(empty($pageCode)){
			$pageCode = 'home';
		}
		
		$contents=$this->Content->find('first',array('conditions'=>array('Content.page_code'=>$pageCode)));
		
		$this->set('metakeywords',$contents['Content']['meta_keywords']);
		$this->set('metadescription',$contents['Content']['meta_description']);
		$this->set('metatitle',$contents['Content']['meta_title']);
		$this->set('pagetitle',$contents['Content']['pagetitle']);
		$this->set('contents',$contents);
		
  	}

	

} // end of class contentsController
?>