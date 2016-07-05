<?php
ob_start();

    /**
    * Countries Classes Controller
    *
    * PHP 5.2+
    *
    * Copyright 2010,  smartData (http://www.smartdatainc.com)
    * @date 12-Dec-2010
    * @author smartData
    * @version 0.0.1
    **/
    class StatesController extends AppController {
	/**
	 * Uses array
	 *
	 * @var array
	 */
	public $uses = array('State');
	//component
	public $components = array('Pagination','RequestHandler','Cookie','Misc','Email');
	/**
	 * Helpers
	 *
	 * @var array
	 **/
	var $helpers 	    = array('Html','Javascript','Ajax','Pagination','Calendar');
	/**
	 * Paginate
	 *
	 * @var array
	 **/
	public $paginate = array(
            'State' => array(
                'contain'    => false,
                'limit'      =>'20',
                'order'      => 'State.state asc'
            )		
        );
	/**
	* beforeFilter callback
	*
	* @return void
	**/
	
	function beforeFilter(){

	  //$this->_paginatorURL();
		
	    if(isset($this->params['prefix']) && $this->params['prefix']=='admin'){
		 
	      	//$this->checkUserSession();
		if(!isset($this->passedArgs["page"])){
			$this->Session->del('sessionCon');
		}
	       $this->layout = 'admin';

	    }

	}
	
        /**
        * @method: admin_add
        * @purpo$countries = $this->State->ge$this->Region->recursive=2;tCountryList();
    	$this->set('countries', $countries);se: to add a Country 
        * @param none
        * @return void
        **/
	public function admin_add(){
	       //Allow only authenticated users to access this action.
	     $this->checkUserSession(); 
          //to get country list
         App::import('Model','Country');
         $this->Country= new Country();
         $countries=$this->Country->find('list',array('fields'=>'id, country'));
         $this->set('countries',$countries);
	//to get country list	 
	    if(!empty($this->data)) {
			$condition=array();
			$existState=array();
			//check if state is already exist
			if(!empty($this->data['State']['country_id'])){
				$countryId='';
				$countryId=trim($this->data['State']['country_id']);
				$condition[]="State.country_id = $countryId";
				
				if(!empty($this->data['State']['state'])){
					$state=trim($this->data['State']['state']);
					$condition[]= "State.state LIKE '$state'";
				}

				$existState=$this->State->find('first',array('conditions'=>array($condition)));
				if(isset($existState['State']['id'])){
					 $this->State->id = $existState['State']['id'];
				}
				
			}
			
			
		if(empty($existState)){		
			if($this->State->save($this->data, array('validate' => 'first'))) {
				$this->Session->setFlash('State has been added successfully');
				$this->redirect(array('controller' => 'states', 'action' => 'admin_index'));
			}
		}else{ 
				$this->Session->setFlash('State name already exist.');
				$this->render();
			}
	        }
}
//end of add function	
	/**
        * @method: admin_edit
        * @purpose: to edit a  state
        * @param $id
        * @return void
        **/
	public function admin_edit($id = null) {
          // Allow only authenticated users to access this action.
		   //$this->checkUserSession(); 
		  $countries = $this->State->getCountryList();
    	$this->set('countries', $countries);
                 	    if(empty($this->data)) {
	               $res = $this->State->query("select * from states where id='".$id."'");
    	               $this->set('data', $res);
	               }else{
	     $this->data['State']['country_id']=$_POST['StateCountryId'];
 if($this->State->save($this->data, array('validate' => 'first'))){
		    $this->Session->setFlash('State was successfully updated');
		    $this->redirect(array('controller' => 'states', 'action' => 'admin_index'));                
		}
	    }
}	
/**
	* @method: admin_deactivate
	* @purpose: to deactivate an country
	* @param $id
	* @return void
**/  
function admin_delete($id=null){		  
		   //Allow only authenticated users to access this action.
		  //$this->checkUserSession();		  
		  //setting layout
		  $this->layout='ajax';
         // check admin session id
		 $userid=$this->Session->read('Admin.id') ;
     	 //delete records	
		 $this->State->del($id);
	         $this->redirect("/admin/states/index");
 }// end of admin_delete function  
       /**
        * @method:index
        * @purpose: to view index page
        * @param $id
        * @return void
        **/
	public function admin_index(){

                  $separator	=array();
      	          $urlSeparator	=array();
      	          $totalRecord	=0;
		
     	          $this->set('separator','');
	          $this->set('urlSeparator','');
                  $this->layout='admin';
      		 $this->State->bindModel(array('belongsTo'=>array(
                'Country'=>array('fields' => array('Country.country')),       
                 )), false);
                 App::import('Model','Country');
                 $this->Country= new Country();
                 $condition = array();
                 $this->set('countries',$this->Country->CountryList($condition));
				 $this->set('states',$this->State->StateList($condition));

	 	if(!empty($this->data)){
                   if(isset($this->data['State']['action'])){
                 	$idList=$this->data['State']['idList'];		   
			if($idList){

				$actionCondition=array("State.id IN ($idList) ");
					if($this->data['State']['action']=="delete"){
						$this->State->deleteAll($actionCondition);
					}     			 
		                     }
    
	      		} else if (!empty($this->data['State']['searchRecord'])){
    
				if(!empty($this->data['State']['state'])){
				$title= trim($this->data['State']['state']);
				$condition="State.state like '".addslashes($title)."%'";
								}
			
				if(!empty($this->data['State']['country_id'])){
					$title= trim($this->data['State']['state']);
					$id=trim($this->data['State']['country_id']);
					$condition="State.state like '".addslashes($title)."%' AND State.country_id=".$id;
        	                }
				 $this->Session->write('sessionCon',$condition);
				
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
			$condition=$this->Session->read('sessionCon');

        	    }

		$totalRecord=$this->State->find('list',array('conditions'=>$condition,'fields'=> array('State.id'))); 
		
                 if(!empty($totalRecord)){ 
	  	                  $this->set('totalRecords',count($totalRecord)); 
		           }

           $urlSeparator=implode("/",$urlSeparator);
	    $this->set('separator','');
	   $this->set('urlSeparator',$urlSeparator);	 
		$this->State->recursive=2;

	   $this->set('stateList',$this->paginate('State',$condition));
          if($this->RequestHandler->isAjax()) {
        			$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/states/';
        			$this->render('index');
        		}
}

	/**
        * @method: view
        * @purpose: to view a state
        * @param $id
        * @return void
        **/
function admin_viewState($stateid=NULL)
{
               $this->layout='admin';		
 	      $this->State->id=$stateid;
	  App::import('Model','Country');
      	$this->Country= new Country();
  	// Allow only authenticated users to access this action.
	 //$this->checkUserSession();
 	$conditions = array('State.id'=>$stateid);
        $condition=array();
        $conditions =  array('State.id'=>$stateid);
        $data=$this->State->stateDetail1($conditions);
        //to set name of country
          $cid=$data[0]['State']['country_id'];
          $condition1 =  array('Country.id'=>$cid);
          $dtc= $this->Country->CountryList($condition1); 
           foreach($dtc as $in=>$cn){
                       $cn;
            }
            $this->set('country',$cn);
          //to set name of country
            $this->set('data',$data);
          //to set name of country 
           $this->set('data',$data);
}
//end of view state
/**
        * @method:  update
        * @purpose: to  update a state
        * @param $id
        * @return void
        **/

function admin_editState($stateid)
{
	$this->layout='admin';
	  App::import('Model','Country');
      	$this->Country= new Country();
  	// Allow only authenticated users to access this action.
	 //$this->checkUserSession();
 	$conditions = array('State.id'=>$stateid);       
        $condition=array();
        $this->set('countries',$this->Country->CountryList($condition));
        $this->set('stateId',$stateid);
        $this->State->id=$stateid;
 	if(empty($this->data)){
	    	$this->data = $this->State->read();
	 }else if(!empty($this->data)){
		$condition=array();
			$existState=array();
			//check if state is already exist
			if(!empty($this->data['State']['country_id'])){
				$countryId='';
				$condition[]="State.id NOT IN ($stateid)";
				$countryId=trim($this->data['State']['country_id']);
				$condition[]="State.country_id = $countryId";
				
				if(!empty($this->data['State']['state'])){
					$state=trim($this->data['State']['state']);
					$condition[]= "State.state LIKE '$state'";
				}

				$existState=$this->State->find('first',array('conditions'=>array($condition)));
				if(isset($existState['State']['id'])){
					 $this->State->id = $existState['State']['id'];
				}
				
			}

			if(empty($existState)){	
				if($this->State->save($this->data)){
					$this->Session->setFlash("State has been updated  successfully"); 
					$this->redirect('/admin/states/index');         
				}
			}else{ 
				$this->Session->setFlash('State name already exist.');
				$this->render();
			}
              }        
}
//end of update state
}
?>