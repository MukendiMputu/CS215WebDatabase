// Signup form (event registration)
var myForm = document.querySelector("form").addEventListener("submit", Validate, false);

// Selecting all the input elements of the signup form
var nickname = document.forms["signup_form"]["nickname"];
var email = document.forms["signup_form"]["email"];
var password = document.forms["signup_form"]["loginPassword"];
var password_confirm = document.forms["signup_form"]["loginPassword2"];

// Registrating the event listener signup input elements
nickname.addEventListener("keyup", verifyName, false);
email.addEventListener("keyup", verifyEmail, false);
password.addEventListener("keyup", verifyPwd, false);
password_confirm.addEventListener("keyup", verifyMatch, false);


// Unordered list of errors
var error_list = document.querySelector("ul.error_list");

// error flags
var error = true;
var nicknameOK = emailOK = passwordOK = matchOK = true;


/*==============[ Form validation function ]==============*/

function Validate(e) {

  error_list.innerHTML = ""; // empty the list to avoid repetition
  var myForm = e.currentTarget;

  let li; // variable to hold an error list-item

  // in case of error create li and inject msg
  if (myForm[0].value == "") {
    li = document.createElement("li");
    li.innerHTML += "Username is required";
    error_list.appendChild(li);
    nicknameOK = false;

  } else {
    nicknameOK = true;
  }

  if (myForm[1].value == "") {
    li = document.createElement("li");
    li.innerHTML  += "Email is required";
    error_list.appendChild(li);
    emailOK = false;

  } else {
    emailOK = true;
  }

  if (myForm[2].value == "") {
    li = document.createElement("li");
    li.innerHTML  += "Password is required";
    error_list.appendChild(li);
    passwordOK = false;

  } else {
    passwordOK = true;
  }

  // check if the two passwords match
  if (myForm[3].value == "") {
    li = document.createElement("li");
    li.innerHTML  += "The two passwords do not match";
    error_list.appendChild(li);
    matchOK = false;

  } else {
    matchOK = true;
  }

  // in case the error flag is set, show to error summary
  error = !(nicknameOK && emailOK && passwordOK && matchOK);
  if(error){
    document.querySelector("#err_mod").classList.replace("invisible", "visible");
    document.querySelector("#succ_mod").classList.replace("visible", "invisible");
      e.preventDefault();
      return false;
  // or show success msg
  }else{
      document.querySelector("#err_mod").classList.replace("visible", "invisible");
      document.querySelector("#succ_mod").classList.replace("invisible", "visible");
      e.preventDefault();
      return false;
  }

}

/*==========[ Event handler functions for each input element ]================*/

function verifyName() {
  const regex = /^[a-zA-Z][a-zA-Z]+\d*(?!\s)[a-zA-Z]+\d*$/;

  if (!regex.test(nickname.value)) {
    nickname.classList.add("input-error");
    nicknameOK = false;

  }else if (nickname.value.length < 3) {
    nickname.classList.add("input-error");
    nicknameOK = false;

  }else {
    nickname.classList.replace("input-error", "input-success");
    nicknameOK = true;
  }
}

function verifyEmail() {
  const emailRegex = /^[a-zA-Z0-9\.]+@[a-zA-Z0-9]+((\-)?[a-zA-Z0-9]+(\.)?[a-zA-Z0-9]{2,6}?)?\.[a-zA-Z]{2,6}$/;

  if (!emailRegex.test(email.value)) {
    email.classList.add("input-error");
    emailOK = false;

  }else {
    email.classList.replace("input-error", "input-success");
    emailOK = true;
  }
}

function verifyPwd() {
  const passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){7,}$/;

  if (!passRegex.test(password.value)) {
    password.classList.add("input-error");
    passwordOK = false;

  } else {
    password.classList.replace("input-error", "input-success");
  }

}

function verifyMatch() {
  if (password.value !== password_confirm.value) {
  	password_confirm.classList.add("input-error");
  } else {
    password_confirm.classList.replace("input-error", "input-success");
  }
}