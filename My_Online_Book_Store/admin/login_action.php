<?php

	session_start();

	//Identify the route to connect database
	$DBhost = 'localhost';
	$DBusername = 'root';
	$DBpw = '';

	$DBname = 'my_online_book_store';
	$DBtable = 'account';
	
	//Connect to database
	$con = mysqli_connect($DBhost, $DBusername, $DBpw);
	mysqli_select_db($con, $DBname);

	//Set variable for input
	$name = $_POST['user'];
	$pw = $_POST['pass'];

	//Search data in the database
	$query = "SELECT * from $DBtable WHERE Username = '$name' && Password = '$pw' && Datatype = 'admin'";
	$result = mysqli_query($con, $query);

	//Compare input and the data inside the database
	$num = mysqli_num_rows($result);
	echo $name."<br/>".$pw;
	echo $num;

	//Call/Echo the query to function
	//Set/Call/Echo the alert statement to make sure/check whether the query is in function or not
	//if $num = 1, it means that there are one acc/data that exist in database, if so, the system will allow the user to login
	if($num == 1){
		$_SESSION['user'] = $name;
		header('location:../admin/admin_manage.php');
	}else{
		echo "<script>
		alert('Invalid username or password.');
		window.location.href='../admin/admin_login.php';
		</script>";
	}
?>