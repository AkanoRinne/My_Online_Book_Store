<?php
session_start();

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'profile';

$con = mysqli_connect($DBhost, $DBusername, $DBpw);
mysqli_select_db($con, $DBname);

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Link to the style.css, bootstrap jquary/ajax, bootstrap javascript and bootstrap css. -->
	<title>Product Detail</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style_43.css">
</head>

<body>
	<div class="detail_box2">
		<div class="container">
			<div class="row">
					<table class='table-bordered'>
					
					<!-- Display the user profile -->	
					<?php
					$username = $_SESSION['username'];
				
					$sql = "SELECT * FROM profile INNER JOIN account ON profile.UID = account.UID WHERE account.Username = '$username'";
					$result = $con-> query($sql);
					if ($result-> num_rows >0) {
					while ($row = $result-> fetch_assoc()) {
						echo "<div class='profile_detail'> First Name: ".$row['First_name']."</div></br>";
						echo "<div class='profile_detail'> Last Name: ".$row['Last_name']."</div></br>";
						echo "<div class='profile_detail'> The Date of Birthday: ".$row['Birth_date']."</div></br>";
						echo "<div class='profile_detail'> Mobile Number: ".$row['Mobile_num']."</div></br>";
						echo "<div class='profile_detail'> Email: ".$row['Email']."</div></br>";
						echo "<div class='profile_detail'> Gender: ".$row['Gender']."</div></br>";
						}
					}
					?>
					</table>
			</div>
		</div>
				<!-- Bootstrap Modal Button to update the profile -->
				<div class='totalprobtn'>
					<button type='button' class='btn btn-info profile_btn' data-toggle='modal' data-dismiss='modal' data-target='#myModal'>Update Here</button>
					<a href='index2.php' class='btn btn-info profile_btn'>Back to Home Page</a>
				</div>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal" which link to Update Here Button -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h4 class="header_mid">Update Profile</h4>
					<form action="Profile_edit.php" method="POST" id="Profile">
						<div class="form-group">
							<label> First Name: </label>
							<input type="text" name="firstname" class="form-control" required>
						</div>
						<div class="form-group">
							<label> Last Name: </label>
							<input type="text" name="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label> The Date of Birthday: </label>
							<input type="date" name="birthday" class="form-control" required>
						</div>
						<div class="form-group">
							<label> Mobile Number: </label>
							<input type="tel" name="mobile" class="form-control" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
						</div>
						<div class="form-group">
							<label> Email: </label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label> Gender: </label>
								<input type="radio" id="male" name="gender" value="male">
								<label for="male">Male</label>
								<input type="radio" id="female" name="gender" value="female">
								<label for="female">Female</label>
						</div>
						
						<div class="modal-footer">
						<button type="submit"  class="btn btn-primary" form="Profile" data-dismiss="model" name="update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>