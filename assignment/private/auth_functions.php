<?php
    // Performs all actions necessary to log in a user
    function log_in_user($user) {
        // Regenerating the ID protects the user from session fixation.actions
        session_regenerate_id();
        $_SESSION['user_id'] = $user['uid'];
        $_SESSION['last_login'] = time();
        $_SESSION['username'] = $user['uname'];
        return true;
    }

    function log_out_user() {
        unset($_SESSION['user_id']);
        unset($_SESSION['last_login']);
        unset($_SESSION['uname']);
        return true;
    }

    function is_logged_in() {
        return isset($_SESSION['user_id']);
    }

    // require a valid login before granting acccess to the page.
    function require_login() {
        if(!is_logged_in()) {
			header("Location: " . 'http://www2.cs.uregina.ca/~mmx458/assignment/index.php');
        } else {
		// Do nothing, let the rest of the page proceed
        }
    }
?>