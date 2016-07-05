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