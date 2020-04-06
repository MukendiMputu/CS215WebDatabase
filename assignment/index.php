<?php require_once('private/initialize.php'); //echo phpinfo(); ?>

<?php
    $bookings = find_all_bookings();
    $rooms = find_all_rooms();
?>
<?php
	$authenticated = true;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user_input_email = $_POST['loginEmail'];
		$user_input_password = $_POST['loginPassword'];

		// Find user in DB by email
		$user = find_user_by_email($user_input_email);

		if (count($user) == 0) {
			$authenticated = false;
		} else {
			if (strcmp($user['hashed_password'], crypt($user_input_password, '$2a$10$AIXoSu3VD3Wn27yl3M$')) == 0) {
				log_in_user($user);
				redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/welcome.php?id=' . $user['uid']);
			} else {
				$authenticated = false;
			}
		}
    }

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Conference Room | Home </title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css"/>
    <link rel="stylesheet" media="screen and (max-width: 414px)" href="../styles/mobiles.css"/>
  </head>
  <body>

    <!-- [ PAGE CONTAINER ] -->
    <div id="grid">

      <!-- [ HEADER ] -->
      <div id="header">
        <div id="h_navBar">
          <div id="logo" class="float-left">
            <h1><a id="text_logo" href="index.php" >Conference Room</a></h1>
          </div>
          <div id="h_side-nav">
            <ul id="side-nav">
              <li><a class="active" >Home</a></li>
              <?php
               echo isset($_SESSION['user_id']) ? '<li><a href="welcome.php?id='.$_SESSION['user_id']. '">Dashboard</a></li>' : '<li><a class="btn-primary " href="signup.php#main_pane">Sign up</a></li>';
              ?>
            </ul>
          </div>

          <!-- [ NAVIGATION LINKS (hidden by default) ] -->
          <div id="dropDownLinks">
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a class="" href="signup.php#main_pane">Sign up</a>
          </div>

          <!-- [ HAMBURGER ] -->
          <a id="hamburger" href="javascript:void(0);" class="icon">
             <i > &#9776; </i>
          </a>
        </div>
      </div>

      <!-- [ BANNER ] -->
      <div id="banner"></div>

