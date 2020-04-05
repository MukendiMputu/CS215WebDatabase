<?php require_once('private/initialize.php'); ?>

<?php require_login();

	if(!isset($_GET['bid'])) {
		$url_ending = !isset($_GET['uid']) ? '' : 'welcome.php?id=' . $_GET['uid'];
		redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/' . $url_ending);
	}
	$booking = find_booking_by_bid($_GET['bid']);
	$user_id = $_GET['uid'];

  	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		$note = array();

    		$note['booking_ref'] = $_POST['booking_ref'];
    		$note['content'] = $_POST['descriptText'];
    		$note['created_at'] = date("Y-m-d H:i:s");

		$prev_note = find_newest_note_by_ref($note['booking_ref']);
    		$note['previous_note'] = $prev_note == 1 ? "NULL" : $prev_note['nid'];
    		$inserted = insert_note($note);
    		if($inserted) {
      			redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/welcome.php?id=' .$_SESSION['user_id']);
    		}
  	   }
?>


<?php include_once('private/shared_header.php') ?>
<?php include_once('private/shared_user_info.php') ?>

      <div id="section">
        <div id="main_pane">
			<?php $room = find_room_by_rid($booking['room_id']);
			?>
            <div id="mp_titel">
                <h3>New Note</h3>
            </div>
            <div id="overvPanel">
                    <div class="card-fixed">
                        <img alt="<?php echo 'Picture of conference room '.$room['number']; ?>" class="img-small" src="<?php echo '..'.$room['picture']; ?>" />
                        <span><?php echo $room['number']; ?></span>
                    </div>
                    <div id="booking-form">
                      <div id="succ_mod" class="invisible modal-succes">
                        <p class="label_required success text-center">Saved!</p>
                      </div>
                      <div id="err_mod" class="invisible modal-danger">
                        <ul class="error_list label_required danger">
                          <li></li>
                        </ul>
                      </div>
                      <form class="form-validate" method="post" action="<?php echo 'http://www2.cs.uregina.ca/~mmx458/assignment/new_note.php?bid=' .$booking['bid']; ?>">
                          <input type="text" id="bookingID" name="booking_ref" hidden value="<?php echo $booking['bid']; ?>"/>
                          <label for="dptText" class="">Note:</label><br />
                          <textarea id="dptText" name="descriptText" required rows="5" cols="50" maxlength="500"><?php echo $note['content']; ?></textarea>
                          <br /><span id="charCount">(<span>0</span>/500 characters )</span>
                          <p class="text-right"><a href="<?php echo 'welcome.php?id=' . $user_id; ?>">cancel</a> | <button type="submit" class="btn-success medium">save</button></p>
                      </form>
                    </div>
            </div>
        </div><!-- end of event panes -->
      </div> <!-- end of section -->
    </div> <!-- end of container -->
  <script type="text/javascript" src="../scripts/note_validation.js"></script>

<?php include_once('private/shared_footer.php'); ?>