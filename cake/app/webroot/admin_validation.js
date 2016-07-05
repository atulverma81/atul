//Function for showing div at center starts
function showDivAtCenter(divid) 
{
	var scrolledX, scrolledY;
	if( self.pageYoffset )
	{
		scrolledX = self.pageXoffset;
		scrolledY = self.pageYoffset;
	} 
	else if( document.documentElement && document.documentElement.scrollTop ) 
	{
		scrolledX = document.documentElement.scrollLeft;
		scrolledY = document.documentElement.scrollTop;
	} 
	else if( document.body ) 
	{
		scrolledX = document.body.scrollLeft;
		scrolledY = document.body.scrollTop;
	}
	var centerX, centerY;
	if( self.innerHeight ) 
	{
		centerX = self.innerWidth;
		centerY = self.innerHeight;
	} 
	else if( document.documentElement && document.documentElement.clientHeight ) 
	{
		centerX = document.documentElement.clientWidth;
		centerY = document.documentElement.clientHeight;
	}
	else if( document.body ) 
	{
		centerX = document.body.clientWidth;
		centerY = document.body.clientHeight;
	}
	Xwidth=jq('#'+divid).width();
	Yheight=jq('#'+divid).height();
	
	var leftoffset = scrolledX + (centerX - Xwidth) / 2;
	var topoffset = scrolledY + (centerY - Yheight) / 2;
	
	leftoffset=(leftoffset<0)?0:leftoffset;
	topoffset=(topoffset<0)?0:topoffset;
	
	var o=document.getElementById(divid);
	var r=o.style;
	
	r.top = topoffset + 'px';
	r.left = leftoffset + 'px';
	r.display = "block";
}
//Function for showing div at center ends

//

/**
	* Javascript Validation File
	* PHP versions 5.1.4
	* @date 25-May-2010
	* @Purpose: Used to javascript validation 
	* @filesource
	* @author     Sachin Sharma
	* @revision   
	* @copyright  Copyright � 2010 smartData
	* @version 0.0.1 
**/
var errorDiv='<p class="error2" style="color:red">';
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
//validate supre admin
function validateSuperAdmin(){
        user_name = trim(document.getElementById('UserUsername').value);
        password = trim(document.getElementById('UserPassword').value);
	var phoneno=/^[0-9]{6,10}$/;
        var errorString = "";
	if(user_name == ''){
                errorString = errorString +  "-Please enter your username <br>";
	        document.getElementById('UserUsername').focus();
	}
	if(password == ''){
                errorString = errorString +  "-Please enter your password <br>";
	              if(user_name!=''){
                 document.getElementById('UserPassword').focus();
                }
	}
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;document.getElementById('AdminEmail').focus();
	}
	else{
		return true;
	  }
       }
//end of validate super admin

function validateSendNewsletter(){
	question = trim(document.getElementById('NewsletterTitle').value);	 	
       
	var errorString = "";
	 if(question == ''){
                errorString = errorString +  "-Please enter newsletter title. <br>";
	}
	
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	    }
	}

function validateSendMarks(){
		
        answer = trim(document.getElementById('QuizOptainScore').value);
	var errorString = "";
	 if(answer == ''){
                errorString = errorString +  "-Please enter marks of this question. <br>";
	}
	
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	    }
}

