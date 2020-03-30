// Signin form (event registration)
var signIn_form = document.querySelector("div#login form");
signIn_form.addEventListener("submit", ConfirmCredentials, false);

var loginEmail = signIn_form[0];
var loginPassword = signIn_form[1];

loginEmail.addEventListener("keyup", verifyUsername, false);
loginPassword.addEventListener("keyup", verifyPassword, false);

// error flags
var error = true;
var emailOK = passwordOK = true;


/*==============[ Form validation function ]==============*/

function ConfirmCredentials(e) {

  var myForm = e.currentTarget;

  // in case of emptyness display msg
  myForm[0].value == ""? emailOK = false : emailOK = true;

  myForm[1].value == ""? passwordOK = false : passwordOK = true;

  // in case the error flag is set, show to error summary
  error = !(emailOK && passwordOK);
  if(error){
    document.querySelector("#err_mod").classList.replace("invisible", "visible");
    e.preventDefault();
      return false;

  }else{
      document.querySelector("#err_mod").classList.replace("visible", "invisible");
      return false;
  }

}

/*==========[ Event handler functions for each input element ]================*/

function verifyUsername(e) {
  var emailInput = e.currentTarget;
  const emailRegex = /^[a-zA-Z0-9\.]+@[a-zA-Z0-9]+((\-)?[a-zA-Z0-9]+(\.)?[a-zA-Z0-9]{2,6}?)?\.[a-zA-Z]{2,6}$/;

  if (!emailRegex.test(emailInput.value)) {
    emailInput.classList.add("input-error");
    emailOK = false;

  }else {
    emailInput.classList.replace("input-error", "input-success");
    emailOK = true;
  }
}

function verifyPassword(e) {
  var pwdInput = e.currentTarget;
  const passRegex = /^(?=.*[a-zA-Z0-9_])([^\s]){7,}$/;

  if (!passRegex.test(pwdInput.value)) {
    pwdInput.classList.add("input-error");
    passwordOK = false;

  } else {
    pwdInput.classList.replace("input-error", "input-success");
  }

}