<?php
	session_start();

	//Identify the route to connect database
	$DBhost = 'localhost';
	$DBusername = 'root';
	$DBpw = '';

	$DBname = 'my_online_book_store';
	$DBtable = 'account';

	//Connect to database
	$conn = new mysqli($DBhost, $DBusername, $DBpw, $DBname);

	//Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	
	//Set name/variable for the input and receive the information from the input in manage_acc.php
	//$_POST[] to get the content(text,date,etc) from input
	$UserType = $_POST['usertype'];
	$UserID = $_POST['userID'];
	$User = $_POST['username'];
	$Pass = $_POST['password'];

	//Set MySQL UPDATE query after the database successfully connected to update the data
	$query = "UPDATE $DBtable SET Username = '$User', Password = '$Pass' WHERE UID = '$UserID' && Datatype='$UserType'";

	//Call/Echo the query to function
	//Set/Call/Echo the alert statement to make sure/check whether the query is in function or not
	if ($conn->query($query) === TRUE) {
		echo "<script>
		alert('Successfully Updated!');
		window.location.href='manage_acc.php';
		</script>";
	} else {
		echo "Error editing record: " . $conn->error;
	}

	//close the database connection after everything is done
	$conn->close();
?>