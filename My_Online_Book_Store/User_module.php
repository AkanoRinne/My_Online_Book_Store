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
	<!-- Bootstrap Modal Button for user login -->
	<div id="Top">
		<nav>
			<ul class="TopSide">
				<li class="topInfo"><button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal">User</button></li>
			</ul>
		</nav>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal" which link with User Button -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<!-- Close modal Button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- User Login Form -->
				<div class="modal-body">
					<h4 class="header_mid">User Login</h4>
					<form action="user_login.php" method="POST" id="LoginAct" enctype="multipart/form-data">
						<div class="form-group">
							<label> Username: </label>
							<input type="text" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label> Password: </label>
							<input type="password" name="pass" class="form-control" required>
						</div>
						
						<!-- Submit the input or go to register page-->
						<div class="modal-footer">
						<button type="submit"  class="btn btn-primary" form="LoginAct" data-dismiss="model" name="login">Login</button>
						</br></br></br><p> Do not have account?</p>
						<button type="button" class="btn btn-info close" data-toggle="modal" data-dismiss="modal" data-target="#myModal2">Click Here!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal2" which link with Click Here! Button -->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Close modal Button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- User Registration Form -->
				<div class="modal-body">
					<h4 class="header_mid">User Registration</h4>
					<form action="user_registration.php" method="POST" id="RegisterAct" enctype="multipart/form-data">
						<div class="form-group">
							<label> Username: </label>
							<input type="text" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label> Password: </label>
							<input type="password" name="pass" class="form-control" required>
						</div>
						
						<!-- Submit the input or go to login page-->
						<div class="modal-footer">
						<button type="submit"  class="btn btn-primary" form="RegisterAct" data-dismiss="model" name="register">Register</button>
						</br></br></br><p> Already have account?</p>
						<button type="button" class="btn btn-info close" data-toggle="modal" data-dismiss="modal" data-target="#myModal">Login Here!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>