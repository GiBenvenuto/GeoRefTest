
<form action="<?php base_url('') ?>">
	<input type="text" name="nome" placeholder="Nome">
	<input type="submit" name="" class="btn btn-primary">


	<input type="text" name="lat" id="lat">
	<input type="text" name="long" id="long">
</form>
<input type="text" id="endereco" placeholder="Endereço">
<button id="ver">Buscar</button>
<div id="map"></div>
<style>
#map {
	width: 100%;
	height: 590px;
	background-color: grey;
}
</style>

<script>
	var marker;
	function initMap() {
		var sp = {lat: -22.029374, lng: -48.212062};
		geocoder = new google.maps.Geocoder();
		var mapOptions = {
			center: sp,
			zoom: 7,
		};
		map = new google.maps.Map(document.getElementById('map'), mapOptions);

		google.maps.event.addListener(map, "click", function(event) {
			var lat = event.latLng.lat().toFixed(6);
			var lng = event.latLng.lng().toFixed(6);
			var latLng = new google.maps.LatLng(lat,lng);
			createMarker(latLng);
			getCoords(lat, lng);

		});
	}

	$("#ver").click(function(){
		var endereco = $("#endereco").val();
		codeAddress(endereco);
	});

	function codeAddress(endereco) {
		geocoder.geocode( { 'address': endereco}, function(results, status) {
			if (status == 'OK') {
				map.setCenter(results[0].geometry.location);
				createMarker(results[0].geometry.location);
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}

// Função que cria o marcador
function createMarker(latLng) {
	if (marker) {
		marker.setMap(null);
		marker = "";
	}

	marker = new google.maps.Marker({
		position: latLng,
		draggable: true,
		map: map
	});

	var lat = marker.position.lat().toFixed(6);
	var lng = marker.position.lng().toFixed(6);
	getCoords(lat, lng);

	google.maps.event.addListener(marker, 'dragend', function() {
		marker.position = marker.getPosition();
		var lat = marker.position.lat().toFixed(6);
		var lng = marker.position.lng().toFixed(6);
		getCoords(lat, lng);
	});
}

// Função que actualiza as caixas de texto no topo da página
function getCoords(lat, lng) {
	$("#lat").val(lat);
	$("#long").val(lng);
}


</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqaW6IQrXaLBV3BnuN8W6O0pXyT-9XLEQ&callback=initMap">


</script>