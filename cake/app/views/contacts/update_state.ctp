<?php
if(!empty($options)){ 
	echo $form->select('Search.state_id',$options,null,array('class'=>'quesselec-list-home','default' =>null),'All Regions');
	echo $ajax->observeField("SearchStateId",array("url"=>"update_city","update"=>"CityDiv"));
?>
<div id="CityDiv" style="height:5px;margin-top:10px;">
</div>
<?php
}else{
	
}
?>
