<?php

session_start();

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'book';

$con = mysqli_connect($DBhost, $DBusername, $DBpw);
$db = mysqli_select_db($con, $DBname);

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Link to the style.css, bootstrap jquary/ajax, bootstrap javascript and bootstrap css. -->
	<title>My Online Book Store</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style_43.css">
</head>

<body>
	<!-- User Navigation Bar -->
	<div id="Top">
		<div class="dropdown">
			<button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Welcome, <?php echo $_SESSION['username'];?></button>
			<div class="dropdown-menu menu_size" aria-labelledby="dropdownMenuButton">
				<a class="drop_menu btn-secondary btn-lg dropdown-item form-control" href="profile.php">Profile</a>
				<a class="drop_menu btn-secondary btn-lg dropdown-item form-control" href="wishlist.php">Wishlist</a>
				<a class="drop_menu btn-secondary btn-lg dropdown-item form-control" href="shopping_cart.php">Cart</a>
				<form method="post" action="User_module2.php">
					<button type="submit" name="logout" class="drop_menu btn-secondary btn-lg dropdown-item form-control">Logout</button>
				</form>
			</div>
		</div>
	</div>
	
	<!-- The code to destroy $_SESSION of the username that logged when logout in order to make the data in $_SESSION can be renew/updated -->
	<?php 
	if(isset($_POST['logout'])){
		$_SESSION = array();
		
		if(ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
		);
		}
		// Finally, destroy the session.
		echo "<script type='text/javascript'> 
		alert('Logout Successfully'); 
		window.location.href='index.php';
		</script>";
		session_destroy();
	}
	?>
</body>
</html>