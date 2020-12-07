<?php

session_start();

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'account';

$con = mysqli_connect($DBhost, $DBusername, $DBpw);
$db = mysqli_select_db($con, $DBname);

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Link to the style.css, bootstrap jquary/ajax, bootstrap javascript and bootstrap css. -->
	<title>Manage Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style2_5.css">
</head>

<body>
	<div class="main-text_2">
		<h2> <img src="product_logo.png" alt="My Online Book Store" width="50" height="50"> My Online Book Store </h2>
		<h3> Manage Account </h3>
	</div>
	
	<!-- Search Box -->
	<form id="form1" method="POST" enctype="multipart/form-data">
		<div class="check">
			<input type="text" name="valuetoSearch" placeholder="Search">
			<input type="submit" name="search" class="searchbox" value="Find"> 
		</div>
		
	<!-- Display Data from an entity in database -->
	<!-- If search box is set, the data displayed will change according to the input -->
	<div class="table-box">
		<div class="container">
			<div class="row">
				<table class="col-xs-4">
					<tr>
						<th class="col">Account ID</th>
						<th class="col">Username</th>
						<th class="col">Password</th>
						<th class="col">User Type</th>
					</tr>
			
		<?php
		$sql = "SELECT * FROM $DBtable";
		$result = $con-> query($sql);
		
		if(isset($_POST['search']))
			{
				$valuetoSearch = $_POST['valuetoSearch'];
				$query = "SELECT * FROM `account` WHERE CONCAT(`UID`, `Username`, `Password`, `Datatype`) LIKE '%".$valuetoSearch."%'";
				$result = $con-> query($query);
			}
			
		if ($result-> num_rows>0) {
			while ($row = $result-> fetch_assoc()) {
				echo "<tr><td>".
				$row["UID"]."</td><td>".
				$row["Username"]."</td><td>".
				$row["Password"]."</td><td>".
				$row["Datatype"]."</td><td>";
			}
			echo "</table></div></div></div></form>";
		}
		else {
			 echo "0 result";
		}
		?>

	<!-- Bootstrap Modal Button to add/edit/delete user and link button to back to previous page-->
	<div class="action_list">
		<div class="container">
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Delete User</button>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Edit User</button>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New User</button>
			<a href="admin_manage.php" class="btn btn-info btn-lg">Back to Previous Page</a>
		</div>
	</div>

	<!-- Content of Bootstrap Modal "myModal" which link to Add New User Button -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<!-- Close modal Button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Add Account Form -->
				<div class="modal-body">
					<h4 class="header_mid">Add New User</h4>
					<form action="add_new_user.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label><b>User Type:</b></label>
							<?php
								$query = "SELECT * FROM $DBtable";
								if($result = mysqli_query($con, $query)) {
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_array($result)){
											$dbselected = $row['Datatype'];
										}
									}
								}
								
								$options = array('admin','user');
								echo "<select class='form-control' id='usertype' name='usertype'>";
								echo "<option disabled selected value=''>Select User Type</option>";
								foreach($options as $option) {
									if($dbselected == $option) {
										echo "<option value='$option'>$option</option>";
									}
									else {
										echo "<option value='$option'>$option</option>";
									}
								}
								echo "</select>";
							?>
						</div>
						<div class="form-group">
							<label> Username: </label>
							<input type="text" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label> Password: </label>
							<input type="password" name="pass" class="form-control" required>
						</div>
						
						<!-- Submit the input -->
						<div class="modal-footer">
						<button type="submit"  class="btn btn-primary" data-dismiss="model" name="add">Add New User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal2" which link to Edit User Button -->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<!-- Close modal button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Edit Account Form -->
				<div class="modal-body">
					<h4 class="header_mid">Edit User</h4>
					<form action="edit_user.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label><b>Select User Type:</b></label>
								<?php
								$query = "SELECT * FROM $DBtable";
								if($result = mysqli_query($con, $query)) {
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_array($result)){
											$dbselected = $row['Datatype'];
										}
									}
								}
								
								$options = array('admin','user');
								echo "<select class='form-control' id='usertype' name='usertype'>";
								echo "<option disabled selected value=''>Select User Type</option>";
								foreach($options as $option) {
									if($dbselected == $option) {
										
										echo "<option value='$option'>$option</option>";
									}
									else {
										echo "<option value='$option'>$option</option>";
									}
								}
								echo "</select>";
								?>
						</div>
						<div class="form-group">
							<label><b>Select User ID</b></label>
							<input type="number" name="userID" class="form-control" required></br>
							<h4>Please Enter the new Username and Password:</h4>
							<label><b>Username: </b></label>
							<input type="text" name="username" class="form-control" required>
					
							<label><b>Password: </b></label>
							<input type="text" name="password" class="form-control" required>
						</div>
						
						<!-- Submit the input -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" data-dismiss="model" name="edit"> Edit </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal3" which link to Delete User Button -->
	<div id="myModal3" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Close modal button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Delete Account Form -->
				<div class="modal-body">
					<h4 class="header_mid">Delete User</h4>
					<form action="delete_user.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label><b>Select User Type:</b></label>
								<?php
								$query = "SELECT * FROM $DBtable";
								if($result = mysqli_query($con, $query)) {
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_array($result)){
											$dbselected = $row['Datatype'];
										}
									}
								}
								
								$options = array('admin','user');
								echo "<select class='form-control' id='usertype' name='usertype'>";
								echo "<option disabled selected value=''>Select User Type</option>";
								foreach($options as $option) {
									if($dbselected == $option) {
										
										echo "<option value='$option'>$option</option>";
									}
									else {
										echo "<option value='$option'>$option</option>";
									}
								}
								echo "</select>";
								?>
						</div>
						<div class="form-group">
							<label><b>Select User ID</b></label>
							<input type="number" name="userID" class="form-control" required>
						</div>
						
						<!-- Submit the input -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" data-dismiss="model" name="delete"> Delete </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>