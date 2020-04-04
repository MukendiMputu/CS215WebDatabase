<?php require_once('private/initialize.php'); //echo phpinfo(); ?>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
      $filterOption = array();

      $filterOption['rid'] = $_GET['rid'];
      $filterOption['date'] = $_GET['date'];
      $filterOption['start'] = $_GET['start'];
      $filterOption['end'] = $_GET['end'];

      $bookings = array("bookings" => array(), "rooms" => array());

  		// Find booking corresponding to roomID
  		$bookings["bookings"] = find_all_bookings_with_filter($filterOption);
      $bookings["rooms"] = find_room_by_rid($filterOption['rid']);

      echo json_encode($bookings);
    }

?>
