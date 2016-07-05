<?php 

class TypeHelper extends AppHelper
{
        var $helpers = array('Html');	
	function show($type)
	{
            switch($type) {
             
                case '2': $return = 'Primary';
                        break;
                case '3': $return = 'Secondary';
                        break;
                default: $return = $type;
                        break;    
                
            }    
	    return $this->output($return);
	}

}
?>