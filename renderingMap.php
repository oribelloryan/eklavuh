<?php 
include('db_conn.php');


$sql = "SELECT * FROM plotting WHERE operation_id = 5";
$result = $conn->query($sql);
 while($row = $result->fetch_assoc()){
      $operation_id= $row['operation_id'];
      $target = $row['target_location'];
      $checkpoints = $row['checkpoint_targets'];
      }
?>

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
  #map{width: 1000px; height: 550px; 
  }
  
  
  
  </style>

  </head>

  <body>
    <input type="hidden" id="checkpoints" value=<?php echo $checkpoints; ?>>
    <div class="navbar navbar-fixed-top">
      <center><img src="images/header.png" style="width:400px;"></center>
    </div>

    <div class="container">
    <p>
    <?php echo $checkpoints; ?>
    </p>
    <div id="map" ></div>
    <div id="formradius">
    <input type="number" id="radiussize">
    <button onClick="release()">Coordinates</button>
    </div>
    </div><!-- /.container -->
    <script type="text/javascript">
    var minZoomLevel = 15;
    var centeroftheearth = {lat: 14.600353, lng: 121.036745};    
    var map;

    function release(){
    var target = document.getElementById('checkpoints').value;
    alert(target);
    }
    function initMap() {
     directionsService = new google.maps.DirectionsService;
     directionsDisplay = new google.maps.DirectionsRenderer;
    map = new google.maps.Map(document.getElementById('map'), {
    zoom: minZoomLevel,
    center: centeroftheearth ,
    mapTypeId: 'roadmap'
    });
     

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
     </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1SFa75QzMfOtf7rudCh6RFgaNk6ptbzo&libraries=drawing&libraries=geometry&callback=initMap">
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
