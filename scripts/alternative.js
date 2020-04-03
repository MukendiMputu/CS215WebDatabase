/* variable declaration */

function signup() {
	var error_msg = "The following error(s) occured:\n";
	var ok_msg = "All good!\n";
	var error = true;

	var email = document.forms["signup_form"]["email"].value;
	var nickname = document.forms["signup_form"]["nickname"].value;
	var pword = document.forms["signup_form"]["loginPassword"].value;
	var pword2 = document.forms["signup_form"]["loginPassword2"].value;

	var form_elements = [nickname, email, pword, pword2];
	form_elements.forEach(validateSignup);

	var nicknameOK = true;
	var emailOK = true;
	var passwordOK = true;
	var matchOK = true;

	/* validating function */
	function validateSignup(item, index) {

		// Navigate all the form elements
		switch(index) {

			case 0:
				// if this element is empty or undefined
				if (item == "" || item == null) {
					// produce an error message and set error flag to true
					error_msg += "Nickname: is empty\n";
					nicknameOK = false;

				} else if (item.length > 40) {
					error_msg += "Max length for the nickname is 40 characters.\n";
					nicknameOK = false;

				}else{
					// otherwise collect the user input
					ok_msg += "Nickname: " + item + "\n";
					nicknameOK = true;
				};
			break;

			case 1:
				// if this element is empty or undefined
				if (item == "" || item == null) {
					// produce an error message and set error flag to true
					error_msg += "Email Address: is empty\n";
					emailOK = false;

				}else if (item.length > 60) {
					error_msg += "Max length for the email address is 60 characters.\n";
					emailOK = false;

				}else{
					// otherwise collect the user input
					ok_msg += "Email Address: " + item + "\n";
					emailOK = true;
				};
			break;

			case 2:
				// if this element is empty or undefined
				if (item == "" || item == null) {
					// produce an error message and set error flag to true
					error_msg += "Password: is empty\n";
					passwordOK = false;

				} else if (item.length < 8) {
					error_msg += "Min length for the password is 8 characters.\n";
					passwordOK = false;
				}else {
					passwordOK = true;
				};
			break;

			case 3:
				// if this element is empty or undefined
				if (item == "" || item == null) {
					// produce an error message and set error flag to true
					error_msg += "Confirm your password: is empty\n";
					matchOK = false;

				} else if (pword != item) {
					error_msg += "The passwords you've entered don't match.\n";
					matchOK = false;
				}else {
					matchOK = true;
				}

				//if all are ok
				error = !(nicknameOK && emailOK && passwordOK && matchOK);
			break;

			default:;
		}
	}

	/* in case the error flag is set, alert the user */
	if(error){

		alert(error_msg);
		return false;

	}else{

		alert(ok_msg);
		return false;
	}
}
