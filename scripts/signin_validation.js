// Signin form (event registration)
var signIn_form = document.querySelector("div#login form");
signIn_form.addEventListener("submit", ConfirmCredentials, false);

var loginEmail = signIn_form[0];
var loginPassword = signIn_form[1];

loginEmail.addEventListener("blur", verifyUsername, false);
loginPassword.addEventListener("blur", verifyPassword, false);

// error flags
var error = true;
var emailOK = passwordOK = true;


/*==============[ Form validation function ]==============*/

function ConfirmCredentials(e) {

  var myForm = e.currentTarget;

  // in case of emptyness display msg
  if (myForm[0].value == "") {
	emailOK = false;
  }else if (!verifyUsername()) {
	emailOK = false;
  }else { 
	emailOK = true;
  }
  
  if (myForm[1].value == "") {
	passwordOK = false;
  }else if (!verifyPassword()) {
	passwordOK = false;
  }else { 
	passwordOK = true;
  }

  // in case the error flag is set, show to error summary
  error = !(emailOK && passwordOK);
  if(error){
    document.querySelector(".modal-danger").classList.replace("invisible", "visible");
    e.preventDefault();
    return false;

  }else{
      document.querySelector("#err_mod").classList.replace("visible", "invisible");
      return true;
  }

}

/*==========[ Event handler functions for each input element ]================*/

function verifyUsername(e) {
  var emailInput = e.currentTarget;
  const emailRegex = /^[a-zA-Z0-9\.]+@[a-zA-Z0-9]+((\-)?[a-zA-Z0-9]+(\.)?[a-zA-Z0-9]{2,6}?)?\.[a-zA-Z]{2,6}$/;

  if (!emailRegex.test(emailInput.value)) {
	emailInput.classList.remove("input-success");
    emailInput.classList.add("input-error");
    return false;

  }else {
    emailInput.classList.remove("input-error");
	emailInput.classList.add("input-success");
    return true;
  }
}

function verifyPassword(e) {
  var pwdInput = e.currentTarget;
  const passRegex = /^(?=.*[a-zA-Z0-9_])([^\s]){7,}$/;

  if (!passRegex.test(pwdInput.value)) {
    return false;

  } else {
	return true;
  }

}