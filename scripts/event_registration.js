
var myForm = document.querySelector("form").addEventListener("submit", Validate, false);

// Selecting all the input elements
var nickname = document.forms["signup_form"]["nickname"];
var email = document.forms["signup_form"]["email"];
var password = document.forms["signup_form"]["loginPassword"];
var password_confirm = document.forms["signup_form"]["loginPassword2"];

// Registrating all the event listener
nickname.addEventListener("keyup", verifyName, false);
email.addEventListener("keyup", verifyEmail, false);
password.addEventListener("keyup", verifyPwd, false);
password_confirm.addEventListener("keyup", verifyMatch, false);