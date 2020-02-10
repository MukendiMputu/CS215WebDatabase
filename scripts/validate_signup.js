/* JavaScript file for the signup page */

function SignUpForm(){

	var warn="";
	var rt=true;
	var str_user_inputs = "";

	
	//-- validate email --
	var email = document.forms["signup_form"]["email"].value;

	if (email == null || email == ""){
	    
	    warn +="Email is required. \n";
	    rt=false;
	  
	}
	else if(email.length > 60){
	   warn += "Max length for email is 60 characters.\n"
	   rt =false;
	}

	else{ // if everything is okay, then collect email 
	   
	    str_user_inputs +="Email: "+email+"\n";

	}

	
	//-- validate Username --
	var username = document.forms["signup_form"]["uname"].value;

	if (username == null || username == ""){
	    
	    warn +="Username is required. \n";
	    rt=false;
	  
	}
	else if(username.length > 40){
	   warn += "Max length for username is 40 characters.\n"
	   rt =false;
	}

	else{ // if everything is okay, then collect email 
	   
	    str_user_inputs +="Username: "+username+"\n";

	}

	//-- validate password --
	var pword = document.forms["signup_form"]["password"].value;

	if (pword == null || pword == ""){
	    
	    warn +="Password is required. \n";
	    rt=false;
	  
	}
	else if(pword.length < 8){
	   warn += "Min length for password is 8 characters.\n"
	   rt =false;
	}

	else{

	}

	//-- Confirm password --
	var pword2 = document.forms["signup_form"]["password2"].value;
	if (pword2 == null || pword2 == ""){
		    
		    warn +="Password confirmation is required. \n";
		    rt=false;
		  
	}
	else if(pword2 != pword){
	   warn += "Passwords don't match.\n"
	   rt =false;
	}

	else{

	}


	/* in case the error flag is set, alert the user */
	if(rt==false){
	  
	  alert(warn);
	  return false;

	}
	else{
	  
	  // display the user inputs:
	  alert(str_user_inputs);

	  // when return true, we send an HTTP request 
	  // and call the .php at the server side
	  // Here, we return false, and do not send an HTTP request 
	  // to the server, since we haven't learn PHP yet.  
	  
	  return false; // should be: return true; when using PHP

	}

}