<?php 

session_start();

require 'PxPay_Curl.inc.php';
require '../secret.php';

//create instance 
$pxpay = new PxPay_Curl( 'https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY ); 

//Convert the response into something we can use 
$response = $pxpay->getResponse( $_GET['result'] );

//Was the transaction unsuccessful? 
if ( $response->getSuccess() == 1 ) {

	//Update the database order to say paid
	echo '<pre>';
	print_r($response);

	$dbc = new mysqli('localhost', 'root', '', 'shopping_cart');

	
	//Extract order ID from the session
	$orderID = $_SESSION['orderID'];

	$dbc->query("UPDATE orders SET state = 'approved' WHERE id = $orderID");

	//E-mail the client

	//E-mail website owner

	//Clear the cart
	$_SESSION['cart'] = [];

}