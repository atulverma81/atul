<?php
/**
	* Contactus Controller class
	* PHP versions 5.1.4
	* @date 09-December-2010
	* @Purpose:This controller handles Contactus pages of Dealership. For eg:- Admin can view posted enquiries etc.
	* @filesource
	* @author     Atul Verma
	* @revision   
	* @copyright  Copyright @ 2010 smartData
	* @version 0.0.1 
**/

class ContactsController extends AppController{

  	var $helpers 	= array('Html','Javascript','Ajax',"time",'Fck');	
	var $components = array ('RequestHandler','Email');
	var $paginate = array('limit' => 10, 'page' => 1, 'order'=>array('id'=>'desc'));

  	/**

	* @method      : beforeFilter

	* @description : Default check session of admin(Table: )

	* @param       : none

	* return       : none

	**/



	function beforeFilter(){

	  

	    if(isset($this->params['prefix']) && $this->params['prefix']=='admin'){

	      $this->checkUserSession();

	    }

	}
	
	
	/**
	* @method      : Index
	* @description : Home page of Contactus listing (Table: contactus )
	* @param       : none
	* return       : none
	**/
  
    public function admin_index(){    
        $this->layout='admin';
         //$this->set("expand_menu_links","contactus");
    	$condition	=array();
    	$actionCondition=array();
    	$separator	=array();
    	$urlSeparator	=array();
	$totalRecord	=0;
	
	  if(!empty($this->data)){
		
		if(isset($this->data['Contact']['action'])){
			$idList=$this->data['Contact']['idList'];		   
		if($idList){
		   $actionCondition=array("Contact.id IN ($idList) ");	
  		   
		     
      			  if($this->data['Contact']['action']=="delete"){				
      			   $this->Contact->deleteAll($actionCondition);
			  }
		    }
	      }else if (!empty($this->data['Contact']['searchRecord'])){

      		$title='';

      		$status='';

    		  if(!empty($this->data['Contact']['owner'])){

    		    $title= trim($this->data['Contact']['owner']);

    		  }

    		 
    		  $condition ="Contact.owner like '%".addslashes($title)."%'";

    	      }	    
    	    }

	$totalRecord = $this->Contact->find('count',array('conditions'=>$condition,'fields'=>'Contact.id'));	  
  	
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
	    
	     $this->set('contacts', $this->paginate('Contact',$condition));
	     
            if($this->RequestHandler->isAjax()) {
        			$this->layout='';
        			$this->viewPath = 'elements'.DS.'admin/contact/';
        			$this->render('index');
        		}
      
     	}

	
	/**
	* @method      : view
	* @description : view page of Contactus (Table: contacts )
	* @param       : none
	* return       : none
	**/	

	 public function admin_view($contactId=null){ 
        	$this->layout='admin';
		 $this->Contact->bindModel(array('hasOne'=>array(
                 		'Country'=>
				array(	'conditions' => array('Contact.country_id = Country.id'),
					'fields' =>     array('Country.country'),
					'foreignKey' => '0'	
				),				
                 )), false);
		$this->Contact->id=$contactId;

		if(empty($this->data)){
			$this->data=$this->Contact->read();
		}
		
	}

