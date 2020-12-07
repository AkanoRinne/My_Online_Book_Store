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
	<title>My Online Book Store</title>
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
	<form id="search_form" method="POST" action="Search2.php" enctype="multipart/form-data">
		<div class="container">
			<div class="check">
				<input type="text" class="searchbox" name="valuetoSearch" placeholder="Search" />
				<button type="submit" class="btn btn-primary checkbtn" name="search" value="Find">Search</button> 
			</div>
		</div>
	</form>
	
	<!-- Include the data or coding inside the other php file -->
	<?php include 'Product_list2.php' ?>
</body>
</html>