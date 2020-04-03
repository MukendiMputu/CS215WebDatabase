<?php require_once('private/initialize.php'); ?>

<?php require_login();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking = array();

    $booking['room_id'] = $_POST['rooms'];
    $booking['purpose'] = $_POST['descriptText'];
    $booking['date'] = $_POST['reserv-date'];
    $booking['start_time'] = $_POST['reserv-start'];
    $booking['end_time'] = $_POST['reserv-end'];
    $booking['user_id'] = $_SESSION['user_id'];
    $inserted = insert_booking($booking);
    if($inserted) {
      redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/welcome.php?id=' .$_SESSION['user_id']);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conference Room | New Booking </title>
  <link rel="stylesheet" type="text/css" href="../styles/styles.css">
  <link rel="stylesheet" media="screen and (max-width: 480px)" href="../styles/mobiles.css">
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
            <li><a href="welcome.php" class="active">Dashboard</a></li>
            <li><a href="signout.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div> <!-- end of header -->
    <div id="user-info">
      <div id="user-info-pane">
        <img id="logged-avatar" width="200" class="img_widget" src="../img/avatar_default.png">
        <br>
        <a href="#">Edit profile</a>
      </div>
      <div id="uf-ID" class=" float-left">
        <h2>Joe Pepperman</h2>
        <span>Nickname</span><br>
        <span>joe.pepperman@example.com</span>
      </div>
    </div><!-- end of user-info -->
    <div id="section">
      <div id="main_pane">
        <?php $room = find_room_by_rid($booking['room_id']);
        ?>
        <div id="mp_titel">
          <h3>New Booking</span></h3>
        </div>
        <div id="overvPanel" class="optionItem" >
          <div class="card-fixed booking-thumbnail">
          </div>
          <div class="booking-form">
            <div id="succ_mod" class="invisible modal-succes">
              <p class="label_required success text-center">Saved!</p>
            </div>
            <div id="err_mod" class="invisible modal-danger">
              <ul class="error_list label_required danger"></ul>
            </div>
			<?php
    				$rooms = find_all_rooms();
			?>
            <form class="form-validate" method="POST" action="<?php echo 'http://www2.cs.uregina.ca/~mmx458/assignment/new_booking.php?id='.$new_bid.'&uid='.$_SESSION['user_id']; ?>">
              <label for="ip_search"> Room: </label>
                <select id="ip_search" name="rooms">
                  <option value=""> room # </option>
                  <?php     foreach($rooms as $room){
                  ?>
                  <option value="<?php echo $room['rid']; ?>"><?php echo $room['number'];?></option>
                  <?php }
                  ?>
                </select><br/><br/>
			<label for="reserv-date" class=""> Date: </label>
              <input type="date" id="r_date" name="reserv-date" value="<?php echo date("Y-m-d"); ?>" min="2018-01-01" max="2040-12-31" class="form-date"><br><br>
              <label for="reserv-start" class=""> Time from: </label><input type="time" id="start" name="reserv-start" value="<?php echo date("H:i"); ?>" min="06:00" max="21:00" class="form-date">
              <label for="reserv-end" class=""> to: </label><input type="time" id="end" name="reserv-end" value="<?php echo date("H:i", strtotime("+1 hour")); ?>" min="06:00" max="21:00" class="form-date">
              <br><br>
              <label for="descriptText" class="">Description: </label><br>
              <textarea id="dptText" name="descriptText" required="on" rows="1" cols="38" maxlength="50"></textarea>
              <br><span id="charCount">(<span>0</span>/50 characters )</span>
              <p class="text-right"><a href="<?php echo 'welcome.php?id=' . $_SESSION['user_id']; ?>">cancel</a> | <button type="submit" class="btn-success medium">save</button></p>
            </form>
          </div>
        </div>
      </div><!-- end of main panes -->
    </div> <!-- end of section -->
  </div> <!-- end of container -->
</body>
<script src="../scripts/booking_validation.js"></script>
</html>
