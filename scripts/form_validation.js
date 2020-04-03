// Signup form (event registration)
var myForm = document.querySelector("form").addEventListener("submit", Validate, false);

// Selecting all the input elements of the signup form
var nickname = document.forms["signup_form"]["nickname"];
var email = document.forms["signup_form"]["email"];
var password = document.forms["signup_form"]["loginPassword"];
var password_confirm = document.forms["signup_form"]["loginPassword2"];

// Registrating the event listener signup input elements
nickname.addEventListener("blur", verifyName, false);
email.addEventListener("blur", verifyEmail, false);
password.addEventListener("blur", verifyPwd, false);
password_confirm.addEventListener("blur", verifyMatch, false);


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
  if (myForm[1].value == "") {
    li = document.createElement("li");
    li.innerHTML += "Username is required";
    error_list.appendChild(li);
    nicknameOK = false;

   } else if (!verifyName()) {
    li = document.createElement("li");
    li.innerHTML += "Username has wrong format (remove any space characters)";
    error_list.appendChild(li);
    nicknameOK = false;
  } else {
    nicknameOK = true;
  }

  if (myForm[2].value == "") {
    li = document.createElement("li");
    li.innerHTML  += "Email is required";
    error_list.appendChild(li);
    emailOK = false;

   } else if (!verifyEmail()) {
    li = document.createElement("li");
    li.innerHTML += "Email format is invalid";
    error_list.appendChild(li);
    nicknameOK = false;

  } else {
    emailOK = true;
  }

  if (myForm[3].value == "") {
    li = document.createElement("li");
    li.innerHTML  += "Password is required";
    error_list.appendChild(li);
    passwordOK = false;

   } else if (!verifyPwd()) {
    li = document.createElement("li");
    li.innerHTML  += "Password: at least 7 characters, including a non-letter";
    error_list.appendChild(li);
    passwordOK = false;

  } else {
    passwordOK = true;
  }

  // check if the two passwords match
  if (myForm[4].value == "") {
    li = document.createElement("li");
    li.innerHTML  += "Password confirmation is required";
    error_list.appendChild(li);
    matchOK = false;

  } else if (!verifyMatch()) {
    li = document.createElement("li");
    li.innerHTML  += "Passwords don't match";
    error_list.appendChild(li);
    passwordOK = false;

  } else {
    matchOK = true;
  }

  // in case the error flag is set, show to error summary
  error = !(nicknameOK && emailOK && passwordOK && matchOK);
  if(error){
    document.querySelector(".modal-danger").classList.replace("invisible", "visible");
    document.querySelector("#succ_mod").classList.replace("visible", "invisible");
    e.preventDefault();
    return false;
  // or show success msg
  }else{
      document.querySelector(".modal-danger").classList.replace("visible", "invisible");
      document.querySelector("#succ_mod").classList.replace("invisible", "visible");
      return true;
  }

}

/*==========[ Event handler functions for each input element ]================*/

function verifyName() {
  const regex = /^[A-Za-z][A-Za-z0-9]{2,29}$/ ;
	// /^[a-zA-Z][a-zA-Z]+\d*(?!\s)[a-zA-Z]+\d*$/;

  if (nickname.value.search(regex) != 0) {
    nickname.classList.remove("input-success");
    nickname.classList.add("input-error");
    return false;
  }else {
    nickname.classList.remove("input-error");
    nickname.classList.add("input-success");
    return true;
  }
}

function verifyEmail() {
  const emailRegex = /^[a-zA-Z0-9\.]+@[a-zA-Z0-9]+((\-)?[a-zA-Z0-9]+(\.)?[a-zA-Z0-9]{2,6}?)?\.[a-zA-Z]{2,6}$/;

  if (!emailRegex.test(email.value)) {
    	email.classList.remove("input-success");	
	email.classList.add("input-error");
    return false;

  }else {
    email.classList.remove("input-error");
    email.classList.add("input-success");

    return true;
  }
}

function verifyPwd() {
  const passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){7,}$/;

  if (!passRegex.test(password.value)) {
    password.classList.remove("input-success");
    password.classList.add("input-error");
    return false;

  } else {
    password.classList.remove("input-error");
    password.classList.add("input-success");
    return true;
  }

}

function verifyMatch() {
  if (password.value !== password_confirm.value) {
    	password_confirm.classList.remove("input-success");
  	password_confirm.classList.add("input-error");
      return false;
   } else {
	if(verifyPwd()){
		password_confirm.classList.remove("input-error");
		password_confirm.classList.add("input-success");
	}
    return true;
  }
}
