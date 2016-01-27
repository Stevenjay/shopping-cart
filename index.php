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

	//Add the item to the cart
	$_SESSION['cart'][] = [

		'id'=>$_POST['product-id'],
		'name'=>$_POST['name'],
		'description'=>$_POST['description'],
		'price' => $result['price']

	];

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