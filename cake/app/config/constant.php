<?php
/**
        * Constants File
        * PHP versions 5.1.4
        * @date 03-Feb-2011
        * @Purpose: define errors in application
        * @filesource
        * @author     Sachin Sharma
        * @revision   
        * @copyright  Copyright ? 2010 smartData
        * @version 0.0.1 
	**/

 
      $config['Company']['name'] = 'Competitive Tele Services';
        //define image path constant
        /*
	define('IMAGE_PATH', 'http://172.24.0.9:9330/img/logo/');  
	define('THUMB_IMAGE_PATH1', 'http://172.24.0.9:9330/img/logo/thumb1/');
        define('THUMB_IMAGE_PATH2', 'http://172.24.0.9:9330/img/logo/thumb2/');
        define('ARTICLE_DOC_PATH', 'http://172.24.0.9:9330/img/docarticle/');
        define('ARTICLE_DOC_THUMB_PATH', 'http://172.24.0.9:9330/img/docarticle/thumb/');
        define('ARTICLE_IMAGE_PATH', 'http://172.24.0.9:9330/img/article/');
        define('ARTICLE_IMAGE_THUMB_PATH', 'http://172.24.0.9:9330/img/article/thumb/');
        define('TICKET_FILE_PATH', 'http://172.24.0.9:9330/img/ticket/');
        define('NEWS_IMAGE_PATH', 'http://172.24.0.9:9330/img/news/');
        define('NEWS_IMAGE_THUMB_PATH', 'http://172.24.0.9:9330/img/news/thumb1/');
	define('PROFILE_IMAGE_THUMB_PATH', 'http://172.24.0.9:9330/img/profile/thumb/');
	define('CONTENT_PATH', 'http://172.24.0.9:9330/app/webroot/files/');  
	*/
        /*********Image Thumb path************/
        
         define('PAGE_LIMIT',10);
	define('PAGE',1);
	define('FILE_SIZE',2000000);
	define('DEFAULT_COUNTRY',1);
	define('ADMIN_ID',86);
	/*********Nemeric constant used in quiz marks************/
    
	/*********Email constant ***********/
	define('HEADER_ORGANIZATION_CREATED','CCS Organization Account Created Successfully');
	/*********Image Thumb path************/
        
        define('LESSON_THUMB_HEIGHT',179);
	define('LESSON_THUMB_WIDTH',255);
	define('COURSE_THUMB_HEIGHT',162);
	define('COURSE_THUMB_WIDTH',138);
	define('CATEGORY_THUMB_HEIGHT',162);
	define('CATEGORY_THUMB_WIDTH',138);
	define('ARTICLE_THUMB_HEIGHT',100);
	define('ARTICLE_THUMB_WIDTH',75);
	define('CERTIFICATE_THUMB_HEIGHT',100);
	define('CERTIFICATE_THUMB_WIDTH',80);
	define('CERTIFICATE_THUMB_HEIGHT1',160);
	define('CERTIFICATE_THUMB_WIDTH1',140);
	define('HELP_THUMB_HEIGHT',160);
	define('HELP_THUMB_WIDTH',120);

  /*********UsersController Constant************/        
	define('ADMIN_USER_REGISTER','New Admin User has been created successfully');
	define('ADMIN_CHECK_USER','The Username entered does not exist. Please try again !');
    	 define('UPDATE_ACCOUNT', 'ACCOUNT HAS BEEN UPDATED SUCCESSFULLY !');
	 define('PASSWORD_NOT_MATCH', 'The Password entered was not correct. Please try again !');
  	define('NOT_ACTIVATE', 'Inactive account.'); 
  	define('INVALID_USERNAME', 'The Username entered does not exist. Please try again !');
	define('CHECK_USER','<img src="/images/error.jpeg" height="45" width="40">&nbsp;&nbsp;Username already exists');
	define('EVENT_DATE','<img src="/images/error.jpeg" height="45" width="40">&nbsp;&nbsp;EVENT END DATETIME MUST BE GREATER THEN START DATE !');	 
	define('CHECK_EMAIL_ADDRESS','<img src="/images/error.jpeg" height="45" width="40">&nbsp;&nbsp;Email Address already exists.');
	define('CHECK_ALT_EMAIL_ADDRESS','<img src="/images/error.jpeg" height="45" width="40">&nbsp;&nbsp;Alternate Email Address already exists');
	define('USER_REGISTER_MESSAGE','<p class="session-message">Dear User , <br><br>
                Thank you for joining the ChurchPatrol Community! To complete your registration, We have sent you a     confirmation email.<br><br>Please verify your account by clicking on the link provided in that email. Upon verification you will able to access the features of ChurchPatrol Community.<br><br>Please check your Spam or Junk folders if the confirmation e-mail does not  appear in your mailbox.<br><br><br><br>God bless You Abundantly!<br><br>The ChurchPatrol Team</p> ');
        define('USER_REGISTER_CONFIRM_MESSAGE','Dear {ClientName} , <br><br>
                Thank you for joining the ChurchPatrol Community! Your account on ChurchPatrol has been created         successfully.<br><br>Please verify your account by clicking on the link below:<br><br>
               {siteurl} <br><br>
Following are your Account Details:<br><br>
Username   	 	: {UserName} <br>
Password    	 	: {Password} <br>
Organization Name 	: {OrgName} ');
 
	define('FORGOT_USERNAME_EMAIL','Dear {ClientName} , <br> <br><br>Your username for this account is: {UserName}
		<br><br>{LoginUrl}');

	define('FORGOT_PASS_EMAIL','Dear {ClientName} , <br><br> Someone is attempting to reset your password.<br><br>Your email address for this account is: {UserEmail}<br><br>If you wish to continue, you may reset your password by following this link:<br><br>{ResetUrl}<br><br>If you did not initiate this action, please contact support. You can log in to change your password at this address:<br><br>{LoginUrl}');
	define('RESET_PASS_EMAIL','Dear {ClientName} , <br><br> Your password has been reset, please use the following details to log into our site.<br><br>Your username for this account is: {UserName}<br><br>Your new password for this account is: {Password}<br><br>Please change your password to something more memorable.You can log in to change your password at this address:<br><br>{LoginUrl}');
	define('SEND_FORGOT_MESSAGE','An email has been sent to your account, please follow the instructions in this email.');
define('EVENT_FILE_TYPE','<img src="/images/error.jpeg" height="45" width="40">&nbsp;&nbsp;Invalid File Type Please Try Again. Your file must be of type .jpg, .gif, .jpeg, .bmp only.');
	
define('EVENT_POST','Event has been posted successfully.');
define('EVENT_UPDATE','Event has been updated successfully.');
define('EVENT_DELETE','Event has been deleted successfully.');
define('OLD_PASSWOD_NOT_MATCH','<img src="/images/error.jpeg" height="45" width="40">&nbsp;&nbsp;Your Old Password does not match , please enter correct password !');
define('PASWORD_CHANGE','Your Password has been changed successfully !');
// email body constant variable
	
	define('ACCOUNT_CREATED','Account Created Successfully.');
	define('VERIFY_ACCOUNT_CREATED','Verify Your CCS Account.');
	define('RECOVER_PASSWORD','CCS Online Recover your Password');
	define('RECOVER_USERNAME','CCS Online Recover your Username');
	define('VERIFY_PASSWORD','CCS Online Reset your Password');
	define('MIME-VERSION','MIME-Version: 1.0');
	define('CONTENT_TYPE','Content-type: text/html;charset=iso-8859-1');
	define('FROM_HEADER','From: CCS<admin@competitiveteleservices.com>');
	define('FROM','info@competitiveteleservices.com');
	define('FROM_NAME','CCS Online Support');

	define('EMAIL_BODY_CONTENT','<html><body><table><tr><td width="522" align="left" valign="top" bgcolor="#4863A0" style="text-align:center; font-family:Arial, Helvetica, sans-serif; color:#FFF; font-weight:normal; font-size:11px; line-height:17px;">ChurchPatrol Community! </td></tr><tr><td>{BodyContent}</td></tr><tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#4863A0; line-height:18px; font-weight:bold;"><br><br>God bless You Abundantly!</td></tr><tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:18px; font-weight:bold;"><span style="color:#44484f; display:block;"> The ChurchPatrol Team</span></td></tr> </table></body></html>');
	define('WRONG_EMAIL','<img src="/images/error.jpeg" height="45" width="40">&nbsp;&nbsp;Email adddress does not exists.');
	$config['Company']['name'] = 'CCS';

	
	define('SEND_NEWSLETTER',"Thank you for registering to receive our Newsletter. We are sure you will you find it very useful. In the meantime, please check your Spam folder and add us to you 'Contacts List', to ensure you receive our latest offers and great money saving tips and deals.<br><br>Kind Regards<br>The Lifestyle Holiday Rentals Team.");
	define('ADMIN_SEND_NEWSLETTER','Newsletter has been send successfully to selected emails !');
	define('VERIFICATION_CODE','Please enter the verification code.');
	define('VALID_VERIFICATION_CODE','Please enter the valid verification code.');

	define('SEND_CONTACT_US','Your message has been sent to Competitive Tele Services. We will contact you soon.<br><br> Thank You.');
	define('SEND_ENQUIRY','Your enquiry has been sent to us.');
        define('DEVELOPER_KEY',"00c678aaff4dfcd0e27d5b74e31517a6a3dccfebbab56be925a24a877b218dd54c844bb932937095592475bf491b85d974bcc100706029de190b2d2b46bb788901/00a7ec8cf1ba707fe44220518398e30bf174f0cf08885ba7465a4c28d93b889fc0c26d2074857e4fee42003a05a901a83c6aa7cd6866426e68b18bcf312e00e6e1");
	define('WEBSITE_ID','4484000');
        define('TOKEN','afd5b4396d0c96fbfe1c0ae2ddf8c723180f00e37cd73fc22ca2deb64863a6ea');

?>