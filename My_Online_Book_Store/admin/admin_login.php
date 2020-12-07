<!DOCTYPE html>
<html>
<head>
	<!-- Link to the style.css, and bootstrap css. -->
	<title>Admin Login Page</title>
	<link rel="stylesheet" type="text/css" href="style_2.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<div class="topic">
			<h2> <img src="product_logo.png" alt="My Online Book Store" width="50" height="50"> My Online Book Store </h2>
		</div>
		
		<div class="login-box">
		<div class="row">
		<div class="col-md-6 login-left">
			<h2> Admin Module </h2> <br/>
			<p>	Welcome to My Online Book Store Admin Page! </p>
		</div>
		
		<!-- Login Form -->
		<div class="col-md-6 login-right">
			<h2> Admin Login </h2>
			<form action="login_action.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label> Username: </label>
					<input type="text" name="user" class="form-control" required>
				</div>
				<div class="form-group">
					<label> Password: </label>
					<input type="password" name="pass" class="form-control" required>
				</div>
					<button type="submit" class="btn btn-primary"> Login </button>
			</form>
		</div>
		</div>
		</div>
	</div>

</body>
</html>