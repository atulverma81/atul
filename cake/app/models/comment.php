<?php

class Comment Extends AppModel {

var $name = "Comment";

 function saveComment($comment, $userId, $eventId){
 		   $this->bindModel(array('hasOne'=>array(
				      'User' => array('conditions' => 'Comment.user_id = User.id',
				      'fields' => array('User.username'),
				      'foreignKey' => '0'),
			      )), false);
 			$comment = $_POST['comment'];
			$this->data['Comment']['user_id'] = $userId;
			$this->data['Comment']['comment'] = $comment;
			$this->data['Comment']['event_id'] = $eventId;
			$this->save($this->data);
		 	$allComments = $this->find('all',array('conditions'=>array('event_id'=>$eventId),'order'=>'posting_date DESC')); 
		 	return $allComments;
        }
	}

?>