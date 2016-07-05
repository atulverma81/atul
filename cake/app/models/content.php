<?php
/*
Purpose: Content model class
*/

class Content extends AppModel{

	var $name ='Content';
                // Validation of form field
        var $validate =array(
            'pagetitle' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty'=>false,
                    'required'=>true,
                    'message' => 'Content title must only contain letters and numbers.'
                    ),
            'meta_keywords' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty'=>false,
                    'required'=>true,
                    'message' => 'Meta keywords field cannot be left blank'
                    ),
            'meta_desciption' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty'=>true,
                    'required'=>false,
                    'message' => 'Meta description field cannot be left blank'
                    ),
		'description' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty'=>false,
                    'required'=>true,
                    'message' => 'Content description should not be empty'
                    ),
            'status' => array(
                    'rule' => '/^[0-9]{1,6}$/i',
                    'allowEmpty'=>false,
                    'required'=>true,
                    'message' => 'Choose content status.'
                    ),
              
         );
	
	function getContentDetail($conditions)
	{
		$contentDetail = $this->find('all', array(
					'conditions' => $conditions
					)
				);
		
		return $contentDetail;
	}

	function getKeywords($contentId=null){
		$metakeywords='';
		$metadescription='';
		$pagetitle='';
		$contentKeys = $this->find('first', array('conditions' => array('Content.id'=>$contentId),'fields'=>array('meta_title','meta_keywords','meta_description')));
		
		if(!empty($contentKeys)){
			if(!empty($contentKeys['Content']['meta_title'])){
				$pagetitle = $contentKeys['Content']['meta_title'];
			}
			if(!empty($contentKeys['Content']['meta_keywords'])){
				$metakeywords = $contentKeys['Content']['meta_keywords'];
			}
			if(!empty($contentKeys['Content']['meta_description'])){
				$metadescription = $contentKeys['Content']['meta_description'];
			}
		}

		return array($metakeywords,$metadescription,$pagetitle);
		

	}


}
?>