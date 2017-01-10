<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>THE INTERCEPTOR - CREATE PLAN</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    
    <style>
      #formradius{
      layout:relative;
      margin-left:200px;

      }
      #blocker{
          position:relative;
          top:500px;
          height:600px;
          width:600px;
          background-color:blue;
          }
      #map{width: 1000px; height: 550px;
        visibility:hidden;
      }
    </style>

  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <center><img src="images/header.png" style="width:400px;"></center>
    </div>
    
    <div class="container">
    <div id="formradius">
    <p id="mensahe">PLEASE SET RADIUS FIRST</p>
    <input type="number" id="radiussize">
    <button onClick="changeradius()">UPDATE RADIUS SIZE</button>
    </div>
    <div id="map" ></div>
    </div><!-- /.container -->
    <script src="js/sending.js" type="text/javascript"></script>
    <script src="js/boundary.js" type="text/javascript"></script>
    <script type="text/javascript">  
    var radiussize=0;
    function changeradius(){
        radiussize=document.getElementById("radiussize").value;
        alert(radiussize);
        document.getElementById("map").style.visibility='visible';
        document.getElementById("mensahe").innerHTML='PLOTPOINTS';
    }

    var minZoomLevel = 15;
    var centeroftheearth = {lat: 14.600353, lng: 121.036745};
    var map;
    var directionsService;
    var directionsDisplay;

    function initMap() {
     directionsService = new google.maps.DirectionsService;
     directionsDisplay = new google.maps.DirectionsRenderer;
    map = new google.maps.Map(document.getElementById('map'), {
    zoom: minZoomLevel,
    scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: false,
    center: centeroftheearth ,
    mapTypeId: 'roadmap'

    
    });
    
     createGeoJsonPolygon(geoBoundaries);

    // sanJuanBoundaries = new google.maps.Polygon({
    //       paths: [boundaries],
    //       strokeColor: '#FFC107',
    //       strokeOpacity: 0.8,
    //       strokeWeight: 2,
    //       fillColor: '#FFFFFF',
    //       fillOpacity: 0.35
    //     });

    // sanJuanBoundaries.setMap(map);


    directionsDisplay.setMap(map);
    var strictBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(14.600561, 121.036487),
    new google.maps.LatLng(14.616383, 121.058138)
    );

    google.maps.event.addListener(map, 'dragend', function() {
    if (strictBounds.contains(map.getCenter())) return;
    // We're out of bounds - Move the map back within the bounds
    var c = map.getCenter(),
        x = c.lng(),
        y = c.lat(),
             maxX = strictBounds.getNorthEast().lng(),
             maxY = strictBounds.getNorthEast().lat(),
             minX = strictBounds.getSouthWest().lng(),
            minY = strictBounds.getSouthWest().lat();
                if (x < minX) x = minX;
                if (x > maxX) x = maxX;
                if (y < minY) y = minY;
                if (y > maxY) y = maxY;
    map.setCenter(new google.maps.LatLng(y,x));
    });

    // Limit the zoom level
    google.maps.event.addListener(map, 'zoom_changed', function() {
    if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
    });


   
    }

    var markerCounter = 0;
    
    function addMarker(location, map) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
       var allowedMarker = 1;
    if(markerCounter < allowedMarker){
        markerCounter++;

    marker = new google.maps.Marker({
    position: location,
    map: map
    });
    marker.setAnimation(google.maps.Animation.BOUNCE);
    }else{
        alert("One marker at a time");
        return false;
    }
    }


    var circleCounter = 0;
     function addMarker2(location, map,ctr,i,directionsService, directionsDisplay) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
    var allowedCircle = 1;
    if(circleCounter < allowedCircle){
    circleCounter++;
    var ctr;
    var curr;
    var point1=[];

    //var directionService = new google.maps.DirectionService();
    var mapradius=radiussize*.0000100;
    var xcor;
    var ycor;
    for (ctr=0;ctr<360;ctr++){
    xcor=location.lat()+(mapradius*Math.cos(ctr));
    ycor=location.lng()+(mapradius*Math.sin(ctr));
    var newlocation = {latlng:new google.maps.LatLng(xcor,ycor)};
    var check = {latlng:new google.maps.LatLng(xcor,ycor)};

    point1.push(newlocation);

    ctr=ctr+4;
    xcor=xcor;
    ycor=ycor;
    }

    var i;
    var marker;
    for (i=0;i<point1.length;i++){
     marker = new google.maps.Marker({
    position:point1[i].latlng,
    map: map
    });
    marker.setAnimation(google.maps.Animation.DROP);
    }

    sendingData(location, point1);
    }
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1SFa75QzMfOtf7rudCh6RFgaNk6ptbzo&libraries=geometry&callback=initMap">
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
