<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="newcart.css">
	<link rel="stylesheet" type="text/css" href="style1.css">

	<style >
		
	</style>
</head>
<body>
	<?php include "nev.php" ?>
	

	<?php include "db_con.php" ?>

	 <div class="form">
	 	<h3>Log In</h3>
	

		<form action="login.php" class="form-inline" method="post">
			
			<input type="email" class="form-control"  name="email" placeholder="Email" required><br>
			
			<input type="password" class="form-control"  name="password" placeholder="Password" required><br>
			<input type="checkbox" name="checkbox" required>I agree to the Terms of Use and Privacy Policy<br>
			<input type="submit" class="btn btn-default" name="submit" required><br>
			No Account Yet <a href="signup.php">Sign Up</a>
			
		</form>

	</div>
	<?php
		/*if(isset($_POST["submit"])){
			$email=$_POST['email'];
			$password=$_POST['password'];

			$result = mysqli_query($con,"SELECT email FROM signup WHERE email = '$email'");
			
			if($result == $email)
				{
    				echo 'Login';
				}
			else{
				echo "Account Doesn't exists";

				

		}

		}*/

		if (isset($_POST['submit'])){
	
// Assigning POST values to variables.
$email = $_POST['email'];
$password = $_POST['password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM signup WHERE email='$email' and Password='$password'";
 
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if ($count == 1){
	
	if($row['type']==1){
		header("Location:homeAdmin.php");
	}



#echo "Login Credentials verified";
#echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
else {

	header("Location:home.php");
}

}
else{

echo "<script type='text/javascript'>alert('Invalid Email or Password')</script>";
#echo "Invalid Login Credentials";
}
}

		#mysqli_close($con);

		?>
	

	
</body>
</html>