<?php
$otherstate = array('1110'=>'Other');
if(!empty($options)){
$options=$options+$otherstate;  
echo $form->select('User.state_id',$options,null,array('id'=>'state','class'=>'validate[required]','onChange'=>'return showOtherState()'),'Please select');
}else{
	echo $form->select('User.state_id',$otherstate,null,array('id'=>'state','class'=>'validate[required]','onChange'=>'return showOtherState()'),'Please select');
}
?>