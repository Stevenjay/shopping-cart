<?php include 'templates/header.template.php'; ?>


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
				include 'templates/product.template.php';

			}

		?>

<?php include 'templates/footer.template.php'; ?>