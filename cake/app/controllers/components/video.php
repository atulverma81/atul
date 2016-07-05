<?php
	/**
	* Video Component
	* 
	*
	* PHP versions 5.1.4
	* @filesource
	* @author      
	* @link      
	* @link       
	* @copyright  Copyright © 2007 
	* @version 0.0.1 
	*   - Initial release
	*/

 class VideoComponent extends Object {
	//function for checking video duration
	public function checkVideoDuration($video)
	{
	      $videofile=WWW_ROOT.$video;
	      ob_start();
	      passthru("/usr/bin/ffmpeg -i \"{$videofile}\" 2>&1");
	      $duration = ob_get_contents();
	      ob_end_clean();
	      
	      $search='/Duration: (.*?),/';
	      $duration=preg_match($search, $duration, $matches, PREG_OFFSET_CAPTURE, 3);
	      //TEST ECHO
	      return $matches[1][0];
	}
	
	//function for converting video files
       function uploadFrontVideoFile($input , $safe_videoFile)
       {
           //$uploaddir is for videos before conversion
	      $uploaddir = WWW_ROOT.'img'.DS.'tmp_videos/';
		 
	   //$live_dir is for videos after converted to flv
	      $live_dir = WWW_ROOT.'img'.DS.'videos/';
		 
	   //$live_img is for the first frame thumbs.
	      $live_img = WWW_ROOT.'img'.DS.'videos'.DS.'thumb/';
		 
	      //$seed = rand(1,2009) * rand(1,10);
	      $upload = $input;
	       $uploadfile = $uploaddir .$upload;
	
	      $base = basename($uploadfile, $safe_videoFile['ext']);
	      $new_file = $base.'flv';
	      $new_image = $base.'jpg';
	      $new_image_path = $live_img.$new_image;
	      $new_flv = $live_dir.$new_file;
	    
	     //ececute ffmpeg generate flv
			 exec('ffmpeg -i '.$uploadfile.' -f flv -s 320x240 '.$new_flv.'');
			//execute ffmpeg and create thumb
	     exec('ffmpeg  -i '.$uploadfile.' -f mjpeg -vframes 1 -s 150x150 -an '.$new_image_path.'');
	     if(file_exists($uploadfile))
	     {
		 unlink($uploadfile);
	     }
	     return array ($new_file , $new_image); // return flv file name
       }

	
 }