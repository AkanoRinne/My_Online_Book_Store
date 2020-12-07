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
	//The file_get_contents() reads a file into a string.
	//$_FILES[] to get the content(image) from file, and $_POST[] to get the content(text,date,etc) from input
	$bookname = addslashes($_POST['bookname']);
	$image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
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
	
	//Set MySQL INSERT query after the database successfully connected to insert the new data
	$query = "INSERT INTO $DBtable (`BID`, `Image`, `Book_name`, `Book_author`, `Category_name`,`Book_publisher`, 
			`Book_date`, `Book_ISBN`, `Book_price`, `Stock_num`, `Book_description`) VALUES (NULL, '$image', '$bookname', 
			'$author', '$category', '$publisher', '$bookdate', '$ISBN', '$price', '$stock_num', '$description')";
	
	
	//Call/Echo the query to function
	//Set/Call/Echo the alert statement to make sure/check whether the query is in function or not
	if($conn->query($query) === TRUE)
	{ 
		echo "<script type='text/javascript'> 
		alert('Added Successfully'); 
		window.location.href='manage_book.php';
		</script>";
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Failed to Add, Got Error'); 
		window.location.href='manage_book.php';
		</script>";
	}
	
	//close the database connection after everything is done
	$conn->close();
?>