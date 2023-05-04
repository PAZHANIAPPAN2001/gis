<?php
include('connection.php');
$query = "SELECT latitude, longitude FROM temple WHERE templeid = '$_POST[templeid]' OR  temple_name = '$_POST[templeid]' ";

$result = pg_query($conn, $query);
if (!$result) {
    die("Failed to retrieve destination information from the database");
}
$row = pg_fetch_assoc($result);
$latitude = $row["latitude"];
$longitude = $row["longitude"];
pg_close($conn);
?>

<html>

<head>
  <title>Bank</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Leaflet CSS -->


<!-- leaflet-northarrow CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-northarrow/dist/leaflet-northarrow.min.css" />

<!-- Leaflet JavaScript -->

<!-- leaflet-northarrow JavaScript -->
<script src="https://unpkg.com/leaflet-northarrow/dist/leaflet-northarrow.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#templeid').keyup(function() {
                var templeid = $(this).val();
                var filter = $('#filter').val();

                $.ajax({
                    url: 'search1.php',
                    type: 'post',
                    data: { templeid: templeid,filter: filter },
                    success: function(response) {
                        $('#search_results').html(response);
                    }
                });
            });
        });
    </script>
    <style> 
        li {list-style: none;}
    </style>
    <style>
     
      .input{
      height: 83%;
      width:24%;
      float: left;
      background-color: white;
      padding-top: 35px;
            border: 3px ;

     }
      .map{
      height: 83%;
      width:76%;
        box-shadow: 5px 2px 5px rgba(5, 9, 5, 5);

     }
    </style>
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    .leaflet-control-scale {
  background-color: #fff;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-shadow: 0 1px 5px rgba(0,0,0,0.4);
  font-family: 'Helvetica Neue', Arial, sans-serif;
  font-size: 12px;
  line-height: 1.5;
  padding: 5px;
  text-align: center;
}
#tools{
      width:100%;
      float: right;
      background-color: #f2f2f2;
      padding-top: 10px;
     }
     #tools button {
  background-color: green;
  border: 1px solid #ccc;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
  padding-top: 35px;
  margin-bottom: 5px;
  padding: 5px;
  width: 80px;
}
#tools {
}


#tools button:hover {
  background-color: #CC0000;
}
#result{
}
.label-icon {
  text-align: center;
  font-size: 8px;
  font-weight: bold;
  color: white;
  background-color: black;
  border-radius: 5px;
  padding: 5px;
}

.input{
  text-align: left;
  padding-left: 40px;
}
#input button{
 background-color: green;
  border: 1px solid #ccc;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
  padding-top: 35px;
  margin-bottom: 5px;
  padding: 5px;
  width: 80px;
}

  </style>

</head>

<?php include 'header.php';?>

<body background="white" border="2"> 
  
    <div id="tools"><center><button id="zoom-in">Zoom In</button>
  <button id="zoom-out">Zoom Out</button>
    <button id="myButton">Pane</button>
<button onclick="toggleDiv()">Search</button>
</center>
</div><br>
  <div class="input" id="input" style="display: none">
  <form name="display" method="POST" action=" ">
<label for='POI'><b>Point Of Intrest:</b></label>
        <select name='temples' id='select' onchange="location=this.value;">
                    <option value='bank.php'>Bank</option>

          <option value='web.php'>Temple</option>
          <option value='ATM.php'>ATM</option>
          <option value='Bloodbank.php'>Bloodbank</option>
        </select><br><br>
       <li><b>Bank ID:</b><input type="text" name="templeid" id="templeid" placeholder="search..."  autocomplete="on" required>
         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="filter" id="filter">
          <option value="templeid">bank ID</option>

            <option value="temple_name">Bank Name</option>
           
        </select></li></center><br><br>
        <div id="search_results" name="search_results"></div>  
        <center> <button id="drawpath" onclick="drawPath(event);innerButtonClick(event)">Shortest Path</button></ul></form>      <button id="hubline" onclick="drawHubLine(event);innerButtonClick(event)">Aerial Distance</button><br><br>   <div id="result"></div>
</center><br><br><div id="routing-control"></div>
</div>


    <center><div id="map" class="map"></div>
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<script type="text/javascript">// Get a reference to the map element


// Get a reference to the zoom in and zoom out buttons
var zoomInButton = document.getElementById('zoom-in');
var zoomOutButton = document.getElementById('zoom-out');

// Add event listeners to the buttons
zoomInButton.addEventListener('click', function() {
  map.zoomIn();
});

