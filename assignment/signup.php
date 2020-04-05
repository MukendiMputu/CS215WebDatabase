<?php require_once('private/initialize.php'); ?>
<pre>
<?php
	$uploadOk = true;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        //  Handle form values sent by signup.php
        $user = array();
        $user['uname'] = $_POST['nickname'];
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['loginPassword'];

        $target_dir = "fileUploads/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $target_fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        		
        if(isset($_POST["submit"])) {
			echo "file type is: " . $target_fileType;
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = true;
                //move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
            } else {
                if(!($target_fileType == 'png' || $target_fileType == 'gif' || $target_fileType == 'jpg' || $target_fileType == 'jpeg')) {
					$uploadOk = false;
				}
            }
         }

        $user['avatarIMG'] = $target_file;
                              
        $hash_password = crypt($user['password'], '$2a$10$AIXoSu3VD3Wn27yl3M$');
                             
        $sql = "INSERT INTO Users (uname, email, hashed_password, avatar) ";
        $sql .= "VALUES (";
        $sql .= "'" .  mysqli_real_escape_string($db, $user['uname']) . "', ";
        $sql .= "'" .  mysqli_real_escape_string($db, $user['email']) . "', ";
        $sql .= "'" .  $hash_password . "', ";
        $sql .= "'" .  $user['avatarIMG'] . "' ";
        $sql .= ")";
                                                  
        $return = mysqli_query($db, $sql);
        
        $new_user_id = mysqli_insert_id($db);
        redirect_to('http://www2.cs.uregina.ca/~mmx458/assignment/signin.php');
                                                              
     }
?>
</pre>
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
              <li><a href="index.php" >Home</a></li>
              <li><a href="signin.php">Sign in</a></li>
            </ul>
          </div>
        </div>
      </div> <!-- end of header -->
      <div id="banner"></div><!-- end of banner -->
      <div id="section">
        <div id="main_pane">
          <div id="mp_titel" class="text-center"><h3>CREATE YOUR ACCOUNT</h3></div>
          <div id="swiper" class="">
		    <form name="signup_form" class="form-validate" method="post" action="http://www2.cs.uregina.ca/~mmx458/assignment/signup.php" enctype="multipart/form-data">
                  <div id="avatar_div" class="text-center">
                    <img id="avatar" class="img_widget" src="../img/avatar_default.png"><br/>
                    <label for="avatar_btn">Upload a profile picture:</label>
                    <input type="file" id="avatar_btn" name="avatar" accept="image/png, image/jpeg, image/jpg, image/gif" style="width:fit-content;">
                  </div>
                  <div id="succ_mod" class="invisible modal-succes">
                    <p class="label_required success text-center">All good!</p>
                  </div>
                  <div class="invisible modal-danger">
                    <span class="label_required danger">The following errors(s) occured:</span>
                    <ul class="error_list label_required danger">
                        <li></li>
                    </ul>
                  </div>                                                                      
                  <div class="labeledInput">
                      <label for="nickname" class="form-label"> Nickname</label><span class="label_required danger">&nbsp;*</span>
                      <input name="nickname" id="nickname" type="text" placeholder="Choose a new nickname" value="" class="form-input"/>
                  </div>
                  <div class="labeledInput">
                      <label for="email" class="form-label"> Email Address</label><span class="label_required danger">&nbsp;*</span>
                      <input name="email" id="email" type="email" placeholder="name@address.com" class="form-input" />
                  </div>
                  <div class="labeledInput">
                      <label for="loginPassword" class="form-label"> Password</label><span class="label_required danger">&nbsp;*</span>
                      <input name="loginPassword" id="loginPassword" placeholder="Enter a new password" type="password" class="form-input" />
                  </div>
                  <div class="labeledInput">
                      <label for="loginPassword2" class="form-label"> Confirm your password</label><span class="label_required danger">&nbsp;*</span>
                      <input name="loginPassword2" id="loginPassword2" placeholder="Cofirm your password" type="password" class="form-input" />
                  </div><span style="font-size: 8pt;color: #838383;">Field marked with <span class="label_required danger">&nbsp;*</span> are required</span>
                  <div class="text-center">
                    <br/>
                    <button type="submit" name="submit" class="btn-primary medium">Sign up</button><hr/>
                    <p class="">or <a href="signin.php">Sign in</a></p>
                  </div>
                  <br/>
                  <br/>
              </form>
            </div><!-- end of event pane -->
        </div> <!-- end of section -->
      </div> <!-- end of container -->
    </div>
  <script type="text/javascript" src="../scripts/form_validation.js"></script>

<?php include_once('private/shared_footer.php'); ?>