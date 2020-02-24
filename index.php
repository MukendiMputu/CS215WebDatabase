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
            <h1><a id="text_logo" href="index.html">Conference Room</a></h1>
          </div>
          <div id="h_side-nav">
            <ul id="side-nav">
              <li><a class="active" >Home</a></li>
              <li><a class="btn-primary " href="signup.html#main_pane">Sign up</a></li>
            </ul>
          </div>

          <!-- [ NAVIGATION LINKS (hidden by default) ] -->
          <div id="dropDownLinks">
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a class="" href="signup.html#main_pane">Sign up</a>
          </div>

          <!-- [ HAMBURGER ] -->
          <a id="hamburger" href="javascript:void(0);" class="icon">
            <i class="">&#9776;</i>
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
            <div id="room1" class="card">
              <div >
                <img alt="conference room bright" class="img-small" src="img/conference_bright.jpg"/>
                <a href="#">RIC 214</a>
              </div>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore
                magna aliquyam erat, sed diam voluptua.</p>
              <p><span class="danger">booked</span><span  class=""> (John Doe)</span><br /></p>
            </div>
            <div id="room2" class="card">
              <div >
                <img alt="conference room wood" class="img-small" src="img/conference_wood.jpg"/>
                <a href="#">RIC 315</a>
              </div>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore
                magna aliquyam erat, sed diam voluptua.</p>
                <p><span class="success">free</span><span  class="invisible">(John Doe)</span></p>
            </div>
            <div id="room3" class="card">
              <div>
                <img alt="conference room premium" class="img-small" src="img/conference_premium.jpg"/>>
                <a href="#">RIC 330</a>
              </div>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore
                magna aliquyam erat, sed diam voluptua.</p>
                <p><span class="warning">unavailable</span><span  class="invisible">(John Doe)</span></p>
            </div>
            <div id="search">
              <div class="search_flex">
                <label for="ip_search" class="search_label"> Room: </label>
                <select id="ip_search" name="rooms">
                  <option value=""> room # </option>
                  <option value="ric214">RIC 214</option>
                  <option value="ric315">RIC 315</option>
                  <option value="ric330">RIC 330</option>
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
          </div>
        </div>
      </div>

      <!-- [ LOGIN ] -->
      <div id="login_main">
        <div id="login" >
          <div id="err_mod" class="invisible modal-danger">
            <span class="label_required danger">Email or password has wrong format!</span>
          </div>
          <form class="form-validate" method="post" action="welcome.html">
              <div class="">
                  <label for="loginUsername" class=""> Email Address</label>
                  <input name="loginUsername" id="loginUsername" type="email" placeholder="name@address.com" data-msg="Please enter your email" class="form-control"/>
              </div>
              <div class="">
                  <label for="loginPassword" class=""> Password</label>
                  <input name="loginPassword" id="loginPassword" placeholder="Enter your password" type="password" data-msg="Please enter your password" class="form-control"/>
              </div>
              <br /><br />
              <button type="submit" class="btn-primary medium btn-submit">
                Sign in</button>
              <p id="para_account" >
                or <a href="signup.html">create a new account</a>
              </p>
          </form>
        </div>
    </div>

    <!-- [ FOOTER ] -->
      <div id="footer">
        <div id="f_wrapper">
          <div id="f_map" class="f_box">
            <h3>Location</h3>
            <p>Lorem ipsum dolor sit amet<br />consetetur sadipscing elitr,<br />
              sed diam nonumy eirmod tempor <br />invidunt ut labore et dolore<br />
              magna aliquyam erat, sed diam voluptua.</p>
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
  <script type="text/javascript" src="scripts/signin_validation.js"></script>
  <script type="text/javascript" src="scripts/date_actualizator.js"></script>
  <script type="text/javascript" src="scripts/mobiles.js"></script>
  </body>
</html>
