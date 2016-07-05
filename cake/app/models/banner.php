<?php
/*
Purpose: Country model class
*/
class Banner extends AppModel{
	var $name	= 'Banner';	
	
	
	public function bannerList()
	{
			$banners=array();
			$banners = $this->find('all', array(
					'conditions' => array('Banner.status'=>1),
					'fields' => array(
					     'id', 'name'
					),
					'order' => 'id ASC'
					)
				   );
		
		return $banners;
	}
	

}
?>