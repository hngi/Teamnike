function contactUs()								 
{
	var name = document.forms["contactMe"]["name"];			 
	var email = document.forms["contactMe"]["eMail"]; 
	var tel = document.forms["contactMe"]["tel"]; 
	var message = document.forms["contactMe"]["message"]; 
	 

	if (name.value == "")								 
	{ 
		window.alert("Please enter your name."); 
		name.focus(); 
		return false; 
	}
	
	if (email.value == "")								 
	{ 
		window.alert("Please enter a valid e-mail address."); 
		email.focus(); 
		return false; 
	} 

	if (email.value.indexOf("@", 0) < 0)				 
	{ 
		window.alert("Please enter a valid e-mail address."); 
		email.focus(); 
		return false; 
	} 

	if (email.value.indexOf(".", 0) < 0)				 
	{ 
		window.alert("Please enter a valid e-mail address."); 
		email.focus(); 
		return false; 
	} 

	if (tel.value == "")						 
	{ 
		window.alert("Please enter message tel."); 
		tel.focus(); 
		return false; 
	} 

	
	if (message.value =="")				 
	{ 
		alert("Please enter your message."); 
		message.focus(); 
		return false; 
	} 

	return true; 
}