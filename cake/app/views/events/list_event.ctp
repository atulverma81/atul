<script type="text/javascript">
jQuery.noConflict();
 	function viewEvent(id) {  
	 jQuery.facebox({ ajax:'/events/ViewEvent/'+id})
	return false;
		}
   jQuery(document).ready(function($) {
  jQuery('a[rel*=facebox]').facebox()
})
</script>
<?php echo $javascript->link('prototype.js');?>

<!--Section Starts Here-->
<section id="selection">
  <?php echo $form->create(NULL,array('url'=>'ListEvent','method'=>'POST','name'=>'frmList') ); ?>
  <div class="main-content">
    <!--Search Result Starts Here--> 
    <section class="search-result">
      <h3>Events List</h3>
        <ul class="mand-fields">
	<li><a class="events  c-more" href="/Events/CreateEvent">Post New Event</a>  </li>
	</ul>
      <?php echo $this->renderElement("/event/event_list"); ?>
    </section>
    <!--Search Result Ends-->
  </div>
  <?php echo $form->end(); ?>
</section>
<!--Section Ends-->
