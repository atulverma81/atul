<?php
(empty($filename)) ? $filename = 'applications' : $filename = $filename;
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=slf2007-".$filename.".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<?php  echo $content_for_layout ?> 