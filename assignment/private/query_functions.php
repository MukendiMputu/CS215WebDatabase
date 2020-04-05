<?php
//==================== Finding, Updating & Deleting Rooms ========================//

	function find_all_rooms() {
		global $db;

		$sql  = "SELECT * FROM Rooms ";
		$sql .= "ORDER BY number ASC";

		$result = mysqli_query($db, $sql);
		$numb_rows = mysqli_num_rows($result);

		$rooms = array();
		for ($i=1; $i <= $numb_rows; $i++) {
			$rooms[] = mysqli_fetch_assoc($result);
		}
		mysqli_free_result($result);
		return $rooms;
	}

	function find_room_by_number($room_number) {
		global $db;

		$sql = sprintf("SELECT * FROM Rooms
						WHERE number = '%s' LIMIT 1", db_escape($db, $room_number));
		$result = mysqli_query($db, $sql);
		$room = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $room;
	}

	function find_room_by_rid($rid) {
		global $db;

		$sql = sprintf("SELECT * FROM Rooms
						WHERE rid = '%s' LIMIT 1", db_escape($db, $rid));
		$result = mysqli_query($db, $sql);
		$room = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $room;
	}

	function delete_room($rid) {
		global $db;

		$sql = sprintf("DELETE FROM Rooms
						WHERE rid = '%s' LIMIT 1", db_escape($db, $rid));
		$result = mysqli_query($db, $sql);
		return $room;
	}

//==================== Finding, Updating & Deleting Users ========================//

	function find_user_by_uname($uname) {
		global $db;

		$sql = sprintf("SELECT * FROM Users
						WHERE uname = '%s' LIMIT 1", $uname);
		$result = mysqli_query($db, $sql);
		$user = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $user;
	}

	function find_user_by_email($email) {
		global $db;

		$sql = sprintf("SELECT * FROM Users
						WHERE email = '%s' LIMIT 1", db_escape($db, $email));
		$result = mysqli_query($db, $sql);
		$user = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $user;
	}

	function find_user_by_uid($uid) {
		global $db;

		$sql = sprintf("SELECT * FROM Users
						WHERE uid = '%s' LIMIT 1", db_escape($db, $uid));
		$result = mysqli_query($db, $sql);
		$user = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $user;
	}

	function delete_user($uid) {
		global $db;

		$sql = sprintf("DELETE FROM Users
						WHERE uid = '%s' LIMIT 1", db_escape($db, $uid));
		$result = mysqli_query($db, $sql);
		return $user;
	}

//==================== Finding, Updating & Deleting Bookings ========================//

	function find_all_bookings() {
		global $db;

		$sql = "SELECT * FROM Bookings ORDER BY date ASC, start_time ASC";
		$result = mysqli_query($db, $sql);
		$numb_rows = mysqli_num_rows($result);

		$bookings = array();
		for ($i=1; $i <= $numb_rows; $i++) {
			$bookings[] = mysqli_fetch_assoc($result);
		}
		mysqli_free_result($result);
		return $bookings;
	}

	function find_all_bookings_to_room($roomID) {
		global $db;

		$sql  = "SELECT * FROM Bookings ";
		$sql .= "WHERE room_id = '" . db_escape($db, $roomID) . "' ";
		$sql .= "ORDER BY date ASC, start_time ASC";
		$result = mysqli_query($db, $sql);
		$numb_rows = mysqli_num_rows($result);

		$bookings = array();
		for ($i=1; $i <= $numb_rows; $i++) {
			$bookings[] = mysqli_fetch_assoc($result);
		}
		mysqli_free_result($result);
		return $bookings;
	}

	function find_all_bookings_to_user($userID) {
		global $db;

		$sql  = "SELECT * FROM Bookings ";
		$sql .= "WHERE user_id = '" . db_escape($db, $userID) . "' ";
		$sql .= "ORDER BY date ASC, start_time ASC";
		$result = mysqli_query($db, $sql);
		$numb_rows = mysqli_num_rows($result);

		$bookings = array();
		for ($i=1; $i <= $numb_rows; $i++) {
			$bookings[] = mysqli_fetch_assoc($result);
		}
		mysqli_free_result($result);
		return $bookings;
	}

	function find_all_bookings_with_filter($option = array()) {
		global $db;

		$sql  = "SELECT * FROM Bookings ";
		$sql .= "WHERE room_id = '" . db_escape($db, $option['rid']) . "' AND ";
		$sql .= db_escape($db, $option['date']) == '' ? '' : "date = '" . db_escape($db, $option['date']) . "' AND ";
		$sql .= "start_time >= '" . db_escape($db, $option['start']) . "' AND ";
		$sql .= "end_time <= '" . db_escape($db, $option['end']) . "' ";
		$sql .= "ORDER BY date ASC, start_time ASC";
		$result = mysqli_query($db, $sql);
		$numb_rows = mysqli_num_rows($result);

		$bookings = array();
		for ($i=1; $i <= $numb_rows; $i++) {
			$bookings[] = mysqli_fetch_assoc($result);
		}
		mysqli_free_result($result);
		return $bookings;
	}

	function find_booking_by_bid($bid) {
			global $db;

			$sql = sprintf("SELECT * FROM Bookings
							WHERE bid = '%s' LIMIT 1", db_escape($db, $bid));
			$result = mysqli_query($db, $sql);
			$booking = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			return $booking;
	}

	function update_booking($booking) {
			global $db;

			$sql  = "UPDATE Bookings SET ";
			$sql .= "purpose = '" . db_escape($db, $booking['purpose']) . "', ";
			$sql .= "date ='" . db_escape($db, $booking['date']) . "', ";
			$sql .= "start_time ='" . db_escape($db, $booking['start_time']) . "', ";
			$sql .= "end_time ='" . db_escape($db, $booking['end_time']) . "' ";
			$sql .= "WHERE bid = '" . db_escape($db, $booking['bid'])  . "' LIMIT 1";
			$result = mysqli_query($db, $sql);

			return $result;
	}

	function insert_booking($booking) {
			global $db;

			$sql  = "INSERT INTO Bookings (purpose, date, start_time, end_time, user_id, room_id) VALUES ";
			$sql .= "('" . db_escape($db, $booking['purpose']) . "', '";
			$sql .= db_escape($db, $booking['date']) . "', '";
			$sql .= db_escape($db, $booking['start_time']) . "', '";
			$sql .= db_escape($db, $booking['end_time']) . "', '";
			$sql .= db_escape($db, $booking['user_id']) . "', '";
			$sql .= db_escape($db, $booking['room_id']) . "') ";
			$result = mysqli_query($db, $sql);
			return $result;
	}

	function delete_booking($bid) {
			global $db;

			$sql  = "DELETE FROM Bookings WHERE ";
			$sql .= "bid = '" . db_escape($db, $bid) . "' LIMIT 1";
			$result = mysqli_query($db, $sql);
			return $result;
	}


//==================== Finding, Updating & Deleting Notes ========================//

	function find_note_by_nid($nid) {
		global $db;

		$sql = sprintf("SELECT * FROM Notes
						WHERE nid = '%s' LIMIT 1", db_escape($db, $nid));
		$result = mysqli_query($db, $sql);
		$note = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $note;
	}

	function find_newest_note_by_ref($booking_ref) {
			global $db;

			$sql = sprintf("SELECT * FROM Notes
							WHERE booking_ref = '%s' ORDER BY created_at DESC LIMIT 1", db_escape($db, $booking_ref));
			$result = mysqli_query($db, $sql);
			$note = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			return $note;
	}

	function find_all_notes_by_ref($booking_ref) {
			global $db;

			$sql = sprintf("SELECT * FROM Notes
							WHERE booking_ref = '%s' ORDER BY created_at DESC", db_escape($db, $booking_ref));
			$result = mysqli_query($db, $sql);
			$numb_rows = mysqli_num_rows($result);

			$notes = array();
			for ($i=1; $i <= $numb_rows; $i++) {
				$notes[] = mysqli_fetch_assoc($result);
			}
			mysqli_free_result($result);
			return $notes;
	}

	function insert_note($note) {
			global $db;

			$sql  = "INSERT INTO Notes (booking_ref, content, previous_note, created_at) VALUES ";
			$sql .= "('" . db_escape($db, $note['booking_ref']) . "', ";
			$sql .= "'" . db_escape($db, $note['content']) . "', ";

			if (db_escape($db, $note['previous_note']) == '') {
				$previous_note = "" . "'NULL', " ;
			}else {
				$previous_note = "'" . db_escape($db, $note['previous_note']) . "', ";
			}

			$sql .= $previous_note;
			$sql .= "'" . db_escape($db, $note['created_at']) . "' ";
			$sql .= ")";
			$result = mysqli_query($db, $sql);
			return $result;
	}

	function delete_note($nid) {
		global $db;

		$sql = sprintf("DELETE FROM Notes
						WHERE nid = '%s' LIMIT 1", db_escape($db, $nid));
		$result = mysqli_query($db, $sql);
		return $note;
	}


//==================== Finding, Updating & Deleting Invitations ========================//

?>
