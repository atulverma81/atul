<?php

if(!empty($options)){
	
	echo $form->select('Search.city_id',$options,null,array('class'=>'quesselec-list-home'),'All Cities');
}
?>