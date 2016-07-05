 <?php   if(!empty($comments)) { foreach($comments as $comment){   ?>
                    <li class="expand" id="catagory<?php echo $comment['Comment']['id']; ?>">
                            <a href="javascript:void(0);" onclick="togglemessage_visibility('show<?php echo $comment['Comment']['id']; ?>','catagory<?php echo $comment['Comment']['id']; ?>');">
                                 <?php echo $comment['User']['username']; ?>
                            </a>  <p style="float:right;">Posting Date : <?php echo $comment['Comment']['posting_date']; ?> <?php if($userId == $comment['Comment']['user_id']){ ?>
				  	&nbsp; &nbsp;<img src="/img/delete.gif" onclick="deleteComment(<?= $comment['Comment']['id'] ?>,<?= $comment['Comment']['event_id'];?>)" height="15" width="15" style="cursor:pointer;"> 
				  <?php } ?>
				</p> 
                    </li>
                    <li class="collapse" id="show<?php echo $comment['Comment']['id']; ?>" style="display:none;">
                            <a href="javascript:void(0);" onclick="togglemessage_visibility('show<?php echo $comment['Comment']['id']; ?>','catagory<?php echo $comment['Comment']['id']; ?>');" > 
                                   <?php echo $comment['User']['username']; ?>
                            </a>
                            <ol>
                               <?php echo $comment['Comment']['comment']; ?>
                            </ol>
                    </li>
                <?php } }?>