zoomOutButton.addEventListener('click', function() {
  map.zoomOut();
});

map.createPane('myPane');
    var myPane = map.getPane('myPane');

    // add button to pane
    var myButton = document.getElementById('myButton');
    myPane.appendChild(myButton);

    // add event listener to button
    myButton.addEventListener('click', function() {
      alert('Button clicked!');
    });
</script>
<script type="text/javascript">
  function toggleDiv() {
  var div = document.getElementById("input");
  if (div.style.display === "none") {
    div.style.display = "block";
  }
  else{
    div.style.display = "none";
  }
}
function innerButtonClick(event) {
  event.stopPropagation();
  // add your button's functionality here
}

</script>
  <script>

    var map = L.map('map').setView([11.1271, 78.6569], 7);
    mapLink = "<a href='http://openstreetmap.org'></a>";
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: '' + mapLink + '',
  minZoom: 5,
  maxZoom: 20 }).addTo(map);

              L.control.scale().addTo(map);

              // add north arrow control to map
// Add the north arrow image to the map
 // Change the right position
// Create the image element
var img = document.createElement('img');
img.src = 'north.jpeg';
img.style.width = '50px'; // Set the width of the image
img.style.height = '50px'; // Set the height of the image

// Create the control
var imgControl = L.Control.extend({
    options: {
        position: 'topright' // Set the position of the control
    },

    onAdd: function (map) {
        // Create a container for the image
        var container = L.DomUtil.create('div', 'leaflet-bar leaflet-control');

        // Add the image to the container
        container.appendChild(img);

        return container;
    }
});

// Add the control to the map
map.addControl(new imgControl());


var button1 = L.control({position: 'topright'});
button1.onAdd = function (map) {
  var div1 = L.DomUtil.create('div', 'my-button');
  div1.innerHTML = '<button onclick="showHospital()"><img src="temple.jpeg" style="width: 30px; height: 30px; alt="Find hospitals"></button>';
  return div1;
  };
  button1.addTo(map);



   function showHospital(){
    // Get the user's current location
   
  // Get the user's current location
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(onSuccess, onError);
  } else {
    alert("Geolocation is not supported by this browser.");
  }

  // Handle the geolocation success callback
  function onSuccess(position) {
    // Get the latitude and longitude of the user's current position
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    // Set the map view to the user's current location
    map.setView([lat, lon], 13);

    var redIcon = L.icon({
      iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      tooltipAnchor: [16, -28],
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
      shadowSize: [41, 41],
      shadowAnchor: [12, 41]
    });

    // Add a marker for the user's location
    L.marker([lat, lon], { icon: redIcon }).addTo(map).bindPopup('You are here.');

    // Define the OpenStreetMap API query to retrieve temple data within a specified radius from the user's location
    var radius = prompt("Enter the radius in meters:", "5000"); // Prompt the user to enter the radius
    var query = `[out:json];
        (
          node["amenity"="place_of_worship"]["religion"="hindu"](around:${radius},${lat},${lon});
          way["amenity"="place_of_worship"]["religion"="hindu"](around:${radius},${lat},${lon});
          relation["amenity"="place_of_worship"]["religion"="hindu"](around:${radius},${lat},${lon});
        );
        out center;`;
  var circle=L.circle([lat, lon], {
                radius: parseInt(radius),
                color: 'red',
                fillOpacity: 0.1
            });
      circle.addTo(map);
    // Send the OpenStreetMap API request
    var url = "https://overpass-api.de/api/interpreter?data=" + encodeURIComponent(query);
    fetch(url)
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        // Define the temple icon
        var templeIcon = L.icon({
          iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          tooltipAnchor: [16, -28],
          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
          shadowSize: [41, 41],
          shadowAnchor: [12, 41]
        });

        // Add the temple markers to the map
        for (var i = 0; i < data.elements.length; i++) {
          var element = data.elements[i];
          if (element.type == "node") {
            L.marker([element.lat, element.lon], { icon: templeIcon }).addTo(map).bindPopup(element.tags.name);
          } else if (element.type == "way" || element.type == "relation") {

                    L.polyline(element.geometry.map(function(coord) { return [coord.lat, coord.lon]; })).addTo(map).bindPopup(element.tags.name);
                }
            }

            // Add a circle around the user's location to indicate the radius
            
        })
        .catch(function(error) {
            console.error("Error fetching hospital data:", error);
        });
    }

    // Handle the geolocation error callback
    function onError(error) {
        alert("Error getting your location: " + error.message);
    }

    // Define the hospital icon
    var hospitalIcon = L.icon({
        iconUrl: 'temple.jpeg',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
    iconSize: [31, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});


// Loop through the hospital data and add markers with the custom icon
for (var i = 0; i < hospitals.length; i++) {
    var hospital = hospitals[i];
    L.marker([hospital.lat, hospital.lng], {icon: hospitalIcon}).addTo(map)
        .bindPopup("<b>" + hospital.name + "</b><br>" + hospital.address);

}

}

  L.control.northArrow().addTo(map);

// Customize the position of the arrow image
var northArrow = document.querySelector('.leaflet-north-arrow');
northArrow.style.bottom = '50px'; // Change the bottom position
northArrow.style.right = '50px';
 
  </script>
  <script>
// Get current position
navigator.geolocation.getCurrentPosition(function(position) {
  var latlng = L.latLng(position.coords.latitude, position.coords.longitude);

  // Create marker
var redIcon = L.icon({
    iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28],
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
    shadowSize: [41, 41],
    shadowAnchor: [12, 41]
});
  var markerr = L.marker(latlng,{icon: redIcon});

  // Create circle
  
  // Create layer group
  var layerGroup = L.layerGroup([markerr]);

  // Add layer group to map
  map.addLayer(layerGroup);


function zoomToLocation() {
    map.flyTo(latlng,16);
  }

  // get current location
  // Add button to zoom to current location
  var button = L.control({position: 'topright'});
  button.onAdd = function () {
    var div = L.DomUtil.create('div', 'leaflet-bar leaflet-control');
    div.innerHTML = '<button onclick="zoomToLocation()"><span class="fa fa-location-arrow" style="font-size: 26px;" ></span></button>';
    return div;
  };
  button.addTo(map);

  

});


  </script>
<script>
    function drawPath(event) {
      event.preventDefault(); // Prevent the page from refreshing

      new Promise((resolve, reject) => {
        navigator.geolocation.getCurrentPosition(resolve, reject);
      }).then(function(position) {
        var currentLatLng = L.latLng(position.coords.latitude, position.coords.longitude);

        // Set the waypoints for the routing control
        var waypoints = [
          currentLatLng, // Replace with your destination lat/lng from your database
          L.latLng([<?php echo $latitude; ?>, <?php echo $longitude; ?>])
        ];

        // Add the routing control to the map
        var routingControl = L.Routing.control({
          waypoints: waypoints
        });
        routingControl.addTo(map);
        $('#routing-control').append(routingControl.onAdd(map));

        map.setView([11.1271, 78.6569], 7);
      }).catch(function(error) {
        console.error(error);
      });
    }
  </script>
    <script type="text/javascript">
      function drawHubLine(event) {
              event.preventDefault(); // Prevent the page from refreshing

         var marker=L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]);
             marker.bindPopup('id').openPopup();

    marker.addTo(map);
  navigator.geolocation.getCurrentPosition(function (position) {
    var currentLat = position.coords.latitude;
    var currentLng = position.coords.longitude;
    
    // specify destination location
    var destLat = <?php echo $latitude; ?>;
    var destLng = <?php echo $longitude; ?>;
    
    var currentLatLng = L.latLng(currentLat, currentLng);
    var destLatLng = L.latLng(destLat, destLng);

    // draw hub line on the map
    var hubLine = L.polyline([currentLatLng, destLatLng], {color: 'red'}).addTo(map);
   var aerialDistance = currentLatLng.distanceTo(destLatLng)/1000;

          // display the result on the page
           var labelIcon = L.divIcon({
            className: 'label-icon',
            html: 'The distance between your location and the destination is ' + aerialDistance.toFixed(2) + ' kilometers.',
            iconSize: [300, 30],
            iconAnchor: [150, 0]
          });

          // create a marker for the label at the midpoint of the hub line
         var labelMarker = L.marker(hubLine.getCenter(), {icon: labelIcon}).addTo(map);
          labelMarker.bindPopup(labelIcon);
          labelMarker.openPopup();
        
        });
      }

    </script>
<script type="text/javascript">// Create a button
/*var button = L.control({position: 'topright'});
button.onAdd = function () {
    var div = L.DomUtil.create('div', 'leaflet-bar leaflet-control');
    div.innerHTML = '<button onclick="zoomToLocation()">Zoom to my location</button>';
    return div;
};
button.addTo(map);

// Function to zoom to current location
function zoomToLocation() {
    map.setView(latlng, 13);
}
</script>

</body>
<?php include 'footer.php';?>

</html>