<?php 

//Connect to database
$dbc = new mysqli('localhost', 'root', '', 'cities_and_suburbs');

//Filter data
//Capture and save chose cityID
$cityID = $dbc->real_escape_string( $_GET['cityID'] ); 

//Prepare SQL
$sql = "SELECT suburbID, suburbName FROM suburbs WHERE cityID = $cityID";

//Run the query and capture the result
$result = $dbc->query( $sql );

//Extract the result 
//fetch all turns it into an associative arra
$suburbs = json_encode($result->fetch_all(MYSQLI_ASSOC));

//Prepare the header to say we are about to send json not text
header('Content-Type: application/json');

echo $suburbs;
