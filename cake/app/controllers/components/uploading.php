<?php
/**
        * CommonComponent  class
        * PHP versions 5.1.4
        * @date 24-may-2010
        * @Purpose: These are common function used  in whole application
        * @filesource
        * @author     Atul Verma
        * @revision   
        * @copyright  Copyright � 2010 smartData
        * @version 0.0.1 
**/

 class UploadingComponent extends Object{
     var $components = array('File','Thumb','Email');
     var $controller = null;
     var $helpers 	  = array('Html','Javascript','Ajax','Time');	

     function startup(&$controller) {
	$this->controller = $controller;
    }

     
    /**
      * @Date: 07-July-2010
      * @Method : checkImageFile    
      * @Purpose: Used to check image file format
    **/

   function checkImageFile($input){
    $ext = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPEG', 'JPG', 'GIF');
    $extfile = substr($input['name'],-4); 
    $extfile = explode('.',$extfile);
    $good = array();
    if(!empty($extfile[1])){
    $extfile = $extfile[1];
    }
    if(in_array($extfile, $ext)){
          $good['safe'] = true;
 		 $good['ext'] = $extfile;
    }else{
          $good['safe'] = false;
      }
     return $good;
   }

 
    /**
      * @Date: 07-July-2010
      * @Method : uploadImageFile
      * @Purpose: Used to upload image file on server
    **/
    function imageExt($tFile)
    {
	     return substr($tFile,strrpos($tFile,".")+1,strlen($tFile));
    }
    function uploadImageFile($input){ 
       $original  = $input;
       $big_file  = 'property'.time().'.'.$imgExt;
      
       
       $this->File->destPath = WWW_ROOT.'img'.DS.'properties/original';
       $path2 = WWW_ROOT.'img'.DS.'properties/';
	$path = WWW_ROOT.'img'.DS.'properties/thumb/';
	$path1 = WWW_ROOT.'img'.DS.'properties/slider/';
	
       $file = $input;

        if($file){
			//copy and crop first image
			@copy($this->File->destPath.'/'.$file,$path.'/'.$big_file);
			
			$this->Thumb->getResized($big_file, $mime, $path, 150, 112, 'ffffff', true, true,$path, false);

			//copy and crop second image
			@copy($this->File->destPath.'/'.$file,$path1.'/'.$big_file);
			
			$this->Thumb->getResized($big_file, $mime, $path1, 694, 270, 'ffffff', true, true,$path1, false);
			
			//copy and crop third image
			@copy($this->File->destPath.'/'.$file,$path2.'/'.$big_file);
			
			$this->Thumb->getResized($big_file, $mime, $path2, 550, 550, 'ffffff', true, true,$path2, false);
			
			return  $big_file;
		  }
	   }

  
}// end of class 
?>
