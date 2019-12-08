
<?php 
	session_start();
	

	if(filter_input(INPUT_GET, 'action')=='delete'){
			foreach ($_SESSION['shopping_cart'] as $key => $product) {
				if ($product['id']==filter_input(INPUT_GET,'id')){
					unset($_SESSION['shopping_cart'][$key]);
				}
				# code...
			}
			$_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
	}
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
		
		  <div style="clear: both"></div>
		  <br />
		  <div class="table-resposive">
		  	<table class="table">
		  		<tr><th colspan="5"><h3>Order Details</h3></th></tr>
		  	<tr>
		  		<th width="40%"> Product Name</th>
		  		<th width="10%">Quantity</th>
		  		<th width="20%">Price</th>
		  		<th width="15%">Total</th>
		  		<th width="5%">Action</th>
		  	</tr>
		  	<?<?php 
		  	if(!empty($_SESSION['shopping_cart'])):
		  		$total=0;

		  		foreach ($_SESSION['shopping_cart'] as $key => $product):
		  	 ?>
		  	 <tr>
		  	 	<td><?php echo $product['name']; ?></td>
		  	 	<td><?php echo $product['quantity']; ?></td>
		  	 	<td><?php echo $product['price']; ?></td>
		  	 	<td><?php echo number_format($product['quantity']*$product['price'],2);  ?></td>
		  	 	<td>
		  	 		<a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
		  	 			<div class="btn-danger" >Remove</div>
		  	 		</a>
		  	 			
		  	 	</td>
		  	 </tr>
		  	 <?php
		  	 		$total=$total+($product['quantity']*$product['price']);
		  	 	endforeach;
		  	 ?>
		  	 <tr>
		  	 	<td colspan="3" align="right">Total</td>
		  	 	<td align="right"> <?php echo number_format($total,2); ?><td>
		  	 		<td><td/>
		  	 </tr>
		  	 <tr>
		  	 	<td colspan="5">
		  	 		<?php
		  	 			if (isset($_SESSION['shopping_cart'])):
		  	 				if(count($_SESSION['shopping_cart'])>0):
		  	 					?>
		  	 						<a href="place_order.php"  >
		  	 							<div class="btn btn-primary btn-lg btn-block">Checkout</div>
		  	 						</a>
		  	 					<?php endif; endif; ?>
		  	 				</td>
		  	 			</tr>
		  	 			<?php
		  	 		endif;
		  	 		?>
		  	 	</table>
		  	 </div>
		  	
		  	 				


		  





		</div>
	</body>

</html>
