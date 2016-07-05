<?php
/**
	* Class for handling miscellanious actions
	* 
	*
	* PHP versions 5.1.4
	* @filesource
	* @author     Sujeesh.V 
	* @link       http://www.supportresort.com/
	* @link       http://cribhut.com Cribhut
	* @copyright  Copyright © 2007 Cribhut
	* @version 0.0.1 
	*   - Initial release
	*/

class MiscComponent extends Object {

public $image_folder = 'app/webroot/img';
public $image_type = 0;
	public function calculateAge($dob)
	{
		 list($year, $month, $day) = explode("-", $dob);
		
		  $age = date('Y') - $year;
		
		  if (date('m') < $month) $age--;
		 // elseif (date('d') < $day) $age--;
		  
		  return $age;		
		
		/*$bYear = (int)substr($dob,0,4);
		$cYear = date("Y"); 
		$age   = $cYear - $bYear;
		return $age;*/
	}

	public function getRemoteIp()
	{
		$headers = apache_request_headers();
		if (array_key_exists('X-Forwarded-For',$headers)){
		  $hostname=$headers['X-Forwarded-For'];
		} else {
		  $hostname=$_SERVER["REMOTE_ADDR"];
		}
		return $hostname;
		//return $_SERVER['REMOTE_ADDR'];
	}
	public function isEmpty($variable)
	{
		if(empty($variable))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function createActivationCode()
	{
	 	$code  = rand(1000000,100000000);
		$actCode  = md5($code);
		return $actCode;
	}

	public function addQuotes($param)
	{	
		if(is_array($param))
		{
			foreach($param as $key=>$value)
			{	
				$param[$key]  = "'".mysql_real_escape_string($value)."'";
			}
			return $param;
		
		}
		else if(is_string($param))
			return "'".mysql_real_escape_string($param)."'";
		
	}

		function generate_unique_string($length=8)
	{
		# first character is capitalize
		$str =  chr(mt_rand(65,90));    // A-Z	   
		# rest are either 0-9 or a-z
		for($k=0; $k < $length - 1; $k++)
		{
			$probab = mt_rand(1,10);
			if($probab <= 8)   // a-z probability is 80%
				$str .= chr(mt_rand(97,122));
			else            // 0-9 probability is 20%
				$str .= chr(mt_rand(48, 57));
		}
		return $str;
	}

	function look_for_smilies($str)	{	
	App::import("Helper","html");
	$html=& new htmlHelper();
	$imoticons = array(
	':)'	=>	$html->image("/img/smiley/regular_smile.gif"),
	':-)'	=>	$html->image("/img/smiley/shades_smile.gif"),
	':D'	=>	$html->image("/img/smiley/teeth_smile.gif"),
	':P'	=>	$html->image("/img/smiley/tounge_smile.gif"),
	':d'	=>	$html->image("/img/smiley/devil_smile.gif"),
	':S'	=>	$html->image("/img/smiley/confused_smile.gif"),
	':L'	=>	$html->image("/img/smiley/shades_smile.gif"),
	';)'	=>	$html->image("/img/smiley/wink_smile.gif"),
	 ':('	=>	$html->image("/img/smiley/sad_smile.gif"),
	':()'	=>	$html->image("/img/smiley/cry_smile.gif")
		);

	return str_ireplace(array_keys($imoticons),array_values($imoticons),$str);
}

function _smilies($str)	{
	
	return $this->look_for_smilies($str);
	//return preg_replace("/\[smloc\](.*)\[\/smloc\]/",'<img src="/img/smiley/$1">',$this->look_for_smilies($str));
}

/*
//creating propotionate image dimentions
image_path - full absolute path to image file
	max_width - maximum width sought
	max_height - maximum height sought
*/

function custom_image_dim($image_path,$max_width,$max_height)	{

	if(!file_exists($image_path))
	return array('width'=>$max_width,'height'=>$max_height);
	
	$size = getimagesize($image_path);
	$width = $size[0];
	$height = $size[1];

	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;

	if( ($width <= $max_width) && ($height <= $max_height) )
	{
	   $tn_width = $width;
	   $tn_height = $height;
	}
	elseif (($x_ratio * $height) < $max_height)
	{
	   $tn_height = ceil($x_ratio * $height);
	   $tn_width = $max_width;
	}
	else
	{
	   $tn_width = ceil($y_ratio * $width);
	   $tn_height = $max_height;
	}

	return array('width'=>$tn_width,'height'=>$tn_height);

}

	/**
	  *Function Name:createRandomPassword
	  *Description:To create a random password
	  */
	  function createRandomPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
		}
    return $pass;
	}
	
	function resize_img($imgPath, $maxWidth, $maxHeight, $directOutput = true, $quality = 90, $verbose,$imageType)
	{
	   // get image size infos (0 width and 1 height,
	   //     2 is (1 = GIF, 2 = JPG, 3 = PNG)
	  
		 $size = getimagesize($imgPath);
			$arr=explode(".",$imgPath);		
	   // break and return false if failed to read image infos
		 if(!$size){
		   if($verbose && !$directOutput)echo "<br />Not able to read image infos.<br />";
		   return false;
		 }

	   // relation: width/height
		 $relation = $size[0]/$size[1];
		 
		 $relation_original = $relation;
	   
	   
	   // maximal size (if parameter == false, no resizing will be made)
		 $maxSize = array($maxWidth?$maxWidth:$size[0],$maxHeight?$maxHeight:$size[1]);
	   // declaring array for new size (initial value = original size)
		 $newSize = $size;
	   // width/height relation
		 $relation = array($size[1]/$size[0], $size[0]/$size[1]);


		if(($newSize[0] > $maxWidth))
		{
			$newSize[0]=$maxSize[0];
			$newSize[1]=$newSize[0]*$relation[0];
			/*if($newSize[1]>180)
			{
				$newSize[1]=180;
				$newSize[1]=$newSize[0]*$relation[0];
			}*/
			
		
			$newSize[0]=$maxWidth;
			$newSize[1]=$newSize[0]*$relation[0];		
			
		}
		
			$newSize[0]=$maxWidth;
			$newSize[1]=$newSize[0]*$relation[0];	
		
			 
		
		/*
		if(($newSize[1] > $maxHeight))
		{
			$newSize[1]=$maxSize[1];
			$newSize[0]=$newSize[1]*$relation[1];
		}
		*/
		 // create image

		   switch($size[2])
		   {
			 case 1:
			   if(function_exists("imagecreatefromgif"))
			   {
				 $originalImage = imagecreatefromgif($imgPath);
			   }else{
				 if($verbose && !$directOutput)echo "<br />No GIF support in this php installation, sorry.<br />";
				 return false;
			   }
			   break;
			 case 2: $originalImage = imagecreatefromjpeg($imgPath); break;
			 case 3: $originalImage = imagecreatefrompng($imgPath); break;
			 default:
			   if($verbose && !$directOutput)echo "<br />No valid image type.<br />";
			   return false;
		   }


		 // create new image

		   $resizedImage = imagecreatetruecolor($newSize[0], $newSize[1]); 

		   imagecopyresampled($resizedImage, $originalImage,0, 0, 0, 0,$newSize[0], $newSize[1], $size[0], $size[1]);

		$rz=$imgPath;

		 // output or save
		   if($directOutput)
			{
			 imagejpeg($resizedImage);
			 }
			 else
			{
				
				 $rz=preg_replace("/\.([a-zA-Z]{3,4})$/","".$imageType.".".$arr[count($arr)-1],$imgPath);
					imagejpeg($resizedImage, $rz, $quality);
			 }
		 // return true if successfull
		   return $rz;
	}
