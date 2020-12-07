<?php
	session_start();

	//Connecting database
	$DBhost = 'localhost';
	$DBusername = 'root';
	$DBpw = '';

	$DBname = 'my_online_book_store';
	$DBtable = 'account';

	//connect to database
	$conn = new mysqli($DBhost, $DBusername, $DBpw, $DBname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$name = $_POST['username'];
	$pw = $_POST['pass'];

	//After database succcessfully connected, insert all data into the database table. 
	$query = "INSERT into $DBtable(UID, Username, Password, Datatype) values (NULL, '$name', '$pw', 'user')";
	
	//connect to database and insert the data after that redirect to the index page
	if ($conn->query($query) === TRUE) {
		$sql = "SELECT * FROM $DBtable WHERE Username = '$name' && Password = '$pw' && Datatype = 'user'";
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
							window.location.href='index.php';
							</script>";
						}
					}
				}
			}
		}
	} else {
		echo "Error: " . $query . "<br>" . $conn->error;
	}
	
//close the database connection after everything is done
$conn->close();
?>