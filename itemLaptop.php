
<?php 
	session_start();
	#$product_ids=array();
	#session_destroy();

	if(filter_input(INPUT_POST, 'add_to_cart')){
		if  (isset($_SESSION['shopping_cart'])){
			$count =count($_SESSION['shopping_cart']);
			$product_ids=array_column($_SESSION['shopping_cart'],'id');

			#pre_r($product_ids);

			if (!in_array(filter_input(INPUT_GET, 'id'),$product_ids)){
				$_SESSION['shopping_cart'][$count]= array(
				'id'=>filter_input (INPUT_GET,'id'),
				'name'=>filter_input (INPUT_POST,'name'),
				'price'=>filter_input (INPUT_POST,'price'),
				'quantity'=>filter_input (INPUT_POST,'quantity')

			);

			}
			else{
				for ($i=0; $i<count($product_ids);$i++){
					if ($product_ids[$i]==filter_input(INPUT_GET,'id')){
						$_SESSION['shopping_cart'][$i]['quantity']+=filter_input(INPUT_POST,'quantity');
					}
				}
			}

		}
		else{
			$_SESSION['shopping_cart'][0]= array(
				'id'=>filter_input (INPUT_GET,'id'),
				'name'=>filter_input (INPUT_POST,'name'),
				'price'=>filter_input (INPUT_POST,'price'),
				'quantity'=>filter_input (INPUT_POST,'quantity')

			);
		}

	}

	/*if(filter_input(INPUT_GET, 'action')=='delete'){
			foreach ($_SESSION['shopping_cart'] as $key => $product) {
				if ($product['id']==filter_input(INPUT_GET,'id')){
					unset($_SESSION['shopping_cart'][$key]);
				}
				# code...
			}
			$_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
	}*/
	#pre_r($_SESSION);

	function pre_r($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="newcart.css">
</head>
	<?php include "nev.php" ?>
	<body>

		<div class="container" >
			
		

		<?php include "db_con.php" ?>
		<?php 
			$query = 'SELECT * FROM laptop ORDER by id ASC';
			$result=mysqli_query($con,$query);

			if ($result):
				if (mysqli_num_rows($result)>0):
					while ($product=mysqli_fetch_array($result)):
					#print_r($product);
					?>
					<div class="col-sm-4 col-md-3">
						<form method="post" action="itemLaptop.php?action=add&id=<?php echo $product['id']; ?>">
							<div class="products">
								<img src="<?php echo $product['image']; ?>" class="img-resposive" width="220px" height="180px" />
								<h4 class="text-info"><?php echo $product['name']; ?></h4>
								<h4><?php echo $product['price']; ?></h4>
								<input type="text" name="quantity" class="form-control" value="1">
								<input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
								<input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
								<input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-info" value="Add To Cart" />
							</div>
						</form>
					</div>


					<?php
					endwhile;

						# code...
					
				endif;
			endif;


		  ?>
		 
		  	
		  	 				


		  





		</div>
	</body>

</html>
