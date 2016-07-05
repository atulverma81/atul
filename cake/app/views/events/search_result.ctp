<script type="text/javascript">
jQuery.noConflict();
 	function viewEvent(id) {  
	 jQuery.facebox({ajax:'/events/ViewEvent/'+id})
	 return true;
	 }	 
   jQuery(document).ready(function($) {
  jQuery('a[rel*=facebox]').facebox()
})
</script>
<?php echo $javascript->link('prototype.js');?>

<!--Section Starts Here-->
<section id="selection">
 
  <div class="main-content">
   
    <!--Search Result Starts Here--> 
    <section class="search-result">
      <h3>Events list</h3>
      <?php $userid = $session->read("loginId"); if(isset($userid)){ ?>
         <ul class="mand-fields">
	<li><a class="events  c-more" href="/Events/CreateEvent">Post New Event</a>  </li>
	</ul>
	 <?php } ?>
      <?php echo $this->renderElement("/event/search_list"); ?>
    </section>
    <!--Search Result Ends-->
  </div>
 
</section>
<!--Section Ends-->
