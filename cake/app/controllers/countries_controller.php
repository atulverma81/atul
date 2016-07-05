<?php

    /**
    * Countries Classes Controller
    *
    * PHP 5.2+
    *
    * Copyright 2010,  smartData (http://www.smartdatainc.com)
    * @date 12Dec-2010
    * @author smartData
    * @version 0.0.1
    **/
class CountriesController extends AppController {	
	//component
	public $components = array('Pagination','RequestHandler','Cookie','Misc','Email');
         
	/**
	 * Helpers
	 *
	 * @var array
	 **/
	var $helpers 	    = array('Html','Javascript','Ajax','Pagination','Calendar','Image','Type','Cache');
	/**
	 * Paginate
	 *
	 * @var array
	 **/
	 var $paginate = array('limit' => 20, 'page' =>'1', 'order'=>array('Country.id'=>'desc'));
        
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
        $this->set("expand_menu_links","countries");
        App::import('Model','Country');
        $this->Country = & new Country();
        $countrycond = array();
        $countryList=$this->Country->countryDetail($countrycond);          
         //$this->set(compact('countryList'));
	  if(!empty($this->data)){
                   if(isset($this->data['Country']['action'])){
                   $idList=$this->data['Country']['idList'];	
		   if($idList){
		   $actionCondition=array("Country.id IN ($idList) ");	
  		   if($this->data['Country']['action']=="delete"){
      			   $this->Country->deleteAll($actionCondition);
			  }		 
		         }
	              }else if(!empty($this->data['Country']['searchRecord'])){ 
                 if(!empty($this->data['Country']['country'])){
        		    $title= trim($this->data['Country']['country']);
                       $countrycond="Country.country like '".addslashes($title)."%'";
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

	  	$totalRecord = $this->Country->find('list',array('conditions'=> $countrycond,'fields'=>'Country.id'));
		if(!empty($totalRecord)){
			$this->set('totalRecords', count($totalRecord)); 
		      } 
           $urlSeparator=implode("/",$urlSeparator);
	   $this->set('separator','');
	   $this->set('urlSeparator',$urlSeparator);
	   $this->Country->find('list', array(
					'conditions' => $countrycond
					)
				); 
	   $this->set('countryList',$this->paginate('Country',$countrycond));
          if($this->RequestHandler->isAjax()) {
        			$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/countries/';
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
                       
                         if($this->Country->save($this->data)){
		           				$this->Session->setFlash("Country has been  added successfully"); 
                          	 $this->redirect('/admin/countries/index');   
                        }
                      }
             $this->set('data',$this->data); 
}
//end of admin_add
 /**
	* @method: admin_editcountry
	* @purpose: to     add countries in admin
	 
	**/
function admin_editcountry($countryid=NULL)
{
              	//$this->loadModel('City');
                    $this->layout='admin';
                    $conditions=array();
                 
                    $this->Country->id=$countryid;
                    $this->set('countryid',$countryid);
                    $conditions = array('Country.id='.$countryid);
                    $this->Country->set($this->data);
                    $this->set('countryId',$countryid);
   if(empty($this->data)){
	    $this->data = $this->Country->read();
	  }else if(!empty($this->data)){
  		if($this->Country->save($this->data)){
       	$this->Session->setFlash("Country  has been updated successfully"); 
        $this->redirect('/admin/countries/index');         
        }
      }
}
//end of edit country
/**
	* @method: admin_viewCountry
	* @purpose: to     add countries in admin
	 
	**/
function admin_viewCountry($countryid=NULL)
{
               $this->layout='admin';		
 	      $this->Country->id=$countryid;
              // Allow only authenticated users to access this action.
		   $this->checkUserSession();
             $conditions = array('Country.id'=>$countryid);
             $data=$this->Country->countryDetail1($conditions);
             $this->set(compact('data'));
}
//end of admin_viewCountry
         function admin_check_country() {	
			$username='';
			$options=array();
			$this->layout = 'ajax';
			Configure::write('debug',0);

 
			App::import('Model','Country');
			$this->Country= & new Country();
			if(!empty($this->data['Country']['country'])) {
		 	$country  = $this->data['Country']['country'];
		$options = $this->Country->find('first', array('conditions' => array('Country.country' => $country),'fields'=>array('Country.country')));
			$this->set('options',$options);
			}
			
		}
       
    }
?>