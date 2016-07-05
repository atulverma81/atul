<?php

if(!empty($options)){
	echo $form->select('City.state_id',$options,null,array('class'=>'select-box'),'Please Select');
}else{
	echo $form->select('City.state_id',null,null,array('class'=>'select-box'),'Please Select');
}
?>