<?php

session_start();

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
	<title>Manage Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style3_9.css">
</head>

<body>
	<div class="main-text_2">
		<h2> <img src="product_logo.png" alt="My Online Book Store" width="50" height="50"> My Online Book Store </h2>
		<h3> Manage Book </h3>
	</div>
	
	<!-- Search Box -->
	<form id="form1" method="POST" enctype="multipart/form-data">
		<div class="check">
			<input type="text" name="valuetoSearch" placeholder="Search">
			<input type="submit" name="search" class="searchbox" value="Find"> 
		</div>
	
	<!-- Display Data from an entity in database -->
	<!-- If search box is set, the data displayed will change according to the input -->
	<div class="table-box">
		<div class="container">
			<div class="row">
				<table class="col-xs-4">
					<tr>
						<th class="col">Book ID</th>
						<th class="col">Image</th>
						<th class="col">Name</th>
						<th class="col">Author</th>
						<th class="col">Category</th>
						<th class="col">Publisher</th>
						<th class="col">Published Date</th>
						<th class="col">ISBN</th>
						<th class="col">Price</th>
						<th class="col">Stock Status</th>
						<th class="col">Description</th>
					</tr>
			
		<?php
		$sql = "SELECT * FROM $DBtable";
		$result = $con-> query($sql);
		
		if(isset($_POST['search']))
		{
				$valuetoSearch = $_POST['valuetoSearch'];
				$query = "SELECT * FROM $DBtable WHERE CONCAT(`BID`,`Image`,`Book_name`,`Book_author`,`Category_name`,
				`Book_publisher`,`Book_date`,`Book_ISBN`,`Book_price`,`Stock_num`,`Book_description`) LIKE '%".$valuetoSearch."%'";
				$result = $con-> query($query);
		}
		
		if(mysqli_num_rows($result)>0) {
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr><td>".
				$row["BID"].
				"</td><td style='padding: 5px;'>"."<img class='imageAdmin' src='data:image;base64,".base64_encode($row['Image'])."' alt='Image'>"."</td><td>".
				$row["Book_name"]."</td><td style='padding: 5px;'>".
				$row["Book_author"]."</td><td style='padding: 5px;'>".
				$row["Category_name"]."</td><td style='padding: 5px;'>".
				$row["Book_publisher"]."</td><td style='padding: 5px;'>".
				$row["Book_date"]."</td><td style='padding: 5px;'>".
				$row["Book_ISBN"]."</td><td style='padding: 5px;'>".
				$row["Book_price"]."</td><td style='padding: 5px;'>".
				$row["Stock_num"]."</td><td style='padding: 5px; font-size:10px; text-align:justify;'>".
				substr($row['Book_description'],0,169)."</td></tr>";
						
			}
			echo "</table></div></div></div></form>";
		}
		else
		{
			 echo "0 result";
		}
		?>

				</table>
			</div>
		</div>
	</div>
	</form>

	<!-- Bootstrap Modal Button to add/edit/delete book and link button to back to previous page-->
	<div class="action_list">
		<div class="container">
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Delete Book</button>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Edit Book</button>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Book</button>
			<a href="admin_manage.php" class="btn btn-info btn-lg">Back to Previous Page</a>
		</div>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal" which link to Add Book Button -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Close modal Button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Add Book Form -->
				<div class="modal-body">
					<h4 class="header_mid">Add New Book</h4>
					<form action="add_new_book.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Book Name: </label>
							<input type="text" name="bookname" class="form-control" required>
						
							<label>Book Image: </label>
							<input type="file" name="image" class="form-control" required>
						
							<label>Author: </label>
							<input type="text" name="author" class="form-control" required>
						
							<label>Category: </label>
							<input type="text" name="category" class="form-control" required>

							<label>Publisher: </label>
							<input type="text" name="publisher" class="form-control" required>
						
							<label>Published Date: </label>
							<input type="date" name="published_date" class="form-control" required>
						
							<label>ISBN: </label>
							<input type="number" name="ISBN" class="form-control" required>
						
							<label>Price </label>
							<input type="text" name="price" class="form-control" required>
						
							<label>Stock Number</label>
							<input type="number" name="stock" class="form-control" required>
						
							<label>Description </label>
							<textarea name="description" class="form-control" required></textarea>
						</div>
						
						<!-- Submit the input -->
						<div class="modal-footer">
							<button type="submit"  class="btn btn-primary" name="add">Add New Book</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Content of Bootstrap Modal "myModal2" which link to Edit Book Button -->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Close modal button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Edit Book Form -->
				<div class="modal-body">
					<h4 class="header_mid">Edit Book</h4>
					<form action="edit_book.php" method="POST">
						<div class="form-group">
							<label><b>Select Book ID</b></label>
							<input type="number" name="BookID" class="form-control" required></br>
						
						<h4> Please Enter The New Information to the Book </h4>
							<label><b>Enter New Book Name: </b></label>
							<input type="text" name="book_name" class="form-control" required>
							
							<label><b>Enter New Book Author: </b></label>
							<input type="text" name="author" class="form-control" required>
				
							<label><b>Enter New Book Category: </b></label>
							<input type="text" name="category" class="form-control" required>
						
							<label><b>Enter New Book Publisher: </b></label>
							<input type="text" name="publisher" class="form-control" required>
						
							<label><b>Enter New Published Date: </b></label>
							<input type="date" name="published_date" class="form-control" required>
						
							<label><b>Enter New Book ISBN: </b></label>
							<input type="number" name="ISBN" class="form-control" required>
						
							<label><b>Enter New Book Price: </b></label>
							<input type="text" name="price" class="form-control" required>
						
							<label><b>Enter New Book Stock: </b></label>
							<input type="number" name="stock" class="form-control" required>
						
							<label><b>Enter New Book Description: </b></label>
							<textarea name="description" class="form-control" required></textarea>
						</div>
						
						<!-- Submit the input or link to other content of Bootstrap Modal "myModal4" which link to Edit Stock Button-->
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" data-dismiss="modal" name="editstock" data-toggle="modal" data-target="#myModal4"> Edit Stock </button>
							<button type="submit" class="btn btn-primary" name="edit"> Edit </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal3" which link to Delete Book Button -->
	<div id="myModal3" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Close modal button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Delete Book Form -->
				<div class="modal-body">
					<h4 class="header_mid">Delete Book</h4>
					
					<form action="delete_book.php" method="POST">
						<div class="form-group">
							<label><b>Select Book ID:</b></label>
							<input type="number" name="BookID" class="form-control" required>
						</div>
						
						<!-- Submit the input -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="delete"> Delete </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Content of Bootstrap Modal "myModal4" which link to Edit Stock Button -->
	<div id="myModal4" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Close modal button -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Edit Stock Form -->
				<div class="modal-body">
					<h4 class="header_mid">Edit Stock</h4>
					<form action="Edit_stock.php" method="POST">
						<div class="form-group">
							<label><b>Select Book ID:</b></label>
							<input type="number" name="BookID" class="form-control" required>
						</div>
						<div class="form-group">
							<label><b>Enter new stock:</b></label>
							<input type="number" name="Stock2" class="form-control" required>
						</div>
						
						<!-- Submit the input -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="delete"> Edit Stock</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>