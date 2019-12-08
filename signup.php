<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="newcart.css">
</head>

	<?php include "nev.php" ?>
	<?php include "db_con.php"?>s
<body>
</div class="container" >
	
	

	<div class="form">
		<h3>Sign Up</h3>
		<form action="signup.php" class="form-horizontal" method="post">
		Name : <input type="name" class="form-control" name="name" placeholder="Enter Full Name" required> <br>
		Email : <input type="email" class="form-control" name="email" placeholder="Email" required><br>
		Phone : <input type="number" class="form-control" name="phone" placeholder="Phone" required><br>
		Password : <input type="password" class="form-control" name="password" placeholder="Password" required><br>
		<input type="checkbox" name="checkbox" required>I agree to the Terms of Use and Privacy Policy<br>
		<input type="submit" class="btn btn-default" name="submit" required><br>
		already have an account <a href="login.php">login in</a>

		
	</form>
	</div  >
	<?php
		if(isset($_POST["submit"])){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$password=$_POST['password'];

			$result = mysqli_query($con,"SELECT email FROM signup WHERE email = '$email'");
			$row_count = $result->num_rows;
			if($row_count == 1)
				{
    				echo '';
				}
			else{

				$query="INSERT INTO signup(name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
				$run=mysqli_query($con,$query);

				if($run){
					echo "";
					header("Location:login.php");
					exit;
					delete_everything();
				}
				else
					{
						echo "Error ".$query."<br>" .mysqli_error($con);
					}

		}

		}
		mysqli_close($con);

		?>
		</div>
	</body>
</html>
