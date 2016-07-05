<?php
/*
Purpose: State model class
*/

class State extends AppModel{

	var $name	= 'State';	
		
		public $hasMany = array('User' =>
                    		array('className'=> 'User',
                         		 'conditions'  => '',
                        		  'order'     => '',
                         		 'dependent'     => 'true',
                         		 'foreignKey'     => 'state_id',
                   			 )
				);
		
	public function stateList($conditions)
	{
		$stateList = $this->find('list', array(
					'conditions' => $conditions,
					'fields' => array(
					     'id', 'state'
					),
					'order' => 'state ASC'
					)
				   );
		
		return $stateList;
	}

public function stateDetail1($conditions)
	{



                              
		$countryDetail = $this->find('all', array(
					'conditions' => $conditions,
					'order' => 'state ASC'
					)
				   );
		
		return $countryDetail;
	}


	function getState(){
		$states=array();
		$stateDetail=array();
		$this->unbindModel(array('hasMany' => array('User'),'belongsTo' => array()));
		$this->bindModel(array('hasOne'=>array(
                 		'Country'=>
				array(	'conditions' => array('State.country_id = Country.id'),
					'fields' =>     array('Country.country'),
					'foreignKey' => '0',
					),
				
                 )), false);	
		$states=$this->find('all',array('conditions'=>array('State.country_id'=>7),'order'=>'state ASC'));
		//get state list
		
		if(!empty($states)){
			foreach($states as $state){
				$stateDetail[$state['Country']['country'].'/'.$state['State']['state']]=$state['State']['state'];
			}
		
		}
		
		return $stateDetail;	
	}



}
?>