<h2>Fill in your details</h2>

<form action="process-order.php" method="post">

	<div>
		<label for="">Full Name: </label>
		<input type="text" id="full-name" name="full-name" placeholder="John Jacobs">
	</div>

	<select name="city" id="cities">
	<option value="">Select a city:</option>
		<?php 
			
		//Connect to database
		$dbc = new mysqli('localhost', 'root', '', 'cities_and_suburbs');

		//Get all the cities
		$sql = "SELECT cityID, cityName FROM cities";

		//Run the query and capture the results
		$result = $dbc->query ( $sql );

		//LOOP OVER THE RESULTS AND CREATE AN OPTION ELEMENT FOR EACH 
		while ( $city = $result->fetch_assoc() ) {
			echo '<option value="'. $city['cityID'] .'">'. $city['cityName'] .'</option>';
		}

		?>
	</select>

	<select name="suburb" id="suburbs">
		
	</select>
	<div>
		<label for="address">Address: </label>
		<textarea name="address" id="address" col="30" row="10" placeholder="18 Crestview Grove"></textarea>
	</div>

	<div>
		<label for="phone">Phone Number:</label>
		<input type="tel" name="phone"> 
	</div>

	<div>
		<label for="email">E-mail: </label>
		<input type="email" name="email" placeholder="ports@gmail.com"> 
	</div>

	<input type="submit" name="place-order" value="Place Order">

</form>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="js/script.js"></script>