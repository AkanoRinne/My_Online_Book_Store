<?php

session_start();

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'account';

$con = mysqli_connect($DBhost, $DBusername, $DBpw);
mysqli_select_db($con, $DBname);

//Set variable for input
$name = $_POST['username'];
$pw = $_POST['pass'];

//Search data in the database
$query = "SELECT * from $DBtable WHERE Username = '$name' && Password = '$pw' && Datatype = 'user'";
$result = mysqli_query($con, $query);

//Compare input and the data inside the database
$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['username'] = $name;
	header('location:index2.php');
}else{
	
	echo "<script>
alert('Invalid username or password.');
window.location.href='index.php';
</script>";
}

?>