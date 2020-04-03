<?php require_once('private/initialize.php'); ?>

<?php require_login();

	if(!isset($_GET['id'])) {
		$url_ending = !isset($_GET['uid']) ? '' : 'welcome.php?id=' . $_GET['uid'];
		redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/' . $url_ending);
	}
	$note = find_note_by_nid($_GET['id']);
	$user_id = $_GET['uid'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Conference Romm | Sign up </title>
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
              <li><a href="welcome.php" class="active">Dashboard</a></li>
              <li><a >Sign in</a></li>
              <li><a href="signout.php">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div> <!-- end of header -->
      <div id="user-info">
          <div id="user-info-pane">
                <img alt="thumbnail of the booked room" id="logged-avatar" width="200" class="img_widget" src="../img/avatar_default.png" />
                <br />
                <a href="#">Edit profile</a>
          </div>
          <div id="uf-ID" class=" float-left">
              <h2>Joe Pepperman</h2>
              <span>Nickname</span><br />
              <span>joe.pepperman@example.com</span>
          </div>
      </div><!-- end of user-info -->
      <div id="section">
        <div id="main_pane">
			<?php $room = find_room_by_rid($note['room_id']); 
			?>
            <div id="mp_titel">
                <h3>Edit note for <span id="roomID">RIC 330</span></h3>
            </div>
            <div id="overvPanel">
                <div  class="optionItem">
                    <div class="card card-fixed">
                        <img alt="conference room bright" class="img-small" src="../img/conference_bright.jpg" />
                        <span>RIC 330</span>
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
  </body>
</html>

