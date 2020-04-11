<?php
	function db_escape($db, $string) {
		return mysqli_real_escape_string($db, $string);
	}

	function hSpecChars($string) {
		return htmlspecialchars($string);
	}

	function redirect_to($location) {
		header("Location: " . $location);
	}

  	function display_session_message() {
		$msg = get_and_clear_session_message();
		if (!is_blank($msg)) {
			return '<div id="message">'. hSpecChars($msg) . '</div>';
		}
	}

    function get_and_clear_session_message() {
      if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
        $msg = $_SESSION['message'];
        unset($_SESSION['message']);
        return $msg;
      }
    }


	// Validation functions

	function has_valid_email_format($value) {
		$email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
		return preg_match($email_regex, $value) === 1;
	}

	function is_blank($value) {
		return !isset($value) || trim($value) === '';
	}

	function has_length_less_than($value, $max) {
		$length = strlen($value);
		return $length < $max;
	}


?>