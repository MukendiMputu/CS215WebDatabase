// Booking form (event registration)
var booking_form = document.querySelector("div#booking-form form");
booking_form.addEventListener("submit", Validate, false);

var textArea = booking_form[1];
textArea.addEventListener("keyup", countChar, false);
// error flags
var error = true;
var bookingNumbOK = countOK = true;

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
    li.innerHTML += "Could not load the proper booking ID.";
    error_list.appendChild(li);
    bookingNumbOK = false;

  } else {
    bookingNumbOK = true;
  }

  // check if the time interval is valid
  if (myForm[1].value == "") {
    li = document.createElement("li");
    li.innerHTML  += "Note can not be submitted empty.";
    error_list.appendChild(li);
    timeIntervalOK = false;

  } else {
    timeIntervalOK = true;
  }

  // in case the error flag is set, show to error summary
  error = !(bookingNumbOK && countOK);
  if(error){
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

  if (textArea.value.length >= 250 && textArea.value.length <= 450) {
    textArea.classList.add("input-warning");
    document.querySelector("#charCount").setAttribute("color", "#DD8913");

  }else if (textArea.value.length == 499) {
    textArea.classList.add("input-error");
    document.querySelector("#charCount").setAttribute("color", "#DD8913");
    countOK = false;

  }else {
    textArea.classList.replace("input-error", "input-success");
    document.querySelector("#charCount").removeAttribute("color");
    countOK = true;
  }
}