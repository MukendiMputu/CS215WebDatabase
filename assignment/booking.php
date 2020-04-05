<?php require_once('private/initialize.php'); ?>

<?php require_login();

  if(isset($_GET['id'])) {
  	$bid = $_GET['id'];
  	$booking = find_booking_by_bid($bid);
  }
 
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking = array();

    $booking['bid'] = $bid;
    $booking['purpose'] = $_POST['descriptText'];
    $booking['date'] = $_POST['reserv-date'];
    $booking['start_time'] = $_POST['reserv-start'];
    $booking['end_time'] = $_POST['reserv-end'];
	echo print_r($booking);
    $updated = update_booking($booking);
	echo "$updated = " . $updated;
    if($updated) {
      redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/welcome.php?id=' .$_GET['uid']);
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
          <h3>Edit booking for <span id="roomID"><?php echo $room['number']; ?></span></h3>
        </div>
        <div id="overvPanel" class="optionItem" >
          <div class="card-fixed booking-thumbnail">
            <img alt="<?php echo 'Picture of conference room ' . $room['number'] ; ?>" class="img-small" src="<?php echo '..' . $room['picture']; ?>">

          </div>
          <div class="booking-form">
            <div id="succ_mod" class="invisible modal-succes">
              <p class="label_required success text-center">Saved!</p>
            </div>
            <div id="err_mod" class="invisible modal-danger">
              <ul class="error_list label_required danger"></ul>
            </div>
            <form class="form-validate" method="POST" action="<?php echo 'http://www2.cs.uregina.ca/~mmx458/assignment/booking.php?id='.$bid.'&uid='.$booking['user_id']; ?>">
              <input type="text" id="rooID" value="<?php echo $room['number']; ?>" hidden>
              <label for="reserv-date" class=""> Date: </label>
              <input type="date" id="r_date" name="reserv-date" value="<?php echo $booking['date']; ?>" min="2018-01-01" max="2040-12-31" class="form-date"><br><br>
              <label for="reserv-start" class=""> Time from: </label><input type="time" id="start" name="reserv-start" value="<?php echo $booking['start_time']; ?>" min="06:00" max="21:00" class="form-date">
              <label for="reserv-end" class=""> to: </label><input type="time" id="end" name="reserv-end" value="<?php echo $booking['end_time']; ?>" min="06:00" max="21:00" class="form-date">
              <br><br>
              <label for="descriptText" class="">Description: </label><br>
              <textarea id="dptText" name="descriptText" required="on" rows="1" cols="38" maxlength="50"><?php echo $booking['purpose']; ?></textarea>
              <br><span id="charCount">(<span>0</span>/50 characters )</span>
              <p class="text-right"><a href="<?php echo 'welcome.php?id=' . $booking['user_id']; ?>">cancel</a> | <button type="submit" class="btn-success medium">save</button></p>
            </form>
          </div>
          <div><a href="delete_booking.php?id=<?php echo $booking['bid']; ?>">Delete this booking</a></div>
        </div>
      </div><!-- end of main panes -->
    </div> <!-- end of section -->
  </div> <!-- end of container -->
</body>
<script src="../scripts/booking_validation.js"></script>
</html>