//start validateOrg
function validateOrg(){
        user_name = trim(document.getElementById('UserUsername').value);	 	
        password = trim(document.getElementById('UserPassword').value);
        confirm_password = trim(document.getElementById('UserConpassword').value);
	email = trim(document.getElementById('UserEmail').value);
	company = trim(document.getElementById('UserCompanyName').value);
        address = trim(document.getElementById('UserAddress1').value);
	city = trim(document.getElementById('UserCity').value);
	country = trim(document.getElementById('UserCountryId').value);
	state = trim(document.getElementById('UserStateId').value);
	//countrycode = trim(document.getElementById('UserPhone0').value);
	//areacode = trim(document.getElementById('UserPhone1').value);
	//phonenumber = trim(document.getElementById('UserTelephoneNumber').value);
	countrycode = trim(document.getElementById('UserPhone0').value);	
	areacode = trim(document.getElementById('UserPhone1').value);	
	phoneCode = trim(document.getElementById('UserPhone2').value);
	
        var errorString = "";
	var focusField=null;
	var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
        var checkAC=/^[0-9]{2,5}$/;
	// var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var alphaNumericTest=/^[a-zA-Z0-9 ]{1,20}$/;
	var numericTest=/^[0-9 ]{1,20}$/;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	areacode=areacode.replace("-", "");
	phoneCode=phoneCode.replace("-", "");
	phonenumber=''+countrycode+'-'+areacode+'-'+phoneCode;
	phonenumber=phonenumber.replace("(", "");
	phonenumber=phonenumber.replace(")", "");
	if(user_name == ''){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
                errorString = errorString +  "-Please enter your username. <br>";				
	}else if(checkUserName.test(user_name)== false){
		 errorString = errorString +  "-Please enter username in alphanumeric and accept special character hyphen(-), underscore(_) and dot (.) only.<br>"; 
	
	}
	var digit_matches=password.match(/\d{1,}\.{0,}\d{0,}/);
	if(password==''){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
		errorString = errorString + "-Please enter password. <br>";
	}else if(password.length<6){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
		errorString = errorString + "-Password is too short (minimum is 6 characters).<br>";
	}
	if(confirm_password==''){
		if(errorString==''){
			document.getElementById('UserConpassword').focus();
		}
		errorString = errorString + "-Password confirmation can't be blank.<br>";
	}
	if((confirm_password != '') && (password!='')){
		if(password != confirm_password){
			if(errorString==''){
				document.getElementById('UserPassword').focus();
			}
			errorString = errorString + "-Password doesn't match confirmation and has to be at least 6 characters long and include 1 digit.<br>";
		     }
	        }
	if(((confirm_password != '') && (password!='')) && digit_matches==null){
		if(errorString==''){
				document.getElementById('UserPassword').focus();
			}
		errorString = errorString + "-Password must be at least 6 characters long and include 1 digit. <br>";
	}
       if(email==''){
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
		 
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
			if(errorString==''){
				document.getElementById('UserEmail').focus();
			}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 
	
        if(company == ''){
		if(errorString==''){
			document.getElementById('UserCompanyName').focus();
		}
                errorString = errorString +  "-Please enter your company name. <br>";
	}
	if(address == ''){
		if(errorString==''){
			document.getElementById('UserAddress').focus();
		}
                errorString = errorString +  "-Please enter your address. <br>";
	}
	if(city == ''){
		if(errorString==''){
			document.getElementById('UserCity').focus();
		}
                errorString = errorString +  "-Please enter your city name. <br>";
	}
	if(country == ''){		
                errorString = errorString +  "-Please select your country name. <br>";                 
	}
	if(state == ''){		
                errorString = errorString +  "-Please select your state name. <br>";
	}
 
// 	if(countrycode == ''){
//                  errorString = errorString +  "-Please enter country code<br>";
// 		 
// 	}else if(checkCC.test(countrycode)== false){
// 		 errorString = errorString +  "-Please enter valid country code in numeric only<br>"; 
// 	}
// 	if(areacode == ''){
//                  errorString = errorString +  "-Please enter area code <br>";
// 		 
// 	}else if(checkAC.test(areacode)== false){
// 		 errorString = errorString +  "-Please enter valid area code in numeric only<br>"; 
// 	}
	if(phonenumber ==''){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}else if(checkPhone.test(phonenumber)== false){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
		 errorString = errorString +  "-Please enter valid phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
	}
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 		
		return false;
		
	}
	else{
		return true;
	}
}
//end of validate org
//start validate edit org
function validateEditOrg()
{     
	email = trim(document.getElementById('UserEmail').value);	
        address = trim(document.getElementById('UserAddress1').value);
	city = trim(document.getElementById('UserCity').value);
	country = trim(document.getElementById('UserCountryId').value);
	state = trim(document.getElementById('UserStateId').value);
	countrycode = trim(document.getElementById('UserPhone0').value);	
	areacode = trim(document.getElementById('UserPhone1').value);	
	phoneCode = trim(document.getElementById('UserPhone2').value);
	//validation of billing information
	firstname = trim(document.getElementById('OrganisationPaymentFirstname').value);	
	lastname 	= trim(document.getElementById('OrganisationPaymentLastname').value);

	companyname 	= trim(document.getElementById('OrganisationPaymentCompanyname').value); 
	streetaddress 	= trim(document.getElementById('OrganisationPaymentStreetaddress').value);
	billingcity 		= trim(document.getElementById('OrganisationPaymentCity').value);
	 billingcountry 	= trim(document.getElementById('OrganizationPaymentDetailCountryId').value);
	 billingstate 		= trim(document.getElementById('OrganizationPaymentDetailStateId').value);
	 //billingzip 		= trim(document.getElementById('OrganizationPaymentDetailZip').value);
	//billingphone 	= trim(document.getElementById('OrganizationPaymentDetailPhonenumber').value);
	//billingadditionalphone 	= trim(document.getElementById('OrganizationPaymentDetailAdditionalphonenumber').value);
	billingemail 		= trim(document.getElementById('OrganisationPaymentEmail').value);	
	  paymentCardHolder 	= trim(document.getElementById('OrganisationPaymentHolderName').value);
	 paymentCardNo 	= trim(document.getElementById('OrganizationPaymentDetailCardNo').value);
	expireMonth	= trim(document.getElementById('OrganizationPaymentDetailExpireMonthMonth').value);
	 expireYear	= trim(document.getElementById('OrganizationPaymentDetailExpireYearYear').value);
	 securityNo	= trim(document.getElementById('OrganizationPaymentDetailSecurityNo').value);
	 var checkCC=/^[0-9]{1,4}$/;
        var checkAC=/^[0-9]{2,5}$/;
	 //var checkPhone1=/^([0-9]( |-)?)?(\(?[0-9]{3}\)?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{7})$/;
	//var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var alphaNumericTest=/^[a-zA-Z0-9 ]{1,20}$/;
	var numericTest=/^[0-9 ]{1,20}$/;
	var cardNumberTest=/^[0-9]{8,16}$/;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	areacode=areacode.replace("-", "");
	phoneCode=phoneCode.replace("-", "");
	phonenumber=''+countrycode+'-'+areacode+'-'+phoneCode;
	phonenumber=phonenumber.replace("(", "");
	phonenumber=phonenumber.replace(")", "");
        var errorString = "";
         
	
       if(email==''){
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
		 
	}
	if(email!= ''){
		
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 	
	if(address == ''){
		if(errorString==''){
			document.getElementById('UserAddress1').focus();
		}
                errorString = errorString +  "-Please enter your address <br>";
		 
                 
	}
	if(city == ''){
		if(errorString==''){
			document.getElementById('UserCity').focus();
		}
                errorString = errorString +  "-Please enter your city name. <br>";
	}
	if(country == ''){		
                errorString = errorString +  "-Please select your country name. <br>";
	}
	if(state == ''){		
                errorString = errorString +  "-Please select your state name. <br>";
		 
                 
	}
 

	if(phonenumber ==''){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}else if(checkPhone.test(phonenumber)== false){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
		 errorString = errorString +  "-Please enter valid phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
	}

	//validation of billing information

	if(billingemail==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentEmail').focus();
		}
		errorString = errorString + "-Please enter your email address billing contact information. <br>";
	}
	if(billingemail!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = billingemail;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('OrganisationPaymentEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";		 
		}
	}

	 if(firstname == '') {
		if(errorString==''){
			document.getElementById('OrganisationPaymentFirstname').focus();
		}
		errorString = errorString +  "-Please enter first name. <br>";
	 }else if(alphaTest.test(firstname)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentFirstname').focus();
		}
		 errorString = errorString +  "-Please enter first name in characters only.<br>"; 
	}
	 if(lastname == ''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentLastname').focus();
		}
                errorString = errorString +  "-Please enter last name. <br>";
	 }else if(alphaTest.test(lastname)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentLastname').focus();
		}
		 errorString = errorString +  "-Please enter last name in characters only.<br>"; 
	}
	
	if(companyname ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCompanyname').focus();
		}
                errorString = errorString +  "-Please enter company name. <br>";               
	}

	if(streetaddress ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentStreetaddress').focus();
		}
                errorString = errorString +  "-Please enter street address. <br>";               
	}
	
	if(billingcity ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCity').focus();
		}
                errorString = errorString +  "-Please enter city in billing contact information.<br>";               
	}
	if(billingcountry ==''){
                errorString = errorString +  "-Please choose country in billing contact information.<br>";               
	}
	if(billingstate ==''){
                errorString = errorString +  "-Please choose state in billing contact information.<br>";               
	}

	
	
	if(paymentCardHolder==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentHolderName').focus();
		}
		errorString = errorString + "-Please enter card holder name in payment information. <br>";
	}

	if(paymentCardNo ==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailCardNo').focus();
		}
                errorString = errorString +  "-Please enter card number. <br>";
	}else if(cardNumberTest.test(paymentCardNo)== false){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailCardNo').focus();
		}
		 errorString = errorString +  "-Please enter card number in numeric  and maximum 16 digit only.<br>"; 
	}
	if(securityNo ==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailSecurityNo').focus();
		}
                errorString = errorString +  "-Please enter card security code. <br>";
	}else if(numericTest.test(securityNo)== false){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailSecurityNo').focus();
		}
		 errorString = errorString +  "-Please enter card security code in numeric only.<br>"; 
	}
	if(expireMonth ==''){
                errorString = errorString +  "-Please choose card expiry month. <br>";               
	}
	if(expireYear ==''){
                errorString = errorString +  "-Please choose card expiry year. <br>";               
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//end of manage org
//validate Categories

function validateCatagory()
{
	 
	catalougeName = trim(document.getElementById('selected').value);	
        categorytitle = trim(document.getElementById('CatalogueTitle').value);	 	
        categorydescription = trim(document.getElementById('CatalogueDescription').value);
	catagorystatus = trim(document.getElementById('CatalogueStatus').value);     
	
	
        var errorString = "";
         
	if(catalougeName == ''){
		if(errorString==''){
			document.getElementById('selected').focus();
		}
                errorString = errorString +  "-Please add catalouge name. <br>"; 
	}
	if(categorytitle == ''){
		if(errorString==''){
			document.getElementById('CatalogueTitle').focus();
		}
                errorString = errorString +  "-Please enter title name. <br>"; 
	}
	 
        if(categorydescription==''){
		if(errorString==''){
			document.getElementById('CatalogueDescription').focus();
		}
		errorString = errorString + "-Please enter category description. <br>";
		 
	} 
	if(catagorystatus==''){
		
		errorString = errorString + "-Please choose category status. <br>";
		 
	}
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
 
//end of validate Categories
//validate course
function validateCourse()
{
	maincatalogue = trim(document.getElementById('CourseMainCatalogueId').value);
	category = trim(document.getElementById('CourseCatalogueId').value);
        coursetitle = trim(document.getElementById('CourseTitle').value);	 	
        //description = trim(document.getElementById('CourseDescription').value);
	coursestatus = trim(document.getElementById('CourseStatus').value);
	ext1 = trim(document.getElementById('CourseDocument').value);
	
        var errorString = "";
	 if(maincatalogue == ''){		
                errorString = errorString +  "-Please choose catalogue. <br>";
	}
        if(category == ''){
                errorString = errorString +  "-Please choose a main category. <br>";
	}
	 
	if(coursetitle == ''){		
                errorString = errorString +  "-Please enter course title. <br>"; 
		document.getElementById('CourseTitle').focus();
	}
	/*
        if(description==''){
		errorString = errorString + "-Please enter course description <br>";
		 
	}*/
	ext1 = ext1.substring(ext1.length-3,ext1.length);
		ext1 = ext1.toLowerCase();
		if(ext1!='')
		{	
			if((ext1 != 'jpg')&&(ext1 != 'gif')&&(ext1 != 'png')&&(ext1 != 'peg')&&(ext1 != 'tiff') &&(ext1 != 'bmp'))
			{		
			errorString = errorString +  "-Invalid image file, file should be in a .jpg/.gif/.png/.jpeg/.tiff/.bmp only.<br>";
			
			}
		}
	if(coursestatus==''){
		errorString = errorString + "-Please choose course status. <br>";
		 
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate course
//validation for search form
//validate search course
function isCourseSearch(){	
	coursetitle = trim(document.getElementById('CourseTitle').value);alert(coursetitle);
        coursestatus = trim(document.getElementById('CourseStatus').value);	 	
	var errorString = "";    
	if((coursetitle == "")&&(coursestatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//validate search categoru
function isCategorySearch(){	
	cataloguetitle = trim(document.getElementById('CatalogueTitle').value);
        cataloguestatus = trim(document.getElementById('CatalogueStatus').value);	
	var errorString = "";    
	if((cataloguetitle == "")&&(cataloguestatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search sub category
function isSubCategorySearch(){	
	subcattitle = trim(document.getElementById('SubCatalogueTitle').value);
        subcatstatus = trim(document.getElementById('SubCatalogueStatus').value);	
	var errorString = "";    
	if((subcattitle == "")&&(subcatstatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search user
function isUserSearch(){	
	title = trim(document.getElementById('UserTitle').value);
        userstatus = trim(document.getElementById('UserStatus').value);
	fieldtype = trim(document.getElementById('UserField').value);
	var errorString = "";    
	if((title == "")&&(userstatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}else if((title != "")){
		if(fieldtype == ""){
		errorString = errorString +  "-Please select search by.<br>";
		}
	}
	
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//validate search organisation
function isOrgSearch(){	
	title = trim(document.getElementById('UserTitle').value);
        status = trim(document.getElementById('UserStatus').value);
	fieldtype = trim(document.getElementById('UserField').value);
	var errorString = "";    
	if((title == "") || (status=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if((title != "")){
		if(fieldtype == ""){
		errorString = errorString +  "-Please choose option 'search by'. <br>";
		}
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search catalogues
function isCatalogueSearch()
{
	catalogoguetitle = trim(document.getElementById('MainCatalogueTitle').value);
        cataloguestatus = trim(document.getElementById('MainCatalogueStatus').value);	 	
	var errorString = "";    
	if((catalogoguetitle == "")&&(cataloguestatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search catalogues
function isSubCatalogueSearch()
{
	subcatalogoguetitle = trim(document.getElementById('SubCatalogueTitle').value);
        subcataloguestatus = trim(document.getElementById('SubCatalogueStatus').value);	 	
	var errorString = "";    
	if((subcatalogoguetitle == "")&&(subcataloguestatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search news
function isNewsSearch(){	
	newstitle = trim(document.getElementById('NewsCategory').value);
        newsstatus = trim(document.getElementById('NewsStatus').value);	 	
	var errorString = "";    
	if((newstitle == "")&&(newsstatus=="")){
		errorString = errorString +  "-Please choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//validate search articles
function isArticleSearch(){	
	articletitle = trim(document.getElementById('ArticleArticleCategory').value);
        articlestatus = trim(document.getElementById('ArticleStatus').value);	 	
	var errorString = "";    
	if((articletitle == "")&&(articlestatus=="")){
		errorString = errorString +  "-Please choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//validate search contents
function isContentSearch(){	
	contenttitle = trim(document.getElementById('ContentContentCategory').value);
        contentsearchstatus = trim(document.getElementById('ContentStatus').value);	 	
	var errorString = "";    
	if((contenttitle == "")&&(contentsearchstatus=="")){
		errorString = errorString +  "-Please choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search contents
function isFAQSearch(){	
	faqtitle = trim(document.getElementById('FaqFaqCategory').value);
        faqstatus = trim(document.getElementById('FaqStatus').value);	 	
	var errorString = "";    
	if((faqtitle == "")&&(faqstatus=="")){
		errorString = errorString +  "-Please choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search lessons
function isLessonSearch(){	
	articletitle = trim(document.getElementById('LessonTitle').value);
        articlestatus = trim(document.getElementById('LessonStatus').value);	 	
	var errorString = "";    
	if((articletitle == "")&&(articlestatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search lessonSlides
function isLessonSlideSearch(){	
	articletitle = trim(document.getElementById('LessonSlideTitle').value);
        articlestatus = trim(document.getElementById('LessonSlideStatus').value);	 	
	var errorString = "";    
	if((articletitle == "")&&(articlestatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search contents
function isGroupSearch(){	
	orgtitle = trim(document.getElementById('GroupOrganization').value);
        groupstatus = trim(document.getElementById('GroupStatus').value);	 	
	var errorString = "";    
	if((orgtitle == "")&&(groupstatus=="")){
		errorString = errorString +  "-Please choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//validate search course
function isCourseSearch(){	
	coursetitle = trim(document.getElementById('CourseTitle').value);
        coursestatus = trim(document.getElementById('CourseStatus').value);	 	
	var errorString = "";    
	if((coursetitle == "")&&(coursestatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search course
function isQuizSearch(){	
	quiztitle = trim(document.getElementById('QuizTitle').value);
        quizstatus = trim(document.getElementById('QuizStatus').value);	 	
	var errorString = "";    
	if((quiztitle == "")&&(quizstatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//end of search form validation

function isadminTicketSearch(){	
	ticketStatus = trim(document.getElementById('TicketPriority').value);
        ticketid = trim(document.getElementById('TicketStatus').value);	 	
	var errorString = "";    
	if((ticketStatus == "")&&(ticketid=="")){
		errorString = errorString +  "-Please choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}


//validate news section

function validateNews()
{	
        newstitle = trim(document.getElementById('NewsTitle').value);	 	
        //newsdescription = trim(document.getElementById('NewsDescription').value);
	ext1 = trim(document.getElementById('NewsNewsImage').value);
	newsstatus = trim(document.getElementById('NewsStatus').value);     
	
	
        var errorString = "";       
	 
	if(newstitle == ''){
		if(errorString==''){
			document.getElementById('NewsTitle').focus();
		}
                errorString = errorString +  "-Please enter news title.<br>"; 
                 
	}
	/*
        if(newsdescription==''){
		errorString = errorString + "-Please enter news description <br>";
		 
	}*/
	ext1 = ext1.substring(ext1.length-3,ext1.length);
		ext1 = ext1.toLowerCase();
		if(ext1!='')
		{	
			if((ext1 != 'jpg')&&(ext1 != 'gif')&&(ext1 != 'png')&&(ext1 != 'peg')&&(ext1 != 'tiff') &&(ext1 != 'bmp'))
			{		
			errorString = errorString +  "-Invalid picture, picture should be in a .jpg/.gif/.png/.jpeg/.tiff/.bmp file.<br>";
			
			}
		}
	if(newsstatus==''){
		errorString = errorString + "-Please choose news status. <br>";
		 
	}
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate news section
//validate user section
 function validateUser()
{    
        user_name = trim(document.getElementById('UserUsername').value);	 	
        password = trim(document.getElementById('UserPassword').value); 
	email = trim(document.getElementById('UserEmail').value);
	firstName = trim(document.getElementById('UserFirstname').value);
        lastName = trim(document.getElementById('UserLastname').value);
	address = trim(document.getElementById('UserAddress1').value);
	city = trim(document.getElementById('UserCity').value);
	country = trim(document.getElementById('UserCountryId').value);
	state = trim(document.getElementById('UserStateId').value);
	countrycode = trim(document.getElementById('UserPhone0').value);	
	areacode = trim(document.getElementById('UserPhone1').value);	
	phoneCode = trim(document.getElementById('UserPhone2').value);
	
	
	 var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
	// var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	 var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var alphaNumericTest=/^[a-zA-Z0-9 ]{1,20}$/;
	var numericTest=/^[0-9 ]{1,20}$/;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	areacode=areacode.replace("-", "");
	phoneCode=phoneCode.replace("-", "");
	phonenumber=''+countrycode+'-'+areacode+'-'+phoneCode;
	phonenumber=phonenumber.replace("(", "");
	phonenumber=phonenumber.replace(")", "");
        var errorString = "";
        
	if(user_name == ''){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
                errorString = errorString +  "-Please enter your user name. <br>";
	}else if(checkUserName.test(user_name)== false){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
		 errorString = errorString +  "-Please enter username in alphanumeric and accept special character hyphen(-), underscore(_) and dot (.) only.<br>"; 
	}
	var digit_matches=password.match(/\d{1,}\.{0,}\d{0,}/);
	if(password == ''){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
                errorString = errorString +  "-Please enter password. <br>";
	}else if(password.length<6){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
		errorString = errorString + "-Password is too short (minimum is 6 characters).<br>";
		 
	}
	 
	    
       if(email==''){
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
		 
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 if(firstName == ''){
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
                errorString = errorString +  "-Please enter your first name. <br>";
	}else if(alphaTest.test(firstName)== false){
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
		 errorString = errorString +  "-Please enter first name in characters only.<br>"; 
	}
	 if(lastName == ''){
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
                errorString = errorString +  "-Please enter your last name. <br>";
	}else if(alphaTest.test(lastName)== false){
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
		 errorString = errorString +  "-Please enter last name in characters only.<br>"; 
	}
	if(address == ''){
		if(errorString==''){
			document.getElementById('UserAddress1').focus();
		}
                errorString = errorString +  "-Please enter your address. <br>";
	}
	if(city == ''){
		if(errorString==''){
			document.getElementById('UserCity').focus();
		}
                errorString = errorString +  "-Please enter your city name. <br>";
		 
                 
	}
	if(country == ''){
                errorString = errorString +  "-Please select your country name. <br>";
		 
                 
	}
	if(state == ''){
                errorString = errorString +  "-Please select your state name. <br>";
	}
	if(phonenumber ==''){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}else if(checkPhone.test(phonenumber)== false){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
		 errorString = errorString +  "-Please enter valid phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate user section
 function validateOrganizationUser()
{    	organization = trim(document.getElementById('UserOrganizationId').value);
        user_name = trim(document.getElementById('UserUsername').value);	 	
        password = trim(document.getElementById('UserPassword').value); 
	email = trim(document.getElementById('UserEmail').value);
	firstName = trim(document.getElementById('UserFirstname').value);
        lastName = trim(document.getElementById('UserLastname').value);
	address = trim(document.getElementById('UserAddress1').value);
	city = trim(document.getElementById('UserCity').value);
	country = trim(document.getElementById('UserCountryId').value);
	state = trim(document.getElementById('UserStateId').value);
	countrycode = trim(document.getElementById('UserPhone0').value);	
	areacode = trim(document.getElementById('UserPhone1').value);	
	phoneCode = trim(document.getElementById('UserPhone2').value);
	
	 var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
	 //var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	 var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var alphaNumericTest=/^[a-zA-Z0-9 ]{1,20}$/;
	var numericTest=/^[0-9 ]{1,20}$/;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	areacode=areacode.replace("-", "");
	phoneCode=phoneCode.replace("-", "");
	phonenumber=''+countrycode+'-'+areacode+'-'+phoneCode;
	phonenumber=phonenumber.replace("(", "");
	phonenumber=phonenumber.replace(")", "");
        var errorString = "";
        if(organization == ''){
                errorString = errorString +  "-Please choose a organization. <br>";
	}
	if(user_name == ''){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
                errorString = errorString +  "-Please enter your user name. <br>";
	}else if(checkUserName.test(user_name)== false){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
		 errorString = errorString +  "-Please enter username in alphanumeric and accept special character hyphen(-), underscore(_) and dot (.) only.<br>"; 
	}
	var digit_matches=password.match(/\d{1,}\.{0,}\d{0,}/);
	if(password == ''){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
                errorString = errorString +  "-Please enter password. <br>";
	}else if(password.length<6){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
		errorString = errorString + "-Password is too short (minimum is 6 characters).<br>";
		 
	}
	 
	    
       if(email==''){
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
		 
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 if(firstName == ''){
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
                errorString = errorString +  "-Please enter your first name. <br>";
	}else if(alphaTest.test(firstName)== false){
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
		 errorString = errorString +  "-Please enter first name in characters only.<br>"; 
	}
	 if(lastName == ''){
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
                errorString = errorString +  "-Please enter your last name. <br>";
	}else if(alphaTest.test(lastName)== false){
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
		 errorString = errorString +  "-Please enter last name in characters only.<br>"; 
	}
	if(address == ''){
		if(errorString==''){
			document.getElementById('UserAddress1').focus();
		}
                errorString = errorString +  "-Please enter your address. <br>";
	}
	if(city == ''){
		if(errorString==''){
			document.getElementById('UserCity').focus();
		}
                errorString = errorString +  "-Please enter your city name. <br>";
		 
                 
	}
	if(country == ''){
                errorString = errorString +  "-Please select your country name. <br>";
		 
                 
	}
	if(state == ''){
                errorString = errorString +  "-Please select your state name. <br>";
	}
	if(phonenumber ==''){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}else if(checkPhone.test(phonenumber)== false){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
		 errorString = errorString +  "-Please enter valid phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}


//end of validate user section

 function validateUpdateUser()
{    
        user_name = trim(document.getElementById('UserUsername').value);       
	email = trim(document.getElementById('UserEmail').value);
	firstName = trim(document.getElementById('UserFirstname').value);
        lastName = trim(document.getElementById('UserLastname').value);
	address = trim(document.getElementById('UserAddress1').value);
	city = trim(document.getElementById('UserCity').value);
	country = trim(document.getElementById('UserCountryId').value);
	state = trim(document.getElementById('UserStateId').value);
	countrycode = trim(document.getElementById('UserPhone0').value);	
	areacode = trim(document.getElementById('UserPhone1').value);	
	phoneCode = trim(document.getElementById('UserPhone2').value);
	
	 //var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	 var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var alphaNumericTest=/^[a-zA-Z0-9 ]{1,20}$/;
	var numericTest=/^[0-9 ]{1,20}$/;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	areacode=areacode.replace("-", "");
	phoneCode=phoneCode.replace("-", "");
	phonenumber=''+countrycode+'-'+areacode+'-'+phoneCode;
	phonenumber=phonenumber.replace("(", "");
	phonenumber=phonenumber.replace(")", "");
        var errorString = "";
        
	if(user_name == ''){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
                errorString = errorString +  "-Please enter your user name. <br>";
	}else if(alphaNumericTest.test(user_name)== false){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
		 errorString = errorString +  "-Please enter username in alphanumeric only.<br>"; 
	}
	
	    
       if(email==''){
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
		 
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 if(firstName == ''){
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
                errorString = errorString +  "-Please enter your first name. <br>";
	}else if(alphaTest.test(firstName)== false){
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
		 errorString = errorString +  "-Please enter first name in characters only.<br>"; 
	}
	 if(lastName == ''){
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
                errorString = errorString +  "-Please enter your last name. <br>";
	}else if(alphaTest.test(lastName)== false){
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
		 errorString = errorString +  "-Please enter last name in characters only.<br>"; 
	}
	if(address == ''){
		if(errorString==''){
			document.getElementById('UserAddress1').focus();
		}
                errorString = errorString +  "-Please enter your address. <br>";
	}
	if(city == ''){
		if(errorString==''){
			document.getElementById('UserCity').focus();
		}
                errorString = errorString +  "-Please enter your city name. <br>";
		 
                 
	}
	if(country == ''){
                errorString = errorString +  "-Please select your country name. <br>";
		 
                 
	}
	if(state == ''){
                errorString = errorString +  "-Please select your state name. <br>";
	}
	if(phonenumber ==''){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}else if(checkPhone.test(phonenumber)== false){
		if(errorString==''){
			document.getElementById('UserPhone0').focus();
			
		}
		 errorString = errorString +  "-Please enter valid phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//end of validate user section

//validate changepassword
 function changePass()
{    
        oldPass = trim(document.getElementById('AdminOldpass').value);	 	
        newPass = trim(document.getElementById('AdminPassword').value);
	confnewPass = trim(document.getElementById('AdminConfirmPassword').value); 
	 
        var errorString = "";
         
	if(oldPass == ''){
		if(errorString==''){
			document.getElementById('AdminOldpass').focus();
		}
                errorString = errorString +  "-Please enter your old password. <br>";
	 
                 
	}
	
        if(newPass == ''){
		if(errorString==''){
			document.getElementById('AdminPassword').focus();
		}
                errorString = errorString +  "-Please enter your new password. <br>";
		 
                 
	}
	if(confnewPass==''){
		if(errorString==''){
			document.getElementById('AdminConfirmPassword').focus();
		}
		errorString = errorString + "-Password confirmation can't be blank.<br>";		
	}
	if((confnewPass != '') && (newPass!='')){
		if(newPass != confnewPass){
			if(errorString==''){
				document.getElementById('AdminPassword').focus();
			}
			errorString = errorString + "-New Password doesn't match with Confirm Password.  <br>";
		}
	}
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate changepassword
//validate Article
function validateArticle()
{	
        articletitle = trim(document.getElementById('ArticleTitle').value);	 	
        authorname = trim(document.getElementById('ArticleAuthorname').value);
	//articleDescription = trim(document.getElementById('ArticleDescription').value);
	ext = trim(document.getElementById('ArticleDocument').value);
	ext1 = trim(document.getElementById('ArticleFileName10').value);
	articlestatus = trim(document.getElementById('ArticleStatus').value); 
	
        var errorString = "";       
	 
	if(articletitle == ''){
		if(errorString==''){
			document.getElementById('ArticleTitle').focus();
		}
                errorString = errorString +  "-Please enter article title. <br>"; 
                 
	}
	
        if(authorname==''){
		if(errorString==''){
			document.getElementById('ArticleAuthorname').focus();
		}
		errorString = errorString + "-Please enter author name. <br>";
		 
	}
	/*
	if(articleDescription==''){
		errorString = errorString + "-Please enter article description <br>";
		 
	}	
	*/
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext!='')
		{	
			if((ext != 'docx')&&(ext != 'ocx') &&(ext != 'doc')&&(ext != 'pdf'))
			{		
			errorString = errorString +  "-Invalid document, document should be in a .doc/.docx/.pdf file only.<br>";
			
			}
		}
	ext1 = ext1.substring(ext1.length-3,ext1.length);
		ext1 = ext1.toLowerCase();
		if(ext1!='')
		{	
			if((ext1 != 'jpg')&&(ext1 != 'gif')&&(ext1 != 'png')&&(ext1 != 'peg')&&(ext1 != 'tiff') &&(ext1 != 'bmp')&&(ext1 != 'peg'))
			{		
			errorString = errorString +  "-Invalid picture, picture should be in a .jpg/.gif/.png/.jpeg/.tiff/.bmp file only.<br>";
			
			}
		}	
	if(articlestatus==''){
		errorString = errorString + "-Please choose article status. <br>";
		 
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate article

//validate certificates

function validateCertificate(){
	headerText = trim(document.getElementById('CertificateHeaderText').value);	
	ext = trim(document.getElementById('CertificateLogo').value);	
	ext1 = trim(document.getElementById('CertificateSignatureLogo').value);	
	certificatestatus = trim(document.getElementById('CertificateStatus').value); 
	
        var errorString = "";
	if(headerText==''){
		if(errorString==''){
			document.getElementById('CertificateHeaderText').focus();
		}
		errorString = errorString + "-Please enter header text of certificate. <br>";		 
	}
	
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext=='')
		{
			errorString = errorString + "-Please select a logo image. <br>";
		}else 
			if((ext != 'jpg')&&(ext != 'bmp') &&(ext != 'gif')&&(ext != 'png')&&(ext != 'peg'))
			{		
			errorString = errorString +  "-Invalid Logo type, logo should be in a .jpg/.bmp/.gif and .png only.<br>";
			}
	ext1 = ext1.substring(ext1.length-3,ext1.length);
		ext1 = ext1.toLowerCase();
		if(ext1=='')
		{
			errorString = errorString + "-Please select a signature image. <br>";
		}else 
			if((ext1 != 'jpg')&&(ext1 != 'bmp') &&(ext1 != 'gif')&&(ext1 != 'png')&&(ext1 != 'peg'))
			{		
			errorString = errorString +  "-Invalid Logo type, logo should be in a .jpg/.bmp/.gif and .png only.<br>";
			
			}
	if(certificatestatus==''){
		errorString = errorString + "-Please choose  status. <br>";
	}
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate certificate
//validate certificates

function validateEditCertificate(){
	headerText = trim(document.getElementById('CertificateHeaderText').value);	
	ext = trim(document.getElementById('CertificateLogo').value);	
	certificatestatus = trim(document.getElementById('CertificateStatus').value); 
        var errorString = "";
	if(headerText==''){
		if(errorString==''){
			document.getElementById('CertificateHeaderText').focus();
		}
		errorString = errorString + "-Please enter header text of certificate. <br>";		 
	}
	
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext!='')
		{
			errorString = errorString + "-Please select a logo image. <br>";
		}else 
			if((ext != 'jpg')&&(ext != 'bmp') &&(ext != 'gif')&&(ext != 'png')&&(ext != 'peg'))
			{		
			errorString = errorString +  "-Invalid Logo type, logo should be in a .jpg/.bmp/.gif and .png only.<br>";
			
			}
		
		
	if(certificatestatus==''){
		errorString = errorString + "-Please choose logo status. <br>";
		 
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate certificate


//validate Manage certificates

function validateEditCertificate(){	
        
	ext = trim(document.getElementById('CertificateLogo').value);	
	editcertificatestatus = trim(document.getElementById('CertificateStatus').value); 
	
        var errorString = "";       
	 
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext!='')
		{	
			if((ext != 'jpg')&&(ext != 'bmp') &&(ext != 'gif')&&(ext != 'png')&&(ext != 'peg'))
			{		
			errorString = errorString +  "-Invalid Logo type, logo should be in a .jpg/.bmp/.gif and .png only.<br>";
			
			}
		}
		
	if(editcertificatestatus==''){
		errorString = errorString + "-Please choose logo status. <br>";
		 
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of manage certificate
//validate email templates

function validateEmailTemplate()
{    	 //templatetype = trim(document.getElementById('EmailTemplateType').value);	     
        subject = trim(document.getElementById('EmailTemplateSubject').value);	         
	 
        var errorString = "";
	/*
         if(templatetype == ''){
		if(errorString==''){
			document.getElementById('EmailTemplateType').focus();
		}
                errorString = errorString +  "-Please enter email template type. <br>";
	 
                 
	}*/
	if(subject == ''){
		if(errorString==''){
			document.getElementById('EmailTemplateSubject').focus();
		}
                errorString = errorString +  "-Please enter email template subject. <br>";
	 
                 
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of manage email templates

//validate contents page

function validateContent()
{    
 headtitle = trim(document.getElementById('ContentMetaTitle').value);
 contenttitle= trim(document.getElementById('ContentPagetitle').value);
 metakeyword =trim(document.getElementById('ContentMetaKeywords').value);
 metadescription=trim(document.getElementById('ContentMetaDescription').value);
 contentStatus=trim(document.getElementById('ContentStatus').value);
 var focus_val=false; 
 var errorString = "";
 if(headtitle=='')
	{
	   errorString = errorString +  "-Please enter page header title. <br>"; 
          if(focus_val ==false){
		focus_val = document.getElementById('ContentMetaTitle');          }
	}
	  if(contenttitle== '')
	{
	  errorString = errorString +  "-Please enter  content title. <br>"; 
        if(focus_val ==false){
	      focus_val = document.getElementById('ContentPagetitle');
	  }
	}
	 if(metakeyword==''){
	     errorString = errorString +  "-Please enter  meta keyword. <br>"; 
            if(focus_val ==false){
	   focus_val = document.getElementById('ContentMetaKeywords'); 
           }
	}
	 if(metadescription==''){
        errorString = errorString +  "-Please enter  meta description. <br>"; 
       if(focus_val ==false){
	  focus_val = document.getElementById('ContentMetaDescription');         }
	}
	  if(contentStatus=='')
	{
            errorString = errorString +  "-Please  select Content Status <br>"; 
              if(focus_val ==false){
	   focus_val = document.getElementById('ContentStatus');
                     }
        }
      
        if(errorString != ""){
                window.scrollTo(0,0);
		focus_val.focus();
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

function validateContent1()
{
    headtitle = trim(document.getElementById('ContentMetaTitle').value);
    pagetitle = trim(document.getElementById('ContentPagetitle').value); 
    metaKeywords= trim(document.getElementById('ContentMetaKeywords').value);
    metaDesciption=trim(document.getElementById('ContentMetaDescription').value);
    contentStatus=trim(document.getElementById('ContentStatus').value);
    var focus_val=false; 
    var errorString = "";
if(headtitle==''){
   errorString = errorString +  "-Please enter page header title. <br>";  if(focus_val ==false){
	     		focus_val = document.getElementById('ContentMetaTitle');
		}             
} 

if(pagetitle==''){            	 
         errorString = errorString +  "-Please enter content page title <br>";  if(focus_val ==false){
	     		focus_val = document.getElementById('ContentPagetitle');
		}             
} 

if(metaKeywords==''){            	 
         errorString = errorString +  "-Please enter content  keywords<br>";  if(focus_val ==false){
	     		focus_val = document.getElementById('ContentMetaKeywords');
		}             
} 

if(metaDesciption==''){            	 
         errorString = errorString +  "-Please enter content   description<br>";  if(focus_val ==false){
	     		focus_val = document.getElementById('ContentMetaDescription');
		}             
} 

if(contentStatus==''){
           errorString = errorString +  "-Please select content status. <br>";  if(focus_val ==false){
	     focus_val = document.getElementById('ContentStatus');
               }
}

if(errorString != ""){
		window.scrollTo(0,0);
                focus_val.focus();
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of manage Contents
//validate  Home page
function validateHome()
{    
 
var  headtitle= trim(document.getElementById('UserFirstname').value);
var  UserLastname= trim(document.getElementById('UserLastname').value);	 
var  UserEmail= trim(document.getElementById('UserEmail').value);	
  var   UserAddress1= trim(document.getElementById('UserAddress1').value);	 
  var       ContentStatus    = trim(document.getElementById('UserStatus').value);    

var       UserHomeAreaCode = trim(document.getElementById('UserHomeAreaCode').value);

var       UserHomeContact = trim(document.getElementById('UserHomeContact').value);
        var  UserMobileNo= trim(document.getElementById('UserMobileNo').value);
        var errorString = "";
var   UserSecurityQuestion1=trim(document.getElementById('UserSecurityQuestion1').value);

var       UserAnswer1 = trim(document.getElementById('UserAnswer1').value);

var   UserSecurityQuestion2=trim(document.getElementById('UserSecurityQuestion2').value);

var       UserAnswer2= trim(document.getElementById('UserAnswer2').value);


//var       UserPassword = trim(document.getElementById('UserPassword').value); 

//var       UserConfirmPassword= trim(document.getElementById('UserConfirmPassword').value);

var       UserZipcode= trim(document.getElementById('UserZipcode').value); 
 var   userHomeContactId= trim(document.getElementById('UserHomeContactId').value); 
// var   UserPassword= trim(document.getElementById('UserPassword').value);
 //var  UserConfirmPassword= trim(document.getElementById('UserConfirmPassword').value);


var alphaTest=/^[a-zA-Z ]{1,20}$/i;


        var errorString = "";
	if(headtitle == ''){

 
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
                errorString =errorString+"-Please enter Firstname.<br/>";               
	}else if(alphaTest.test(headtitle)== false){




                   
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}		
		 errorString = errorString +  "-Please enter Firstname in characters only.<br>"; 
                


	}  
	 
	if(UserLastname== ''){

 
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
                errorString =errorString+"-Please enter  Lastname.<br/>";               
	}else if(alphaTest.test(UserLastname)== false){




                   
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}		
		 errorString = errorString +  "-Please enter Last name in characters only.<br>"; 
                

 
	}  
	if(UserEmail== ''){

 
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
                errorString =errorString+"-Please enter   Email.<br/>";               
	}

          if(UserEmail!= ''){
	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = UserEmail;
		if(reg.test(address) == false) {
			if(errorString==''){
				document.getElementById('UserEmail').focus();
			}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	} 
        if(UserAddress1== ''){

 
		if(errorString==''){
			document.getElementById('UserAddress1').focus();
		}
                errorString =errorString+"-Please enter  First Address<br/>";               
	} 	
        
      if(UserZipcode==''){

        if(errorString==''){
			document.getElementById('UserZipcode').focus();
		}
    errorString = errorString +  "-Please  enter zip code. <br>";               
	}



        
    
    if((UserHomeAreaCode=='')&&(UserHomeContact=='')){
          if(errorString==''){
			document.getElementById('UserHomeAreaCode').focus();
		}


                errorString = errorString +  "-Please  specify  Home area Code. <br>";   
            

            
	}
if(UserMobileNo==''){

           if(errorString==''){
			document.getElementById('UserMobileNo').focus();
		}
                errorString = errorString +  "-Please  enter  User  Mobile No   <br>";  
        

             
	} 
 /* var digit_matches=UserPassword.match(/\d{1,}\.{0,}\d{0,}/);
   if(UserPassword==''){
                errorString = errorString +  "-Please  enter  User   Password   <br>";  
        document.getElementById('UserPassword').focus();             
	}else if(UserPassword.length<6){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
		errorString = errorString + "-Password is too short (minimum is 6 characters).<br>";
	} 

if(UserConfirmPassword!=UserPassword)
{


if(errorString==''){
			document.getElementById('UserConfirmPassword').focus();
		}
		errorString = errorString + "-Please Confirm your Password.<br>";
}
*/
 if(UserSecurityQuestion1 ==''){

              if(errorString==''){
			document.getElementById('UserSecurityQuestion1').focus();
		}
                errorString = errorString +  "-Please select  your Security Question1. <br>";               
	}
if(UserAnswer1==''){

              if(errorString==''){
			document.getElementById('UserAnswer1').focus();
		}
                errorString = errorString +  "-Please  enter  your Answer for Security Question1. <br>";               
	}
if(UserSecurityQuestion2==''){

              if(errorString==''){
			document.getElementById('UserSecurityQuestion2').focus();
		}
                errorString = errorString +  "-Please select  your Security Question2. <br>";               
	}
if(UserAnswer2==''){

              if(errorString==''){
			document.getElementById('UserAnswer2').focus();
		}
                errorString = errorString +  "-Please  enter  your Answer for Security Question2. <br>";               
	}








        if(ContentStatus ==''){

              if(errorString==''){
			document.getElementById('UserStatus').focus();
		}
                errorString = errorString +  "-Please select  User status. <br>";               
	}




        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}














///////////////////////
function validateHoliday()
{    
    alert('test');
var  headtitle= trim(document.getElementById('UserFirstname').value);
var  UserLastname= trim(document.getElementById('UserLastname').value);	 
var  UserEmail= trim(document.getElementById('UserEmail').value);	
  var   UserAddress1= trim(document.getElementById('UserAddress1').value);	 
  var       ContentStatus    = trim(document.getElementById('UserStatus').value);    


var       UserCityId = trim(document.getElementById('UserCityId').value);
var       UserHomeAreaCode = trim(document.getElementById('UserHomeAreaCode').value);

var       UserHomeContact = trim(document.getElementById('UserHomeContact').value);
        var  UserMobileNo= trim(document.getElementById('UserMobileNo').value);
        var errorString = "";
        var       UserStateId = trim(document.getElementById('UserStateId').value);
 var       UserCountryId = trim(document.getElementById('UserCountryId').value); 


var   UserSecurityQuestion1=trim(document.getElementById('UserSecurityQuestion1').value);

var       UserAnswer1 = trim(document.getElementById('UserAnswer1').value);

var   UserSecurityQuestion2=trim(document.getElementById('UserSecurityQuestion2').value);

var       UserAnswer2= trim(document.getElementById('UserAnswer2').value);


//var       UserPassword = trim(document.getElementById('UserPassword').value); 

//var       UserConfirmPassword= trim(document.getElementById('UserConfirmPassword').value);

var       UserZipcode= trim(document.getElementById('UserZipcode').value); 
 var   userHomeContactId= trim(document.getElementById('UserHomeContactId').value); 
// var   UserPassword= trim(document.getElementById('UserPassword').value);
// var  UserConfirmPassword= trim(document.getElementById('UserConfirmPassword').value);


var alphaTest=/^[a-zA-Z ]{1,20}$/i;


        var errorString = "";
	if(headtitle == ''){

               alert('test')
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}
                errorString =errorString+"-Please enter Firstname.<br/>";               
	}else if(alphaTest.test(headtitle)== false){




                   
		if(errorString==''){
			document.getElementById('UserFirstname').focus();
		}		
		 errorString = errorString +  "-Please enter Firstname in characters only.<br>"; 
                


	}  
	 
	if(UserLastname== ''){

 
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}
                errorString =errorString+"-Please enter  Lastname.<br/>";               
	}else if(alphaTest.test(UserLastname)== false){




                   
		if(errorString==''){
			document.getElementById('UserLastname').focus();
		}		
		 errorString = errorString +  "-Please enter Last name in characters only.<br>"; 
                

 
	}  
	if(UserEmail== ''){

 
		if(errorString==''){
			document.getElementById('UserEmail').focus();
		}
                errorString =errorString+"-Please enter   Email.<br/>";               
	}

          if(UserEmail!= ''){
	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = UserEmail;
		if(reg.test(address) == false) {
			if(errorString==''){
				document.getElementById('UserEmail').focus();
			}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	} 
        if(UserAddress1== ''){

 
		if(errorString==''){
			document.getElementById('UserAddress1').focus();
		}
                errorString =errorString+"-Please enter  First Address<br/>";               
	} 	
        if(UserCountryId ==''){

              if(errorString==''){
			document.getElementById('UserCountryId').focus();
		}


                errorString = errorString +  "-Please select  User Country   <br>";               
	}

      if(UserStateId  ==''){


            if(errorString==''){
			document.getElementById('UserStateId').focus();
		}





                errorString = errorString +  "-Please select  User   State <br>";               
	}
      if(UserCityId  ==''){

        if(errorString==''){
			document.getElementById('UserCityId').focus();
		}
    errorString = errorString +  "-Please select  User  City. <br>";               
	}
        
      if(UserZipcode==''){

        if(errorString==''){
			document.getElementById('UserZipcode').focus();
		}
    errorString = errorString +  "-Please  enter zip code. <br>";               
	}



        
    
    if((UserHomeAreaCode=='')&&(UserHomeContact=='')&&(userHomeContactId=='')){
          if(errorString==''){
			document.getElementById('UserHomeAreaCode').focus();
		}


                errorString = errorString +  "-Please  specify  Home area Code. <br>";   
            

            
	}
if(UserMobileNo==''){

           if(errorString==''){
			document.getElementById('UserMobileNo').focus();
		}
                errorString = errorString +  "-Please  enter  User  Mobile No   <br>";  
        

             
	} 
 /* var digit_matches=UserPassword.match(/\d{1,}\.{0,}\d{0,}/);
   if(UserPassword==''){
                errorString = errorString +  "-Please  enter  User   Password   <br>";  
        document.getElementById('UserPassword').focus();             
	}else if(UserPassword.length<6){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
		errorString = errorString + "-Password is too short (minimum is 6 characters).<br>";
	} 

if(UserConfirmPassword!=UserPassword)
{


if(errorString==''){
			document.getElementById('UserConfirmPassword').focus();
		}
		errorString = errorString + "-Please Confirm your Password.<br>";
}
*/
 if(UserSecurityQuestion1 ==''){

              if(errorString==''){
			document.getElementById('UserSecurityQuestion1').focus();
		}
                errorString = errorString +  "-Please select  your Security Question1. <br>";               
	}
if(UserAnswer1==''){

              if(errorString==''){
			document.getElementById('UserAnswer1').focus();
		}
                errorString = errorString +  "-Please  enter  your Answer for Security Question1. <br>";               
	}
if(UserSecurityQuestion2==''){

              if(errorString==''){
			document.getElementById('UserSecurityQuestion2').focus();
		}
                errorString = errorString +  "-Please select  your Security Question2. <br>";               
	}
if(UserAnswer2==''){

              if(errorString==''){
			document.getElementById('UserAnswer2').focus();
		}
                errorString = errorString +  "-Please  enter  your Answer for Security Question2. <br>";               
	}

        if(ContentStatus ==''){

              if(errorString==''){
			document.getElementById('UserStatus').focus();
		}
                errorString = errorString +  "-Please select  User status. <br>";               
	}
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}










//////////////////////
//end of   Contents

//Validating User Email Starts
function validateEmail(trgt1,trgt2,trgt3)
{
	trgtFrm = document.getElementById(trgt1);
	showDivAtCenter('loadingAnimation');	
	jAjax.sendRequest({
	'url':"/admin/users/checkEmail",
	'dataType':'html',
	'data':jAjax.serializeForm(trgtFrm),
	'method':'post',
	'callback':function(resp)
				{
					var data = trim(resp);
					
					if(data.length>0)
					{
						document.getElementById(trgt3).innerHTML=data;
						document.getElementById(trgt2).value='';
						jq('#loadingAnimation').hide();
					}
					else
					{
						document.getElementById(trgt3).innerHTML='';
						jq('#loadingAnimation').hide();
					}
				}
	
	
	});
	return false;
}
//Validating User Email Ends

//validate contents page

function validateCreateHelp()
{    
        catagory = trim(document.getElementById('HelpCatalogueId').value);
	helptitle = trim(document.getElementById('HelpTitle').value);	
	ext = trim(document.getElementById('HelpDocument').value);
	
  
        var errorString = "";
         
	if(catagory == ''){		
                errorString = errorString +  "-Please choose a category. <br>";               
	}
	if(helptitle == ''){
		if(errorString==''){
			document.getElementById('HelpTitle').focus();
		}
                errorString = errorString +  "-Please enter help title. <br>";               
	}
	
	ext = ext.substring(ext.length-3,ext.length);
	
		if(ext == ''){		
                errorString = errorString +  "-Please upload a help file. <br>";               
		}
		ext = ext.toLowerCase();
		if(ext!='')
		{	
			if((ext != 'jpg')&&(ext != 'png')&&(ext != 'gif') &&(ext != 'pdf')&&(ext != 'peg'))
			{		
			errorString = errorString +  "-Invalid document, document should be in a .jpg/.gif/.png or .pdf file.<br>";
			
			}
		}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of manage Contents


//validate sendComment

function validateSendComment()
{    
        TicketComment = trim(document.getElementById('TicketCommentComment').value);
	
	TicketStatus = trim(document.getElementById('TicketStatus').value);
  
        var errorString = "";
         
	if(TicketComment == ''){
		if(errorString==''){
			document.getElementById('TicketCommentComment').focus();
		}
                errorString = errorString +  "-Please enter your comment in comment box. <br>";               
	}
	
	if(TicketStatus ==''){
                errorString = errorString +  "-Please select ticket status. <br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validateSendComment

//validate assignLesson
function validateAssignLesson()
{    
        faqCourse = trim(document.getElementById('FaqCourseId').value);	
	faqLesson = trim(document.getElementById('FaqLessonId').value);
	
        var errorString = "";
        if(faqCourse!=''){
		
		if(faqLesson ==''){
			errorString = errorString +  "-Please choose a lesson. <br>";               
		}
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of manage Contents

//validate Lessons

function validateLesson(){
  category = trim(document.getElementById('LessonCatalogueId').value);
  course = trim(document.getElementById('LessonCourseId').value);
	lessontitle = trim(document.getElementById('LessonTitle').value);	
	lessonStatus = trim(document.getElementById('LessonStatus').value);
 
   var errorString = "";
         
	if(category == ''){
      errorString = errorString +  "-Please choose a main category. <br>";
	} 
	if(course == ''){
		if(errorString==''){
			document.getElementById('LessonCourseId').focus();
		}
                errorString = errorString +  "-Please choose a course. <br>";
	} 
	if(lessontitle == ''){
		if(errorString==''){
			document.getElementById('LessonTitle').focus();
		}
                errorString = errorString +  "-Please enter lesson title. <br>";               
	}
 
	if(lessonStatus ==''){
                errorString = errorString +  "-Please choose lesson status. <br>";               
	}     	 
    if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of manage Lessons

//validate validateAssignCatalogue

function validateAssignCatalogue(){    
        mainCategory = trim(document.getElementById('SubCatalogueCatalogueId').value);
	subcategorytitle = trim(document.getElementById('SubCatalogueTitle').value);	
	subCategoryStatus = trim(document.getElementById('SubCatalogueStatus').value);
  
        var errorString = "";
         
	if(mainCategory == ''){
        errorString = errorString +  "-Please choose a main category. <br>";               
	} 
	if(subcategorytitle == ''){
		if(errorString==''){
			document.getElementById('SubCatalogueTitle').focus();
		}
         errorString = errorString +  "-Please enter sub category title. <br>";               
	}
	
	if(subCategoryStatus ==''){
       errorString = errorString +  "-Please choose sub category status. <br>";               
	}    	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of manage validateAssignCatalogue



/// validate Add new lesson

 function validateSlides(){ 
	catalogueId 		= trim(document.getElementById('LessonSlideCatalogueId').  value);
	courseId 		    = trim(document.getElementById('LessonSlideCourseId').value);
	lesson 			    = trim(document.getElementById('LessonSlideLessonId').value);
	templateType 		= trim(document.getElementById('LessonTemplateType').value);
	lessonType 		  = trim(document.getElementById('LessonTemplateType').value); 
	slidetitle 	  	= trim(document.getElementById('LessonSlideTitle').value);
 if(document.getElementById('LessonSlideSlide')){	
		image 		    = trim(document.getElementById('LessonSlideSlide').value);
	}
	if(document.getElementById('LessonSlideAudioImage')){	
		audioImage 		= trim(document.getElementById('LessonSlideAudioImage').value);
	}
	if(document.getElementById('LessonSlideSlideImage')){	
		image 		    = trim(document.getElementById('LessonSlideSlideImage').value);
	}
	if(document.getElementById('video')){	
		video 		    = trim(document.getElementById('video').value);
	}
	if(document.getElementById('audio')){	
		audio 		    = trim(document.getElementById('audio').value); 
	}
	LessonSlideStatus 	= trim(document.getElementById('LessonSlideStatus').value);
	var errorString = ""; 
  	if(catalogueId == ''){
       errorString = errorString +  "-Please select catalogue name. <br>";               
  	}
  	if(courseId == ''){
       errorString = errorString +  "-Please select course name. <br>";               
  	} 
  	if(lesson == ''){
       errorString = errorString +  "-Please select lesson name. <br>";               
  	}
  	if(templateType ==''){
       errorString = errorString +  "-Please select template type. <br>";               
  	}
  	if(lessonType == ''){
       errorString = errorString +  "-Please select lesson slide type. <br>";               
  	}
  	if(slidetitle ==''){
		document.getElementById('LessonSlideTitle').focus();		
                errorString = errorString +  "-Please enter title name. <br>";               
	}
 	if(document.getElementById('LessonSlideSlide')){
		if(image ==''){
			document.getElementById('LessonSlideSlide').focus();		
			errorString = errorString +  "-Please select image . <br>";               
		}
		image = image.substring(image.length-3,image.length);
		image = image.toLowerCase();
		if(image!=''){	
			if((image != 'jpg')&&(image != 'gif')&&(image != 'png')&&(image != 'peg')&&(image != 'tiff') &&(image != 'bmp') &&(image != 'jpeg'))
			{		
			errorString = errorString +  "-Invalid image file, file should be in a .jpg/.gif/.png/.jpeg/.tiff/.bmp only.<br>"; 
			}
		} 
	}
	if(document.getElementById('LessonSlideAudioImage')){
		if(audioImage ==''){
			document.getElementById('LessonSlideAudioImage').focus();		
			errorString = errorString +  "-Please select image . <br>";               
		}
		audioImage = audioImage.substring(audioImage.length-3,audioImage.length);
		audioImage = audioImage.toLowerCase();
		if(audioImage!='')
		{	
			if((audioImage != 'jpg')&&(audioImage != 'gif')&&(audioImage != 'png')&&(audioImage != 'peg')&&(audioImage != 'tiff') &&(audioImage != 'bmp') &&(audioImage != 'jpeg'))
			{		
			errorString = errorString +  "-Invalid image file, file should be in a .jpg/.gif/.png/.jpeg/.tiff/.bmp only.<br>"; 
			}
		} 
	}
	if(document.getElementById('LessonSlideSlideImage')){
		if(image ==''){
			document.getElementById('LessonSlideSlideImage').focus();		
			errorString = errorString +  "-Please select image . <br>";               
		}
	}
	if(document.getElementById('video')){
		if(video ==''){
			document.getElementById('video').focus();		
			errorString = errorString +  "-Please select video file . <br>";               
		}
  		video = video.substring(video.length-3,video.length);
  		video = video.toLowerCase();
  		if(video!='')
  		{ 
  			if((video != 'mpg')&&(video != 'mpeg')&&(video != 'wma')&&(video != 'mov')&&(video != 'flv') &&(video != 'mp4') &&(video != 'avi') &&(video != 'avi') &&(video != 'qt') &&(video != 'wmv') &&(video != 'rm') ) {		
  			errorString = errorString +  "-Invalid video file, file should be in a .mp3/.mp4/.wma/.jpeg/.avi/.wmv only.<br>"; 
  			}
  		} 
	}
	if(document.getElementById('audio')){
		if(audio ==''){
			document.getElementById('audio').focus();		
			errorString = errorString +  "-Please select audio file . <br>";               
		}
		audio = audio.substring(audio.length-3,audio.length);
		audio = audio.toLowerCase();
		if(audio!='')
		{
			if((audio != 'mp3')&&(audio != 'mp4')&&(audio != 'wma')&&(audio != 'avi')&&(audio != 'wmv') ) {		
			errorString = errorString +  "-Invalid image file, file should be in a .mp3/.mp4/.wma/.jpeg/.avi/.wmv only.<br>"; 
			}
		} 
	}
    	if(LessonSlideStatus ==''){
           errorString = errorString +  "-Please select status. <br>";               
    	}  
    	if(errorString != ""){
  		window.scrollTo(0,0);
  		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
  		return false;
  	   }
    	else{
    		return true;
    	 }
 	}

 function edit_validateSlides()
 { 
	catalogueId 		= trim(document.getElementById('LessonSlideCatalogueId').value);
	courseId 		= trim(document.getElementById('LessonSlideCourseId').value);
	lesson 			= trim(document.getElementById('LessonSlideLessonId').value);
	templateType 		= trim(document.getElementById('LessonTemplateType').value);
	lessonType 		= trim(document.getElementById('LessonTemplateType').value); 
	slidetitle 		= trim(document.getElementById('LessonSlideTitle').value);
	if(document.getElementById('LessonSlideContent')){	
		content 		= trim(document.getElementById('LessonSlideContent').value);
	}
	if(document.getElementById('LessonSlideSlide')){	
		image 		= trim(document.getElementById('LessonSlideSlide').value);
	}
	if(document.getElementById('LessonSlideAudioImage')){	
		audioImage 		= trim(document.getElementById('LessonSlideAudioImage').value);
	}
	if(document.getElementById('LessonSlideSlideImage')){	
		image 		= trim(document.getElementById('LessonSlideSlideImage').value);
	}
	if(document.getElementById('video')){	
		video 		= trim(document.getElementById('video').value);
	}
	if(document.getElementById('audio')){	
		audio 		= trim(document.getElementById('audio').value); 
	}
	LessonSlideStatus 	= trim(document.getElementById('LessonSlideStatus').value);
	
	var errorString = ""; 
	
        if(catalogueId == ''){
                errorString = errorString +  "-Please select catalogue name. <br>";               
	}
	if(courseId == ''){
                errorString = errorString +  "-Please select course name. <br>";               
	} 
	if(lesson == ''){
                errorString = errorString +  "-Please select lesson name. <br>";               
	}
	if(templateType ==''){
                errorString = errorString +  "-Please select template type. <br>";               
	}
	if(lessonType == ''){
                errorString = errorString +  "-Please select lesson slide type. <br>";               
	}
	if(slidetitle ==''){
		document.getElementById('LessonSlideTitle').focus();		
                errorString = errorString +  "-Please enter title name. <br>";               
	}
	if(document.getElementById('LessonSlideContent')){
		if(content ==''){
			document.getElementById('LessonSlideContent').focus();		
			errorString = errorString +  "-Please enter title content . <br>";               
		}
	}
	if(document.getElementById('LessonSlideSlide')){
		
		image = image.substring(image.length-3,image.length);
		image = image.toLowerCase();
		if(image!='')
		{	
			if((image != 'jpg')&&(image != 'gif')&&(image != 'png')&&(image != 'peg')&&(image != 'tiff') &&(image != 'bmp') &&(image != 'jpeg'))
			{		
			errorString = errorString +  "-Invalid image file, file should be in a .jpg/.gif/.png/.jpeg/.tiff/.bmp only.<br>"; 
			}
		} 
	}
	if(document.getElementById('LessonSlideAudioImage')){
		
		 audioImage = audioImage.substring(audioImage.length-3,audioImage.length);
		audioImage = audioImage.toLowerCase();
		if(audioImage!='')
		{	
			if((audioImage != 'jpg')&&(audioImage != 'gif')&&(audioImage != 'png')&&(audioImage != 'peg')&&(audioImage != 'tiff') &&(audioImage != 'bmp') &&(audioImage != 'jpeg'))
			{		
			errorString = errorString +  "-Invalid image file, file should be in a .jpg/.gif/.png/.jpeg/.tiff/.bmp only.<br>"; 
			}
		} 
	}
	if(document.getElementById('LessonSlideSlideImage')){
		if(image ==''){
			document.getElementById('LessonSlideSlideImage').focus();		
			errorString = errorString +  "-Please select image . <br>";               
		}
	}
	if(document.getElementById('video')){
	
		video = video.substring(video.length-3,video.length);
		video = video.toLowerCase();
		if(video!='')
		{
			if((video != 'mpg')&&(video != 'mpeg')&&(video != 'wma')&&(video != 'mov')&&(video != 'flv')&&(video != 'mp4')&&(video != 'avi')&&(video != 'qt')&&(video != 'wmv')&&(video != 'rm') )
			{		
			errorString = errorString +  "-Invalid video file, file should be in a .mpg/.mpeg/.wma/.mov/.flv/.mp4/.avi/.qt/.wmv only.<br>"; 
			}
		} 
	}
	if(document.getElementById('audio')){
		
		audio = audio.substring(audio.length-3,audio.length);
		audio = audio.toLowerCase();
		if(audio!='')
		{
			if((audio != 'mp3')&&(audio != 'mp4')&&(audio != 'wma')&&(audio != 'avi')&&(audio != 'wmv') )
			{		
			errorString = errorString +  "-Invalid image file, file should be in a .mp3/.mp4/.wma/.jpeg/.avi/.wmv only.<br>"; 
			}
		} 
	}
	if(LessonSlideStatus ==''){
                errorString = errorString +  "-Please select status. <br>";               
	}  
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
 }
/// validate NewUser
 
 function NewUser()
 {   
	email 		= trim(document.getElementById('OrderUserEmail').value);
	firstname 	= trim(document.getElementById('OrderUserFirstname').value);	
	lastname 	= trim(document.getElementById('OrderUserLastname').value);
	address1 	= trim(document.getElementById('OrderUserAddress1').value);
	city 		= trim(document.getElementById('OrderUserCity').value);
	country 	= trim(document.getElementById('OrderUserCity').value);
	state 		= trim(document.getElementById('UserStateId').value);
	telephone 	= trim(document.getElementById('OrderUserTelephoneNumber').value);
	
	var errorString = "";
         
	 if(email==''){
		if(errorString==''){
			document.getElementById('OrderUserEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
		 
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('OrderUserEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 
	if(firstname == ''){
		if(errorString==''){
			document.getElementById('OrderUserFirstname').focus();
		}
                errorString = errorString +  "-Please enter user first name. <br>";               
	}
	if(lastname == ''){
		if(errorString==''){
			document.getElementById('OrderUserLastname').focus();
		}
                errorString = errorString +  "-Please enter user last name. <br>";               
	}
	if(address1 ==''){
		if(errorString==''){
			document.getElementById('OrderUserAddress1').focus();
		}
                errorString = errorString +  "-Please enter user address. <br>";               
	}
	if(city ==''){
		if(errorString==''){
			document.getElementById('OrderUserCity').focus();
		}
                errorString = errorString +  "-Please enter user city. <br>";               
	}
	if(country ==''){		
                errorString = errorString +  "-Please select user country. <br>";               
	}
	if(state ==''){
                errorString = errorString +  "-Please select user state. <br>";               
	}
	if(telephone ==''){
		if(errorString==''){
			document.getElementById('OrderUserTelephoneNumber').focus();
		}
                errorString = errorString +  "-Please enter user telephone number. <br>";               
	} 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
 }
 
 
 
/// validate editpayment
 
 function editpayment()
 {
	 
	email 		= trim(document.getElementById('OrganizationPaymentDetailEmail').value);
	firstname 	= trim(document.getElementById('OrganizationPaymentDetailFirstname').value);	
	lastname 	= trim(document.getElementById('OrganizationPaymentDetailLastname').value);
	address 	= trim(document.getElementById('OrganizationPaymentDetailStreetaddress').value);
	city 		= trim(document.getElementById('OrganizationPaymentDetailCity').value);
	country 	= trim(document.getElementById('UserCountryId').value);
	state 		= trim(document.getElementById('UserStateId').value);
	holderName 	= trim(document.getElementById('OrganizationPaymentDetailHoldername').value);
	CardNo 		= trim(document.getElementById('OrganizationPaymentDetailCardNo').value);
	SecurityNo	= trim(document.getElementById('OrganizationPaymentDetailSecurityNo').value);
	expireMonth	= trim(document.getElementById('OrganizationPaymentDetailExpireMonthMonth').value);
	expireYear	= trim(document.getElementById('OrganizationPaymentDetailExpireYearYear').value);
	var errorString = "";
         
	 if(email==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";		 
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 
	if(firstname == ''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailFirstname').focus();
		}
                errorString = errorString +  "-Please enter your first name. <br>";               
	}
	if(lastname == ''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailLastname').focus();
		}
                errorString = errorString +  "-Please enter your last name. <br>";               
	}
	 if(address ==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailStreetaddress').focus();
		}
                errorString = errorString +  "-Please enter your address. <br>";               
	}
	if(city ==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailCity').focus();
		}
                errorString = errorString +  "-Please enter your city. <br>";               
	}
	if(country ==''){		
                errorString = errorString +  "-Please select your country. <br>";               
	}
	if(state ==''){
                errorString = errorString +  "-Please select your state. <br>";               
	}
	if(holderName ==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailHoldername').focus();
		}
                errorString = errorString +  "-Please enter card holder name. <br>";               
	}
	if(CardNo ==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailCardNo').focus();
		}
                errorString = errorString +  "-Please enter card number. <br>";               
	}
	if(SecurityNo ==''){
		if(errorString==''){
			document.getElementById('OrganizationPaymentDetailSecurityNo').focus();
		}
                errorString = errorString +  "-Please enter card security number. <br>";               
	}
	if(expireMonth ==''){
                errorString = errorString +  "-Please select card expiry month. <br>";               
	}
	if(expireYear ==''){
                errorString = errorString +  "-Please select card expiry year. <br>";               
	} 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
 }
 
 
 
/// validate  
 
 function Payment()
 {   
	email 		= trim(document.getElementById('UserOrderPaymentEmail').value);
	firstname 	= trim(document.getElementById('UserOrderPaymentFirstname').value);	
	lastname 	= trim(document.getElementById('UserOrderPaymentLastname').value); 
	address 	= trim(document.getElementById('UserOrderPaymentAddress').value);
	city 		= trim(document.getElementById('UserOrderPaymentCity').value);
	country 	= trim(document.getElementById('UserCountryId').value);
	state 		= trim(document.getElementById('UserStateId').value);
	holderName 	= trim(document.getElementById('UserOrderPaymentHolderName').value);
	Amount 		= trim(document.getElementById('UserOrderPaymentAmount').value);
	CardNo 		= trim(document.getElementById('UserOrderPaymentCardNo').value);
	SecurityNo	= trim(document.getElementById('UserOrderPaymentSecurityNo').value);
	expireMonth	= trim(document.getElementById('UserOrderPaymentMonthMonth').value);
	expireYear	= trim(document.getElementById('UserOrderPaymentYearYear').value);
	var errorString = "";
         
	 if(email==''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";		 
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('UserOrderPaymentEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	 if(firstname == ''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentFirstname').focus();
		}
                errorString = errorString +  "-Please enter your first name. <br>";               
	}
	if(lastname == ''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentLastname').focus();
		}
                errorString = errorString +  "-Please enter your last name. <br>";               
	}
	 if(address ==''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentAddress').focus();
		}
                errorString = errorString +  "-Please enter your address. <br>";               
	}
	if(city ==''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentCity').focus();
		}
                errorString = errorString +  "-Please enter your city. <br>";               
	}
	if(country ==''){
                errorString = errorString +  "-Please select your country. <br>";               
	}
	if(state ==''){
                errorString = errorString +  "-Please select your state. <br>";               
	}
	if(holderName ==''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentHolderName').focus();
		}
                errorString = errorString +  "-Please enter card holder name. <br>";               
	}
	if(Amount ==''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentAmount').focus();
		}
                errorString = errorString +  "-Please enter amount. <br>";               
	}
	if(CardNo ==''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentCardNo').focus();
		}
                errorString = errorString +  "-Please enter card number. <br>";               
	}
	if(SecurityNo ==''){
		if(errorString==''){
			document.getElementById('UserOrderPaymentSecurityNo').focus();
		}
                errorString = errorString +  "-Please enter card security number. <br>";               
	}
	if(expireMonth ==''){
                errorString = errorString +  "-Please select card expiry month. <br>";               
	}
	if(expireYear ==''){
                errorString = errorString +  "-Please select card expiry year. <br>";               
	} 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
 }
 
 /// validate  
 
 function assignUser()
 {   
	username 		= trim(document.getElementById('UserUsername').value);
	passwrd 		= trim(document.getElementById('UserPassword').value);	
	userstatus 		= trim(document.getElementById('UserStatus').value);			
	var errorString = "";
         
	 if(username==''){
		if(errorString==''){
			document.getElementById('UserUsername').focus();
		}
		errorString = errorString + "-Please enter username. <br>";	 
	}
	 
	 if(passwrd == ''){
		if(errorString==''){
			document.getElementById('UserPassword').focus();
		}
                errorString = errorString +  "-Please  generate or enter password. <br>";               
	}
	 if(userstatus == ''){
                errorString = errorString +  "-Please  select status. <br>";               
	}
	 
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
 }
 
//show showCourse select box if other is selected
function hideCourse(){
	
	var catalogueId = document.getElementById('LessonCatalogueId').value;	
	if(catalogueId == ''){		
		document.getElementById('courseDiv').style.display = 'none';		
	} 
	
}
//show showCourse select box if other is selected
function showCourse(){
	
	var subCatalogueId = document.getElementById('LessonSubCatalogueId').value;	
	if(subCatalogueId == ''){		
		document.getElementById('courseDiv').style.display = '';		
	} 
	
}

function validateOrgChargeCard(){ 
	
	firstname = trim(document.getElementById('OrganisationPaymentFirstname').value);	
	if(firstname == ''){
	if(errorString==''){
			document.getElementById('OrganisationPaymentFirstname').focus();
		}
                errorString = errorString +  "-Please enter first name. <br>";               
	} 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	   } 
	}

function ValidateOrganisationChargeCard(){ 
	
	firstname = trim(document.getElementById('OrganisationPaymentFirstname').value);
	lastname 	= trim(document.getElementById('OrganisationPaymentLastname').value);
	companyname 	= trim(document.getElementById('OrganisationPaymentCompanyname').value); 
	streetaddress 	= trim(document.getElementById('OrganisationPaymentStreetaddress').value);
	city 		= trim(document.getElementById('OrganisationPaymentCity').value);
 	country 	= trim(document.getElementById('UserCountryId').value);
	state 		= trim(document.getElementById('UserStateId').value);  
	//phonenumber 	= trim(document.getElementById('OrganisationPaymentPhonenumber').value); 
	countrycode = trim(document.getElementById('OrganisationPaymentPhone0').value);	
	areacode = trim(document.getElementById('OrganisationPaymentPhone1').value);	
	phoneCode = trim(document.getElementById('OrganisationPaymentPhone2').value);

 	ecountrycode = trim(document.getElementById('OrganisationPaymentAddphone0').value);	
 	eareacode = trim(document.getElementById('OrganisationPaymentAddphone1').value);	
 	ephoneCode = trim(document.getElementById('OrganisationPaymentAddphone2').value);

	//additionalphone = trim(document.getElementById('OrganisationPaymentAdditionalphonenumber').value); 
	email 		= trim(document.getElementById('OrganisationPaymentEmail').value);
	holderName	= trim(document.getElementById('OrganisationPaymentHolderName').value);
	creditCardType	= trim(document.getElementById('OrganisationPaymentType').value);
	CardNo 		= trim(document.getElementById('OrganisationPaymentCardNo').value);
	expireMonth	= trim(document.getElementById('OrganisationPaymentMonthMonth').value);
	expireYear	= trim(document.getElementById('OrganisationPaymentYearYear').value);
	SecurityNo	= trim(document.getElementById('OrganisationPaymentSecurityNo').value);
	licenseType = getCheckedValue(document.forms['frmCreateUser'].elements['data[OrganisationPayment][plan]']);
	numberofUser 	= trim(document.getElementById('OrganisationPaymentNumberofuser').value);
	licenseName = getCheckedValue(document.forms['frmCreateUser'].elements['data[OrganisationPayment][license]']);
	startMonth = getCheckedValue(document.forms['frmCreateUser'].elements['data[OrganisationPayment][startmonth]']);

	//var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var alphaNumericTest=/^[a-zA-Z0-9 ]{1,20}$/;
	var numericTest=/^[0-9]{1,10}$/;
	var cardNumberTest=/^[0-9]{8,16}$/;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	areacode=areacode.replace("-", "");
	phoneCode=phoneCode.replace("-", "");
	phonenumber=''+countrycode+'-'+areacode+'-'+phoneCode;
	phonenumber=phonenumber.replace("(", "");
	phonenumber=phonenumber.replace(")", "");

	eareacode=eareacode.replace("-", "");
	ephoneCode=ephoneCode.replace("-", "");
	ephonenumber=''+ecountrycode+'-'+eareacode+'-'+ephoneCode;
	ephonenumber=ephonenumber.replace("(", "");
	ephonenumber=ephonenumber.replace(")", "");
	
        var errorString = "";
	
	if(firstname == '') {
		if(errorString==''){
			document.getElementById('OrganisationPaymentFirstname').focus();
		}
		errorString = errorString +  "-Please enter first name. <br>";
	}else if(alphaTest.test(firstname)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentFirstname').focus();
		}
		 errorString = errorString +  "-Please enter first name in characters only.<br>"; 
	}
	if(lastname == ''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentLastname').focus();
		}
                errorString = errorString +  "-Please enter last name. <br>";
	 }else if(alphaTest.test(lastname)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentLastname').focus();
		}
		 errorString = errorString +  "-Please enter last name in characters only.<br>"; 
	}
	if(companyname ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCompanyname').focus();
		}
                errorString = errorString +  "-Please enter company name. <br>";               
	}
	if(streetaddress ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentStreetaddress').focus();
		}
                errorString = errorString +  "-Please enter street address. <br>";               
	}	 
	if(city ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCity').focus();
		}
                errorString = errorString +  "-Please enter city.<br>";               
	}
	if(country ==''){
                errorString = errorString +  "-Please choose country.<br>";               
	}
	if(state ==''){
                errorString = errorString +  "-Please choose state.<br>";               
	}
	
	if(phonenumber ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentPhone0').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}else if(checkPhone.test(phonenumber)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentPhone0').focus();
			
		}
		 errorString = errorString +  "-Please enter valid phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
	}
	if(ecountrycode !=''){
		if(checkPhone.test(ephonenumber)== false){
			if(errorString==''){
				document.getElementById('OrganisationPaymentAddphone0').focus();
				
			}
			errorString = errorString +  "-Please enter valid additional phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
			
		}
	}
	if(email==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('OrganisationPaymentEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";		 
		}
	}
	 
	if(creditCardType ==''){
                errorString = errorString +  "-Please choose card type. <br>";
	}
	if(CardNo ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCardNo').focus();
		}
                errorString = errorString +  "-Please enter card number. <br>";
	}else if(cardNumberTest.test(CardNo)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCardNo').focus();
		}
		 errorString = errorString +  "-Please enter card number in numeric  and maximum 16 digit only.<br>"; 
	}
	if(expireMonth ==''){
                errorString = errorString +  "-Please choose card expiry month. <br>";               
	}
	if(expireYear ==''){
                errorString = errorString +  "-Please choose card expiry year. <br>";               
	}
	if(SecurityNo ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentSecurityNo').focus();
		}
                errorString = errorString +  "-Please enter card security code. <br>";
	}else if(numericTest.test(SecurityNo)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentSecurityNo').focus();
		}
		 errorString = errorString +  "-Please enter card security code in numeric only.<br>"; 
	}
	//start of checking radio 
		function getCheckedValue(radioObj) {
		if(!radioObj)
		return "";
		var radioLength = radioObj.length;
		if(radioLength == undefined)
			if(radioObj.checked)
				return radioObj.value;
			else
				return "";
			for(var i = 0; i < radioLength; i++) {
				if(radioObj[i].checked) {
					return radioObj[i].value;
				}
			}
		return "";
		}//end of check value function
	
	if(licenseType.length == '')	{
		errorString = errorString + "-please choose a plan.<br>";		
		}
	if(numberofUser ==''){
                errorString = errorString +  "-Please choose number of users <br>";               
	}
	if(licenseName.length == '')	{
		errorString = errorString + "-please choose a license type.<br>";		
		}
	if(startMonth.length == '')	{
		errorString = errorString + "-please choose a start month.<br>";		
		}	
	 if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	   } 
}
 

function ValidateOrganisationConfirmOrder(){
	firstname = trim(document.getElementById('OrganisationPaymentFirstname').value);	
	lastname 	= trim(document.getElementById('OrganisationPaymentLastname').value);
	companyname 	= trim(document.getElementById('OrganisationPaymentCompanyname').value); 
	streetaddress 	= trim(document.getElementById('OrganisationPaymentStreetaddress').value);
	 city 		= trim(document.getElementById('OrganisationPaymentCity').value);
	 country 	= trim(document.getElementById('UserCountryId').value);
	 state 		= trim(document.getElementById('UserStateId').value);
	
	countrycode = trim(document.getElementById('OrganisationPaymentPhone0').value);	
	areacode = trim(document.getElementById('OrganisationPaymentPhone1').value);	
	phoneCode = trim(document.getElementById('OrganisationPaymentPhone2').value);

	ecountrycode = trim(document.getElementById('OrganisationPaymentAddphone0').value);	
 	eareacode = trim(document.getElementById('OrganisationPaymentAddphone1').value);	
 	ephoneCode = trim(document.getElementById('OrganisationPaymentAddphone2').value);
	email 		= trim(document.getElementById('OrganisationPaymentEmail').value);
	holderName	= trim(document.getElementById('OrganisationPaymentHolderName').value);
	  CardNo 	= trim(document.getElementById('OrganisationPaymentCardNo').value);
	expireMonth	= trim(document.getElementById('OrganisationPaymentMonthMonth').value);
	 expireYear	= trim(document.getElementById('OrganisationPaymentYearYear').value);
	 SecurityNo	= trim(document.getElementById('OrganisationPaymentSecurityNo').value);
	licenseType = getCheckedValue(document.forms['frmCreateUser'].elements['data[OrganisationPayment][plan]']);
	 numberofUser 	= trim(document.getElementById('OrganisationPaymentNumberofuser').value);
	licenseName = getCheckedValue(document.forms['frmCreateUser'].elements['data[OrganisationPayment][license]']);
	startMonth = getCheckedValue(document.forms['frmCreateUser'].elements['data[OrganisationPayment][startmonth]']);
	 //var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	 var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var alphaNumericTest=/^[a-zA-Z0-9 ]{1,20}$/;
	var numericTest=/^[0-9]{1,10}$/;
	var cardNumberTest=/^[0-9]{8,16}$/;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	areacode=areacode.replace("-", "");
	phoneCode=phoneCode.replace("-", "");
	phonenumber=''+countrycode+'-'+areacode+'-'+phoneCode;
	phonenumber=phonenumber.replace("(", "");
	phonenumber=phonenumber.replace(")", "");

	eareacode=eareacode.replace("-", "");
	ephoneCode=ephoneCode.replace("-", "");
	ephonenumber=''+ecountrycode+'-'+eareacode+'-'+ephoneCode;
	ephonenumber=ephonenumber.replace("(", "");
	ephonenumber=ephonenumber.replace(")", "");
        var errorString = "";
	
	 if(firstname == '') {
		if(errorString==''){
			document.getElementById('OrganisationPaymentFirstname').focus();
		}
		errorString = errorString +  "-Please enter first name. <br>";
	 }else if(alphaTest.test(firstname)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentFirstname').focus();
		}
		 errorString = errorString +  "-Please enter first name in characters only.<br>"; 
	}
	 if(lastname == ''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentLastname').focus();
		}
                errorString = errorString +  "-Please enter last name. <br>";
	 }else if(alphaTest.test(lastname)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentLastname').focus();
		}
		 errorString = errorString +  "-Please enter last name in characters only.<br>"; 
	}
	 if(companyname ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCompanyname').focus();
		}
                errorString = errorString +  "-Please enter company name. <br>";               
	}
	if(streetaddress ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentStreetaddress').focus();
		}
                errorString = errorString +  "-Please enter street address. <br>";               
	}	 
	if(city ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCity').focus();
		}
                errorString = errorString +  "-Please enter city.<br>";               
	}
	if(country ==''){
                errorString = errorString +  "-Please choose country.<br>";               
	}
	if(state ==''){
                errorString = errorString +  "-Please choose state.<br>";               
	}

	if(phonenumber ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentPhone0').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}else if(checkPhone.test(phonenumber)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentPhone0').focus();
			
		}
		 errorString = errorString +  "-Please enter valid phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
	}

	if(ecountrycode !=''){
		if(checkPhone.test(ephonenumber)== false){
			if(errorString==''){
				document.getElementById('OrganisationPaymentAddphone0').focus();
				
			}
			errorString = errorString +  "-Please enter valid additional phone number in (800) 123-1234 or 123-456-7890 format.<br>"; 
			
		}
	}

	if(email==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentEmail').focus();
		}
		errorString = errorString + "-Please enter your valid email address. <br>";
	}
	if(email!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = email;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('OrganisationPaymentEmail').focus();
		}
		errorString = errorString + "-Email Address is not valid. <br>";		 
		}
	}

	if(holderName ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentHolderName').focus();
		}
                errorString = errorString +  "-Please enter name on card. <br>";
	}
	
	if(CardNo ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCardNo').focus();
		}
                errorString = errorString +  "-Please enter card number. <br>";
	}else if(cardNumberTest.test(CardNo)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentCardNo').focus();
		}
		 errorString = errorString +  "-Please enter card number in numeric  and maximum 16 digit only.<br>"; 
	}

	if(expireMonth ==''){
                errorString = errorString +  "-Please choose card expiry month. <br>";               
	}
	if(expireYear ==''){
                errorString = errorString +  "-Please choose card expiry year. <br>";               
	}
	if(SecurityNo ==''){
		if(errorString==''){
			document.getElementById('OrganisationPaymentSecurityNo').focus();
		}
                errorString = errorString +  "-Please enter card security code. <br>";
	}else if(numericTest.test(SecurityNo)== false){
		if(errorString==''){
			document.getElementById('OrganisationPaymentSecurityNo').focus();
		}
		 errorString = errorString +  "-Please enter card security code in numeric only.<br>"; 
	}

	//start of checking radio 
		function getCheckedValue(radioObj) {
		if(!radioObj)
		return "";
		var radioLength = radioObj.length;
		if(radioLength == undefined)
			if(radioObj.checked)
				return radioObj.value;
			else
				return "";
			for(var i = 0; i < radioLength; i++) {
				if(radioObj[i].checked) {
					return radioObj[i].value;
				}
			}
		return "";
		}//end of check value function
	
	if(licenseType.length == '')	{
		errorString = errorString + "-please choose a plan.<br>";		
		}
	if(numberofUser ==''){
                errorString = errorString +  "-Please choose number of users <br>";               
	}
	if(licenseName.length == '')	{
		errorString = errorString + "-please choose a license type.<br>";		
		}
	if(startMonth.length == '')	{
		errorString = errorString + "-please choose a start month.<br>";		
		}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	   } 
	
	
	 
}
 


	
function validateAddCatalogue(){
	
	
	cataloguename 	= trim(document.getElementById('MainCatalogueName').value);	
	cataloguedescription 	= trim(document.getElementById('MainCatalogueDescription').value); 
	
	var errorString = ""; 
	
	if(cataloguename == ''){
		if(errorString==''){
			document.getElementById('MainCatalogueName').focus();
		}
                errorString = errorString +  "-Please enter catalogue name. <br>";               
	}
	if(cataloguedescription == ''){
		if(errorString==''){
			document.getElementById('MainCatalogueDescription').focus();
		}
                errorString = errorString +  "-Please enter description name. <br>";               
	}
	 
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}	
function validateEditCatalogue(){
	
	 
	catloguename 	= trim(document.getElementById('MainCatalogueName').value);	
	categoryName 	= trim(document.getElementById('selected').value);
	SubcategoryName 	= trim(document.getElementById('selected1').value);
	catloguedescription 	= trim(document.getElementById('MainCatalogueDescription').value);
	cataloguestatus 	= trim(document.getElementById('MainCatalogueStatus').value); 
	
	var errorString = ""; 
	
	if(catloguename == ''){
		if(errorString==''){
			document.getElementById('MainCatalogueName').focus();
		}
                errorString = errorString +  "-Please enter catalogue name. <br>";               
	}
	if(categoryName == ''){
                errorString = errorString +  "-Please add category name. <br>";               
	}
	if(SubcategoryName == ''){
                errorString = errorString +  "-Please add sub-catalogue name. <br>";               
	}
	if(catloguedescription == ''){
		if(errorString==''){
			document.getElementById('MainCatalogueDescription').focus();
		}
                errorString = errorString +  "-Please enter description name. <br>";               
	}
	if(cataloguestatus == ''){
                errorString = errorString +  "-Please select status. <br>";               
	}
	 
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	} 
}

function validateAddSubCatalogue(){
	
	 
	categoryname 		= trim(document.getElementById('selected').value);	
	subcategoryTitle 	= trim(document.getElementById('SubCatalogueTitle').value);
	subcataloguestatus = trim(document.getElementById('SubCatalogueStatus').value);
	
	 
	
	var errorString = ""; 
	
	if(categoryname == ''){
                errorString = errorString +  "-Please add main category name. <br>";               
	}
	if(subcategoryTitle == ''){
		if(errorString==''){
			document.getElementById('SubCatalogueTitle').focus();
		}
                errorString = errorString +  "-Please enter sub-category name. <br>";               
	}
	if(subcataloguestatus == ''){
                errorString = errorString +  "-Please select status. <br>";               
	} 
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	} 
}

//validate validateGroup

function validateGroup()
{       
	groupOrganization = trim(document.getElementById('GroupUserId').value);
        groupName = trim(document.getElementById('GroupGroupName').value);
	groupManager = trim(document.getElementById('GroupIsGroupManager').value);
	groupStatus = trim(document.getElementById('GroupStatus').value);
	
        var errorString = "";
         
	if(groupOrganization == ''){
                errorString = errorString +  "-Please choose organization. <br>";               
	}
	
	if(groupManager == ''){
                errorString = errorString +  "-Please choose assign group manager. <br>";               
	}
	if(groupName == ''){
		if(errorString==''){
			document.getElementById('GroupGroupName').focus();
		}
                errorString = errorString +  "-Please enter group name. <br>";               
	}
	
	if(groupStatus == ''){
                errorString = errorString +  "-Please choose group status. <br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate validateSubGroup

function validateSubGroup()
{    	organization = trim(document.getElementById('GroupUserId').value);
        groupName = trim(document.getElementById('GroupParentId').value);
	subgroupName = trim(document.getElementById('GroupGroupName').value);
	subGroupStatus = trim(document.getElementById('GroupStatus').value);
	
        var errorString = "";
         if(organization == ''){
                errorString = errorString +  "-Please choose a organization. <br>";
	}
	if(groupName == ''){
                errorString = errorString +  "-Please choose a group name. <br>";
	}
	if(subgroupName == ''){
		if(errorString==''){
		document.getElementById('GroupGroupName').focus();
		}
                errorString = errorString +  "-Please enter subgroup name. <br>";
	}
	if(subGroupStatus == ''){
                errorString = errorString +  "-Please choose group status. <br>";
	}
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}


function validateAssignUser()
{    
        groupName = trim(document.getElementById('GroupUserGroupId').value);
	groupManager = trim(document.getElementById('GroupUserIsGroupManager').value);
	groupUser = trim(document.getElementById('GroupUserUserId').value);
	
        var errorString = "";
         
	if(groupName == ''){
                errorString = errorString +  "-Please choose a main group.<br>";               
	}
	if(groupManager == ''){
                errorString = errorString +  "-Please choose a group manager.<br>";               
	}
	if(groupUser == ''){
                errorString = errorString +  "-Please choose assign user. <br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}


function validateAssignUserGroup()
{    
        groupName = trim(document.getElementById('GroupGroupName').value);
	groupManager = trim(document.getElementById('userManagerRemoveId').value);
	groupUser = trim(document.getElementById('userRemoveId').value);
	assignGroupStatus = trim(document.getElementById('GroupStatus').value);
	
        var errorString = "";
         
	if(groupName == ''){
		if(errorString==''){
			document.getElementById('GroupGroupName').focus();
		}
                errorString = errorString +  "-Please enter a group name.<br>";               
	}
	if(groupManager == ''){
                errorString = errorString +  "-Please choose group manager(s).<br>";               
	}
	if(groupUser == ''){
                errorString = errorString +  "-Please choose assign group user(s). <br>";               
	}
	if(assignGroupStatus == ''){
                errorString = errorString +  "-Please choose status. <br>";               
	}
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//end of validateGroup

function validateResource()
{    
        lessonName = trim(document.getElementById('LessonResourceLessonId').value);
	resourceName = trim(document.getElementById('LessonResourceName').value);
	resourceLink = trim(document.getElementById('LessonResourceLinkUrl').value);
	ext = trim(document.getElementById('LessonResourceDocument').value);
	var url = new RegExp();
	url.compile("^[A-Za-z]+://[A-Za-z0-9-]+\.[A-Za-z0-9]+"); 
	
        var errorString = "";
         
	if(lessonName == ''){
                errorString = errorString +  "-Please choose a lesson.<br>";               
	}
	if(resourceName == ''){
		if(errorString==''){
			document.getElementById('LessonResourceName').focus();
		}
                errorString = errorString +  "-Please enter resource name.<br>";               
	}
	if((resourceLink == '')){ 
		if((ext == '')){ 
                errorString = errorString +  "-Please enter resource link or upload file. <br>";  
		}             
	}else if (!url.test(resourceLink)){
		if(errorString==''){
			//document.getElementById('LessonResourceLinkUrl').focus();
		}
		errorString = errorString +  "-Please enter valid resource link like http://www.dealershiponline.com. <br>";
	}	
        
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext!='')
		{	
			if((ext != 'pdf'))
			{		
			errorString = errorString +  "-Invalid file, file should be in a .pdf only.<br>";
			
			}
		}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//end of validateGroup
function validateResources()
{           
	resourceName = trim(document.getElementById('LessonResourceName').value);
	resourceLink = trim(document.getElementById('LessonResourceLinkUrl').value);
	ext = trim(document.getElementById('LessonResourceDocument').value);
	var url = new RegExp();
	url.compile("^[A-Za-z]+://[A-Za-z0-9-]+\.[A-Za-z0-9]+"); 
        var errorString = "";         
	
	if(resourceName == ''){
		if(errorString==''){
			document.getElementById('LessonResourceName').focus();
		}
                errorString = errorString +  "-Please enter lesson resource name.<br>";               
	}
	if((resourceLink == '')){ 
		if((ext == '')){ 
                errorString = errorString +  "-Please enter resource link or upload file. <br>";  
		}             
	}else if (!url.test(resourceLink)){
		if(errorString==''){
			//document.getElementById('LessonResourceLinkUrl').focus();
		}
		errorString = errorString +  "-Please enter valid resource link like http://www.dealershiponline.com. <br>";
	}	
        
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext!='')
		{	
			if((ext != 'pdf'))
			{		
			errorString = errorString +  "-Invalid file, file should be in a .pdf only.<br>";
			
			}
		}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//end of validateGroup
function validateNewResources()
{       lessonName = trim(document.getElementById('LessonResourceLessonId').value);   
	resourceName = trim(document.getElementById('LessonResourceName').value);
	resourceLink = trim(document.getElementById('LessonResourceLinkUrl').value);
	ext = trim(document.getElementById('LessonResourceDocument').value);
	var url = new RegExp();
	url.compile("^[A-Za-z]+://[A-Za-z0-9-]+\.[A-Za-z0-9]+"); 
        var errorString = "";         
	if(lessonName == ''){
                errorString = errorString +  "-Please choose a lesson.<br>";               
	}
	if(resourceName == ''){
		if(errorString==''){
			document.getElementById('LessonResourceName').focus();
		}
                errorString = errorString +  "-Please enter resource name.<br>";               
	}if(errorString==''){
				document.getElementById('AdminPassword').focus();
			}
	if((resourceLink == '')){ 
		if((ext == '')){ 
                errorString = errorString +  "-Please enter resource link or upload file. <br>";  
		}             
	}else if (!url.test(resourceLink)){
		if(errorString==''){
			//document.getElementById('LessonResourceLinkUrl').focus();
		}
		errorString = errorString +  "-Please enter valid resource link like http://www.dealershiponline.com. <br>";
	}	
        
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext!='')
		{	
			if((ext != 'pdf'))
			{		
			errorString = errorString +  "-Invalid file, file should be in a .pdf only.<br>";
			
			}
		}
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//end of validateGroup

//validate search isSubGroupSearch
function isSubGroupSearch(){	
	subGrouptitle = trim(document.getElementById('SubGroupTitle').value);
        subGroupstatus = trim(document.getElementById('SubGroupStatus').value);	 	
	var errorString = "";    
	if((subGrouptitle == "")&&(subGroupstatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate search isSubGroupSearch
function isGroupRecordSearch(){	
	grouptitle = trim(document.getElementById('GroupGroupName').value);
        groupstatus = trim(document.getElementById('GroupStatus').value);	 	
	var errorString = "";    
	if((grouptitle == "")&&(groupstatus=="")){
		errorString = errorString +  "-Please enter/choose a search criteria. <br>"; 		
	}
	if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}


//end of validateGroup
function validateSecurityQuestion()
{       questionName = trim(document.getElementById('SecurityQuestionQuestionTitle').value);   
	questionStatus = trim(document.getElementById('SecurityQuestionStatus').value);
	
        var errorString = "";         
	if(questionName == ''){
		if(errorString==''){
			document.getElementById('SecurityQuestionQuestionTitle').focus();
		}
                errorString = errorString +  "-Please enter security question name.<br>";               
	}
	if(questionStatus == ''){
                errorString = errorString +  "-Please choose question status.<br>";               
	}
		
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

function validateAddQuestionOption()
{       questionName = trim(document.getElementById('QuizQuestionQuestionName').value);   
	
	ext1 = document.getElementById('QuizQuestionImage').value;
        var errorString = "";    
	//start of checking radio 
		function getCheckedValue(radioObj) {
		if(!radioObj)
		return "";
		var radioLength = radioObj.length;
		if(radioLength == undefined)
			if(radioObj.checked)
				return radioObj.value;
			else
				return "";
			for(var i = 0; i < radioLength; i++) {
				if(radioObj[i].checked) {
					return radioObj[i].value;
				}
			}
		return "";
		}//end of check value function     
	if(questionName == ''){
		if(errorString==''){
			document.getElementById('QuizQuestionQuestionName').focus();
		}
                errorString = errorString +  "-Please enter question name.<br>";               
	}
	
	ext1 = ext1.substring(ext1.length-3,ext1.length);
		ext1 = ext1.toLowerCase();
		if(ext1!='')
		{	
			if((ext1 != 'jpg')&&(ext1 != 'gif')&&(ext1 != 'png')&&(ext1 != 'peg'))
			{		
			errorString = errorString +  "-Invalid image type, image must be in a .jpg/.gif/.png/.jpeg file.<br>";			
			}
		}
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}


function validateQuizzes()
{     
	courseId = trim(document.getElementById('QuizCourseCourseId').value);
	//lessonId = trim(document.getElementById('QuizLessonLessonId').value);  
	quizTitle = trim(document.getElementById('QuizQuizTitle').value);  
	quizTotalScore = trim(document.getElementById('QuizQuizTotalScore').value);
	
	//quizHour = trim(document.getElementById('QuizQuizDurationHour').value);   
	quizMin = trim(document.getElementById('QuizMinute').value); 
	quizTotalQuestion = trim(document.getElementById('QuizTotalQuestions').value);    
	passMarks = trim(document.getElementById('QuizQuizPassingScores').value);        
	quizStatus = trim(document.getElementById('QuizStatus').value);
	var numericTest=/^[0-9]{1,20}$/;
	
        var errorString = "";         
	if(courseId == ''){
                errorString = errorString +  "-Please choose a course.<br>";               
	}
// 	if(lessonId == ''){
//                 errorString = errorString +  "-Please choose a lesson<br>";               
// 	}
	if(quizTitle == ''){
		if(errorString==''){
			document.getElementById('QuizQuizTitle').focus();
		}
                errorString = errorString +  "-Please enter quiz title.<br>";
	}
	if(quizTotalScore == ''){
		if(errorString==''){
			document.getElementById('QuizQuizTotalScore').focus();
		}
                errorString = errorString +  "-Please enter quiz total score.<br>";               
	}else if(numericTest.test(quizTotalScore)== false){
		if(errorString==''){
			document.getElementById('QuizQuizTotalScore').focus();
		}
		 errorString = errorString +  "-Please enter quiz total score in numbers only.<br>"; 
	}
	if(quizMin=='0'){
                errorString = errorString +  "-Please choose quiz duration<br>";               
	}
	if(quizTotalQuestion == ''){
		if(errorString==''){
			document.getElementById('QuizTotalQuestions').focus();
		}
                errorString = errorString +  "-Please enter total questions. <br>";               
	}else if(numericTest.test(quizTotalQuestion)== false){
		if(errorString==''){
			document.getElementById('QuizTotalQuestions').focus();
		}
		 errorString = errorString +  "-Please enter quiz total questions in numbers only.<br>"; 
	}
	if(passMarks == ''){
		if(errorString==''){
			document.getElementById('QuizQuizPassingScores').focus();
		}
                errorString = errorString +  "-Please enter quiz pass score.<br>";               
	}else if(numericTest.test(passMarks)== false){
		if(errorString==''){
			document.getElementById('QuizQuizPassingScores').focus();
		}
		 errorString = errorString +  "-Please enter quiz pass score in numbers only.<br>"; 
	}
	if(parseInt(passMarks) >= parseInt(quizTotalScore)){
		 errorString = errorString +  "-Quiz pass score should be less than total quiz score.<br>"; 
	}
	if(quizStatus == ''){
                errorString = errorString +  "-Please choose quiz status.<br>";               
	}
		
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

function validateContentCategory()
{    
        contentCategory = trim(document.getElementById('ContentCategoryContentCategory').value);	
	contentStatus = trim(document.getElementById('ContentCategoryStatus').value);
	
        var errorString = "";
         
	if(contentCategory == ''){
		if(errorString==''){
			document.getElementById('ContentCategoryContentCategory').focus();
		}
                errorString = errorString +  "-Please enter content category name.<br>";               
	}
	if(contentStatus == ''){
                errorString = errorString +  "-Please choose content category status.<br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

function validateNewsCategory()
{    
        newsCategory = trim(document.getElementById('NewsCategoryNewsCategory').value);	
	newsStatus = trim(document.getElementById('NewsCategoryStatus').value);
	
        var errorString = "";
         
	if(newsCategory == ''){
		if(errorString==''){
			document.getElementById('NewsCategoryNewsCategory').focus();
		}
                errorString = errorString +  "-Please enter news category name.<br>";               
	}
	if(newsStatus == ''){
                errorString = errorString +  "-Please choose news category status.<br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

function validateFAQ()
{    
        faqTitle = trim(document.getElementById('FaqTitle').value);	
	faqCategory = trim(document.getElementById('FaqFaqCategoryId').value);
	faqStatus = trim(document.getElementById('FaqStatus').value);
	
        var errorString = "";
         
	if(faqTitle == ''){
		if(errorString==''){
			document.getElementById('FaqTitle').focus();
		}
                errorString = errorString +  "-Please enter FAQ title.<br>";               
	}
	if(faqCategory == ''){
		
                errorString = errorString +  "-Please choose FAQ category.<br>";               
	}
	if(faqStatus == ''){
                errorString = errorString +  "-Please choose status.<br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}


function validateFaqCategory()
{    
        faqCategory = trim(document.getElementById('FaqCategoryFaqCategory').value);	
	faqStatus = trim(document.getElementById('FaqCategoryStatus').value);
	
        var errorString = "";
         
	if(faqCategory == ''){
		if(errorString==''){
			document.getElementById('FaqCategoryFaqCategory').focus();
		}
                errorString = errorString +  "-Please enter faq category name.<br>";               
	}
	if(faqStatus == ''){
                errorString = errorString +  "-Please choose faq category status.<br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

function validateArticleCategory()
{    
        articleCategory = trim(document.getElementById('ArticleCategoryArticleCategory').value);	
	articleStatus = trim(document.getElementById('ArticleCategoryStatus').value);
	
        var errorString = "";
         
	if(articleCategory == ''){
		if(errorString==''){
			document.getElementById('ArticleCategoryArticleCategory').focus();
		}
                errorString = errorString +  "-Please enter article category name.<br>";               
	}
	if(articleStatus == ''){
                errorString = errorString +  "-Please choose article category status.<br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
function validateAdminAssignUser()
{    
        organizationName = trim(document.getElementById('GroupUserOrganizationId').value);
	groupName = trim(document.getElementById('GroupUserGroupId').value);
	groupUser = trim(document.getElementById('GroupUserUserId').value);
	
        var errorString = "";
         
	if(organizationName == ''){
                errorString = errorString +  "-Please choose a organization.<br>";               
	}
	if(groupName == ''){
                errorString = errorString +  "-Please choose a group.<br>";               
	}
	if(groupUser == ''){
                errorString = errorString +  "-Please choose assign user. <br>";               
	}
	
        	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of search form validation


function validateEditSubCategory(){
        Cataloguelist = trim(document.getElementById('AddCataloguelist').value);	
	Categorylist = trim(document.getElementById('AddCategorylist').value);
	subCataloguetitle = trim(document.getElementById('SubCatalogueTitle').value);	
	check_status = trim(document.getElementById('SubCatalogueStatus').value);
	
        var errorString = "";

	if(Cataloguelist == ''){
                errorString = errorString +  "-Please add catalogue name.<br>";
	}
	if(Categorylist == ''){
                errorString = errorString +  "-Please add category name.<br>";
	}
	if(subCataloguetitle == ''){
		if(errorString==''){
			document.getElementById('SubCatalogueTitle').focus();
		}
                errorString = errorString +  "-Please enter title name.<br>";
	}
	if(check_status == ''){
                errorString = errorString +  "-Please select status.<br>";
	}  
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate add group manager 
function validateadminAddGroupManager(){

        organization = trim(document.getElementById('OrganizationOrganizationId').value);	
	groupManager = trim(document.getElementById('userRemoveId').value);	
	group_manager_status = trim(document.getElementById('GroupManagerStatus').value);
	
        var errorString = "";

	if(organization == ''){
                errorString = errorString +  "-Please choose organization.<br>";
	}
	if(groupManager == ''){
                errorString = errorString +  "-Please add group manager.<br>";
	}
	
	if(group_manager_status == ''){
                errorString = errorString +  "-Please choose group manager status.<br>";               
	}  
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate validateGlossary
function validateGlossary()
{
        glossaryTitle = trim(document.getElementById('GlossaryTitle').value);	
	glossaryStatus = trim(document.getElementById('GlossaryStatus').value);
	
        var errorString = "";
	if(glossaryTitle == ''){
		if(errorString==''){
			document.getElementById('GlossaryTitle').focus();
		}
                errorString = errorString +  "-Please enter glossary title.<br>";               
	}
	
	
	if(glossaryStatus == ''){
                errorString = errorString +  "-Please choose glossary status.<br>";               
	}  
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate validateAssignGlossary
function validateAssignGlossary(){
        categoryId = trim(document.getElementById('categoryRemoveId').value);	
	
	
        var errorString = "";

	if(categoryId == ''){
                errorString = errorString +  "-Please add category.<br>";
	}
	
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
 
//validate validateTermGlossary
function validateTermGlossary(){
        glossaryTitle = trim(document.getElementById('GlossaryTermTerm').value);	
	glossarydesc = trim(document.getElementById('GlossaryTermDescription').value);
	
        var errorString = "";
         
	if(glossaryTitle == ''){
		if(errorString==''){
			document.getElementById('GlossaryTermTerm').focus();
		}
                errorString = errorString +  "-Please enter glossary term.<br>";
	}
	
	
	if(glossarydesc == ''){
		if(errorString==''){
			document.getElementById('GlossaryTermDescription').focus();
		}
                errorString = errorString +  "-Please enter glossary description.<br>";
	}  
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate validateTermGlossary
function validateTermAddGlossary(){
	glossary = trim(document.getElementById('GlossaryGlossaryId').value);	
        glossaryTitle = trim(document.getElementById('GlossaryTermTerm').value);	
	glossarydesc = trim(document.getElementById('GlossaryTermDescription').value);
	
        var errorString = "";

	if(glossary == ''){
                errorString = errorString +  "-Please choose a glossary.<br>";
	}

	if(glossaryTitle == ''){
		if(errorString==''){
			document.getElementById('GlossaryTermTerm').focus();
		}
                errorString = errorString +  "-Please enter glossary term.<br>";
	}
	
	
	if(glossarydesc == ''){
		if(errorString==''){
			document.getElementById('GlossaryTermDescription').focus();
		}
                errorString = errorString +  "-Please enter glossary description.<br>";               
	}  
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate validatePlanAmount
function validatePlanAmount(){
        glossaryTitle = trim(document.getElementById('UserLicenseAmount').value);	
	
        var errorString = "";
	if(glossaryTitle == ''){
		if(errorString==''){
			document.getElementById('UserLicenseAmount').focus();
		}
                errorString = errorString +  "-Please enter plan amount.<br>";
	}	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}

//validate workbook
function validateWorkBook(){
	course = trim(document.getElementById('WorkbookCourseId').value);
	lesson = trim(document.getElementById('WorkbookLessonId').value);
        workbooktitle = trim(document.getElementById('WorkbookTitle').value);	 	
        //description = trim(document.getElementById('CourseDescription').value);
	workbookstatus = trim(document.getElementById('WorkbookStatus').value);
	ext = trim(document.getElementById('WorkbookDocument').value);
	
        var errorString = "";
	
        if(course == ''){
                if(lesson == ''){
                errorString = errorString +  "-Please choose a course or lesson. <br>";
	}
	}
	 
	if(workbooktitle == ''){
                errorString = errorString +  "-Please enter workbook title. <br>"; 
		document.getElementById('WorkbookTitle').focus();
	}
	/*
        if(description==''){
		errorString = errorString + "-Please enter course description <br>";
	}*/
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
		if(ext!='')
		{	
			if((ext != 'pdf'))
			{		
			errorString = errorString +  "-Invalid document, document should be a .pdf file only.<br>";
			
			}
		}
	if(workbookstatus==''){
		errorString = errorString + "-Please choose workbook status. <br>";
	}	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate course

//validate video
function validateVideo()
{
	videoTitle = trim(document.getElementById('FrontVideoTitle').value);
	
	VideoStatus = trim(document.getElementById('FrontVideoStatus').value);
	ext = trim(document.getElementById('ContentVideo').value);
	
        var errorString = "";
	
        if(videoTitle == ''){
                errorString = errorString +  "-Please enter video title. <br>";
	
	}
	
	ext = ext.substring(ext.length-3,ext.length);
		ext = ext.toLowerCase();
	
	if(ext == '')	{
		 errorString = errorString +  "-Please upload a video file. <br>";
	}	
		if(ext!='')
		{	
			if((ext != 'peg') && (ext != 'mpg') && (ext != 'wma') && (ext != 'mov') && (ext != 'flv') && (ext != 'mp4') && (ext != 'avi') && (ext != 'wmv') && (ext != 'qt') && (ext != 'rm'))
			{		
			errorString = errorString +  "-Invalid video type, video type should be a mpeg,mpg,wma,mov,flv,mp4,avi & wmv file only.<br>";
			
			}
		}
	if(VideoStatus==''){
		errorString = errorString + "-Please choose video status. <br>";
	}
	
	
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		return false;
	}
	else{
		return true;
	}
}
//end of validate videos
//show showOtherState input box if other is selected
function showOtherState(){	
	var $state = document.getElementById('UserStateId').value;
	if($state=='1110'){
		document.getElementById('showOtherStateBox').style.display = '';		
	}else{
		document.getElementById('showOtherStateBox').style.display = 'none';
	}
	
}

//show showPaymentOtherState input box if other is selected
function showPaymentOtherState(){	
	var $state = document.getElementById('OrganizationPaymentDetailStateId').value;
	if($state=='1110'){
		document.getElementById('showPaymentOtherStateBox').style.display = '';		
	}else{
		document.getElementById('showPaymentOtherStateBox').style.display = 'none';
	}
	
}


//function start validateComposeMessage
function validateAdminComposeMessage(){
       recipients = trim(document.getElementById('MessageRecipientId').value);
	messageSubject = trim(document.getElementById('MessageSubject').value);
	messageBody = trim(document.getElementById('MessageMessage').value);	
	
  
        var errorString = "";
	
	if(recipients == ''){		
                errorString = errorString +  "-Please choose Recipients. <br>";               
	}
	if(messageSubject == ''){		
                errorString = errorString +  "-Please enter subject.  <br>";               
	}

	
	if(messageBody ==''){		
                errorString = errorString +  "-Please enter message. <br>";               
	}
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").style.display='block';
		document.getElementById("jsError").innerHTML = errorString; 
	
  
  	return false;
	}
	else{
		return true;
	}
}
//end of validateComposeMessage
//start of validateReplyMessage
function validateAdminReplyMessage(){
       recipients = trim(document.getElementById('SenderEmail').value);
	messageSubject = trim(document.getElementById('MessageSubject').value);
	messageBody = trim(document.getElementById('MessageMessage').value);	
	
  
        var errorString = "";
	
	if(recipients == ''){		
                errorString = errorString +  "-Please enter recipient email address. <br>";               
	}
	if(messageSubject == ''){		
                errorString = errorString +  "-Please enter subject.  <br>";               
	}

	
	if(messageBody ==''){		
                errorString = errorString +  "-Please enter message. <br>";               
	}
	 
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").style.display='block';
		document.getElementById("jsError").innerHTML = errorString; 
	
  
  	return false;
	}
	else{
		return true;
	}
}
//validate replyMessage

function FCKeditor_OnComplete(editorInstance) {

    fckeditor_word_count(editorInstance);
    editorInstance.Events.AttachEvent('OnSelectionChange', fckeditor_word_count);
}

function fckeditor_word_count(editorInstance) {
	var limit=4000;
	var regEx = /<[^>]*>/g; 
	
    var matches = editorInstance.GetData().replace(regEx, "");
    var count = 0;
    if(matches) {
        count = matches.length;
    }

	//alert(matches);
    if(count > limit)
	{
		var newdata=editorInstance.GetData().substr(0,limit);
		editorInstance.SetData(newdata);

	}
	 //document.getElementById('word_count').innerHTML = count + " characters" + (count == 1 ? "" : "s") + " approx"; document.getElementById('showTextAreaDiv').innerHTML =4000-matches.length + " characters left."; 
	

}


maxL=255;
var bName = navigator.appName;
function taLimit(taObj) {
	if (taObj.value.length==maxL) return false;
	return true;
}

function taCount(taObj,Cnt) { 
	objCnt=createObject(Cnt);
	objVal=taObj.value;
	if (objVal.length>maxL) objVal=objVal.substring(0,maxL);
	if (objCnt) {
		if(bName == "Netscape"){	
			objCnt.textContent=maxL-objVal.length+' characters left.';}
		else{objCnt.innerText=maxL-objVal.length+' characters left.';}
	}
	return true;
}
function createObject(objId) {
	if (document.getElementById) return document.getElementById(objId);
	else if (document.layers) return eval("document." + objId);
	else if (document.all) return eval("document.all." + objId);
	else return eval("document." + objId);
}

maxLength=300;
function taLimitTH(taObj) {
	if (taObj.value.length==maxLength) return false;
	return true;
}

function taCountTH(taObj,Cnt) { 
	objCnt=createObject(Cnt);
	objVal=taObj.value;
	if (objVal.length>maxLength) objVal=objVal.substring(0,maxLength);
	if (objCnt) {
		if(bName == "Netscape"){	
			objCnt.textContent=maxLength-objVal.length+' characters left.';}
		else{objCnt.innerText=maxLength-objVal.length+' characters left.';}
	}
	return true;
}
maxTicketL=350;
function taLimitTHT(taObj) {
	if (taObj.value.length==maxTicketL) return false;
	return true;
}

function taCountTHT(taObj,Cnt) { 
	objCnt=createObject(Cnt);
	objVal=taObj.value;
	if (objVal.length>maxTicketL) objVal=objVal.substring(0,maxTicketL);
	if (objCnt) {
		if(bName == "Netscape"){	
			objCnt.textContent=maxTicketL-objVal.length+' characters left.';}
		else{objCnt.innerText=maxTicketL-objVal.length+' characters left.';}
	}
	return true;
}

function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
	  }
	}


function showDivBox(){
	if(document.getElementById('OrganisationPaymentCheckPaid').checked==true){
		document.getElementById('showPaymentBox').style.display = 'none';
		document.getElementById('showNoPayment').style.display = '';
	}else{
		document.getElementById('showPaymentBox').style.display = '';
		document.getElementById('showNoPayment').style.display = 'none'; 
	     }
	}

function showAutoCompleteDiv(){
alert('asas');

}


function validAdmin()
{

	var adminUsername=trim(document.getElementById('AdminUsername').value); 
	var adminFullname=trim(document.getElementById('AdminFullname').value);
	var adminEmail=trim(document.getElementById('AdminEmail').value);  
	var adminPassword=trim(document.getElementById('AdminPassword').value); 
	var adminConfirmPassword=trim(document.getElementById('AdminConfirmPassword').value); 
	var adminUserType=trim(document.getElementById('AdminUserType').value);
	var adminActive=trim(document.getElementById('AdminActive').value);

       var errorString = "";
	var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var focus_val = false;
	if(adminUserType=='')
               {       
			
			 
			  if(focus_val ==false){
	     		focus_val = document.getElementById('AdminUserType');
		}
			errorString = errorString+"-Please  select user  type.<br>";
                     
			
               } 

	if(adminUsername==''){
             errorString = errorString+"-Please enter username.<br>";
                    
		if(focus_val==false){
	     		focus_val = document.getElementById('AdminUsername');
		}
		//alert("hi")
                 
              
	}else if(checkUserName.test(adminUsername)== false){
		 errorString = errorString +  "-Please enter username in alphanumeric and accept special character hyphen(-), underscore(_) and dot (.) only.<br>";
                  if(focus_val==false){
	     		focus_val = document.getElementById('AdminUsername');
		} 
	
	} 
	if(adminEmail==''){
		errorString = errorString+"-Please enter email address.<br>";
		//document.getElementById('AdminEmail').focus();
                 if(focus_val==false){
	     		focus_val = document.getElementById('AdminEmail');
		}


	}
	if(adminEmail!= ''){
		
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			var address = adminEmail;
			if(reg.test(address) == false) {
				
			errorString = errorString + "-Email Address is not valid. <br>";
		                  if(focus_val==false){
	     		focus_val = document.getElementById('AdminEmail');
		}	
			}
		}
  
          
	if(adminFullname==''){
             errorString = errorString+"-Please enter fullname<br>";
	     
               if(focus_val==false){
	     		focus_val = document.getElementById('AdminFullname');
		}



	}else if(alphaTest.test(adminFullname)== false){		
		 errorString = errorString +  "-Please enter full name in characters only.<br>"; 
               if(focus_val==false){
	     		focus_val = document.getElementById('AdminFullname');
		}


	}
 
       
        var digit_matches=adminPassword.match(/\d{1,}\.{0,}\d{0,}/);
	if(adminPassword==''){
		 if(focus_val==false){
	     		focus_val = document.getElementById('AdminPassword');
		}
		errorString = errorString + "-Please enter password. <br>";
	}else if(adminPassword.length<6){
		if(focus_val==false){
	     		focus_val = document.getElementById('AdminPassword');
		}
		errorString = errorString + "-Password is too short (minimum is 6 characters).<br>";
	}
	if(adminConfirmPassword==''){
		if(focus_val==false){
	     		focus_val = document.getElementById('AdminConfirmPassword');
		}
		errorString = errorString + "-Password confirmation can't be blank.<br>";
	}
	if((adminConfirmPassword != '') && (adminPassword!='')){
		if(adminPassword != adminConfirmPassword){
			if(focus_val==false){
	     		focus_val = document.getElementById('AdminConfirmPassword');
		}
			errorString = errorString + "-Password doesn't match confirmation and has to be at least 6 characters long and include 1 digit.<br>";
		     }
	        }
	if(((adminConfirmPassword != '') && (adminPassword!='')) && digit_matches==null){
		if(focus_val==false){
	     		focus_val = document.getElementById('AdminConfirmPassword');
		}
		errorString = errorString + "-Password must be at least 6 characters long and include 1 digit. <br>";
	}
	 if(adminActive==''){
             errorString = errorString+"-Please  select status. <br>";
	     if(focus_val==false){
	     		focus_val = document.getElementById('AdminActive');
		}
	}

        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		 
		if(focus_val){
			focus_val.focus();
		} 

		return false;
	}
	else{
		return true;
	  }
}
 



function validEditAdmin()
{
 
//var adminUsername=trim(document.getElementById('AdminUsername').value); 
 var adminUserType=trim(document.getElementById('AdminUserType').value);
var adminFullname=trim(document.getElementById('AdminFullname').value);
  var adminEmail=trim(document.getElementById('AdminEmail').value);  
var adminActive=trim(document.getElementById('AdminStatus').value);

       var errorString = "";
	var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	 var focus_val = false;
	if(adminUserType=='')
               {
                     //document.getElementById('AdminUserType').focus();
			errorString = errorString+"-Please  select user  type.<br>";
               if(focus_val ==false){                    
	     		focus_val = document.getElementById('AdminUserType');
		}

			
               } 
/*
	if(adminUsername==''){
             errorString = errorString+"-Please enter username.<br>";
	     document.getElementById('AdminUsername').focus();
	}else if(checkUserName.test(adminUsername)== false){
		 errorString = errorString +  "-Please enter username in alphanumeric and accept special character hyphen(-), underscore(_) and dot (.) only.<br>"; 
	
	} */
	if(adminEmail==''){

                  if(focus_val==false){
                         
	     		focus_val = document.getElementById('AdminEmail');
		} 



	  errorString = errorString+"-Please enter email address.<br>";

                         
	              
         }
	if(adminEmail!= ''){
		
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			var address = adminEmail;
			if(reg.test(address) == false) {
				
			errorString = errorString + "-Email Address is not valid. <br>";
			
               if(focus_val ==false){
	     		focus_val = document.getElementById('AdminEmail');
		} 
			}
		}
  
           
	if(adminFullname==''){
             errorString = errorString+"-Please enter fullname<br>";
	      

            if(focus_val ==false){
	     		focus_val = document.getElementById('AdminFullname');
		}

	}else if(alphaTest.test(adminFullname)== false){		
		 errorString = errorString +  "-Please enter full name in characters only.<br>";

             if(focus_val ==false){
	     		focus_val = document.getElementById('AdminFullname');
		}


 
	}
 

if(adminActive=='')
               {
                 errorString = errorString+"-Please  select status <br>";

                    if(focus_val ==false){
	     		focus_val = document.getElementById('AdminStatus');
		}





	       }
        if(errorString != ""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
		focus_val.focus();
		return false;
	}
	else{
		return true;
	  }
}



function validCity()
{
//alert('test');
var cityCountryId=trim(document.getElementById('CityCountryId').value); 
var cityStateId=trim(document.getElementById('CityStateId').value);
var cityCity=trim(document.getElementById('CityCity').value);
var errorString="";
 var focus_val = false;
if(cityCountryId=='')
{
  errorString = errorString+"<font-color='#ff0000;'>-Please  select your  Country</font> <br>";
      
if(focus_val ==false){
	     		focus_val = document.getElementById('CityCountryId');
		}

} 

if(cityStateId=='')
{
  errorString = errorString+"<font-color='#ff0000;'>-Please  select your   State</font> <br>";
      
if(focus_val ==false){
	     		focus_val = document.getElementById('CityStateId');
		}

}  
if(cityCity=='')
{
  errorString = errorString+"<font-color='#ff0000;'>-Please enter your City</font> <br>";
if(focus_val ==false){
	     		focus_val = document.getElementById('CityCity');
		}

      
}  

 
	 
        if(errorString!=""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>";
                focus_val.focus(); 
		return false;
	}
	else{
		return true;
	  }
}

function validCountry()
{
	//alert('test');
	var countryName=trim(document.getElementById('CountryCountry').value); 
	
	var  countryCode=trim(document.getElementById('CountryCode').value); 
	
	var errorString="";
	var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var checkAC=/^[0-9]{1,10}$/;
	if(countryName=='')
	{

                        if(focus_val ==false){                    
	     		focus_val = document.getElementById('CountryCountry');
		}

                  //document.getElementById('CountryCountry').focus();
		errorString = errorString+"-Please enter country name.<br>";
		
	}else if(alphaTest.test(countryName)== false){
		 errorString = errorString +  "-Please enter country name in characters only only.<br>"; 
             if(focus_val ==false){                    
	     		focus_val = document.getElementById('CountryCountry');
		}



	
	}

	
	if(countryCode=='')
	{
		errorString = errorString+"-Please enter country code. <br>";
		 if(focus_val ==false){                    
	     		focus_val = document.getElementById('CountryCode');
		}
	}
	
	 
	
        if(errorString!=""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>";
                focus_val.focus();
		return false;
	}
	else{
		return true;
	  }
}

function validUpdateCountry()
{
	

	var countryName=trim(document.getElementById('CountryCountry').value); 
 
	var  countryCode=trim(document.getElementById('CountryCode').value); 

	var focus_val=false; 
	var errorString="";
	var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var checkAC=/^[0-9]{1,10}$/;

	if(countryName=='')
		{

                        if(focus_val ==false){                    
	     		focus_val = document.getElementById('CountryCountry');
		}

                  //document.getElementById('CountryCountry').focus();
		errorString = errorString+"-Please enter country name.<br>";
		
	}else if(alphaTest.test(countryName)== false){
		 errorString = errorString +  "-Please enter country name in characters only only.<br>"; 
             if(focus_val ==false){                    
	     		focus_val = document.getElementById('CountryCountry');
		}
         }	
	if(countryCode=='')
	{
		errorString = errorString+"-Please enter country code. <br>";
		 if(focus_val ==false){                    
	     		focus_val = document.getElementById('CountryCode');
		}
	}
	
	

 

        if(errorString!=""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
                focus_val.focus();
		return false;
	}
	else{
		return true;
	  }
}



function validState()
{
 var stateState=trim(document.getElementById('StateState').value); 
var stateCountryId=trim(document.getElementById('StateCountryId').value); 
var focus_val=false; 
var errorString=""; 
var alphaTest=/^[a-zA-Z ]{1,80}$/i;
	if(stateState=='')
	{
if(errorString==''){
		errorString = errorString +  "-Please enter state name  .<br>"; 
		if(focus_val ==false){                    
				focus_val = document.getElementById('StateState');
			}
	      } 
	 
	}
	else if(alphaTest.test(stateState)== false){
		if(errorString==''){
		errorString = errorString +  "-Please enter state name in characters only.<br>"; 
		if(focus_val ==false){                    
				focus_val = document.getElementById('StateState');
			}
	      } 
         }
	if(stateCountryId=='')
	{
		errorString = errorString+"-Please select a country. <br>";
	        if(focus_val ==false){                    
	     		focus_val = document.getElementById('StateCountryId');
		}
	}  
        if(errorString!=""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
                focus_val.focus();
		return false;
	}
	else{
		return true;
	  }
}
//
function validRegion()
{
var regionRegion=trim(document.getElementById('RegionRegion').value); 
var regionCountryId=trim(document.getElementById('RegionCountryId').value); 
var focus_val=false; 
var errorString=""; 
var alphaTest=/^[a-zA-Z ]{1,80}$/i;
	if(regionRegion=='')
	{
	errorString = errorString +  "-Please enter  region  name  .<br>"; 
	if(focus_val ==false){                    
			focus_val = document.getElementById('RegionRegion');
		}
        }
	else if(alphaTest.test(regionRegion)== false){
		if(errorString==''){
		errorString = errorString +  "-Please enter  region name in characters only.<br>"; 
		if(focus_val ==false){                    
				focus_val = document.getElementById('RegionRegion');
			}
	      } 
         }
	if(regionCountryId=='')
	{
		errorString = errorString+"-Please select a country. <br>";
	        if(focus_val ==false){                    
	     		focus_val = document.getElementById('RegionCountryId');
		}
	}  
        if(errorString!=""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
                focus_val.focus();
		return false;
	}
	else{
		return true;
	  }
}

function validEditRegion()
{

 
 var regionRegion=trim(document.getElementById('RegionRegion').value); 
var regionCountryId=trim(document.getElementById('RegionCountryId').value); 
var focus_val=false; 
var errorString=""; 
var alphaTest=/^[a-zA-Z ]{1,80}$/i;


          
	if(regionRegion=='')
	{
               
             
		errorString = errorString +  "-Please enter  region  name  .<br>"; 
		if(focus_val ==false){                    
				focus_val = document.getElementById('RegionRegion');
			}
	       
	 
	}
	else if(alphaTest.test(regionRegion)== false){
		if(errorString==''){
		errorString = errorString +  "-Please enter  region name in characters only.<br>"; 
		if(focus_val ==false){                    
				focus_val = document.getElementById('RegionRegion');
			}
	      } 
         }
	if(regionCountryId=='')
	{
		errorString = errorString+"-Please select a country. <br>";
	        if(focus_val ==false){                    
	     		focus_val = document.getElementById('RegionCountryId');
		}
	}  
        if(errorString!=""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
                focus_val.focus();
		return false;
	}
	else{
		return true;
	  }
}

function validEditAmount(){
	var amountTitle=trim(document.getElementById('AmountTitle').value); 
	var amountComm=trim(document.getElementById('AmountCharges').value);
	var amountVat=trim(document.getElementById('AmountTax').value);
	var amountOther=trim(document.getElementById('AmountOthers').value); 
	var focus_val=false; 
	var errorString="";
	var checkUserName=/^((\.)?([a-zA-Z0-9_-]?)(\.)?([a-zA-Z0-9_-]?)(\.)?)+$/; 
	var alphaTest=/^[a-zA-Z ]{1,20}$/i;
	var checkAC=/^[0-9]{1,10}$/;

	if(amountTitle=='')
		{
                  if(focus_val ==false){	
	     		focus_val = document.getElementById('AmountTitle');
		}
		errorString = errorString+"-Please enter title.<br>";
		
	}	
	if(amountComm=='')
	{
		errorString = errorString+"-Please enter commission amount. <br>";
		if(focus_val ==false){                    
	     		focus_val = document.getElementById('AmountCharges');
		}
	}else if(checkAC.test(amountComm)== false){
 		 errorString = errorString +  "-Please enter commission amount in numeric only<br>"; 
            	if(focus_val ==false){                    
	     		focus_val = document.getElementById('AmountCharges');
		}
 	}else if(amountComm > 100) {
		 errorString = errorString +  "-Please enter commission amount within 1 to 100 only<br>"; 
            	if(focus_val ==false){                    
	     		focus_val = document.getElementById('AmountCharges');
		}

	}

	if(amountVat=='')
	{
		errorString = errorString+"-Please enter tax/vat amount. <br>";
		if(focus_val ==false){                    
	     		focus_val = document.getElementById('AmountTax');
		}
	}else if(checkAC.test(amountVat)== false){
 		 errorString = errorString +  "-Please enter tax/vat amount in numeric only<br>"; 
            	if(focus_val ==false){                    
	     		focus_val = document.getElementById('AmountTax');
		}
 	}else if(amountVat > 100) {
		 errorString = errorString +  "-Please enter tax/vat amount within 1 to 100 only<br>"; 
            	if(focus_val ==false){                    
	     		focus_val = document.getElementById('AmountTax');
		}

	}
	else if(amountOther=='')
	{
		errorString = errorString +  "-Please enter Premium Service Charges<br>"; 
            	if(focus_val ==false){                    
	     		focus_val = document.getElementById('AmountOthers');
		}
	}
	if(errorString!=""){
		window.scrollTo(0,0);
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>"; 
                focus_val.focus();
		return false;
	}
	else{
		return true;
	}


}

function validSub()
{
  
var stateCountryId=trim(document.getElementById('SubRegionCountryId').value); 
var subRegionStateId=trim(document.getElementById('SubRegionRegionId').value);
var subRegionSubRegion=trim(document.getElementById('SubRegionSubRegion').value); 
 var errorString="";
var focus_val=false; 
var alphaTest=/^[a-zA-Z ]{1,80}$/i;

if(stateCountryId=='')
	{
          
		errorString = errorString  +  "-Please select a country<br>"; 
		if(focus_val ==false){                    
			focus_val = document.getElementById('SubRegionCountryId');
			}
	     

	} 
       if(subRegionStateId=='')
	{

              
		errorString = errorString  +  "-Please select a region.<br>"; 
		if(focus_val ==false){                    
			focus_val = document.getElementById('SubRegionRegionId');
			}
	      
	}

	 if(subRegionSubRegion=='')
	{
           
		errorString = errorString +  "-Please enter  sub region name.<br>"; 
		if(focus_val ==false){                    
			focus_val = document.getElementById('SubRegionSubRegion');
			}
	      	

	}else if(alphaTest.test(subRegionSubRegion)== false){
		 
                
               
              errorString = errorString +" -Please enter  sub region name in characters only.<br>"; 
		if(focus_val ==false){                    
			focus_val = document.getElementById('SubRegionSubRegion');
			}
	      	 
	} 

	 
 
 
	 
        if(errorString!=""){
		window.scrollTo(0,0);                 
		document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>";
                focus_val.focus(); 
		return false;
	}
	else{
		return true;
	  }
}

function validAdmin1()
{
   var   AdminPassword=document.getElementById('AdminPassword').value;
   var   AdminPassword1=document.getElementById('AdminPassword1').value; 
   var   AdminNewPassword=document.getElementById('AdminNewPassword').value;
   var errorString=""; 
     
  if(AdminPassword==''){

		if(errorString==''){
			document.getElementById('AdminPassword').focus;
		}
		errorString = errorString + "-Please enter Old password. <br>";
	}

 if(AdminPassword1==''){
		if(errorString==''){
			document.getElementById('AdminPassword1').focus;
		}
		errorString = errorString + "-Please enter new password.<br>";
	}
 
	 if(AdminNewPassword==''){
		 if(errorString==''){
			document.getElementById('AdminNewPassword').focus;
			}
	errorString = errorString + "-Please enter Confirm   New Password<br>";
	        }

        if((AdminPassword1!=AdminNewPassword)&&(AdminNewPassword!='')&&(AdminPassword1!='')){
		 if(errorString==''){
			document.getElementById('AdminNewPassword').focus;
			}
	errorString = errorString + "-Please enter Confirm    Your New  Password.<br/>";
	        }

        if(errorString!=""){
		window.scrollTo(0,0);
                document.getElementById("jsError").innerHTML = errorDiv+errorString+"</p>";
                return false;
	}
	else{
		return true;
	  }
}