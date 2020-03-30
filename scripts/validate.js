/* variable declaration */


function signup(event) {

    // Get the target node of the event
      var myForm = event.currentTarget;
}

function chkEmail(event){
    var inputField = event.currentTarget;

    var email = inputField.value.search(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/);
    if (email != 0){
        alert(inputField.value + " is not in a correct format.")
    }
}