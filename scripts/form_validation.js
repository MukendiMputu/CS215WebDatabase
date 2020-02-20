
var error_msg = "The following error(s) occured:\n";
var ok_msg = "All good!\n";
var error = true;

var nicknameOK = emailOK = passwordOK = matchOK = true;

function validateNickname(event) {
    var usrNickname = event.currentTarget;
    // if this element is empty or undefined
    if (usrNickname == "" || usrNickname == null) {
        // produce an error message and set error flag to true
        error_msg += "Nickname: is empty\n";
        nicknameOK = false;

    } else if (usrNickname.length > 40) {
        error_msg += "Max length for the nickname is 40 characters.\n";
        nicknameOK = false;

    }else{
        // otherwise collect the user input
        ok_msg += "Nickname: " + usrNickname + "\n";
        nicknameOK = true;
    };

    error = !(nicknameOK)
    // in case the error flag is set, alert the user
    if(error){

        alert(error_msg);
        return false;

    }else{

        alert(ok_msg);
        return false;
    }

}