function setAction(val){
	document.getElementById('action').value=val;
}

function checkAll(frmObject){
	for(i=1; i<frmObject.chkRecordId.length; i++)
	{
		frmObject.chkRecordId[i].checked = frmObject.chkRecordId[0].checked;
	}
}

function isAllSelect(frmObject){
	var flgChk = 0;
	for(i=1; i<frmObject.chkRecordId.length; i++)
	{
		if(frmObject.chkRecordId[i].checked == false)
		{
			flgChk = 1;
			break;
		}
	}
	if(flgChk == 1){
		frmObject.chkRecordId[0].checked = false;
	}else{
		frmObject.chkRecordId[0].checked = true;
	}
}

function isAnySelect(frmObject){
	varAllId = "";
	for(i=1; i<frmObject.chkRecordId.length; i++)
	{
		if(frmObject.chkRecordId[i].checked == true) {
			if(varAllId == "") {
				varAllId = frmObject.chkRecordId[i].value;
			}
			else {
				varAllId += "," + frmObject.chkRecordId[i].value;
			}
		}
	}

	
	if(varAllId == ""){
		alert("Please select atleast one record");
		return false;
	}else{
	 //	alert(varAllId+"xs");
		document.getElementById('idList').value=varAllId;
		return true;
	}
}

function isAnySelected(frmObject,buttonVal){


	
	varAllId = "";
	for(i=1; i<frmObject.chkRecordId.length; i++)
	{
		if(frmObject.chkRecordId[i].checked == true) {
			if(varAllId == "") {
				varAllId = frmObject.chkRecordId[i].value;
			}
			else {
				varAllId += "," + frmObject.chkRecordId[i].value;
			}
		}
	}

	
	if(varAllId == ""){
		alert("Please select atleast one record.");
		return false;
	}else{
		var confirmation= confirm("Are you sure you want to " +buttonVal+ " the record(s)?");
	
		if(confirmation==true){		
			document.getElementById('idList').value=varAllId;
			return true;
		}else{

		}
	}
}

function isAnySelectedforCompare(frmObject,buttonVal){


	
	varAllId = "";
	check=0;
	for(i=1; i<frmObject.chkRecordId.length; i++)
	{
		if(frmObject.chkRecordId[i].checked == true) {
			if(varAllId == "") {
				varAllId = frmObject.chkRecordId[i].value;
			}
			else {
				varAllId += "," + frmObject.chkRecordId[i].value;
			}
			check++;
		}
	}

	
	if((varAllId == "") || (check <= 1)){
		alert("Please select atleast two record for compare.");
		return false;
	}else{
		var confirmation= confirm("Are you sure you want to " +buttonVal+ " these properties?");
	
		if(confirmation==true){		
			document.getElementById('idList').value=varAllId;
			//window.location="/rentals/compare/"+varAllId;	
			return true;
		}else{

		}
	}
}


function showMessage(msg){

	msg="Records has "+msg+" successfully.";
	document.getElementById('listingJS').style.display='';	
	document.getElementById('listingJS').innerHTML=msg;
}

function showMessage1(msg){

	msg="Jobs has "+msg+" successfully.";
	document.getElementById('listingJS').style.display='';	
	document.getElementById('listingJS').innerHTML=msg;
}


function checkSelect(frmObject,id){
	varAllId = "";	
	for(i=1; i<frmObject.chkRecordId.length; i++)
	{
		if(frmObject.chkRecordId[i].checked == true) {
			if(varAllId == "") {
				varAllId = frmObject.chkRecordId[i].value;
			}
			else {
				varAllId += "," + frmObject.chkRecordId[i].value;
			}
		}
	}
	//alert(varAllId+"xs");
	
	if(varAllId == ""){
		alert("Please select atleast one record");
		return false;
	}else{
		document.getElementById(id).value=varAllId;
		return true;
	}
}

function goShopping(url){
	var newwin = window.open(url,'_blank');
	if (!newwin){
		alert('popups blocked');
		self.location.href = url;
	}else if (newwin.closed || (newwin == null) || (typeof(newwin) == "undefined")){
		alert('popups blocked');
		self.location.href = url;
	}
}

function showShop(name){
	window.status=name;
}

function hideShop(){
	window.status='';
}

function doAction(frmObject,id){
	if(checkSelect(frmObject,id)){
		frmObject.submit();
	}
}

function favoritesList(letter){
	if(letter!=''){
		window.document.location='/users/myfavorites/sel_letter:'+letter+'#addFavorite';
	}
}