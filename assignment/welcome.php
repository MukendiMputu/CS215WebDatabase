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
<?php include_once('private/shared_header.php') ?>
<?php include_once('private/shared_user_info.php') ?>

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
						<p style="grid-column: 1/3; margin: 0;"><a href="<?php echo 'http://www2.cs.uregina.ca/~mmx458/assignment/new_booking.php' ; ?>">Add a new booking</a></p>
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
								<p class="note_bubble"><?php echo $note['content']; ?></p><a href="<?php echo 'note.php?nid=' . $note['nid'] . '&uid=' . $user_id ?>">edit note</a><br/>
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

<?php include_once('private/shared_footer.php'); ?>