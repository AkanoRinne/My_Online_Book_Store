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
					<table class='table-bordered'>
	
	<!-- Display the product detail from database after the product button is clicked -->	
	<?php
	if(isset($_POST['detailbtn']))
	{
		if(isset($_POST['booknamea']))
		{
			$bookname=$_POST['booknamea'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn2']))
	{
		if(isset($_POST['booknameb']))
		{
			$bookname=$_POST['booknameb'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn3']))
	{
		if(isset($_POST['booknamec']))
		{
			$bookname=$_POST['booknamec'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn4']))
	{
		if(isset($_POST['booknamed']))
		{
			$bookname=$_POST['booknamed'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn5']))
	{
		if(isset($_POST['booknamee']))
		{
			$bookname=$_POST['booknamee'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn6']))
	{
		if(isset($_POST['booknamef']))
		{
			$bookname=$_POST['booknamef'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn7']))
	{
		if(isset($_POST['booknameg']))
		{
			$bookname=$_POST['booknameg'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn8']))
	{
		if(isset($_POST['booknameh']))
		{
			$bookname=$_POST['booknameh'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
		if(isset($_POST['detailbtn9']))
	{
		if(isset($_POST['booknamei']))
		{
			$bookname=$_POST['booknamei'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn10']))
	{
		if(isset($_POST['booknamej']))
		{
			$bookname=$_POST['booknamej'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn11']))
	{
		if(isset($_POST['booknamek']))
		{
			$bookname=$_POST['booknamek'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}

	if(isset($_POST['detailbtn12']))
	{
		if(isset($_POST['booknamel']))
		{
			$bookname=$_POST['booknamel'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn13']))
	{
		if(isset($_POST['booknamem']))
		{
			$bookname=$_POST['booknamem'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn14']))
	{
		if(isset($_POST['booknamen']))
		{
			$bookname=$_POST['booknamen'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: "."<input style='border: none;' name='book_name' class='set_input' value='".$row['Book_name']."' readonly></div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn15']))
	{
		if(isset($_POST['booknameo']))
		{
			$bookname=$_POST['booknameo'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
	
	if(isset($_POST['detailbtn16']))
	{
		if(isset($_POST['booknamep']))
		{
			$bookname=$_POST['booknamep'];
			$sql = "SELECT * FROM $DBtable WHERE Book_name = '$bookname'";
			$result = $con-> query($sql);
			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				echo "<img class='Detail_image' name='detail_image' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>";
				echo "<div class='detail'> Book Name: ".$row['Book_name']."</div></br>";
				echo "<div class='detail'> Author: ".$row['Book_author']."</div></br>";
				echo "<div class='detail'> Category: ".$row['Category_name']."</div></br>";
				echo "<div class='detail'> Publisher: ".$row['Book_publisher']."</div></br>";
				echo "<div class='detail'> ISBN: ".$row['Book_ISBN']."</div></br>";
				echo "<div class='detail'> Price: RM ".$row['Book_price']."</div></br>";
				echo "<div class='detail'> Current Stock: ".$row['Stock_num']."</div></br>";
				echo "<div><a href='index.php' class='btn addbtn backbtn'>Back to Home Page</a></div>";
				echo "<div class='descrip_detail'> Description: </br>".$row['Book_description']."</div>";
				}
			}
		}
	}
?>			
					</table>
			</div>
		</div>
	</div>

</body>
</html>