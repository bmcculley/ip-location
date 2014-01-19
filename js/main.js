$(document).ready(function(){
	
	$('#submit').click(function() {
		
		$('.lookup-response').html('<img src="./img/loading.gif"/>');

		$.ajax({
			type : 'POST',
			url : 'ajax.php',
			dataType : 'json',
			data: {
				ip : $('#ipaddress').val()
			},
			success : function(data){
				$('.lookup-response').hide();
				$('.location-data').removeClass('hidden');
				$('.location-data .country').text(data.country);
				$('.location-data .region').text(data.region);
				$('.location-data .city').text(data.city);
				$('.location-data .postal').text(data.postal);
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$('.lookup-response').hide();
				$('#errorMessage').addClass('error')
					.text('There was an error.').show(500);
			}
		});
		
		return false;
	});
	
});