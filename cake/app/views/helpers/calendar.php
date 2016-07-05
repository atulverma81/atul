<?php	
 
/**
* Calendar Helper for CakePHP
*
* Copyright 2007-2008 John Elliott
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
*
* @author John Elliott
* @copyright 2008 John Elliott
* @link http://www.flipflops.org More Information
* @license http://www.opensource.org/licenses/mit-license.php The MIT License
*
*/
 
class CalendarHelper extends Helper
{
 
	var $helpers = array('Html', 'Form');
 
/**
* Generates a Calendar for the specified by the month and year params and populates it with the content of the data array
*
* @param $year string
* @param $month string
* @param $data array
* @param $base_url
* @return string - HTML code to display calendar in view
*
*/
 
function calendar($year = '', $month = '', $data = '', $base_url ='',$parentHomePage=0)
	{	
	$str = '';
	$month_list = array('january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
	$day_list = array('Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
	$day = 1;
	$today = 0;
 
	if($year == '' || $month == '') { // just use current yeear & month
		$year = date('Y');
		$month = date('M');
	}
 
 
 
	$flag = 0;
 
	for($i = 0; $i < 12; $i++) {
		if(strtolower($month) == $month_list[$i]) {
			if(intval($year) != 0) {
				$flag = 1;
				$month_num = $i + 1;
				break;
			}
		}
	}
 
 
	if($flag == 0) {
		$year = date('Y');
		$month = date('F');
		$month_num = date('m');
	}
 
	$next_year = $year;
	$prev_year = $year;
 
	$next_month = intval($month_num) + 1;
	$prev_month = intval($month_num) - 1;
 
	if($next_month == 13) {
		$next_month = 'january';
		$next_year = intval($year) + 1;
	} else {
		$next_month = $month_list[$next_month -1];
	}
 
	if($prev_month == 0) {
		$prev_month = 'december';
		$prev_year = intval($year) - 1;
	} else {
		$prev_month = $month_list[$prev_month - 1];
	}
 
	if($year == date('Y') && strtolower($month) == strtolower(date('F'))) {	
	// set the flag that shows todays date but only in the current month - not past or future...
		$today = date('j');
	}
 
	$days_in_month = date("t", mktime(0, 0, 0, $month_num, 1, $year));
 
	$first_day_in_month = date('D', mktime(0,0,0, $month_num, 1, $year));  	
	
	$str=$this->ParentCalender($data,$base_url,$prev_year,$prev_month,$month,$year,$next_year,$next_month,$day_list,$days_in_month,$day,$day_list,$first_day_in_month,$days_in_month,$month_num);	
	echo $str;
		
	}
	/** 
	@function	:	ParentCalender
	@description	:	Display parent calendar
	@params		:	null
	@return		:	string
	@created	:	06-01-2010
	@credated by	:	Arun kumar Gupta
	**/

	function ParentCalender($data,$base_url,$prev_year,$prev_month,$month,$year,$next_year,$next_month,$day_list,$days_in_month,$day,$day_list,$first_day_in_month,$days_in_month,$month_num){ 
		
		$str = '<div class="calendar" id="calendar"><form name="calendarFrm">'; 
		$str .= '<ul><li class="month">'; 
// 		$str .= $this->Html->link(__(' << ', true), 'calendar/' . $prev_year . '/' . $prev_month); 
// 	
// 		$str .= '' . ucfirst($month) . ' ' . $year . '';
// 		
// 		$str .= $this->Html->link(__(' >> ', true), 'calendar/' . $next_year . '/' . $next_month);
		$str .= $this->Html->link(__(' << ', true), 'javascript:void(0)',array('onClick'=>'return updateCalenderDiv('.$prev_year.',"'.$prev_month.'")'),false,false); 

		$str .= ' ' . ucfirst($month) . ' ' . $year . ' ';	
		//$str .= $this->Html->link($this->Html->image('calender-arrow-right.gif',array('border'=>0)), $base_url . $next_year . '/' . $next_month,false,false,false);
		$str .= $this->Html->link(__(' >> ', true), 'javascript:void(0)',array('onClick'=>'return updateCalenderDiv('.$next_year.',"'.$next_month.'")'),false,false);  
		$str .= '</li>'; 
		for($i = 0; $i < 7;$i++) {
					$str .= '<li class="date">' . $day_list[$i] . '</li>';
		}
	
		$str .= '</ul>';
		$today=date('d');
		$month=date('m');
		while($day <= $days_in_month) {
			$str .= '<div class="clear"></div>';	
	
			for($i = 0; $i < 7; $i ++) {
	
				$cell = '&nbsp;';
	
				if(isset($data[$day])) {
					$cell = $data[$day];
				}
	
				$class = '';
				if($day==$today)
					$class=' class="day" ';
				else
					$class='class="day" ';
	
				if(($first_day_in_month == $day_list[$i] || $day > 1) && ($day <= $days_in_month)) {
				$str .='
				<div '.$class.' onClick="return MakeAcitveClass(this)" id="day_'.$day.'">
					<ul class="dd"><li class="dd">'.$day.' </li>';
	
					$str.=' <li class="pencil">';
					if(!empty($data['EnrolledClass'][$day])){
						$str.=count($data['EnrolledClass'][$day]); 
						}
					else
						$str.='  ';
					$str.='</li>';
					//pr($data['ChildInCal']);die;
					if(!empty($data['ChildInCal'][$day]))
						foreach($data['ChildInCal'][$day] as $color=>$Totalchild){
						$str.='<li class="childcolor  '.$color.'">'.$Totalchild.' </li>';	
						}
	$str.=				'</ul>
				</div>';
	
	$day++;
				} else { 
					$str .='<div class="blank"><ul ><li>&nbsp;</li></ul></div>';
				}
			}
	
			}
	$separator=1; 
	$str.='<div class="clear"></div><br><ul>';
		if(!empty($data['Child'])){
			foreach($data['Child'] as $class=>$child){
				if($separator % 3==0){
					$str.='</ul><div class="clear"></div><br><ul>';
				}
				$str.='<li class="childcolor '.$class.'">  </li><li class="legend">'.$child.'</li>';
		
			$separator++;	
			}
		$str.='</ul><div class="clear"></div>'; 
		}	
		
		$str .= '</form></div>';
	
		return $str;
	}
/** 
	@function	:	ParentDashboardCalender
	@description	:	Display parent calendar
	@params		:	null
	@return		:	string
	@created	:	06-01-2010
	@credated by	:	Arun kumar Gupta
	**/

	function ParentDashboardCalender($data,$base_url,$prev_year,$prev_month,$month,$year,$next_year,$next_month,$day_list,$days_in_month,$day,$day_list,$first_day_in_month,$days_in_month,$month_num){

	$str ='
	<!--Calender Section Starts Here  -->
		<div class="calender" id="calender">
        	<div class="calhead">
            	<div class="monthinfo"><h3>';
//		$str .= $this->Html->link($this->Html->image('calender-arrow-left.gif',array('border'=>0)), $base_url . $prev_year . '/' . $prev_month,false,false,false);
		$str .= $this->Html->link($this->Html->image('calender-arrow-left.gif',array('border'=>0)), 'javascript:void(0)',array('onClick'=>'return updateCalenderParentHomePage('.$prev_year.',"'.$prev_month.'")'),false,false);


		$str .= ' ' . ucfirst($month) . ' ' . $year . ' ';	
		//$str .= $this->Html->link($this->Html->image('calender-arrow-right.gif',array('border'=>0)), $base_url . $next_year . '/' . $next_month,false,false,false);
		$str .= $this->Html->link($this->Html->image('calender-arrow-right.gif',array('border'=>0)), 'javascript:void(0)',array('onClick'=>'return updateCalenderParentHomePage('.$next_year.',"'.$next_month.'")'),false,false);
	$str.=	'</h3></div>
                <div class="dayview" style="display:none;"><a href="#">Switch to Day View >></a></div>
                <div class="clear"></div>
            </div>
			
            <div class="content">

            	<ul class="days">'; 
		for($i = 0; $i < 7;$i++) {
					$str .= '<li>' . $day_list[$i] . '</li>';
		}
            $str.=    '</ul>';
		$today=date('d');
		$month=date('m');	
		
		while($day <= $days_in_month) {
			$str .= '<div class="clear"></div><ul class="date">';	
	
			for($i = 0; $i < 7; $i ++) {
	
				$cell = '&nbsp;';
	
				if(isset($data[$day])) {
					$cell = $data[$day];
				}
	
				$class = '';
				if($day==$today)
					$class='';
				else
					$class='';
	
				if(($first_day_in_month == $day_list[$i] || $day > 1) && ($day <= $days_in_month)) {
				$str .=' 
					<li onClick="return DisplayAgendaHomePage(this,'.$day.','.$month_num.','.$year.')" id="day_'.$day.'" class="day" >'.$day.' ';
	
					//$str.=' <li class="pencil">';
					
					//pr($data['ChildInCal']);die;
					if(!empty($data['ChildInCal'][$day]) || !empty($data['EnrolledClass'][$day])){
						$str.='<ul>';
						foreach($data['ChildInCal'][$day] as $color=>$Totalchild){
						$str.='<li class="childcolor '.$color.'">'.$Totalchild.' </li>';	
						}
						if(!empty($data['EnrolledClass'][$day])){
							$str.='<li class="pencil_image">'.count($data['EnrolledClass'][$day]).'</li>'; 
						}
						$str.='</ul>';
					}
					$str.='</li>';
	$str.=				'
				';
	
	$day++;
				} else { 
					$str .='<li class="inactive_date">&nbsp; </li>';
					
				}

			}
					$str.='</ul>';
	
			}
			$str.='<div class="clear"></div></div>';
	$separator=1; 
	
		if(!empty($data['Child'])){
			$str.='<div class="identication"><div class="leftid">';
			$total_child=count($data['Child']); 
			foreach($data['Child'] as $class=>$child){

				$str.='<ul><li class='.$class.'><a href="javascript:void(0)">'.$child.'  </a></li></ul>'; 
				if($total_child/2 >= $separator){
					$str.='</div><div class="rightid">';
				}
				
				$separator++;	
			}
			$str.='<ul><li class="pencil"><a href="javascript:void(0)">Pencil class</a><li></ul>';
			$str.='</div></div><div class="clear"></div>'; 
		}
	
// 		$str.='<div class="clear"></div>
// 			<br><ul>
// 				<li class="pencil">&nbsp;</li>
// 				<li class="legendLONG">Penciled Classes (Don\'t forget to enroll!)</li>
// 			</ul>';
		$str.='<div class="clear"></div>';




	$str.=          ' 
        </div>
        
<!--Calender Section Ends Here  -->        ';
	
		return $str;
	}
}	
 
?>