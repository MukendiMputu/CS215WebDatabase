// Booking form (event registration)
var booking_form = document.querySelector("div.booking-form form");
booking_form.addEventListener("submit", Validate, false);

var textArea = booking_form[4];
textArea.addEventListener("keyup", countChar, false);
// error flags
var error = true;
var roomOK = dateOK = startTimeOK = endTimeOK = timeIntervalOK = countOK = true;

// fetching the unordered list for errors summary
var error_list = document.querySelector(".error_list, label_required");

/*==============[ Form validation function ]==============*/

function Validate(e) {

  error_list.innerHTML = ""; // empty the list to avoid repetition
  var myForm = e.currentTarget;

  let li; // variable to hold an error list-item

  // in case of error create li and inject msg
  if (myForm[0].value == "") {
    li = document.createElement("li");
    li.innerHTML += "Select a proper room number.";
    error_list.appendChild(li);
    roomOK = false;

  }else {
    roomOK = true;
  }

  // check if the time interval is valid
  if (myForm[2].value >= myForm[3].value) {
    li = document.createElement("li");
    li.innerHTML  += "End time must be after the start time";
    error_list.appendChild(li);
    timeIntervalOK = false;

  } else {
    timeIntervalOK = true;
  }

  // in case the error flag is set, show to error summary
  error = !(roomOK && dateOK && startTimeOK && endTimeOK && timeIntervalOK);
  if(error) {
     document.querySelector("#err_mod").classList.replace("invisible", "visible");
     document.querySelector("#succ_mod").classList.replace("visible", "invisible");
     	e.preventDefault();
	return false;
// or show success msg
   }else{
     document.querySelector("#err_mod").classList.replace("visible", "invisible");
     document.querySelector("#succ_mod").classList.replace("invisible", "visible");
     return true;
   }
}

/*==========[ Event handler functions for textarea ]================*/

function countChar() {
  var countDisplay = document.querySelector("#charCount span");
  countDisplay.innerText = textArea.value.length;

  if (textArea.value.length >= 25 && textArea.value.length <= 45) {
    textArea.classList.add("input-warning");
    document.querySelector("#charCount").setAttribute("color", "#DD8913");
    countOK = false;

  }else if (textArea.value.length == 49) {
    textArea.classList.add("input-error");
    document.querySelector("#charCount").setAttribute("color", "#DD8913");
    countOK = false;

  }else {
    textArea.classList.replace("input-error", "input-success");
    document.querySelector("#charCount").removeAttribute("color");
    countOK = true;
  }
}