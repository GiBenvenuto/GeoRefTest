
<style>
#map {
 width: 100%;
 height: 590px;
 background-color: grey;
}
</style>
<div id="map"></div>
<script>
  function initMap() {
    var sp = {lat: -22.029374, lng: -48.212062};
    var mapOptions = {
      center: sp,
      zoom: 7,
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var script = document.createElement('script');
    script.src = 'Coisas/pegaCoisas';
    document.getElementsByTagName('head')[0].appendChild(script);

    window.callback = function(results) {
      for (var i = 0; i < results.coisas.length; i++) {

        var latLng = new google.maps.LatLng(results.coisas[i].latitude, results.coisas[i].longitude);
        placeMarker(map,latLng,results.coisas[i].nome);
      };

      function placeMarker(map, location, nome) {
        var marker = new google.maps.Marker({
          position: location,
          map: map,
          nome: nome
        });
        var infowindow = new google.maps.InfoWindow({
          content: 'Nome: ' + marker.nome
        });


        google.maps.event.addListener(marker, "click", function(event) {
          infowindow.open(map,marker);
        });

      }


    }
  }


</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqaW6IQrXaLBV3BnuN8W6O0pXyT-9XLEQ&callback=initMap">


</script>



