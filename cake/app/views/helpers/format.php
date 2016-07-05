<?php 
class FormatHelper extends Helper{	
	//add html entities for string going to print
    function html_entities($string){
        return htmlentities($string,ENT_QUOTES);
    }
	
	//show date format
	function date_format($date){
		$date = strtotime($date);
		if(!empty($date)){
			return date(Configure::read('DATE_FORMAT'),$date);
		}else{
			return 'N/A';
		}
	}
	//show date format
	function date_time_format($date){ 
		$date = strtotime($date);
		if(!empty($date)){
			return date(Configure::read('DATE_TIME_FORMAT'),$date);
		}else{
			return 'N/A';
		}
	}
/** 
	@function:		money
	@description:		change the money format
	@params:		NULL
	@Created by: 		ARUN KUMAR GUPTA
	@Modify:		NULL
	@Created Date:		23-02-2010
	*/	
	function money($amount=0.0,$decimal=0){
		$amt=explode('.',$amount);	
		$length=strlen(@$amt[1]);	
		if($length>2)
			$decimal=2;
		if(empty($amt[1])){
			if(empty($decimal))
				return number_format($amount,0);
			else
				return number_format($amount,$decimal);
		}
		else{
			if(empty($decimal))
				return number_format($amount,0);
			else
				return number_format($amount,$decimal);
		}
		
	}

/** 
	@function:		big_money
	@description:		change the money format
	@params:		NULL
	@Created by: 		Deepak Mishra
	@Modify:		NULL
	@Created Date:		16 july 2010
	*/	
	function big_money($amount=0.0, $divided =1, $decimal=2){
		if(empty( $amount ))		 
			return '-NA-';

		if( $amount >= 1000000000000 ){
			$divided = 1000000000000;
		}elseif( $amount >= 1000000000 ){
			$divided = 1000000000;
		}elseif( $amount >= 1000000 ){
			$divided = 1000000;
		}elseif( $amount >= 1000 ){
			$divided = 1000;
		}

		$amount = $amount/$divided;
		$amount = ceil($amount);
		$amount = number_format($amount , 2, '.', '');
		$amount = $amount.' '.$this->big_money_title($divided );
		return $amount ;

	}
/** 
	@function:		big_money_title
	@description:		display big money title
	@params:		NULL
	@Created by: 		Deepak Mishra
	@Modify:		NULL
	@Created Date:		16 july 2010
	*/	
	function big_money_title($divided=1){

		$array = array(
		'1'		=>'',
		'10'		=>'Ten',
		'100'		=>'Hundread',
		'1000'		=>'Thousand',
		'10000'		=>'Ten Thousand',
		'100000'	=>'Lakh',
		'1000000'	=>'Million',
		'10000000'	=>'Ten Million',
		'100000000'	=>'Hundread Million',
		'1000000000'	=>'Billion',
		'10000000000'	=>'Ten Billion'
		);

		return $array[$divided];	
	}
	
/** 
	@function:		string
	@description:		display the string
	@params:		NULL
	@Created by: 		Deepak Mishra
	@Modify:		NULL
	@Created Date:		23-03-2010(DD-MM-YYYY)
	*/	
	function string($string='',$length=10,$del=' -NA -'){
		$string = trim($string);
		$string = strip_tags($string);
		if($del==-1)
			$del="&nbsp;";
		return (!empty($string)?(strlen($string)>$length?substr($string,0,$length).'...':$string):$del);
		
	}
     /** 
	@function:		time_difference
	@description:		return the string in month
	@params:		NULL
	@Created by: 		Deepak Mishra
	@Modify:		NULL
	@Created Date:		8 july 2010
	*/
	function time_difference($from='',$to='',$difference=2592000){
		
		if(empty($from))
			$from=time();
		else
			$from=strtotime($from);
	
		if(empty($to))
			$to=time();
		else
			$to=strtotime($to);		

		return ($to - $from) / $difference;

          return;
	}
     
     
     /** 
	@function:		get_date_diff
	@description:		return the difference b/w two dates
	@params:		NULL
	@Created by: 		Simarjeet Kaur
	@Modify:		NULL
	@Created Date:		 Aug 17, 2010
	*/
     function get_date_diff($dateFrom, $dateTo) {
          $from   = $this->_isValidDate($dateFrom);
          $to     = $this->_isValidDate($dateTo);
          $yearinseconds  = (60*60*24*365.242199);
          $monthinseconds = (60*60*24*30.4);
          $dayinseconds   = (60*60*24);
          $hourinseconds  = (60*60);
          $minuteinseconds = 60;
          if($from && $to) {
               $dateDiff = $this->_getDiff($from, $to);
               $r = $dateDiff;
               $dd['years'] =     floor ( $dateDiff / $yearinseconds );
               $r -= $dd['years']*$yearinseconds;
               $remainder['years'] = $r/$yearinseconds;
               $dd['months'] =    floor ($r / $monthinseconds);
               $r -= $dd['months']*$monthinseconds;
               $remainder['months'] = $r/$monthinseconds;
               $dd['days']  =     floor ($r / $dayinseconds );
               $r -= $dd['days']*$dayinseconds;
               $remainder['days'] = $r/$dayinseconds;
               $dd['hours'] =     floor ($r  / $hourinseconds);
               $r -= $dd['hours']*$hourinseconds;
               $remainder['hours'] = $r/$hourinseconds;
               $dd['minutes'] =   floor ($r / $minuteinseconds);
               $r -= $dd['minutes']*$minuteinseconds;
               $remainder['minutes'] = $r/$minuteinseconds;
               $dd['seconds'] =   $r; // $dateDiff;
               $remainder['seconds'] = 0;
               $i =0  ;
               foreach ($dd as $period => $amt) {
                    echo '<br>'.$i++ ;
                    echo '-- dd --'.$dd[$period];
                    echo '<br>remn---'.$remainder[$period];
                    //echo $remainder[$period];
                    if ($remainder[$period] >= 0.94) {
                         
                        $return = (__('almost',true)." ".($amt+1). " ".__n(rtrim($period,"s" ), $period, $amt+1, true));
                    }
                    else if( ($dd[$period] > 0 ) && ($remainder[$period] > 0 && $remainder[$period]  <= 0.3) ) {
                         
                        $return = (__('over',true)." ".($amt). " ".__n(rtrim($period, "s"), $period, $amt, true));   
                    } else {
                       // continue;
                       $return = '';
                    }
               }
               echo 'ret val'.$return;
               return $return;
          }
          return false;
     } //eof
     
