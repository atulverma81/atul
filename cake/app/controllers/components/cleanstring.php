<?php

class CleanstringComponent extends Object {
	var $data = array();
	var $not_required = array();

	//___Fuction to get the Content page detail :
	function cleanString($data, $not_required=''){ 
		App::import('Sanitize');
		if(empty($not_required))		
			$not_required = array();
		foreach($data as $key=>$string){
			if(!is_array($string)){
				if(!in_array($key, $not_required)){
					$data[$key] = Sanitize::html($string, true);
				}
			}
		}
		//pr($data);die;
		return $data;
	}
}

?>