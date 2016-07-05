/**
	* Javascript Front End Validation File
	* PHP versions 5.1.4
	* @date 30-Jul-2010
	* @Purpose: Used to javascript front end validation 
	* @filesource
	* @author     Atul Verma
	* @revision   
	* @copyright  Copyright � 2010 smartData
	* @version 0.0.1 
**/


function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}



//end of validateNewsletter
//validate validateContactUs
function validateContactUs()
{    
       
	contactemail = trim(document.getElementById('ContactsEmail').value);
	contactsubject = trim(document.getElementById('ContactsSubject').value);
	firstname = trim(document.getElementById('ContactsFirstname').value);	
	lastname = trim(document.getElementById('ContactsLastname').value);
	address = trim(document.getElementById('ContactsAddress').value);	
	city = trim(document.getElementById('ContactsCity').value);	
	state = trim(document.getElementById('ContactsState').value);
	country = trim(document.getElementById('ContactsCountryId').value);
	postcode = trim(document.getElementById('ContactsPostCode').value);	
	owner = trim(document.getElementById('ContactsOwner').value);						
	phone = trim(document.getElementById('ContactsPhone').value);
	contacttext = trim(document.getElementById('ContactsComments').value);		
	
	
  	 var alphaTest=/^[a-zA-Z ]{1,25}$/i;
	var checkPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	
         errorString = "";
	
	if(contactemail ==''){
		if(errorString==''){
			document.getElementById('ContactsEmail').focus();
			
		}
                errorString = errorString +  "-Please enter email address. <br>";               
	}
	if(contactemail!= ''){
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = contactemail;
		if(reg.test(address) == false) {
		if(errorString==''){
			document.getElementById('ContactsEmail').focus();
			return false;
		}
		errorString = errorString + "-Email Address is not valid. <br>";
		 
		}
	}
	if(contactsubject ==''){
		if(errorString==''){
			document.getElementById('ContactsSubject').focus();
			
		}
                errorString = errorString +  "-Please enter subject. <br>";               
	}
	if(firstname == ''){
		if(errorString==''){
			document.getElementById('ContactsFirstname').focus();
			
		}
    		errorString = errorString +  "-Please enter first name. <br>";
	}else if(alphaTest.test(firstname)== false){
		if(errorString==''){
			document.getElementById('ContactsFirstname').focus();
			
		}
		 errorString = errorString +  "-Please enter first name in characters only.<br>"; 
	}
	if(lastname == ''){
		if(errorString==''){
			document.getElementById('ContactsLastname').focus();
			
		}
    		errorString = errorString +  "-Please enter last name. <br>";
	}else if(alphaTest.test(lastname)== false){
		if(errorString==''){
			document.getElementById('ContactsLastname').focus();
			
		}
		 errorString = errorString +  "-Please enter last name in characters only.<br>"; 
	}
	
	if(address ==''){
		if(errorString==''){
			document.getElementById('ContactsAddress').focus();
			
		}
                errorString = errorString +  "-Please enter address. <br>";               
	}
	
	if(city ==''){
		if(errorString==''){
			document.getElementById('ContactsCity').focus();
			
		}
                errorString = errorString +  "-Please enter city. <br>";               
	}
	if(state ==''){
		if(errorString==''){
			document.getElementById('ContactsState').focus();
			
		}
                errorString = errorString +  "-Please enter state. <br>";               
	}
	if(country ==''){
		if(errorString==''){
			document.getElementById('ContactsCountryId').focus();
			
		}
                errorString = errorString +  "-Please enter country. <br>";               
	}

	if(postcode ==''){
		if(errorString==''){
			document.getElementById('ContactsPostCode').focus();
			
		}
                errorString = errorString +  "-Please enter post code. <br>";               
	}	
	if(owner ==''){
		
                errorString = errorString +  "-Please choose find us. <br>";               
	}

	if(phone ==''){
		if(errorString==''){
			document.getElementById('ContactsPhone').focus();
			
		}
                errorString = errorString +  "-Please enter phone number. <br>";               
	}
	if(contacttext ==''){
		if(errorString==''){
			document.getElementById('ContactsComments').focus();
			
		}
                errorString = errorString +  "-Please enter comments. <br>";               
	}
	
		 
        if(errorString != ""){
        
		window.scrollTo(0,0);
		document.getElementById("jsError").style.display='block';
		document.getElementById('ContactsEmail').focus();
		document.getElementById("jsError").innerHTML=errorString;
  
  	return false;
	}
	else{
		return true;
	}
}
//end of validateContactus

