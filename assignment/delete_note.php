<?php require_once('private/initialize.php'); ?>

<?php require_login();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deleted = delete_note($_POST['nid']);
    if($deleted) {
      redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/welcome.php?id=' .$_GET['uid']);
    }
  }else if(isset($_GET['nid'])) {
  	$nid = $_GET['nid'];
  	$note = find_note_by_nid($nid);
  }

?>
<?php $page_title = "Delete Note" ?>

<?php include_once('private/shared_header.php') ?>
<?php include_once('private/shared_user_info.php') ?>

      <div id="section">
        <div id="main_pane">
			<?php
                $booking = find_booking_by_bid($note['booking_ref']);
                $room = find_room_by_rid($booking['room_id']);
			?>
            <div id="mp_titel">
          <h3>Are you sure you want to delete this Note?</h3>
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
                      <form class="form-validate" method="post" action="<?php echo 'delete_note.php?nid='.$note['nid']; ?>">
                          <input type="text" id="noteID" name="nid" value="<?php echo $note['nid']; ?>" hidden />
                          <label for="dptText" class="">Note:</label><br />
                          <textarea id="dptText" name="descriptText" required rows="5" cols="50" maxlength="500" readonly><?php echo $note['content']; ?></textarea>
                          <p class="text-right"><a href="<?php echo 'welcome.php?id=' . $_SESSION['user_id']; ?>">cancel</a> | <button type="submit" class="btn-success medium">Yes</button></p>
                      </form>
                    </div>
                </div>
            </div>
        </div><!-- end of event panes -->
      </div> <!-- end of section -->
    </div> <!-- end of container -->

<?php include_once('private/shared_footer.php'); ?>