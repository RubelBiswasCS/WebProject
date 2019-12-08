
	<?php 
		$hostname='127.0.0.1:3307';
		$user='root';
		$password='';
		$db='web_proj';
		$con=mysqli_connect($hostname,$user,$password);
		if (!$con) {
			die("Connection Failed: ".mysqli_connect_error());
			# code...
		}
		else
			#echo "Connection Successful";
		mysqli_select_db($con,$db);

	 ?>