<?php 

session_start();

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

//Calculate total order cost
$grandTotal = 0;

foreach( $_SESSION['cart'] as $product ) {

	$grandTotal += $product['quantity'] * $product['price'];

} 

//Prepare order in "pending" state

//Include the PXpay library

require 'PxPay_Curl.inc.php';

