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

    </script>
  <style>
  #map{
       width: 100%;
       height: 550px; 
       margin: auto;
       }
  #target{
    visibility: hidden;

  }
  #checkpoints{
    visibility: hidden;
  }
  </style>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous">
      </script>


  </head>

  <body>
    <span id="target"></span>
    <span id="checkpoints" ></span>
    <div class="navbar navbar-fixed-top" style="margin-top:-80px;">
      <center><img src="images/header.png" style="width:400px;"></center>
    </div>

    <div class="container">
    <p><h4><center>Operation :<span id="operation_name"></span></center></h4></p>
    <p>Date Executed: <span id="date_executed"></span>
    <p>Number of officers: <span id="num_officers"></span>
    <div id="map" ></div>
    <div id="formradius">
    <input type="number" id="radiussize">
    <button onClick="release()">Coordinates</button>
    </div>
    </div><!-- /.container -->
    <script src="js/boundary.js"></script>
    <script type="text/javascript">
  function getUrl(){
      var url = window.location.href;
      var start = url.indexOf('=')+1;
      var id = url.substring(start);
      return id;
    };
    // window.onLoad = getUrl();
    var oppId = getUrl();
    var target;
  
    $.ajax({
    type: "POST",
    url: "https://interceptorpnp.000webhostapp.com/mobile_map_renderingajax.php",
    data: {
    id: oppId,
        },
        success: function(msg){
          var parsed = JSON.parse(msg);
          target = parsed.target;
          checkpoint = parsed.checkpoints;
          document.getElementById('operation_name').innerHTML = parsed.name;
          document.getElementById('date_executed').innerHTML = parsed.date_execute;
          document.getElementById('num_officers').innerHTML = parsed.officers;
        }
        });
    var minZoomLevel = 15;
    var centeroftheearth = {lat: 14.600353, lng: 121.036745};    
    var map;
    var markers = [];

    function initMap(){
    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: minZoomLevel,
    center: centeroftheearth ,
    mapTypeId: 'roadmap'
    });

    var boundary = new google.maps.Polygon({paths: boundaries});
    
    var boundaryLine = new google.maps.Polyline({
          path: boundaries,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

    boundaryLine.setMap(map);

     var searchUrl = 'mobile_target_marker.php?id=' + getUrl();
    downloadUrl('https://interceptorpnp.000webhostapp.com/mobile_target_marker.php/?id='+getUrl(), function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('operation_id');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = name
              infowincontent.appendChild(text);
              var marker = new google.maps.Marker({
                map: map,
                position: point,
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
     downloadUrl('https://interceptorpnp.000webhostapp.com/mobile_checkpoints_target.php/?id='+getUrl(), function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('operation_id');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = name
              infowincontent.appendChild(text);
              var marker = new google.maps.Marker({
                map: map,
                position: point,
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
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
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
