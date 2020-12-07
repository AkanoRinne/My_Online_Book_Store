<html>
<head>
	<!-- Link to the style.css, and bootstrap css. -->
	<title>Admin Login Module</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style1_2.css">
</head>

<body>
	<div class="Intro"> 
		<div class="main-text">
			<h2> <img src="product_logo.png" alt="My Online Book Store" width="50" height="50"> My Online Book Store </h2>
		</div>
		
		<div class="sub-text">
		<?php
		session_start();
		//Echo/Display the username that logged
		echo "<p class='wel_user'><b>Welcome, ".$_SESSION['user']."</b></p>";
		?>
		<!-- Button to select and link the section that the admin want to manage -->
			<p><center><b>Please Select:</b></center></p>
			<a href="../admin/manage_acc.php" class="btn btn-primary">Manage Account </a>
			<a href="../admin/manage_book.php" class="btn btn-primary"> Manage Book </a>
			<a href="../admin/admin_login.php" class="btn btn-primary"> Logout </a>
		</div>
	</div>
</body>
</html>