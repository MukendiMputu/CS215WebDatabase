<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('track_errors', '1');
error_reporting(E_ALL & ~E_WARNING );?>

<?php require_once('private/initialize.php'); ?>

<?php
require_login();

if(isset($_GET)) {
	$user_id = $_GET['id'];

	$user = find_user_by_uid($user_id);

	$sql  = "SELECT DISTINCT bid, purpose, date, start_time, end_time, ";
	$sql .= "room_id, number, booking_ref, picture FROM Bookings	 ";
	$sql .= "LEFT JOIN Notes ON Bookings.bid = Notes.booking_ref ";
	$sql .= "INNER JOIN Rooms ON Bookings.room_id = Rooms.rid ";
	$sql .= sprintf("AND Bookings.user_id = %s ", $user_id);
	$sql .= "ORDER BY Bookings.date ASC, Bookings.start_time ASC";
	$query_result = mysqli_query($db, $sql);
	$num_rows = mysqli_num_rows($query_result);
	$bookings = array();
	for ($i=1; $i <= $num_rows; $i++) {
		// Fetch every single booking
		$bookings[] = mysqli_fetch_assoc($query_result);
	}
	mysqli_free_result($query_result);
} else {
	redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/signin.php');
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Conference Room | <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?> </title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css"/>
	<link rel="stylesheet" media="screen and (max-width: 480px)" href="../styles/mobiles.css"/>
</head>
<body>
	<!-- container -->
	<div id="grid">
		<div id="header">
			<div id="h_navBar">
				<div id="logo" class=" float-left">
					<h1>Conference Room</h1>
				</div>
				<div id="h_side-nav">
					<ul id="side-nav">
						<li><a href="signout.php">Sign out</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- end of header -->
		<div id="user-info">
			<div id="user-info-pane">
				<img id="logged-avatar" width="200" class="img_widget" src="<?php echo isset($user['avatar']) ? $user['avatar'] : '../img/avatar_default.png' ?>"/>
				<br/>
				<a href="#">Edit profile</a>
			</div>
			<div id="uf-ID" class=" float-left">
				<h2><?php echo isset($user['uname']) ? $user['uname'] : '' ; ?></h2><br/>
				<span><?php echo isset($user['email']) ? $user['email'] : '' ; ?></span>
			</div>
		</div><!-- end of user-info -->
		<div id="section">
			<div id="booking_pane">
				<div id="mp_tabs">
					<ul class=" no-bullet">
						<li id="overvTab"><a href="#reservations">Overview</a></li>
						<li id="catTab"><a href="#">Invitation</a></li>
						<li id="equipTab"><a href="#">Messages</a></li>
						<li id="moreTab"><a href="#">More...</a></li>
					</ul>
				</div>
				<div id="containers" >
					<div id="overvPanel" class="showable">
						<p style="grid-column: 1/3; "><a href="<?php echo 'http://www2.cs.uregina.ca/~mmx458/assignment/new_booking.php' ; ?>">Add a new booking</a></p>
						<?php foreach ($bookings as $booking) { ?>
							<div class="card">
								<div class="room_thumbnail booking-thumbnail">
									<img alt="<?php echo 'Picture of conference room ' . $booking['number'] ; ?>" class="img-small" src="<?php echo '..' . $booking['picture'] ; ?>"/>
								</div>
								<span><?php echo $booking['number']; ?></span>
							</div>
							<div class="ovPanelText booking-form">
								<h4><?php echo $booking['purpose']; ?></h4>
								<span>Date: <?php echo date('d M Y',strtotime($booking['date'])) ; ?> </span><br/>
								<span>Time: <?php echo date('H:i a',strtotime($booking['start_time'])) ; ?> - <?php echo date('H:i a',strtotime($booking['end_time'])) ; ?> </span>
								<br/><br/><strong>Notes:</strong><br/>
								<?php $notes = find_all_notes_by_ref($booking['booking_ref']);
									   foreach ( $notes as $note ) {
								 ?>
								<p class="note_bubble"><?php echo $note['content']; ?></p><a href="<?php echo 'note.php?id=' . $note['nid'] . '&uid=' . $user_id ?>">edit note</a><br/>
								<?php } ?>
								<p style="color:#452113;">Add note <a class="add_note" href="<?php echo 'http://www2.cs.uregina.ca/~mmx458/assignment/new_note.php?bid='.$booking['bid'].'&uid='.$_SESSION['user_id']; ?>"> <span style="font-size:12pt;">+</span></a></p>
								<p class=" float-right"><a href="<?php echo 'booking.php?id=' . $booking['bid'] . '&uid=' . $user_id ?>">edit booking</a> </p>
							</div>
						<?php } ?>
					</div>
					<div id="catering" class="showable">
						<!-- content catering -->
						<div class="optionItem optionLink">
							<div class="card">
								<img alt="conference room premium" class="img-small" src="../img/conference_premium.jpg"/>
								<span>RIC 214</span>
							</div>
							<div class=" ovPanelText">
								<h4>HTML</h4>
								<p><strong>Hypertext Markup Language.</strong> Controls the structure and semantics of web pages. Tags are used to mark up elements and denote content type. </p>
								<p class=" float-right"><a href="booking.php">edit booking</a> | <a href="note.php">edit note</a></p>
							</div>
						</div>
						<div class="optionItem optionLink">
							<div class="card">
								<img alt="conference room premium" class="img-small" src="../img/conference_premium.jpg"/>
								<span>RIC 214</span>
							</div>
							<div class=" ovPanelText">
								<h4>HTML</h4>
								<p><strong>Hypertext Markup Language.</strong> Controls the structure and semantics of web pages. Tags are used to mark up elements and denote content type. </p>
								<p class=" float-right"><a href="booking.php">edit booking</a> | <a href="note.php">edit note</a></p>
							</div>
						</div>
					</div>
					<div id="equipment" class="showable">
						<!-- content equipment -->
						<div class="optionItem optionLink">
							<div class="card">
								<img alt="conference room premium" class="img-small" src="../img/conference_premium.jpg"/>
								<span>RIC 214</span>
							</div>
							<div class=" ovPanelText">
								<h4>HTML</h4>
								<p><strong>Hypertext Markup Language.</strong> Controls the structure and semantics of web pages. Tags are used to mark up elements and denote content type. </p>
								<p class=" float-right"><a href="booking.php">edit booking</a> | <a href="note.php">edit note</a></p>
							</div>
						</div>
					</div>
					<div id="more" class="showable">
						<!-- content more -->
						<div class="optionItem optionLink">
							<div class="card">
								<img alt="conference room premium" class="img-small" src="../img/conference_premium.jpg"/>
								<span>RIC 214</span>
							</div>
							<div class=" ovPanelText">
								<h4>HTML</h4>
								<p><strong>Hypertext Markup Language.</strong> Controls the structure and semantics of web pages. Tags are used to mark up elements and denote content type. </p>
								<p class=" float-right"><a href="booking.php">edit booking</a> | <a href="note.php">edit note</a></p>
							</div>
						</div>
					</div>
				</div><!-- end of event panes -->
			</div> <!-- end of section -->
		</div> <!-- end of container -->
	</div>
	<script type="text/javascript" src="../scripts/pagination.js"></script>
</body>
</html>
