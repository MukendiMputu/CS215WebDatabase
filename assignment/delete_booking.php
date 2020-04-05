<?php require_once('private/initialize.php'); ?>

<?php require_login();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updated = delete_booking($_POST['bid']);
    if($updated) {
      redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/welcome.php?id=' .$_GET['uid']);
    }
  }else if(isset($_GET['id'])) {
  	$bid = $_GET['id'];
  	$booking = find_booking_by_bid($bid);
  }

?>
<?php $page_title = "Delete booking" ?>
<?php include_once('private/shared_header.php'); ?>
<?php include_once('private/shared_user_info.php') ?>

    <div id="section">
      <div id="main_pane">
        <?php $room = find_room_by_rid($booking['room_id']);
        ?>
        <div id="mp_titel">
          <h3>Are you sure you want to delete this booking?</h3>
        </div>
        <div id="overvPanel" class="optionItem" >
          <div class="card-fixed booking-thumbnail">
            <img alt="<?php echo 'Picture of conference room ' . $room['number'] ; ?>" class="img-small" src="<?php echo '..' . $room['picture']; ?>">

          </div>
          <div class="booking-form">
            <div id="succ_mod" class="invisible modal-succes">
              <p class="label_required success text-center">Deleted!</p>
            </div>
            <div id="err_mod" class="invisible modal-danger">
              <ul class="error_list label_required danger"></ul>
            </div>
            <form class="form-validate" method="POST" action="<?php echo 'http://www2.cs.uregina.ca/~mmx458/assignment/delete_booking.php?id='.$booking['bid'].'&uid='.$booking['user_id']; ?>">
              <input type="text" id="bookingID" name="bid" value="<?php echo $booking['bid']; ?>" hidden>
              <label for="reserv-date" class=""> Date: </label>
              <input type="date" id="r_date" name="reserv-date" value="<?php echo $booking['date']; ?>" min="2018-01-01" max="2040-12-31" class="form-date" readonly><br><br>
              <label for="reserv-start" class=""> Time from: </label><input type="time" id="start" name="reserv-start" value="<?php echo $booking['start_time']; ?>" min="06:00" max="21:00" class="form-date" readonly>
              <label for="reserv-end" class=""> to: </label><input type="time" id="end" name="reserv-end" value="<?php echo $booking['end_time']; ?>" min="06:00" max="21:00" class="form-date" readonly>
              <br><br>
              <label for="descriptText" class="">Description: </label><br>
              <textarea id="dptText" name="descriptText" required="on" rows="1" cols="38" maxlength="50" readonly><?php echo $booking['purpose']; ?></textarea>
              <br>
              <p class="text-right"><a href="<?php echo 'booking.php?id=' . $booking['user_id']; ?>">cancel</a> | <button type="submit" class="btn-success medium">Yes</button></p>
            </form>
          </div>
        </div>
      </div><!-- end of main panes -->
    </div> <!-- end of section -->
  </div> <!-- end of container -->

<?php include_once('private/shared_footer.php'); ?>