<!-- [ MAIN CONTENT ] -->
      <div id="section">
        <div id="main_pane">
          <div id="mp_titel" class="text-center">
            <h2>Availabilities</h2>
          </div>
          <div id="date_picker" class="text-center">
            <span id="dp_date">
              <span id="day"></span> <span id="month">Jan</span>. <span id="date">20</span><sup id="ordinal">th</sup> <span id="year">2020</span>
            </span>
          </div>
          <div id="swiper">
	    <div id="booking_panorama" class="search">
            <?php foreach ($bookings as $booking) {
              $room = find_room_by_rid($booking['room_id']);
              $user = find_user_by_uid($booking['user_id']);
            ?>
              <div class="card room">
                <div >
                  <img alt="conference room bright" class="img-small" src="<?php echo '..' . $room['picture'];  ?>"/>
                  <a href="#"><?php echo $room['number']; ?></a>
                </div>
                <p class="room_description"><?php echo $room['description']; ?></p>
                <p class="booking_details">
                <h4><?php echo $booking['purpose']; ?></h4>
								<span>Date: <?php echo date('d M Y',strtotime($booking['date'])) ; ?> </span><br/>
								<span>Time: <?php echo date('H:i a',strtotime($booking['start_time'])) ; ?> - <?php echo date('H:i a',strtotime($booking['end_time'])) ; ?> </span>
                </p>
                <p><span  class=""> (<?php echo $user['uname'] ?>)</span><br /></p>
              </div>
            <?php } ?>
	    </div>
            <div class="search">
              <div class="search_flex">
                <label for="ip_search" class="search_label"> Room: </label>
                <select id="ip_search" name="rooms">
                  <option value=""> room # </option>
                  <?php     foreach($rooms as $room){
                  ?>
                  <option value="<?php echo $room['rid']; ?>"><?php echo $room['number'];?></option>
                  <?php }
                  ?>
                </select>
              </div>
              <div class="search_flex">
                <label for="booking_date" class="search_label"> Date: </label>
                <input type="date" id="booking_date" name="reserv-start" value="<?php echo date("Y-m-d"); ?>" min="1999-01-01" max="2999-12-31" class="form-date"/>
              </div>
              <div class="search_flex">
                <label for="booking_date" class="search_label"> from: </label>
                <input type="time" id="start_time" name="time-start" value="06:00" min="06:00" max="22:00" step="1800" class="form-date"/>
              </div>
              <div class="search_flex">
                <label for="booking_date" class="search_label"> to: </label>
                <input type="time" id="end_time" name="time-end" value="22:00" min="06:00" max="22:00" step="1800" class="form-date"/>
              </div>
              <div>
                <input type="submit" value="&#x1F50D;" class="circled-button"/>
              </div>
            </div>
	    <div id="php_testPane">
		<?php echo date("H:i", strtotime("+1 hour")); ?>
        <pre><?php echo print_r($rooms);?></pre>
	       <table border="1" cellpadding="5" cellspacing="0">
            	  <tr>
                    <th>rid</th>
                    <th>Building</th>
                    <th>Number</th>
                    <th>Capacity</th>
                    <th>Configuration</th>
                    <th>Picture</th>
                    <th>Description</th>
            	  </tr>
              <?php
		$rooms = find_all_rooms();
		$ric214 = find_room_by_number('RIC 214');
		echo print_r($ric214);
		foreach($rooms as $room) {
	      ?>
                 <tr>
                   <td><?php echo $room['rid']; ?></td>
                   <td><?php echo $room['building']; ?></td>
                   <td><?php echo $room['number']; ?></td>
                   <td><?php echo $room['capacity']; ?></td>
                   <td><?php echo $room['configuration']; ?></td>
                   <td><?php echo $room['picture']; ?></td>
                   <td><?php echo $room['description']; ?></td>
            	  </tr>
            	<?php } ?>
        	</table>
	      <?php
                mysqli_free_result($rooms);
              ?>
            </div>
          </div>
        </div>
      </div>

<?php if(!isset($_SESSION['user_id'])) { ?>
   <!-- [ LOGIN ] -->
      <div id="login_main">
        <div id="login" >
          <div id="err_mod_main" class="<?php echo $authenticated ? ' invisible ' : ' visible '; ?> modal-danger">
            <span class="label_required danger">Email or password is wrong!</span>
          </div>
          <form class="form-validate" method="post" action="index.php">
                  <label for="loginEmail" class=""> Email Address</label>
                  <input name="loginEmail" id="loginEmail" type="email" placeholder="name@address.com" data-msg="Please enter your email" class="form-control"/>
                  <label for="loginPassword" class=""> Password</label>
                  <input name="loginPassword" id="loginPassword" placeholder="Enter your password" type="password" data-msg="Please enter your password" class="form-control"/>
              <button type="submit" class="btn-primary medium btn-submit">
                Sign in</button>
              <span id="para_account" >
                or <a href="signup.php">create a new account</a>
              </span>
          </form>
        </div>
    </div>
<?php } ?>
    <!-- [ FOOTER ] -->
      <div id="footer">
        <div id="f_wrapper">
          <div id="f_map" class="f_box">
            <h3>Location</h3><br/>
            <div id="googleMap"></div>
          </div>
          <div id="f_cont" class="f_box">
            <h3>Contact</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
              sed diam nonumy eirmod tempor invidunt ut labore et dolore
              magna aliquyam erat, sed diam voluptua.</p>
          </div>
          <div id="f_impr" class="f_box">
            <h3>Impresum</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
              sed diam nonumy eirmod tempor invidunt ut labore et dolore
              magna aliquyam erat, sed diam voluptua.</p>
          </div>
        </div>
      </div>
    </div>
    <?php if (!isset($_SESSION['user_id'])) { ?>
      <script src="../scripts/signin_validation.js"></script>
    <?php } ?>
      <script src="../scripts/mobiles.js"></script>
    <script src="../scripts/date_actualizator.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2oNtRhnfGNgG_yQUNmBNa1kXJnNkzzp4&callback=myMap"></script>

<?php include_once('private/shared_footer.php'); ?>
