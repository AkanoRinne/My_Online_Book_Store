<?php

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'book';

$con = mysqli_connect($DBhost, $DBusername, $DBpw);
$db = mysqli_select_db($con, $DBname);

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Link to the style.css, bootstrap jquary/ajax, bootstrap javascript and bootstrap css. -->
	<title>Category Detail</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style_43.css">
</head>

<body>
	
	<div class="project_logo">
		<a href="index2.php"><img src="product_logo.png" alt="My Online Book Store" width="120" height="120"/></a>
	</div>
	
	<!-- Navigation Bar for book category -->
	<div id="Nav">
	<form action="Nav_product2.php" id="nav_product" method="POST">
		<div class="dropdown">
			<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Category</button>
			<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
				<button type="submit" form="nav_product" name='btn1'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category1" Value="Young adult" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn2'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category2" Value="Epic fantasy" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn3'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category3" Value="Romance" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn4'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category4" Value="Paranormal" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn5'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category5" Value="Action and Adventure" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn6'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category6" Value="Detective and Mystery" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn7'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category7" Value="Horror" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn8'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category8" Value="Short Stories" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn9'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category9" Value="Cookbooks" readonly='readonly'></input></button>
				<button type="submit" form="nav_product" name='btn10'><input type="text" class="btn drop_menu2 dropdown-item form-control" name="category10" Value="Comic Book or Graphic Novel" readonly='readonly'></input></button>
			</div>
		</div>
	</form>
	</div>
	
	<!-- Include the data or coding inside the other php file -->
	<?php include 'User_module2.php' ?>
	
	<h3 class="main_title"><i> My Online </br> Book Store </i></h3>
	
	<!-- Search Bar -->
	<form id="search_form" method="POST" action="Search1.php" enctype="multipart/form-data">
		<div class="container">
			<div class="check">
				<input type="text" class="searchbox" name="valuetoSearch" placeholder="Search" />
				<button type="submit" class="btn btn-primary checkbtn" name="search" value="Find">Search</button> 
			</div>
		</div>
	</form>
	
	<!-- Display the product detail from database after the navigation button is clicked -->
	<?php 
		if(isset($_POST['btn1'])){
			$category = $_POST['category1'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn2'])){
			$category = $_POST['category2'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn3'])){
			$category = $_POST['category3'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn4'])){
			$category = $_POST['category4'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn5'])){
			$category = $_POST['category5'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn6'])){
			$category = $_POST['category6'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn7'])){
			$category = $_POST['category7'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn8'])){
			$category = $_POST['category8'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn9'])){
			$category = $_POST['category9'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
		
		if(isset($_POST['btn10'])){
			$category = $_POST['category10'];
			$sql = "SELECT * FROM $DBtable WHERE Category_name = '".$category."'";
			$result = $con-> query($sql);
			
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<div class='search_result_box'>
						<div class='container'>
						<div class='row'>
						<table class='searchbox'>";
				echo "<div><img class='searchImage' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'></div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Name: ".$row["Book_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Author: ".$row["Book_author"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Category: ".$row["Category_name"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Publisher: ".$row["Book_publisher"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Published Date: ".$row["Book_date"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> ISBN: ".$row["Book_ISBN"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Price: RM ".$row["Book_price"]."</div>";
				echo "<div class='search_detail col-sm-4 col-md-4'> Stock Status: ".$row["Stock_num"]."</div>";
				echo "<div class='long_detail'> Description: </br>".$row['Book_description']."</div>";			
				}
			}
			else
			{
				echo "<div class='none_result'>Still in Preparation</div>";
			}
			echo "</table></div></div>";
		}
	?>
</body>
</html>