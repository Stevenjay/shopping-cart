<?php 

//Start the session 
session_start();

$dbc = new mysqli ('localhost', 'root', '', 'shopping_cart');

//create a cart if they don't have one already 
if (! isset($_SESSION['cart'])){

	//create cart
	$_SESSION['cart'] = [];

}

//If isse
if ( isset($_GET['clearcart']) ) {

	//clear the cart
	$_SESSION['cart'] = [];

	//Refresh the page
	header('Location: index.php');
}

//Did the user submit the form?
if(isset($_POST['add-to-cart'])) {

	//Find the price of the product 
	$id = $dbc->real_escape_string($_POST['product-id']);

	//Prepare SQL to find the price of the product 
	$sql = "SELECT price FROM products WHERE id = $id";

	//Run the query 
	$result = $dbc->query( $sql );

	//Validation goes here 
	// Extract the data 
	$result  = $result->fetch_assoc();

	$productFound = false;

	//Loop over the cart and se if the product is added already 
	for( $i = 0; $i<count($_SESSION['cart']); $i++ ) {

		//Get the id of the product in the cart 
		$cartItemID = $_SESSION['cart'][$i]['id'];

		//Get the id of the product being added to the cart 
		$addItemID = $_POST['product-id'];

		//If the two ID's match
		if ( $cartItemID == $addItemID ) {
			$_SESSION['cart'][$i]['quantity'] += $_POST['quantity'];

			$productFound = true;
		}

	}

	//If product was NOT found in the cart
	if (!$productFound) {

		//Add the item to the cart
		$_SESSION['cart'][] = [

			'id'=>$_POST['product-id'],
			'name'=>$_POST['name'],
			'description'=>$_POST['description'],
			'price' => $result['price'],
			'quantity' => $_POST['quantity']

		];

	}

}


//Include the header
include 'templates/header.template.php'; ?>


<h1>Shopping Cart</h1>

<?php 


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