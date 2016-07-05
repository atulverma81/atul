<?php

    /**
    * Banners Classes Controller
    *
    * PHP 5.2+
    *
    * Copyright 2010,  smartData (http://www.smartdatainc.com)
    * @date 12Dec-2010
    * @author smartData
    * @version 0.0.1
    **/
class BannersController extends AppController {	
	//component
	public $components = array('Pagination','RequestHandler','File','Thumb');
         
	/**
	 * Helpers
	 *
	 * @var array
	 **/
	var $helpers 	    = array('Html','Javascript','Ajax','Pagination');
	/**
	 * Paginate
	 *
	 * @var array
	 **/
	 var $paginate = array('limit' => 10, 'page' =>'1', 'order'=>array('Banner.id ASC'));
        
	/**
	* @method      : beforeFilter
	* @description : Default check session of admin(Table: )
	* @param       : none
	* return       : none
	**/

	function beforeFilter(){
	  
	    if(isset($this->params['prefix']) && $this->params['prefix']=='admin'){
	      $this->checkUserSession();
		if(!isset($this->passedArgs["page"])){
			$this->Session->del('sessionCon');
		}
	    }
	}
	
	
    
       /**
	* @method: admin_index
	* @purpose: to  display index page
	* @param $id
	* @return void
	**/  
function admin_index(){
         $separator	=array();
         $urlSeparator	=array();
      	 $totalRecord	=0;
     	 $this->set('separator','');
	 $this->set('urlSeparator','');
         $this->layout='admin'; 
// Allow only authenticated users to access this action.
        $this->checkUserSession();
        $this->set("expand_menu_links","banners");
        App::import('Model','Banner');
        $this->Banner = & new Banner();
        $countrycond = array();
        
		 if(!empty($this->data)){
                   if(isset($this->data['Banner']['action'])){
                    $idList=$this->data['Banner']['idList'];
						if($idList){
						   $actionCondition=array("Banner.id IN ($idList) ");	
						if($this->data['Banner']['action']=="activate"){
						  $this->Banner->updateAll(array('Banner.status' =>"'1'"),$actionCondition);
						}elseif($this->data['Banner']['action']=="deactivate"){
						$this->Banner->updateAll(array('Banner.status' =>"'2'"),$actionCondition);
							  }else if($this->data['Banner']['action']=="delete"){
								   $this->Banner->deleteAll($actionCondition);
							  }
          				}
							  }else if(!empty($this->data['Banner']['searchRecord'])){ 
							 if(!empty($this->data['Banner']['name'])){
								$title= trim($this->data['Banner']['name']);
								   $countrycond="Banner.name like '".addslashes($title)."%'";
						 $this->Session->write('sessionCon',$countrycond);
						  }
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
			$countrycond=$this->Session->read('sessionCon');
        	}

	  	$totalRecord = $this->Banner->find('list',array('conditions'=> $countrycond,'fields'=>'Banner.id'));
		if(!empty($totalRecord)){
			$this->set('totalRecords', count($totalRecord)); 
		      } 
           $urlSeparator=implode("/",$urlSeparator);
	   $this->set('separator','');
	   $this->set('urlSeparator',$urlSeparator);
	  
	   $this->set('banners',$this->paginate('Banner',$countrycond));
          if($this->RequestHandler->isAjax()) {
        			$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/banners/';
        			$this->render('index');
        }
}
//end of admin_index
      /**
	* @method: admin_add
	* @purpose: to     add countries in admin
	 
	**/           
public  function admin_add()
{
                         $this->layout='admin';
        // Allow only authenticated users to access this action.
                         $this->checkUserSession();
                         
                      if(!empty($this->data)){
                       
					   	 //upload document
	      if(!empty($this->data['Banner']['document']['name'])){
		    //check file type
		  
			//get file name
			  $file_name =  $this->data['Banner']['document']['name'];
			    $original  = time().$file_name;
			    $big_file  = time().$file_name; 
			    $tmpname   = $this->data['Banner']['document']['tmp_name'];
			      //define image storage path
			      $this->File->destPath = 	WWW_ROOT.'img'.DS.'banner';		
			      $ext=substr($this->data['Banner']['document']['type'],strpos($this->data['Banner']['document']['type'],"/")+1);
			
				      $this->File->setFilename($original);
				      $file = $this->File->uploadFile($original,$this->data['Banner']['document']['tmp_name']);

					//assign data in database table
					 if(!empty($this->data)){
					    $this->data['Banner']['filename']   = $big_file;						 
					 }//end of saving data
				}
	     
	      
					   
                         if($this->Banner->save($this->data)){
		           				$this->Session->setFlash("Banner has been added successfully."); 
                          	 $this->redirect('/admin/banners/index');   
                        }
                      }
             $this->set('data',$this->data); 
}
//end of admin_add
 /**
	* @method: admin_editcountry
	* @purpose: to     add countries in admin
	 
	**/
function admin_edit($bannerid=NULL)
{
              	//$this->loadModel('City');
                    $this->layout='admin';
                    $conditions=array();
                 
                    $this->Banner->id=$bannerid;
                    $this->set('bannerid',$bannerid);
                    
		   if(empty($this->data)){
				$this->data = $this->Banner->read();
			  }else if(!empty($this->data)){
			  
			   //upload document
	      if(!empty($this->data['Banner']['document']['name'])){
		    //check file type
		  
			//get file name
			  $file_name =  $this->data['Banner']['document']['name'];
			    $original  = time().$file_name;
			    $big_file  = time().$file_name; 
			    $tmpname   = $this->data['Banner']['document']['tmp_name'];
			      //define image storage path
			      $this->File->destPath = 	WWW_ROOT.'img'.DS.'banner';		
			      $ext=substr($this->data['Banner']['document']['type'],strpos($this->data['Banner']['document']['type'],"/")+1);
			
				      $this->File->setFilename($original);
				      $file = $this->File->uploadFile($original,$this->data['Banner']['document']['tmp_name']);

					//assign data in database table
					 if(!empty($this->data)){
					    $this->data['Banner']['filename']   = $big_file;						 
					 }//end of saving data
				}
				if($this->Banner->save($this->data)){
				$this->Session->setFlash("Banner has been updated successfully."); 
				$this->redirect('/admin/banners/index');         
				}
			  }
		}
		
		function getBannerImages(){
			 $this->layout='ajax';
			$banners=array();
			$banners = $this->Banner->find('all', array('conditions' => array('Banner.status'=>1),'fields' => array('id', 'filename','name','content'),'order' => 'id ASC'));
			return $banners;
		}

       
    }
?>