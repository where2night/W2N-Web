<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Street View service</title>
    <style>
       #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
function initialize() {

  var latitude = parseFloat($('#latitude').val());
  var longitude = parseFloat($('#longitude').val());

  var fenway = new google.maps.LatLng(latitude,longitude);
  
  var mapOptions = {
    center: fenway,
    zoom: 14
  };
  var map = new google.maps.Map(
      document.getElementById('map-canvas'), mapOptions);
  var panoramaOptions = {
    position: fenway,
    pov: {
      heading: 34,
      pitch: 10
    }
  };
  var panorama = new  google.maps.StreetViewPanorama(document.getElementById('pano'),panoramaOptions);
  map.setStreetView(panorama);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas" style="width: 400px; height: 300px;left:400px;top:2px;"></div>
    <div id="pano" style="position:absolute; left:0px; top: 8px; width: 400px; height: 300px;margin-top:-1%"></div>
  </body>
</html>