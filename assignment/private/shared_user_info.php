
		<div id="user-info">
			<div id="user-info-pane">
				<img id="logged-avatar" width="200" class="img_widget" src="<?php echo isset($_SESSION['user_avatar']) ? $_SESSION['user_avatar'] : '../img/avatar_default.png' ?>"/>
				<br/>
				<a href="#">Edit profile</a>
			</div>
			<div id="uf-ID" class=" float-left">
				<h2><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ; ?></h2><br/>
				<span><?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '' ; ?></span>
			</div>
		</div><!-- end of user-info -->
