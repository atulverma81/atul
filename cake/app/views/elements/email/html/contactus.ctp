<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>LifestyleHolidayRentals</title>
</head>
 
<body style="margin:0; padding:0;">
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
                <td rowspan="2" align="left" valign="top"><a href="#"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/register-btn.jpg" width="108" height="102" alt="Register" style="display:block;" border="none" /></a></td>
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

<b>Hello Admin,</b>
<br><br>
You have got a Questions/Comments/Suggestion.
<br><br>
<b>Following are Contact Us Details:</b><br>
<?php if(!empty($details['user_id'])){ ?>
<b>User Id:</b> <?php echo $details['user_id']?>,<br>
<b>User Type:</b> <?php if(!empty($details['user_type'])){
		if($details['user_type']=='1'){
			echo 'Home Owner';
		}else if($details['user_type']=='2'){
			echo 'Holiday Maker';
		}else if($details['user_type']=='3'){
			echo 'Agent';
		}
	}

?>,<br>
<?php } ?>
<b>Name:</b> <?php echo $details['firstname']?> <?php echo $details['lastname']?>,<br>
<b>Email Address:</b> <?php echo $details['email']?>,<br>
<b>Company Name:</b> <?php if(isset($details['company'])) echo $details['company']; else echo 'N/A';?>,<br>
<b>Address:</b> <?php echo $details['address'].','; ?> <?php echo $details['city'].','; ?><br>
<b>State/Region :</b> <?php echo $details['state']; ?> <br>
<b>Country:</b> <?php echo $details['country']; ?> <br>
<b>Post/Zip Code:</b> <?php echo $details['post_code']; ?> <br>
<b>Enquiry Type:</b> <?php echo ucfirst($details['owner']); ?> <br>
<b>Phone Number:</b> <?php echo ucfirst($details['phone']); ?> <br>
<b>Enquiry Type:</b> <?php echo ucfirst($details['owner']); ?> <br>
<b>Comments:</b> <?php echo ucfirst($details['comments']); ?> <br>
<br><br>
<b>
Thanks & Regards<br>
LHR Support Team
</b>

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
              Website: &nbsp;&nbsp;	<a href="#" style="color:#fff; text-decoration:underline">http://www.lifestyleholidayrentals.com/</a></td>
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
</body>
</html>
