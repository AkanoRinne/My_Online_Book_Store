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
	$options = $_POST['usertype'];
	$name = $_POST['username'];
	$pw = $_POST['pass'];

	//Set MySQL INSERT query after the database successfully connected to insert the new data
	$query = "INSERT into $DBtable(UID, Username, Password, Datatype) values (NULL, '$name', '$pw', '$options')";
	
	//Call/Echo the query to function
	//Set another three MySQL INSERT query inside in order to make the data able to INSERT new data into four different entity in the same time
	//Set/Call/Echo the alert statement to make sure the query is in function
	if ($conn->query($query) === TRUE) {
		$sql = "SELECT * FROM $DBtable WHERE Username = '$name' && Datatype = 'user'";
		$result = $conn->query($sql);
		if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				$newuser = $row['UID'];
				$sql_insert2 = "INSERT into wishlist(WID, UID, Product_name, Product_price, Item_num) Values (NULL, '$newuser', NULL, NULL, NULL)";
				
				if ($conn->query($sql_insert2) === TRUE) {
					$sql_insert3 = "INSERT into shoppingcart(SCID, UID, Product_name, Product_price, Item_num, Quantity) Values (NULL, '$newuser', NULL, NULL, NULL, NULL)";
					if ($conn->query($sql_insert3) === TRUE) {
						$sql_insert4 = "INSERT into profile (PID, UID, First_name, Last_name, Birth_date, Mobile_num, Email, Gender) Values (NULL, '$newuser', NULL, NULL, NULL, NULL, NULL, NULL)";
						if ($conn->query($sql_insert4) === TRUE) {
							echo "<script>
							alert('Added successfully');
							window.location.href='manage_acc.php';
							</script>";
						}
					}
				}
			}
		} else {
			$sql2 = "SELECT * FROM $DBtable WHERE Username = '$name' && Datatype = 'admin'";
			
			$result2 = $conn->query($sql2);
			
			if ($result2-> num_rows >0) {
				while ($row = $result2-> fetch_assoc()) {
				echo "<script>
					alert('Added successfully.');
					window.location.href='manage_acc.php';
					</script>";
				}
			}
		}
	} else {
		echo "Error: " . $query . "<br>" . $conn->error;
	}
	
	//close the database connection after everything is done
	$conn->close();
?>
