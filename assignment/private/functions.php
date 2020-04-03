<?php
	function db_escape($db, $string) {
		return mysqli_real_escape_string($db, $string);
	}

	function redirect_to($location) {
		header("Location: " . $location);
	}

  	function display_session_message() {
		$msg = get_and_clear_session_message();
		if (!is_blank($msg)) {
			return '<div id="message">'. h($msg) . '</div>';
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

	function has_length($value, $options) {
		if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
			return false;
		} elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
			return false;
		} elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
			return false;
		} else {
			return true;
		}
	}

?>