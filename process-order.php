<?php 

session_start();

//Include the secret file 
require '../secret.php';

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

//Create instance of the PXPay Class
$pxpay = new PxPay_Curl( 'https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY );
