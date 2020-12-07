<?php
session_start();

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'profile';

//connect to database
$conn = new mysqli($DBhost, $DBusername, $DBpw, $DBname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
//Set name/variable for the input and receive the information from the input in manage_book.php
//The addslashes() function returns a string with backslashes in front of predefined characters
//$_POST[] to get the content(text,date,etc) from input, while $_SESSION[] is to get/call content that send by other php file by $_SESSION.
$username = $_SESSION['username'];
$firstname = addslashes($_POST['firstname']);
$lastname = addslashes($_POST['lastname']);
$birthdate = $_POST['birthday'];
$mobile = addslashes($_POST['mobile']);
$email = addslashes($_POST['email']);
$gender = $_POST['gender'];

//The trim() function removes whitespace and other predefined characters from both sides of a string.
if(isset($email)) {
		trim('$email','\n');
		trim('$email',' ');
		trim('$email','-');
		trim('$email','\0');
		trim('$email','\x0B');
		trim('$email','\r');
		trim('$email','\t');
		trim('$email','');
		trim('$email','_');	
		trim('$email','"');
	}

if(isset($mobile)) {
		trim('$email','-');
	}

//Set and Call MySQL SELECT query after the database successfully connected to select and compare the existing data
$sql = "SELECT * FROM profile INNER JOIN account ON profile.UID = account.UID WHERE account.Username = '$username'";
$result = $conn-> query($sql);

//List out the data that selected by query and update the entity
if ($result-> num_rows >0) {
	while ($row = $result-> fetch_assoc()) {
		$realuser = $row['UID'];
		$realid = $row['PID'];
		$sql_update = "UPDATE `profile` SET `UID`='$realuser',`First_name`='$firstname',`Last_name`='$lastname',
		`Birth_date`='$birthdate',`Mobile_num`='$mobile',`Email`='$email',`Gender`='$gender' WHERE `PID`='$realid'";
		
		if ($conn->query($sql_update) === TRUE) {
			echo "<script>
			alert('Updated successfully');
			window.location.href='profile.php';
			</script>";
			} else {
			echo "Error: " . $sql_update . "<br>" . $conn->error;
			}
			break;
	}
	$conn-> close();
}
?>