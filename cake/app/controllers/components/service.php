<?php 
/**
 * Webserives for android application
 */

App::import('Vendor','RestUtils' ,array('file'=>'webservice/RestUtils.php'));
App::import('Vendor','Serializer' ,array('file'=>'webservice/Serializer.php')); 
App::import('Vendor','xmlParser' ,array('file'=>'webservice/xmlParser.php'));
 
class ServiceComponent extends Object{
     var $components = array('Common');

    
    function processWebservce($postContent = null){
    	App::import('Model', 'Event');
      	$this->Event = & new Event();
    	$xmlparser = new xmlParser();
    	$restUtils = new RestUtils();
    	$HTTP_RAW_POST_DATA = "";
    	//$unserializer = new XML_Unserializer($options);
		//$dataValues = $unserializer->unserialize($_POST['postData']);		
		$dataValues = ($HTTP_RAW_POST_DATA) ? $xmlparser->XML2Array(($HTTP_RAW_POST_DATA)) : $xmlparser->XML2Array(($postContent)         );
		if(is_array($dataValues) && count($dataValues) > 0) {
			$rootName = "search";
			$keyword = (is_array($dataValues['search']['keyword'])) ? '' : $dataValues['search']['keyword'];
			$zipcode = (is_array($dataValues['search']['zipcode'])) ? '' : $dataValues['search']['zipcode'];
			 if(!empty($keyword)) {  
      					    $find_keyword= trim($keyword);
      				  }
      				  if(!empty($zipcode)){
      					    $find_zipcode= trim($zipcode);
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
					$condition[] ="Event.event_keyword like '%".addslashes($keyword)."%' OR Event.zipcode like '%".addslashes($zipcode)."%'";
				      }
				   $result = $this->Event->find('all',array('conditions'=>array($condition)));   
				   return $result;
		       }else{
		       	return null;
		       }
    		} 
}
?>
