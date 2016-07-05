<?php
/*
Purpose: Country model class
*/
class Country extends AppModel{
	var $name	= 'Country';	
	
	public $hasMany = array('User' =>
                    		array('className'=> 'User',
                         		 'conditions'  => '',
                        		  'order'     => '',
                         		 'dependent'     => 'true',
                         		 'foreignKey'     => 'country_id',
                   			 ),
				'State' =>
                    		array('className'=> 'State',
                         		 'conditions'  => '',
                        		  'order'     => '',
                         		 'dependent'     => 'true',
                         		 'foreignKey'     => 'country_id',
                   			 )
				
              			);	
	public function countryList($conditions)
	{
		$countryList = $this->find('list', array(
					'conditions' => $conditions,
					'fields' => array(
					     'id', 'country'
					),
					'order' => 'country ASC'
					)
				   );
		
		return $countryList;
	}
	public function countryDetail($conditions)
	{

		$this->unbindModel(array('hasMany' => array('User','State'),'belongsTo' => array()));  
		$countryDetail = $this->find('all', array(
					'conditions' => $conditions,
					'order' => 'country ASC'
					)
				   );
		
		return $countryDetail;
	}
public function countryDetail1($conditions)
	{
		$countryDetail = $this->find('all', array(
					'conditions' => $conditions,
					'order' => 'country ASC'
					)
				   );
		
		return $countryDetail;
	}
	
	public function chkCountry($country)
	{
		$countryDetail = $this->find('all', array(
					'conditions' => array(
						'LOWER(Country.country)'=>$country
					),
					'fields'=>array('Country.id')
					)
				   );
		
		return $countryDetail;
	}

}
?>