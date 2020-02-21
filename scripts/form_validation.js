
var error_msg = "The following error(s) occured:\n";
var ok_msg = "All good!\n";
var error = true;

var nicknameOK = emailOK = passwordOK = matchOK = true;

// SELECTING ALL ERROR DISPLAY ELEMENTS
/* var name_error = document.getElementById('name_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error'); */

// validation function
function Validate() {
  // validate username
  if (username.value == "") {
    username.classList.toggle("input-error");
    document.querySelector("label[for='nickname']").style.color = "red";
    error_msg += "Username is required\n";
    nicknameOK = false;

  }
  // validate username
  if (username.value.length < 3) {
    username.classList.toggle("input-error");
    document.querySelector("label[for='nickname']").style.color = "red";
    error_msg = "Username must be at least 3 characters\n";
    nicknameOK = false;

  }
  // validate email
  if (email.value == "") {
    email.classList.toggle("input-error");
    document.querySelector("label[for='email']").style.color = "red";
    error_msg += "Email is required\n";
    emailOK = false;

  }
  // validate password
  if (password.value == "") {
    password.classList.toggle("input-error");
    document.querySelector("label[for='loginPassword']").style.color = "red";

    error_msg += "Password is required\n";
    passwordOK = false;

  }
  // check if the two passwords match
  if (password.value != password_confirm.value) {
    password.classList.toggle("input-error");
    document.querySelector("label[for='loginPassword2']").style.color = "red";

    error_msg += "The two passwords do not match\n";
    matchOK = false;
  }

  error = !(nicknameOK && emailOK && passwordOK && matchOK);

    /* in case the error flag is set, alert the user */
    if(error){

        alert(error_msg);
        error = true;
        return false;

    }else{

        alert(ok_msg);
        return false;
    }
}

// event handler functions
function verifyName() {
  if (username.value != "") {
   username.classList.toggle("input-error");
   document.querySelector("label[for='nickname']").style.color = "#5e6e66";
   //name_error.innerHTML = "";
   return true;
  }
}
function verifyEmail() {
  if (email.value != "") {
  	email.classList.toggle("input-error");
  	document.querySelector("label[for='email']").style.color = "#5e6e66";
  	//email_error.innerHTML = "";
  	return true;
  }
}
function verifyPwd() {
  if (password.value != "") {
  	password.classList.toggle("input-error");
  	document.getElementById('pass_confirm_div').style.color = "#5e6e66";
  	document.querySelector("label[for='loginPassword']").style.color = "#5e6e66";
  	//password_error.innerHTML = "";
  	return true;
  }
  if (password.value === password_confirm.value) {
  	password.classList.toggle("input-error");
  	document.querySelector("label[for='loginPassword2']").style.color = "#5e6e66";
  	//password_error.innerHTML = "";
  	return true;
  }
}