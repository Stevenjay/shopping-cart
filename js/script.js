$(document).ready(function(){

	//Listen for change event on the cities select element 
	$('#cities').change(function(){

		var cityID = $(this).val();

		if ( cityID == '' ) {
			return;
		}

		//AJAX
		$.ajax({

			url: 'api/cities-and-suburbs.php', 
			data: {
				cityID: cityID
			},
			success: function( dataFromServer ) {

				console.log( dataFromServer );

				//Clear any old results from the suburbs select elements
				$('#suburbs').html('');

				//Loop over the results
				for( var i=0; i<dataFromServer.length; i++ ) {

					$('#suburbs').append('<option value="'+dataFromServer[i].suburbID+'">'+dataFromServer[i].suburbName+'</option>');

				}
			},
			error: function() {
				alert('Something went wrong');
			}

		});

	});

});