     function _getDiff($from = array() , $to = array() ) {
        $dateDiff =     mktime( $to['hour']    , $to['minutes']   , $to['seconds'] ,
                        $to['month']   , $to['day']       , $to['year'] )
                        -
                        mktime( $from['hour']  , $from['minutes'] , $from['seconds'] ,
                        $from['month'] , $from['day']     , $from['year'] );
        return abs($dateDiff);
    }
    
    function _isValidDate( $sDate = "01/01/1980 00:00:00" ) {
        $dateString = split( " "    , $sDate      );
        $dateParts  = split( "[/-]" , $dateString[0] );
        $dateParts2 = isset($dateString[1]) ? split( "[:]"  , $dateString[1] ) : array('00','00','00');
        if( !checkdate($dateParts[1], $dateParts[2], $dateParts[0]) )
        {  return false; }
        return array
               (
                 'month'   => $dateParts[1] ,
                 'day'     => $dateParts[2] ,
                 'year'    => $dateParts[0] ,
                 'hour'    => $dateParts2[0] ,
                 'minutes' => $dateParts2[1] ,
                 'seconds' => $dateParts2[2]
               );
    }
    
	function getDateFrmt($date, $frmt)
	{
	   if($date!='')
	   {
		$newDate = date($frmt, strtotime($date));
	   
		return $newDate;
	   }
	   else
	   {
		return '';
	   }
	} 
}?>