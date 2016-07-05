<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; color:#4a4a4a;">
	<tr>
    	<td height="9" align="left" valign="top"></td>
  	</tr>
  <tr>
    <td height="19" align="left" valign="top" bgcolor="#089bd8" style="border-bottom:1px solid #fff"></td>
  </tr>
  <tr>
    <td height="83" align="left" valign="top" bgcolor="#52c1e1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      	<td width="14" align="left" valign="top"></td>
        
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="356" border="0" cellspacing="0" cellpadding="0">
              <tr>
              <!--  <td align="left" valign="top"><a href="#"><img src="/../images/homeonwer-signup.png" width="136" height="20" border="0" alt="Homeowner Signup" style="display:block;" /></a></td>
                <td width="2" align="left" valign="top"></td>
                <td align="left" valign="top"><a href="#"><img src="/../images/holidaymaker-signup.png" width="136" height="20" alt="Holiday Maker Sign up" style="display:block;" border="0" /></a></td>
                <td width="2" align="left" valign="top"></td>
                <td align="left" valign="top"><a href="#" style="display:block; border:none"><img src="/../images/contact-us.png" width="77" height="20" alt="Contact Us" style="display:block;" border="0" /></a></td>-->
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" align="left" valign="top"></td>
          </tr>
          <tr>
            <td align="left" valign="top"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/title.png" width="393" height="39" alt="LogoTitle" /></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"></td>
        <td align="left" valign="top"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/logo.png" alt="" width="159" height="70" style="display:block" /></td>
        
        <td width="15" align="left" valign="top"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="11" align="left" valign="top"></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14" align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/banner-firsthalf.jpg" width="569" height="146" alt="banner" style="display:block" /></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/banner-2ndhalf.jpg" width="462" height="42" alt="banner" style="display:block" /></td>
                <td rowspan="2" align="left" valign="top"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/register-btn.jpg" width="108" height="102" alt="Register" style="display:block;" border="none" /></a></td>
              </tr>
              <tr>
                <td align="left" valign="top"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/hello.gif" width="462" height="64" alt="" style="display:block" /></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="25" align="left" valign="top"></td>
          </tr>
          <tr>
            <td align="left" valign="top">
		<div style="width:100%;font-size:12px; color:#333;line-height:18px;">
		<span style="font-size:14px; font-weight:bold; color:#56A5EC;width:500px;"><b> <?php echo $details['title']; ?> </b>,</span><br>

		<span style="font-size:12px; font-weight:normal; color:#000000;width:500px;"> <?php 	if(!empty($details['description'])){
		 		$desc=$details['description'];
				$desc=str_replace("<strong>","<b>",$desc);
				$desc=str_replace("</strong>","</b>",$desc);
				$desc=str_replace("/app/webroot/files/",'/app/webroot/files/',$desc);
			
			$desctext = wordwrap($desc, 110, "<br />\n", true);
			echo $desc;

	}else{
		echo 'Details are not available';
	}
			
        ?> </span><br>
		<br><br>
		</div>


	</td>
          </tr>
          <tr>
            <td height="25" align="left" valign="top"></td>
          </tr>
        </table></td>
        <td width="16" align="left" valign="top"></td>
      </tr>
    </table></td>
  </tr>
 
  <tr>
    <td height="85" align="left" valign="top" bgcolor="#07a5dd"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14" align="left" valign="top"></td>
        <td align="left" valign="top"><table width="288" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="72" align="left" valign="top"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/subscribe.png" alt="Subscribe" width="72" height="14" border="0" style="display:block" /></a></td>
            <td width="2" align="left" valign="top"></td>
            <td width="84" align="left" valign="top"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/newsletters/unsubscribe/<?php echo $emailAddres; ?>"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/Unsubscribe.png" width="84" height="14" alt="Unsubscribe" border="0" style="display:block" /></a></td>
            <td width="2" align="left" valign="top"></td>
            <td align="left" valign="top"><!--<a href="#"><img src="http://<?php //echo $_SERVER['HTTP_HOST'];?>/images/forward.png" width="123" height="14" alt="Forward to A Friend" border="0" style="display:block" /></a>--></td>
          </tr>
        </table></td>
        <td width="16" align="left" valign="top"></td>
      </tr>
      <tr>
        <td align="left" valign="top"></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10" align="left" valign="top"></td>
            <td width="146" align="left" valign="top"></td>
            <td align="left" valign="top"></td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="font-size:12px; color:#fff;">Copyright ©2010. Lifestyle Villas and Resorts Ltd. All rights reserved. </td>
            <td width="40" align="left" valign="top"></td>
            <td align="left" valign="top" style="font-size:11px; font-weight:bold; color:#000" width="276px">
              Email :&nbsp;&nbsp;	<a href="mailto:homeowner@lifestyleholidayrentals.com
" style="color:#fff; text-decoration:underline">homeowner@lifestyleholidayrentals.com
</a><br />
              Website: &nbsp;&nbsp;	<a href="http://<?php echo $_SERVER['HTTP_HOST'];?>" style="color:#fff; text-decoration:underline">http://www.lifestyleholidayrentals.com/</a></td>
          </tr>
        </table></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
    
    
    </td>
  </tr>
  <tr>
  	 <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>