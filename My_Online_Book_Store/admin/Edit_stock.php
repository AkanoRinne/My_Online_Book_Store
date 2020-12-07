<?php
	session_start();

	//Identify the route to connect database
	$DBhost = 'localhost';
	$DBusername = 'root';
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
	$bookID = $_POST['BookID'];
	$stock_num = $_POST['Stock2'];

	//Set MySQL UPDATE query after the database successfully connected to update the data
	$query = "UPDATE $DBtable SET `Stock_num`='$stock_num' WHERE BID = '$bookID'";
	
	//Call/Echo the query to function
	//Set/Call/Echo the alert statement to make sure/check whether the query is in function or not
	if($conn->query($query) === TRUE)
	{
		echo "<script type='text/javascript'> 
		alert('Edit Successfully'); 
		window.location.href='manage_book.php';
		</script>";
		
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Failed to Edit, Got Error'); 
		window.location.href='manage_book.php';
		</script>";
	}
	
	//close the database connection after everything is done
	$conn->close();
?>