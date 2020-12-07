<?php
session_start();

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'book';

$con = mysqli_connect($DBhost, $DBusername, $DBpw);
mysqli_select_db($con, $DBname);

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Link to the style.css, bootstrap jquary/ajax, bootstrap javascript and bootstrap css. -->
	<title>Product Detail</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style_43.css">
</head>

<body>
	<div class="detail_box">
		<div class="container">
			<div class="row">
				<form action="Cart_Wish.php" method="POST" id="Cart_Wish">
					<table class='table-bordered'>
				
	<!-- Display the product detail from database after the product button is clicked -->				
	<?php
	if(isset($_POST['detailbtn']))
	{
		if(isset($_POST['bookname1']))
		{
			$bookname=$_POST['bookname1'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'>Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn2']))
	{
		if(isset($_POST['bookname2']))
		{
			$bookname=$_POST['bookname2'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn3']))
	{
		if(isset($_POST['bookname3']))
		{
			$bookname=$_POST['bookname3'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn4']))
	{
		if(isset($_POST['bookname4']))
		{
			$bookname=$_POST['bookname4'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn5']))
	{
		if(isset($_POST['bookname5']))
		{
			$bookname=$_POST['bookname5'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn6']))
	{
		if(isset($_POST['bookname6']))
		{
			$bookname=$_POST['bookname6'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn7']))
	{
		if(isset($_POST['bookname7']))
		{
			$bookname=$_POST['bookname7'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn8']))
	{
		if(isset($_POST['bookname8']))
		{
			$bookname=$_POST['bookname8'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
		if(isset($_POST['detailbtn9']))
	{
		if(isset($_POST['bookname9']))
		{
			$bookname=$_POST['bookname9'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'>Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn10']))
	{
		if(isset($_POST['bookname10']))
		{
			$bookname=$_POST['bookname10'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn11']))
	{
		if(isset($_POST['bookname11']))
		{
			$bookname=$_POST['bookname11'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn12']))
	{
		if(isset($_POST['bookname12']))
		{
			$bookname=$_POST['bookname12'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn13']))
	{
		if(isset($_POST['bookname13']))
		{
			$bookname=$_POST['bookname13'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn14']))
	{
		if(isset($_POST['bookname14']))
		{
			$bookname=$_POST['bookname14'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn15']))
	{
		if(isset($_POST['bookname15']))
		{
			$bookname=$_POST['bookname15'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn16']))
	{
		if(isset($_POST['bookname16']))
		{
			$bookname=$_POST['bookname16'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></input></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM "."<input style='border: none;' class='set_input' name='book_price' value='".$row['Book_price']."' readonly></input></div></br>";
				echo "<div class='detail'> Current Stock: "."<input style='border: none;' class='set_input' name='book_stock' value='".$row['Stock_num']."' readonly></input></div></br>";
				echo "<div class='detail'> Quantity: <input type='number' name='quantity' value='1'></input></div>";
				echo "<div><button type='submit' name='Wishlist' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Wishlist </button>
						<button type='submit' name='Cart' class='addbtn btn btn-primary' form='Cart_Wish'> Add to Cart </button>
						<a href='index2.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
?>			
					</table>
				</form>
			</div>
		</div>
	</div>

</body>
</html>