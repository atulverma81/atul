<!-- This tag creates our form tag -->

<?php echo $form->create('User',array('action'=>'login','method'=>'POST','name'=>'frmLogin') )?>

  
  <tr>
    <td>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td style="padding:10% 0%;" align="center">
        <?php 
		   if (!empty($errorMsg))
		      echo '<span class=err_txt>'.$errorMsg.'</span>';
		?>
        <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td  width="7" align="left" valign="top"><img src="/img/index_85.gif" alt="" width="7" height="42"></td>
            <td><img src="/img/index_38.gif" alt="Sign In" width="281" height="42"></td>
            <td  width="6" align="right" valign="top"><img src="/img/index_86.gif" alt="" width="6" height="42"></td>
          </tr>
          <tr>
            <td height="110" colspan="3" valign="top" class="sign_tabl_bg">
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="2"><img src="/img/spacer.gif" alt="" width="1" height="8"></td>
                </tr>
                <tr>
                  <td align="right">Login:&nbsp;</td>
                  <td>
                  <?php echo $form->input('User.username', array('size'=>'25','class'=>'login_textbox','label'=>'')); ?>
	      		  <?php echo $form->error('User.username','Please enter username.') ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><img src="/img/spacer.gif" alt="" width="1" height="12"></td>
                </tr>
               
                 <tr>
                  <td align="right">Password:&nbsp;</td>
                  <td>
                  <?php echo $form->password('User.password', array('size'=>'25','class'=>'login_textbox','label'=>''))?>
                  
		  <?php
   if(isset($this->params['url']['return']) && $this->params['url']['return']!=''){
       echo $form->input('Admin.return', array('type'=>'hidden','value'=>$this->params['url']['return']));
   }
   ?>
		  
                  </td>
                </tr>
                </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <!--  <tr>
                 	</td>
                  	<td width="48%" align="left">&nbsp;
		  			<?php //echo $html->link("Forgot Password", "/admin/users/forgetpassword",array('class'=>'ftr_link','style'=>'padding-left:30px')) ?>
		  			</td>
                  	<td width="35%">Remember me : </td>
                  	<td width="17%">
                  	<?php //echo $form->checkbox('User.remember_me',array('value'=>'1','class'=>'checkbox')); ?>
                  	
                </tr>   -->             
                
                <tr>
                  <td colspan="3" align="right">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" align="right" width="70%"> &nbsp;&nbsp;&nbsp;        
				  </td>
                  <td align="right">
				  <input type="submit" name="submit" value="" class="login_button">
				  </td>
                </tr>
                <tr>
                  <td colspan="3">
                  <img src="/img/spacer.gif" alt="" width="1" height="5">
                  <?php //echo $html->submit('Sign In')?></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td width="7" align="left" valign="top"><img src="/img/index_87.gif" alt="" width="7" height="7"></td>
            <td class="sign_tabl_dwn_bg"><img src="/img/spacer.gif" alt="" width="1" height="1"></td>
            <td width="6" align="right" valign="top"><img src="/img/index_89.gif" alt="" width="6" height="7"></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
  
 </table>

<?php echo $form->end();?>