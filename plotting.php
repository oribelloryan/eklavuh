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
    <script src="/maps/_/js/k=maps.m.fil.KoHMH1-Ja18.O/m=sc2,mo,lp,per,ep,ti,ds,stx,pwd,ppl,log,std,b/rt=j/d=1/rs=ACT90oGu5V0x0EMjSlOj-P6nAXYREJ_ntA" type="text/javascript"/></script>
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
    
    var boundaries = [
          {lat: 14.601600, lng: 121.059246 },
          {lat: 14.600801, lng: 121.056767 },
          {lat: 14.600775, lng: 121.055544 },
          {lat: 14.601350, lng: 121.051822 },
          {lat: 14.593874, lng: 121.043282 },
          {lat: 14.593647, lng: 121.043449 },
          {lat: 14.593451, lng: 121.042602 },
          {lat: 14.592989, lng: 121.041307 },
          {lat: 14.592164, lng: 121.041601 },
          {lat: 14.592166, lng: 121.038099 },
          {lat: 14.590712, lng: 121.034731 },
          {lat: 14.590977, lng: 121.034548 }, 
          {lat: 14.591346, lng: 121.034167 },
          {lat: 14.591645, lng: 121.033971 },
          {lat: 14.591704, lng: 121.033672 },
          {lat: 14.591675, lng: 121.033312 },
          {lat: 14.591854, lng: 121.033215 },
          {lat: 14.592585, lng: 121.032479 },
          {lat: 14.592321, lng: 121.031697 },
          {lat: 14.592820, lng: 121.031841 },
          {lat: 14.593284, lng: 121.032115 },
          {lat: 14.593433, lng: 121.031894 },
          {lat: 14.593903, lng: 121.031376 },
          {lat: 14.593935, lng: 121.030824 },
          {lat: 14.594168, lng: 121.030589 },
          {lat: 14.594322, lng: 121.030133 },
          {lat: 14.594619, lng: 121.029838 },
          {lat: 14.594839, lng: 121.029451 },
          {lat: 14.595203, lng: 121.029121 },
          {lat: 14.595016, lng: 121.028620 },
          {lat: 14.595908, lng: 121.027038 },
          {lat: 14.595159, lng: 121.026355 },
          {lat: 14.597218, lng: 121.025411 },
          {lat: 14.597361, lng: 121.025240 },
          {lat: 14.597945, lng: 121.024796 },
          {lat: 14.599388, lng: 121.024057 },
          {lat: 14.601612, lng: 121.020836 },
          {lat: 14.602053, lng: 121.020017 },
          {lat: 14.602262, lng: 121.019835 },
          {lat: 14.602647, lng: 121.019744 },
          {lat: 14.603716, lng: 121.020062 },
          {lat: 14.604409, lng: 121.020301 },
          {lat: 14.604974, lng: 121.020725 },
          {lat: 14.607852, lng: 121.022667 },
          {lat: 14.608851, lng: 121.022263 },
          {lat: 14.609448, lng: 121.021589 },
          {lat: 14.609535, lng: 121.021455 },
          {lat: 14.612066, lng: 121.023138 },
          {lat: 14.613488, lng: 121.023318 },
          {lat: 14.613727, lng: 121.023475 },
          {lat: 14.613825, lng: 121.023901 },
          {lat: 14.613325, lng: 121.025024 },
          {lat: 14.612424, lng: 121.025327 },
          {lat: 14.612229, lng: 121.026325 },
          {lat: 14.612272, lng: 121.026875 },
          {lat: 14.612250, lng: 121.027852 },
          {lat: 14.611990, lng: 121.028738 },
          {lat: 14.612201, lng: 121.029152 },
          {lat: 14.612729, lng: 121.029234 },
          {lat: 14.612977, lng: 121.029338 },
          {lat: 14.613134, lng: 121.029710 },
          {lat: 14.613100, lng: 121.030105 },
          {lat: 14.612943, lng: 121.030454 },
          {lat: 14.612898, lng: 121.030884 },
          {lat: 14.611931, lng: 121.031372 },
          {lat: 14.611672, lng: 121.031674 },
          {lat: 14.611290, lng: 121.032232 },
          {lat: 14.610865, lng: 121.032662 },
          {lat: 14.610588, lng: 121.032949 },
          {lat: 14.609675, lng: 121.033618 },
          {lat: 14.609397, lng: 121.034167 },
          {lat: 14.609397, lng: 121.034777 },
          {lat: 14.608796, lng: 121.035254 },
          {lat: 14.608553, lng: 121.035756 },
          {lat: 14.608646, lng: 121.036210 },
          {lat: 14.608634, lng: 121.036318 },
          {lat: 14.608484, lng: 121.036592 },
          {lat: 14.608403, lng: 121.036843 },
          {lat: 14.607871, lng: 121.036891 },
          {lat: 14.607513, lng: 121.037154 },
          {lat: 14.606634, lng: 121.037285 },
          {lat: 14.606249, lng: 121.037752 },
          {lat: 14.608734, lng: 121.040903 },
          {lat: 14.609585, lng: 121.043059 },
          {lat: 14.608918, lng: 121.044077 },
          {lat: 14.608617, lng: 121.045784 },
          {lat: 14.609635, lng: 121.049993 },
          {lat: 14.604469, lng: 121.052115 },
          {lat: 14.606622, lng: 121.056957 },
          {lat: 14.606622, lng: 121.056984 },
          {lat: 14.601611, lng: 121.059250 },
        ];


    var sanJuanBoundaries = new google.maps.Polygon({
          paths: [boundaries],
          strokeColor: '#FFC107',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FFC107',
          fillOpacity: 0.35
        });

    sanJuanBoundaries.setMap(map);


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


    google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng, map);
    addMarker2(event.latLng, map);
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
    /*var cityCircle = new google.maps.Circle({
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.1,
    map: map,
    center: location,
    radius: radiussize

    });*/
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
    console.log(point1[i]);
     marker = new google.maps.Marker({
    position:point1[i].latlng,
    map: map
    });
    marker.setAnimation(google.maps.Animation.DROP);
    }
    /*alertMarker = map.getBounds().contains(marker.getPosition());
    alert(alertMarker);*/
    var confirmation = confirm("Are you sure to save this target area?");
    if(confirmation == true){
        sendingData(location, point1);
    }else if(confirmation == false){
        marker.setMap(null);
        alert("False");
    }
    }else{
        return false;
    }
    }


    function sendingData(location, checkpoints){
    var checkpoint = JSON.stringify(checkpoints);
    var target = JSON.stringify(location);
    $.ajax({
        url: 'storing.php?checkpoints='+checkpoint+'&target='+target,
        type: 'GET',
        success: function(results) {
        }
    });
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
