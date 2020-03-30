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
              <li><a href="index.php" >Home</a></li>
              <li><a class="active">Sign in</a></li>
              <li><a href="signup.php">Sign up</a></li>
            </ul>
          </div>
        </div>
      </div> <!-- end of header -->
      <div id="banner"></div><!-- end of banner -->
      <div id="section">
        <div id="main_pane">
          <div id="mp_titel" class="text-center"><h3>LOGIN</h3></div>
            <div class="panes">
                <div id="" class="">
                    <form class="form-validate" method="POST" action="welcome.php">
                        <div class="labeledInput">
                            <label for="loginUsername" class="form-label"> Email Address</label>
                            <input name="loginUsername" id="loginUsername" type="email" placeholder="name@address.com" required="" data-msg="Please enter your email" class="form-input">
                        </div>
                        <div  class="labeledInput">
                            <label for="loginPassword" class="form-label"> Password</label>
                            <input name="loginPassword" id="loginPassword" placeholder="Enter your password" type="password" required="" data-msg="Please enter your password" class="form-input">
                        </div><br>
                        <div class="text-center">
                          <button type="submit" class="btn-primary medium">Sign in</button><hr>
                          <p class="">or <a href="signup.php">create a new account</a></p>
                        </div>
                    </form>
                </div>
            </div><!-- end of event pane -->
        </div> <!-- end of main pane -->
      </div>
    </div><!-- end of container -->
  <script type="text/javascript" src="../scripts/signin_validation.js"></script>
  </body>
</html>

