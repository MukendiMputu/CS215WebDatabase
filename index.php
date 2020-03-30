<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    ini_set('track_errors', '1');
    error_reporting(E_ALL & ~E_WARNING );
?>

<?//php echo phpinfo(); require_once('private/initialize.php'); ?>

<?php

	define("ASSIGNMT_FOLDER", dirname(__FILE__));
	define("PUBLIC_HTML", dirname(ASSIGNMT_FOLDER));
	define("WWW_ROOT", "http://www2.cs.uregina.ca/~mmx458/assignment");

   	define("DB_SERVER", "localhost");
   	define("DB_USER", "mmx458");
   	define("DB_PASS", "r!Wy0Za7");
   	define("DB_NAME", "mmx458");

   	$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

   	if(mysqli_connect_errno()) {
      		$msg = "Database connection failed: ";
      		$msg .= mysqli_connect_error();
      		$msg .= " (" . mysqli_connect_errno() . ")";
      		exit($msg);
   	}

    $sql  = "SELECT * FROM Rooms ";
    $sql .= "ORDER BY number ASC";
    $result = mysqli_query($db, $sql);
    $numb_rows = mysqli_num_rows($result);
    $rooms = array();
    for ($i=1; $i <= $numb_rows; $i++) {
      // Fetch every single room as array
      $rooms[] = mysqli_fetch_assoc($result);
    }
?>
<?php
	$authenticated = true;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user_input_email = $_POST['loginEmail'];
		$user_input_password = $_POST['loginPassword'];

		// Find user in DB by email
		$query = sprintf("SELECT uid, email, hashed_password FROM Users WHERE email = '%s' LIMIT 1",
					mysqli_real_escape_string($db, $user_input_email));
		$result = mysqli_query($db, $query);

		if (mysqli_num_rows($result) == 0) {
			$authenticated = false;
		} else {
			$db_array = mysqli_fetch_assoc($result);

			if (strcmp($db_array['hashed_password'], crypt($user_input_password, '$2a$10$AIXoSU3VD3Wn27yl3M$')) == 0) {
				$user_id = $db_array['uid'];
				echo "Redirecting...";
				header("Location: " . 'http://www2.cs.uregina.ca/~mmx458/assignment/welcome.php?id=' . $user_id);
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
    <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
    <link rel="stylesheet" media="screen and (max-width: 414px)" href="styles/mobiles.css"/>
  </head>
  <body>

    <!-- [ PAGE CONTAINER ] -->
    <div id="grid">

      <!-- [ HEADER ] -->
      <div id="header">
        <div id="h_navBar">
          <div id="logo" class="float-left">
            <h1><a id="text_logo" href="main.php" >Conference Room</a></h1>
          </div>
          <div id="h_side-nav">
            <ul id="side-nav">
              <li><a class="active" >Home</a></li>
              <li><a class="btn-primary " href="signup.php#main_pane">Sign up</a></li>
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
            <h2>Bookings</h2>
          </div>
          <div id="date_picker" class="text-center">
            <a id="dp_left" href="javascript:void(0)"><span>&langle;</span></a>
            <span id="dp_date"><span id="day"></span> <span id="month">Jan</span>. <span id="date">20</span><sup id="ordinal">th</sup> <span id="year">2020</span></span>
            <a id="dp_right" href="javascript:void(0)"><span>&rangle;</span></a>
          </div>
          <div id="swiper">
	    <div class="search">
            <?php foreach ($rooms as $room) { ?>

              <div class="card room">
                <div >
                  <img alt="conference room bright" class="img-small" src="<?php echo $room['picture'];  ?>"/>
                  <a href="#"><?php echo $room['number']; ?></a>
                </div>
                <p class="room_description"><?php echo $room['description']; ?></p>
                <p><span class="danger">booked</span><span  class=""> (John Doe)</span><br /></p>
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
                <input type="date" id="booking_date" name="reserv-start" value="2018-07-22" min="1999-01-01" max="2999-12-31" class="form-date"/>
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
        <pre><?php echo print_r($rooms);?></pre>
	       <table cellpadding="5" cellspacing="0">
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
                  $rooms = mysqli_query($db, $sql);
                  while ($room = mysqli_fetch_assoc($rooms)) {
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


   <!-- [ LOGIN ] -->
      <div id="login_main">
        <div id="login" >
          <div id="err_mod" class="<?php echo $authenticated ? ' invisible ' : ' visible '; ?> modal-danger">
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
      <?php if(isset($db)) {
          mysqli_close($db);
        }
      ?>
    </div>
    <script src="scripts/signin_validation.js"></script>
    <script src="scripts/date_actualizator.js"></script>
    <script src="scripts/mobiles.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2oNtRhnfGNgG_yQUNmBNa1kXJnNkzzp4&callback=myMap"></script>
  </body>
</html>
