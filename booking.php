<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Romm | Sign up </title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
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
              <li><a >Sign in</a></li>
              <li><a href="index.php">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div> <!-- end of header -->
      <div id="user-info">
          <div id="user-info-pane">
                <img id="logged-avatar" width="200" class="img_widget" src="img/avatar_default.png">
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
            <div id="mp_titel">
                <h3>Edit booking for <span id="roomID">RIC 330</span></h3>
            </div>
            <div id="overvPanel">
              <div  class="optionItem">
                <div class="card card-fixed">
                    <img alt="conference room bright" class="img-small" src="img/conference_bright.jpg">
                    <span>RIC 330</span>
                </div>
                <div id="booking-form">
                  <div id="succ_mod" class="invisible modal-succes">
                    <p class="label_required success text-center">Saved!</p>
                  </div>
                  <div id="err_mod" class="invisible modal-danger">
                    <ul class="error_list label_required danger">

                    </ul>
                  </div>
                  <form class="form-validate" method="POST" action="">
                    <input type="text" id="rooID" value="RIC330" hidden>
                    <label for="reserv-date" class=""> Date: </label>
                    <input type="date" id="r_date" name="reserv-date" value="2018-07-22" min="2018-01-01" max="2040-12-31" class="form-date"><br><br>
                    <label for="reserv-start" class=""> Time from: </label><input type="time" id="start" name="reserv-start" value="06:00" min="06:00" max="21:00" class="form-date">
                    <label for="reserv-end" class=""> to: </label><input type="time" id="end" name="reserv-end" value="12:00" min="06:00" max="21:00" class="form-date">
                    <br><br>
                    <label for="descriptText" class="">Description: </label><br>
                    <textarea id="dptText" name="descriptText" required="on" rows="4" cols="38" maxlength="50"></textarea>
                    <br><span id="charCount">(<span>0</span>/50 characters )</span>
                    <p class="text-right"><a href="welcome.php">cancel</a> | <button type="submit" class="btn-success medium">save</button></p>
                  </form>
                </div>
              </div>
            </div>
        </div><!-- end of main panes -->
      </div> <!-- end of section -->
    </div> <!-- end of container -->
  </body>
  <script src="../scripts/booking_validation.js"></script>
</html>

