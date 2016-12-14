<?php 
include('db_conn.php');

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_operations JOIN plotting ON tbl_operations.operation_id = plotting.operation_id where tbl_operations.operation_id = $id";
$result = $conn->query($sql);
 while($row = $result->fetch_assoc()){
      $operation = $row['operation_name'];
      $plan = $row['date_plan'];
      $officers = $row['num_officers'];
      $target = $row['target_location'];
      $checkpoints = $row['checkpoint_targets'];
      $exe = date_format(date_create($row['date_execute']),'Y-M-d ');
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
  #map{
        width: 100%;
       height: 550px; 
       margin: auto;
  }
  </style>

  </head>

  <body>
    <input type="hidden" id="checkpoints" value=<?php echo $checkpoints; ?>>
    <input type="hidden" id="target" value=<?php echo $target ?>>
    <div class="navbar navbar-fixed-top">
      <center><img src="images/header.png" style="width:400px;"></center>
    </div>

    <div class="container">
    <p><h4><center><?php echo $operation; ?></center></h4></p>
    <p>Date Executed: <?php echo $exe; ?>
    <p>Number of officers: <?php echo $officers; ?>
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
    var target = JSON.parse(document.getElementById('target').value);
    var checkpoints = JSON.parse(document.getElementById('checkpoints').value);
    function initMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: minZoomLevel,
    center: centeroftheearth ,
    mapTypeId: 'roadmap'
    });
   
    var marker = new google.maps.Marker({
          position: target,
          //icon: 'images/target1.png',
          map: map,
          title: 'Target Location'
    });
    
    for (var i = 0; i < checkpoints.length; i++) {
          var checkpoint = checkpoints[i];
          var markers = new google.maps.Marker({
            position: {lat: checkpoint[1], lng: checkpoint[2]},
            map: map,
          });
     
    }

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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1SFa75QzMfOtf7rudCh6RFgaNk6ptbzo&libraries=drawing&callback=initMap">
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