/**
 * Returns a time difference.
 * @param string $startTime Datetime string
 * @param string $endTime  Datetime string
 */
function timeDifference($startTime, $endTime = false)
{
    $endTime = $endTime ? $endTime : time();

    if ($endTime > $startTime)
    {
        $diff = $endTime - $startTime;

        $hours = floor($diff/3600);
        $diff = $diff % 3600;

        $minutes = floor($diff/60);
        $diff = $diff % 60;

        $seconds = $diff;

        return str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutes, 2, '0', STR_PAD_LEFT) . ':' . str_pad($seconds, 2, '0', STR_PAD_LEFT);
    }
    else
    {
        return 'Error: Start time should be less than end time!';
    }
}

function customWordWrap($string,$len)
{
$length = strlen($string);

for ($i=0; $i<=$length; $i=$i+1)
    {
    $char = substr($string, $i, 1);
    if ($char == "<")
        $skip=1;
    elseif ($char == ">")
        $skip=0;
    elseif ($char == " ")
        $wrap=0;

    if ($skip==0)
        $wrap=$wrap+1;

    $returnvar = $returnvar . $char;

    if ($wrap>$len) // alter this number to set the maximum word length
        {
        $returnvar = $returnvar . "<wbr>";
        $wrap=0;
        }
    }

return $returnvar;

}
	
}