	/*_____________________________________________________________________________
*	@Function:	contactUs
*	@Description:	Display contactUs content
*	@param: none		
*	@return:
*	
  �������������������������������������������������������������������������������
*/
	function enquiry() {		
		//Setting layout
		$this->layout="front";
		$userDetail=array();
		$contacts=array();
		$userId='';
		App::import('Model','Contact');		
    		$this->Contact = & new Contact(); 
		App::import('Model','Content');		
    		$this->Content = & new Content(); 
	
		$contacts=$this->Content->find('first',array('conditions'=>array('Content.page_code'=>'contacts'))); 
		$this->set('metakeywords',$contacts['Content']['meta_keywords']);
		  $this->set('metadescription',$contacts['Content']['meta_description']);
		  $this->set('metatitle',$contacts['Content']['meta_title']);
		$this->set('pagetitle',$contacts['Content']['pagetitle']);
		$this->set('contents',$contacts);
	     
			
      		if(!empty($this->data)){
			           if(!empty($this->data['Contacts']['email']) && ($this->data['Contacts']['email']!='E-mail:')){

            			if($this->Contact->save($this->data['Contacts'])){
            	  $name=   @$this->data['Contacts']['firstname'];
            			$email=   @$this->data['Contacts']['email'];
            				$phone=   @$this->data['Contacts']['phone'];
            					$subject=   @$this->data['Contacts']['subject'];
            						$desc=   @$this->data['Contacts']['comments'];
            	  
            			   $msg="<table>  
       
        <tr>
            <td>Hello Admin,</td>
        </tr>
       
        <tr>
            <td><font color='#e47911'><b>Contact/Enquiry details are as follows:<br />
            </b></font></td>
        </tr>
        <tr>
            <td><strong>Name :</strong>$name</td>
        </tr>
        <tr>
            <td><strong>Email :</strong> $email</td>
        </tr>
        <tr>
            <td><strong>Phone :</strong>$phone</td>
        </tr>
        <tr>
            <td><strong>Subject :</strong> $subject</td>
        </tr>
        <tr>
            <td><strong>Comments :</strong>$desc</td>
        </tr>
		 <tr>
            <td><strong>Regards,</strong></td>
        </tr>
		 <tr>
            <td>$name</td>
        </tr>
   
</table>";

          $body = '';  
						$body =$msg;

						$subject = "CCS Org- Contact/Enquiry";
						
						// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

						
						$to='info@ccsorg.com';			
						 
						mail($to,$subject,$msg,$headers);
            			
            				$this->Session->setFlash(SEND_CONTACT_US); 
            				$this->redirect('/contacts/home');      		
            			}
            			}else{
                       $this->Session->setFlash('Please enter all fields.'); 
                  }
		}
	 }// end of aboutUs function
	
	


	function home() {		
		//Setting layout
		$this->layout="home";
		
	 }// end of index function
	 
	 function sitemap() {		
		  
		//Setting layout
		$this->layout="sitemap"; 
		 $this->create_captcha();
		
	 }// end of termsUse function
	  function create_captcha(){
		App::import("Component","Captcha"); //including captcha class  
		$this->Captcha =  new CaptchaComponent(); //creating an object instance  
		$this->Captcha->controller = & $this; //assign this conroller(CaptchaController) object to its captcha object's controller property.  
		$this->set('captcha_src',$captcha_src=$this->Captcha->create()); //create a capthca and assign to a variable 
 	}

	/**
	* @method      : update_state
	* @description : Used to update state list on select of country in searching
	* @param       : none
     	* return       : none
 	**/	
	function update_state() {	
  		$countryId=0;
  		$options=array();
  		$this->layout = 'ajax';
  		Configure::write('debug',0);
  		
  		App::import('Model','Region');
  		$this->Region = & new Region(); 
		App::import('Model','State');
  		$this->State = & new State(); 
  		if(!empty($this->data['Search']['country_id'])) {
  			$countryId = (int)$this->data['Search']['country_id'];
  				$options = $this->Region->find('list', array('conditions' => array('Region.country_id' => $countryId),'fields'=>array('Region.region'),'order'=>'region ASC'));
			if(empty($options)){

				$options = $this->State->find('list', array('conditions' => array('State.country_id' => $countryId),'fields'=>array('State.state'),'order'=>'state ASC'));
			}			
  			$this->set(compact('options'));
  		}
		
	}//end of update_state function


	/**
	* @method      : update_city
	* @description : Used to update city list on select of state in searching
	* @param       : none
     	* return       : none
 	**/	
	function update_city() {	
  		$stateId=0;
  		$options=array();
  		$this->layout = 'ajax';
  		Configure::write('debug',0);
  		
  		App::import('Model','City');
  		$this->City = & new City(); 
		
  		if(!empty($this->data['Search']['state_id'])) {
  			$stateId = (int)$this->data['Search']['state_id'];
  			$options = $this->City->find('list', array('conditions' => array('City.state_id' => $stateId),'fields'=>array('City.city'),'order'=>'city ASC'));
			
  			$this->set(compact('options'));
  		}
		
	}//end of update_city function

    
  } // end of class
 

?>
