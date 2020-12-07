<?php

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
	<title>Product List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style_43.css">
</head>

<body>
	<div class="big_box">
		<h4><b>The Maze Runner Series</b></h4>
	</div>
	<div class="table-box">
		<div class="container">
			<div class="row">
				<table class="table-bordered">
				<form action='Product_detail.php' id="product_detail" method="POST"> 
	
	<!-- Display and list out the product -->	
	<?php
	$sql = "SELECT * FROM $DBtable WHERE Book_author='James Dashner'";

	$result = $con-> query($sql);

	$ar = array();
	$ar2 = array();
	$ar3 = array();

	if ($result-> num_rows >0) {
		while ($row = $result-> fetch_assoc()) {
			$ar[] = "<img class='imageAdmin' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'";
			$ar2[] = $row['Book_name'];
			$ar3[] = $row['Book_price'];
			}
			
			echo "<button name='detailbtn' form='product_detail' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box'>".$ar[0]."</div>".
			"<input type='text' class='box sub_box col-sm-8 col-md-9' name='booknamea' value='".$ar2[0]."' readonly='readonly'></input>".
			"<div class='price_box col-sm-2 col-md-3'>RM </br>".$ar3[0]."</div></button>".
			
			"<button name='detailbtn2' form='product_detail' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box'>".$ar[1]."</div>".
			"<input type='text' class='box sub_box col-sm-8 col-md-9' name='booknameb' value='".$ar2[1]."' readonly='readonly'></input>".
			"<div class='price_box col-sm-2 col-md-3'>RM </br>".$ar3[1]."</div></button>".
			
			"<button name='detailbtn3' form='product_detail' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box'>".$ar[2]."</div>".
			"<input type='text' class='box sub_box col-sm-8 col-md-9' name='booknamec' value='".$ar2[2]."' readonly='readonly'></input>".
			"<div class='price_box col-sm-2 col-md-3'>RM </br>".$ar3[2]."</div></button>".
			
			"<button name='detailbtn4' form='product_detail' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box'>".$ar[3]."</div>".
			"<input type='text' class='box sub_box col-sm-8 col-md-9' name='booknamed' value='".$ar2[3]."' readonly='readonly'></input>".
			"<div class='price_box col-sm-2 col-md-3'>RM </br>".$ar3[3]."</div></button>";
		}
	?>
					</form>
				</table>
			</div>
		</div>
	</div>
	
	<div class="big_box2">
		<h4><b>The Stormlight Archive Series</b></h4>
	</div>
	<div class="table-box2">
		<div class="container">
			<div class="row">
				<table class="table-bordered">
				<form action='Product_detail.php' id="product_detail2" method="POST"> 
				
	<!-- Display and list out the product -->
	<?php
	$sql = "SELECT * FROM $DBtable WHERE Book_author='Brandon Sanderson'";

	$result = $con-> query($sql);

	$ar = array();
	$ar2 = array();
	$ar3 = array();

	if ($result-> num_rows >0) {
		while ($row = $result-> fetch_assoc()) {
			$ar[] = "<img class='imageAdmin' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'";
			$ar2[] = $row['Book_name'];
			$ar3[] = $row['Book_price'];
			}
			
			echo "<button name='detailbtn5' form='product_detail2' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box2'>".$ar[0]."</div>".
			"<input type='text' class='box2 sub_box2 col-sm-8 col-md-9' name='booknamee' value='".$ar2[0]."' readonly='readonly'></input>".
			"<div class='price_box2 col-sm-2 col-md-3'>RM </br>".$ar3[0]."</div></button>".
			
			"<button name='detailbtn6' form='product_detail2' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box2'>".$ar[1]."</div>".
			"<input type='text' class='box2 sub_box2 col-sm-8 col-md-9' name='booknamef' value='".$ar2[1]."' readonly='readonly'></input>".
			"<div class='price_box2 col-sm-2 col-md-3'>RM </br>".$ar3[1]."</div></button>".
			
			"<button name='detailbtn7' form='product_detail2' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box2'>".$ar[2]."</div>".
			"<input type='text' class='box2 sub_box2 col-sm-8 col-md-9' name='booknameg' value='".$ar2[2]."' readonly='readonly'></input>".
			"<div class='price_box2 col-sm-2 col-md-3'>RM </br>".$ar3[2]."</div></button>".
			
			"<button name='detailbtn8' form='product_detail2' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box2'>".$ar[3]."</div>".
			"<input type='text' class='box2 sub_box2 col-sm-8 col-md-9' name='booknameh' value='".$ar2[3]."' readonly='readonly'></input>".
			"<div class='price_box2 col-sm-2 col-md-3'>RM </br>".$ar3[3]."</div></button>";
		}
	?>
					</form>
				</table>
			</div>
		</div>
	</div>
	
	<div class="big_box3">
		<h4><b>The Hunger Games Series</b></h4>
	</div>
	<div class="table-box3">
		<div class="container">
			<div class="row">
				<table class="table-bordered">
				<form action='Product_detail.php' id="product_detail3" method="POST"> 
	
	<!-- Display and list out the product -->
	<?php
	$sql = "SELECT * FROM $DBtable WHERE Book_author='Suzanne Collins'";

	$result = $con-> query($sql);

	$ar = array();
	$ar2 = array();
	$ar3 = array();

	if ($result-> num_rows >0) {
		while ($row = $result-> fetch_assoc()) {
			$ar[] = "<img class='imageAdmin' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'";
			$ar2[] = $row['Book_name'];
			$ar3[] = $row['Book_price'];
			}
			
			echo "<button name='detailbtn9' form='product_detail3' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box3'>".$ar[0]."</div>".
			"<input type='text' class='box3 sub_box3 col-sm-8 col-md-9' name='booknamei' value='".$ar2[0]."' readonly='readonly'></input>".
			"<div class='price_box3 col-sm-2 col-md-3'>RM </br>".$ar3[0]."</div></button>".
			
			"<button name='detailbtn10' form='product_detail3' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box3'>".$ar[1]."</div>".
			"<input type='text' class='box3 sub_box3 col-sm-8 col-md-9' name='booknamej' value='".$ar2[1]."' readonly='readonly'></input>".
			"<div class='price_box3 col-sm-2 col-md-3'>RM </br>".$ar3[1]."</div></button>".
			
			"<button name='detailbtn11' form='product_detail3' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box3'>".$ar[2]."</div>".
			"<input type='text' class='box3 sub_box3 col-sm-8 col-md-9' name='booknamek' value='".$ar2[2]."' readonly='readonly'></input>".
			"<div class='price_box3 col-sm-2 col-md-3'>RM </br>".$ar3[2]."</div></button>".
			
			"<button name='detailbtn12' form='product_detail3' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box3'>".$ar[3]."</div>".
			"<input type='text' class='box3 sub_box3 col-sm-8 col-md-9' name='booknamel' value='".$ar2[3]."' readonly='readonly'></input>".
			"<div class='price_box3 col-sm-2 col-md-3'>RM </br>".$ar3[3]."</div></button>";
		}
	?>
					</form>
				</table>
			</div>
		</div>
	</div>
	
	<div class="big_box4">
		<h4><b>SIGMA Force Series</b></h4>
	</div>
	
	<div class="table-box4">
		<div class="container">
			<div class="row">
				<table class="table-bordered">
				<form action='Product_detail.php' id="product_detail4" method="POST"> 
				
	<!-- Display and list out the product -->
	<?php
	$sql = "SELECT * FROM $DBtable WHERE Book_author='James Rollins'";

	$result = $con-> query($sql);

	$ar = array();
	$ar2 = array();
	$ar3 = array();

	if ($result-> num_rows >0) {
		while ($row = $result-> fetch_assoc()) {
			$ar[] = "<img class='imageAdmin' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'";
			$ar2[] = $row['Book_name'];
			$ar3[] = $row['Book_price'];
			}
			
			echo "<button name='detailbtn13' form='product_detail4' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box4'>".$ar[0]."</div>".
			"<input type='text' class='box4 sub_box4 col-sm-8 col-md-9' name='booknamem' value='".$ar2[0]."' readonly='readonly'></input>".
			"<div class='price_box4 col-sm-2 col-md-3'>RM </br>".$ar3[0]."</div></button>".
			
			"<button name='detailbtn14' form='product_detail4' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box4'>".$ar[1]."</div>".
			"<input type='text' class='box4 sub_box4 col-sm-8 col-md-9' name='booknamen' value='".$ar2[1]."' readonly='readonly'></input>".
			"<div class='price_box4 col-sm-2 col-md-3'>RM </br>".$ar3[1]."</div></button>".
			
			"<button name='detailbtn15' form='product_detail4' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box4'>".$ar[2]."</div>".
			"<input type='text' class='box4 sub_box4 col-sm-8 col-md-9' name='booknameo' value='".$ar2[2]."' readonly='readonly'></input>".
			"<div class='price_box4 col-sm-2 col-md-3'>RM </br>".$ar3[2]."</div></button>".
			
			"<button name='detailbtn16' form='product_detail4' type='submit' class='col-sm-3 col-md-3'>".
			"<div class='main_box4'>".$ar[3]."</div>".
			"<input type='text' class='box4 sub_box4 col-sm-8 col-md-9' name='booknamep' value='".$ar2[3]."' readonly='readonly'></input>".
			"<div class='price_box4 col-sm-2 col-md-3'>RM </br>".$ar3[3]."</div></button>";
		}
	?>
					</form>
				</table>
			</div>
		</div>
	</div>
</body>
</html>