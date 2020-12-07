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
	//The addslashes() function returns a string with backslashes in front of predefined characters
	//$_POST[] to get the content(text,date,etc) from input
	$bookID = $_POST['BookID'];
	$bookname = addslashes($_POST['book_name']);
	$author = addslashes($_POST['author']);
	$category = addslashes($_POST['category']);
	$publisher = addslashes($_POST['publisher']);
	$bookdate = $_POST['published_date'];
	$ISBN = $_POST['ISBN'];
	$price = $_POST['price'];
	$stock_num = $_POST['stock'];
	$description = addslashes($_POST['description']);
	
	//The trim() function removes whitespace and other predefined characters from both sides of a string.
	if(isset($description)) {
		trim('$description','\n');
		trim('$description',' ');
		trim('$description','-');
		trim('$description','\0');
		trim('$description','\x0B');
		trim('$description','\r');
		trim('$description','\t');
		trim('$description','');
		trim('$description','_');	
		trim('$description','"');
	}
	
	//Set MySQL UPDATE query after the database successfully connected to update the data
	$query = "UPDATE $DBtable SET `Book_name`='$bookname',`Book_author`='$author',
	`Category_name`='$category',`Book_publisher`='$publisher',`Book_date`='$bookdate',`Book_ISBN`='$ISBN',
	`Book_price`='$price',`Stock_num`='$stock_num',`Book_description`='$description' WHERE BID = '$bookID'";
	
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