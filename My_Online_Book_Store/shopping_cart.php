<?php

//Connecting database
$DBhost = 'localhost';
$DBusername = 'root';
$DBpw = '';

$DBname = 'my_online_book_store';
$DBtable = 'wishlist';

$con = mysqli_connect($DBhost, $DBusername, $DBpw);
$db = mysqli_select_db($con, $DBname);

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Link to the style.css, bootstrap jquary/ajax, bootstrap javascript and bootstrap css. -->
	<title>My Online Book Store</title>
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style_43.css">
	
	<!-- Javascript to make the checkbox to function with check all box -->
	<script type="text/javascript">
		$(document).ready(function(){
			$("#checkAll").click(function(){
				if($(this).is(":checked")){
					$(".checkItem").prop('checked', true);
				}
				else{
					$(".checkItem").prop('checked', false);
				}
			});
		});
	</script>
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
	
	<div style="border:1px solid; 
	padding:1px; 
	font-size:18px;
	margin-left: 200px;
	margin-top: 40px;
	width: 130px"><b> Shopping Cart </b>
	</div>
	<a href='index2.php' class='btn btn-primary' style="float: right; margin-right: 50px">Back to Home Page</a>
	<form action="calc.php" method="post" id="calc">
	
	
	<!-- Display and list out the content of shopping cart in that user account -->
	<div class="wish_box2">
		<div class="container">
			<div class="row">
				<table class="wishlist_detail2">
					<tr class="wishlist_detail2">
						<th class="wish_col2">Remove: <input type="checkbox" id="checkAll"></th>
						<th class="wish_col2">Product Name</th>
						<th class="wish_col2">Price (RM)</th>
						<th class="wish_col2">Current Stock</th>
						<th class="wish_col2">Quantity</th>
						<th class="wish_col2">Subtotal (RM)</th>
					</tr>
			
		<?php
		$username = $_SESSION['username'];
		$sql = "SELECT SCID, shoppingcart.UID, Product_name, Product_price, Item_num, Quantity, (Product_price*Quantity) As Sub_total FROM shoppingcart INNER JOIN account ON account.UID = shoppingcart.UID WHERE account.Username = '$username'";
		$result = $con-> query($sql);
		if ($result-> num_rows >0) {
			while ($row = $result-> fetch_assoc()) {
				echo "<tr class='wishlist_detail2'><td><input type='checkbox' class='checkItem' value='".$row['SCID']."' name='id[]'></td>
				<td class='wishdet2'>".$row["Product_name"]."</td>".
				"<td class='wishdet2'>".$row["Product_price"]."</td>".
				"<td class='wishdet2'>".$row["Item_num"]."</td>".
				"<td class='wishdet2'>".$row['Quantity']."</td>".
				"<td class='wishdet2'> ".$row['Sub_total']."</td></tr>";
			}
		}
		else
		{
			 echo "Still Havent Any Book in the Wishlist";
		}
		?>
				</table>
			</div>
		</div>
	</div>
	
	<!-- Calculate the estimated total -->
	<?php
		$username = $_SESSION['username'];
		$sql3 = "SELECT SUM(Product_price*Quantity) AS total,SUM(Quantity) AS quantity FROM shoppingcart INNER JOIN account ON account.UID = shoppingcart.UID WHERE account.Username = '$username'";
		$result2 = $con-> query($sql3);
		if ($result2-> num_rows >0) {
			while ($row = $result2-> fetch_assoc()) {
				echo "<div class='wishdet2'> Total quantity: ".$row['quantity']."</div>";
				echo "<div class='wishdet2' style='margin-bottom: 50px;'> Estimated total: </br> RM ".$row['total']."</div>";
			}
		}
		
	?>
	
	<!-- Remove the item button if the checkbox is clicked -->
	<div class="wish_manage">
		<input type="submit" form="calc" class="delwish2 btn btn-lg btn-danger" value="Remove" name="remove"  onclick="return confirm('Are you sure want to delete!')"/>
	</div>
	</form>
</body>
</html>