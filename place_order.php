<!DOCTYPE html>
<html>
<head>
	<title>Place Order</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="newcart.css">
</head>
<body>
	<?php include "nev.php" ?>
	

	<?php include "db_con.php"?>	

	<div class="form">
		<h3>Billing Information</h3>
	<form action="place_order.php" method="post">

		Name <input type="name" class="form-control" name="name" placeholder="Enter Full Name" required> <br>
		Email<br>
		<input type="email" class="form-control" name="email" placeholder="Email" required><br>
		Phone<br>
		<input type="number" class="form-control" name="phone" placeholder="Phone" required><br>
		Address<br>
		<input type="text" class="form-control" name="address" placeholder="Address" required><br>
		Post Code<br>
		<input type="text" class="form-control" name="post" placeholder="Post Code" required><br>
		District<br>
		<input type="text" class="form-control" name="district" placeholder="District" required><br>
		
		
		<input type="checkbox" name="checkbox" required>I agree to the Terms of Use and Privacy Policy<br>
		<input type="submit" name="submit" required><br>
		

		
	</form>
	</div>
	<?php
		if(isset($_POST["submit"])){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$post=$_POST['post'];
			$district=$_POST['district'];
			#$country=$_POST['country'];

			$result = mysqli_query($con,"SELECT email FROM order_info WHERE email = '$email'");
			$row_count = $result->num_rows;
			if($row_count == 1)
				{
    				echo '';
				}
			else{

				$query="INSERT INTO order_info(name,email,phone,address,post,district,country) VALUES ('$name','$email','$phone','$address','$post','$district','$country')";
				$run=mysqli_query($con,$query);

				if($run){
					echo "";
					header("Location:itemPhone.php");
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
	
	
</body>
</html>