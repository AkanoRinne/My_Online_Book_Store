<?php
	session_start();
	
	//Identify the route to connect database
	$DBhost = "localhost";
	$DBusername = "root";
	$DBpw = '';

	$DBname = 'my_online_book_store';
	$DBtable = 'book';

	//Connect to database
	$conn = new mysqli($DBhost, $DBusername, $DBpw, $DBname);

	//Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Set name/variable for the input and receive the information from the input in manage_book.php
	//$_POST[] to get the content(text,date,etc) from input
	$BookID = $_POST['BookID'];

	//Set MySQL DELETE query after the database successfully connected to delete the data selected
	$query = "DELETE FROM $DBtable WHERE BID = '$BookID'";

	//Call/Echo the query to function
	//Set/Call/Echo the alert statement to make sure/check whether the query is in function or not
	if($conn->query($query) === TRUE)
	{
		echo "<script type='text/javascript'> 
		alert('Deleted Successfully'); 
		window.location.href='manage_book.php';
		</script>";
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Failed to Delete, Got Error'); 
		window.location.href='manage_book.php';
		</script>";
	}
	
	//close the database connection after everything is done
	$conn->close();
?>