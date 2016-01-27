<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="body">

<?php 

	echo '<pre>';
	print_r( $_SESSION['cart'] );
	echo '</pre>'

?>	