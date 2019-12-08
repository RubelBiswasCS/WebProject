<!DOCTYPE html>
<html>
<head>
	<title>Header</title>

	<meta charset="utf-8">
 	 <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<?php include "header.php" ?>
<body class="container">
	

	<div class="row">

	<?php include "db_con.php" ?>

	<?php 
		$query="SELECT `name`, `image`, `price`, `discount` FROM `user_cart` order by id ASC ";
		$runquery=mysqli_query($con,$query);
		$num=mysqli_num_rows($runquery);

		if($num>0){
			while ($product= mysqli_fetch_array($runquery)) {
				#print_r($product);
				?>

				<div class="col-lg-3 col-md-3 col-sm-12">
					<form>
						<div class="card">
							<h6 class="card-title bg-info text-white p-2 text-uppercase"> <?php echo
					 					$product['name'];  ?>   </h6>
								<div class="card-body">
									 <img src="<?php echo $product['image']; ?>" alt="phone" class="img-fluid" alt="Responsive image">
									 <h6  > &#8381; <?php echo $product['price']; ?> <span>(<?php echo $product['discount']; ?> % Off) </span></h6>
									
								</div>
								<div class="btn-group d-flex">
									<button class="btn btn-success "> Add to cart </button> <button class="btn btn-warning flex-fill text-white"> BUy Now </button>
								</div>
							
						</div>
					</form>
					
				</div>

				<?php
			}
		}
	?>

	
	</div>
	
</body>
<?php include "footer.php" ?>
</html>