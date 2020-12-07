<?php

session_start();

//Identify the route to connect database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';

//Connect to database
$con = mysqli_connect($DBhost, $DBusername, $DBpw);
mysqli_select_db($con, $DBname);

//This code will function if add to wishlist button is clicked
if(isset($_POST['Wishlist']))
{
	//Set variable for input to store the input
	$bookname = $_POST['book_name'];
	$username = $_SESSION['username'];
	$price = $_POST['book_price'];
	$stock = $_POST['book_stock'];

	//Set MySQL SELECT query after the database successfully connected to select the data
	//The INNER JOIN keyword selects records that have matching values in both tables.
	$sql = "SELECT * FROM wishlist 
	INNER JOIN account ON wishlist.UID = account.UID 
	WHERE account.Username = '$username'";
	
	//Connect the query with the database
	$result = $con-> query($sql);
	
	//Call the query and insert the input into a entity
	//Set/Call/Echo the alert statement to make sure/check whether the query is in function or not
	if ($result-> num_rows >0) {
		while ($row = $result-> fetch_assoc()) {
			$realuser = $row['UID'];
			$sql_insert = "INSERT Into wishlist(WID, UID, Product_name, Product_price, Item_num)
			values (NULL,'$realuser','$bookname','$price','$stock')";
			
			if ($con->query($sql_insert) === TRUE) {
			echo "<script>
			alert('Add to Wishlish successfully');
			window.location.href='wishlist.php';
			</script>";
			} else {
			echo "Error: " . $sql_insert . "<br>" . $con->error;
			}
			break;
		}
	}
	$con-> close();
}

//This code will function if add to cart button is clicked
if(isset($_POST['Cart']))
{
	//Set variable for input to store the input
	$bookname = $_POST['book_name'];
	$username = $_SESSION['username'];
	$price = $_POST['book_price'];
	$stock = $_POST['book_stock'];
	$quantity = $_POST['quantity'];
	
	//Set MySQL SELECT query after the database successfully connected to select the data
	//The INNER JOIN keyword selects records that have matching values in both tables.
	$sql = "SELECT account.UID, shoppingcart.UID FROM shoppingcart 
	INNER JOIN account ON shoppingcart.UID = account.UID 
	WHERE account.Username = '$username'";
	
	//Connect the query with the database
	$result = $con-> query($sql);
	
	//set variable for array
	$realuser[] = array();
	
	//Call the query and insert the input into a entity
	//Set/Call/Echo the alert statement to make sure/check whether the query is in function or not
	if ($result-> num_rows >0) {
		while ($row = $result-> fetch_assoc()) {
			$realuser = $row['UID'];
			$sql_insert = "INSERT Into shoppingcart(SCID, UID, Product_name, Product_price, Item_num, Quantity)
			values (NULL,'$realuser','$bookname','$price','$stock', '$quantity')";
			
			if ($con->query($sql_insert) === TRUE) {
			echo "<script>
			alert('Add to Cart successfully');
			window.location.href='shopping_cart.php';
			</script>";
			} else {
			echo "Error: " . $sql_insert . "<br>" . $con->error;
			}
			break;
		}
	}
	$con-> close();
}

$con-> close();
?>