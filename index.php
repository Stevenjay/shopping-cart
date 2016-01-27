<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="body">
		<h1>Shopping Cart</h1>

		<?php 

			$dbc = new mysqli ('localhost', 'root', '', 'shopping_cart');

			//Get all products
			$sql = "SELECT id, name, description, price, stock FROM products";

			// Run the query 
			$result = $dbc->query( $sql );

			//Loop over the results 
			while( $row = $result->fetch_assoc() ) {

				//Present the data 
				echo '<ul>';
				echo '<li>ID: '.$row['id'].' </li>';
				echo '<li>Name: '.$row['name'].' </li>';
				echo '<li>Description: '.$row['description'].' </li>';
				echo '<li>Price: '.$row['price'].' </li>';
				echo '<li>Stock: '.$row['stock'].' </li>';
				echo '</ul>';
				echo '<br>';

			}

		?>


	</div>
</body>
</html>