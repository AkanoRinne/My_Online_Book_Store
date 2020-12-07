<?php

session_start();

//Identify the route to connect database
$DBhost = "localhost";
$DBusername = "root";
$DBpw = '';

$DBname = 'my_online_book_store';

//Create connection
$conn = new mysqli($DBhost, $DBusername, $DBpw, $DBname);

//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//This code will function if remove button is clicked and the input is set
//The foreach loop works only on arrays, and is used to loop through each key/value pair in an array.
//The Mysql DELETE query will delete the shoppingcart id
if(isset($_POST['remove'])){
	if(isset($_POST['id'])){
		foreach($_POST['id'] as $id){
			$query="DELETE FROM shoppingcart WHERE SCID ='$id'";
			mysqli_query($conn, $query);
			if(mysqli_query($conn, $query) === TRUE){
				echo "<script>
				alert('Removed Successfully!');
				window.location.href='shopping_cart.php';
				</script>";
				} else {
				echo "Error deleting record: " . $conn->error;
				}
		}
	}
}

?>