
<?php echo $javascript->link('calendar');  ?>
<?php echo $html->css('calendar'); ?>
<div id="content" class="calendar">
<?php 
	if(empty($calendarAjax)){
	echo $html->css('calendar'); ?>
	<?php echo $javascript->link('calendar');  ?>
	<?php //echo $javascript->link('lib/prototype');   ?>
	<?php //echo $html->css('parent');
	 ?>
	
	<div id="my-profile">	
		<?php echo $calendar->calendar($year, $month, $data, $base_url); ?> 
	</div>
	<?php
	
	/** if calender is of current month highlight day **/
	if( $year == date('Y') && substr(ucfirst($month),0,3) == date('M') ) {  ?>
	<script type="text/javascript">
		var data = 0;	
		if($("<?php echo "day_".date('j') ?>")!=undefined)
		MakeAcitveClass($("<?php echo "day_".date('j') ?>"),data)
	</script>
	<?php } 
	/** if calender is of current month highlight day **/
	?>
	
	<div class="clear"></div>
	<?php } else { echo $calendar->calendar($year, $month, $data, $base_url); }?>
</div>	