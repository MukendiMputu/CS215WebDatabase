var sigupForm = document.querySelector([name=signup_form]).addEventListener("submit", Validate, true);

// Selecting all the input elements
var username = document.forms['signup_form']['nickname'];
var email = document.forms['signup_form']['email'];
var password = document.forms['signup_form']['loginPassword'];
var password_confirm = document.forms['signup_form']['loginPassword2'];

// Registrating all the event listener
username.addEventListener('blur', verifyName, true);
email.addEventListener('blur', verifyEmail, true);
password.addEventListener('blur', verifyPwd, true);