<?php if($status=='1'){
		$image = 'accept.png';
		$title = 'Deactive';
	} else {
		$image = 'delete.png';
		$title = 'Active';
	}

echo $ajax->link($html->image($image, array('border' => 0,'title'=>$title,'alt'=>$title)),'', array('update' => 'img_'.$id, 'url' => '/admin/newsletters/active/'.$id), null,false);
?>
