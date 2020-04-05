<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Conference Room | <?php echo isset($page_title) ? $page_title : ''; ?> </title>
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
            <li><a href="welcome.php?id= <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>" class="active">Dashboard</a></li>
						<li><a href="signout.php">Sign out</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- end of header -->