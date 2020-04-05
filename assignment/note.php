<?php require_once('private/initialize.php'); ?>

<?php require_login();

	if(!isset($_GET['id'])) {
		$url_ending = !isset($_GET['uid']) ? '' : 'welcome.php?id=' . $_GET['uid'];
		redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/' . $url_ending);
	}
	$note = find_note_by_nid($_GET['id']);
	$user_id = $_GET['uid'];
?>


<?php $page_title = "Edit Note" ?>
<?php include_once('private/shared_header.php') ?>
<?php include_once('private/shared_user_info.php') ?>

      <div id="section">
        <div id="main_pane">
			<?php $room = find_room_by_rid($note['room_id']);
			?>
            <div id="mp_titel">
                <h3>Edit Note</h3>
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
                      <form class="form-validate" method="post" action="welcome.php">
                          <input type="text" id="bookingID" hidden />
                          <label for="dptText" class="">Note:</label><br />
                          <textarea id="dptText" name="descriptText" required rows="5" cols="50" maxlength="500"><?php echo $note['content']; ?></textarea>
                          <br /><span id="charCount">(<span>0</span>/500 characters )</span>
                          <p class="text-right"><a href="<?php echo 'welcome.php?id=' . $user_id; ?>">cancel</a> | <button type="submit" class="btn-success medium">save</button></p>
                      </form>
                    </div>
                </div>
            </div>
        </div><!-- end of event panes -->
      </div> <!-- end of section -->
    </div> <!-- end of container -->
  <script type="text/javascript" src="../scripts/note_validation.js"></script>

<?php include_once('private/shared_footer.php'); ?>
