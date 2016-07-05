<?php echo $javascript->link('jquery.js'); ?>
<?php echo $javascript->link('jquery-1.js'); ?>
<?php echo $javascript->link('jq4u-50-jquery-functions.js'); ?>
 <style>
.hiddenInputs1{display:none;}
</style>
<script>

function showHideTextBoxCheckedHist(id){
   jQuery("#sh1").addClass("hiddenInputs1");
   jQuery("#sh2").addClass("hiddenInputs1");
   jQuery("#sh3").addClass("hiddenInputs1");
   jQuery("#sh4").addClass("hiddenInputs1");
    jQuery('#sh'+id).removeClass("hiddenInputs1");
}

</script>
<div class="indent">
              <article>
                <div class="inside">
                	<h2><?php echo @$pagetitle;?></h2> 
                  <div class="wrapper">
                  <?php $content='';
          					if(!empty($contents['Content']['description'])){
          						$content=$contents['Content']['description'];
          						$content=str_replace("<strong>","<b>",$content);
          						$content=str_replace("</strong>","</b>",$content);
          						$content=str_replace("<em>","<i>",$content);
          						$content=str_replace("</em>","</i>",$content);
          						$content=str_replace("/app/webroot/files/","/app/webroot/files/",$content);
          		
          		
                   			echo @$content;  
          					}else {
          					echo 'Home';
          				}
          			
          			?>
                    
                  </div>
                </div>
              </article>
             
            </div>  