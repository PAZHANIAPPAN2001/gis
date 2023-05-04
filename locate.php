<?php
/*$conn = pg_connect("host=localhost port=5432 dbname=templesdata user=postgres password=12345");
if (!$conn) {
    die("Failed to connect to the database");
}*/
include('connection.php');
$query = "SELECT templeid,temple_name, latitude, longitude FROM temple WHERE templeid = '$_POST[templeid]' OR  temple_name = '$_POST[templeid]' ";

$result = pg_query($conn, $query);
if (!$result) {
    die("Failed to retrieve destination information from the database");
}
$row = pg_fetch_assoc($result);
$latitude = $row["latitude"];
$longitude = $row["longitude"];
$temple_namee=$row["temple_name"];
$templeidd=$row["templeid"];
pg_close($conn);
?>

<html>

<head>
  <title>Geolocation</title>
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
                if (templeid !== ' '){
                $.ajax({
                    url: 'search1.php',
                    type: 'post',
                    data: { templeid: templeid,filter: filter },
                    success: function(data) {
                        $('#search_results').html(data);
                    }
                });
                }
                else{
                   $('#search_results').empty();
                    $('#search_results').hide();
                }
            });
            $(document).on('click','dropdown-item',function()
            {
              var item=$(this).text();
              $('#templeid').val(item);
              $('#search_results').empty();
              $('#search_results').hide();
            });
        });
    </script>
    <style> 
        li {list-style: none;}
    </style>
    <style>
     
      .input{
      height: 100%;
      width:24%;
      float: left;
      background-color: white;
      padding-top: 35px;
            border: 3px ;

     }
      .map{
      height: 100%;
      width:76%;
        box-shadow: 5px 2px 5px rgba(5, 9, 5, 5);

     }
     #popup-form {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 120px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
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
  width: 90px;
}

#tools #zoom {
  background-color: green;
  border: 1px solid #ccc;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
  padding-top: 35px;
  margin-bottom: 5px;
  padding: 5px;
  width: 150px;
}


#tools button:hover {
  background-color: #CC0000;
}
#result{
}
.label-icon {
  
  font-size: 8px;
  font-weight: bold;
  color: green;
  
}
#search_results{

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
  width: 120px;
}

  </style>

</head>

<?php include 'header1.php';?>

<body background="white" border="2"> 
  
    <div id="tools"><center><button id="zoom-in">Zoom In</button>
  <button id="zoom-out">Zoom Out</button>
    <button id="myButton">Pan</button>
    <button id="zoom" onclick="zoomToLocate()">Zoom to my Location</button>
    <button id="zoom" onclick="zoomToView()">TN View</button>

<button onclick="toggleDiv()">Search</button>
    <button id="zoom" onclick="showTemple()">Search by Radius</button>
</center>
</div><br>
  <div class="input" id="input" style="display:none;" >
  <form id="display" name="display" method="POST" >
<label for='POI'><b>Point Of Intrest:</b></label>
        <select name='temples' id='select' onchange="location=this.value;">
          <option value='dumpodump.php'>Temple</option>
          <option value='bank.php'>Bank</option>
          <option value='ATM.php'>ATM</option>
          <option value='Bloodbank.php'>Bloodbank</option>        
            <option value=""> Others </option>          
        </select><br><br><center>
        <select name="filter" id="filter" style="width: 170px">
          <option value="templeid">Temple ID</option>

            <option value="temple_name">Temple Name</option>
           
        </center></select><br><br>
      </b><input type="text" name="templeid" id="templeid" placeholder="search..."  autocomplete="off" required="off"/>
        </li></center>
        <center><div id="search_results" name="search_results"></div> </center> <br><BR>
        <center> </ul>
<br>
         <center>  </center>  <button id="hubline" onclick="drawHubLine(event);" style="float: left;">Search</button><button id="drawpath" style="display:none;" onclick="drawPath(event)" style="float: right;">Shortest Path</button><button id="refresh" onclick="location.reload()" >Refresh</button>
</center>
  </form>  <div id="result"></div>
</center><br><br><div id="routing-control"></div>
</div><div id="popup-form">
        <form name="popup-form" action="" method="post">
           POI ID:<input type="text" name="poi_id"><br>
           POI NAME:<input type="text" name="poi_name"><br><br>
    <input type="submit" name="create" value="Create">
</form>
          </div>


    <center><div id="map" class="map"></div>
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script type="text/javascript">
  function showText() {


   }
</script>
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
     //if browser support service worker
     // Define red icon
var redIcon = L.icon({
  iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  tooltipAnchor: [16, -28],
  shadowSize: [41, 41]
});

// Initialize map
var map = L.map('map').setView([11.1271, 78.6569], 7);

// Add base layer to map
var osm=L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
  maxZoom: 18
}).addTo(map);

var SatelliteView = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    attribution: 'Map data © Google Maps'
})


var StamenTerrain = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}', {
  attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  subdomains: 'abcd',
  minZoom: 0,
  maxZoom: 18,
  ext: 'png'
});





// Get current location
navigator.geolocation.getCurrentPosition(function(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
 
  // Create marker at current location
  var currentMarker = L.marker([lat, lng], { icon: redIcon }).addTo(map);

  // Create temporary layer group
  var currentLocation = L.layerGroup([currentMarker]);

  // Add temporary layer group to map
  currentLocation.addTo(map);
var baseMaps = {
  'Open Street Map':osm,
  'Satellite View': SatelliteView,
  'Terrain': StamenTerrain
};
  // Add temporary layer group to layer control
  var overlayLayers = {
    "Current Location": currentLocation,

  };
  var layerControl = L.control.layers(baseMaps, overlayLayers).addTo(map);
 
/*var button = L.control({position: 'topleft'});
  button.onAdd = function () {
    var div = L.DomUtil.create('div', 'leaflet-bar leaflet-control');
    div.innerHTML = '<button onclick="zoomToview()"><span class="fa fa-location-arrow" style="font-size: 26px;" ></span></button>';
    return div;
  };
  button.addTo(map);*/

       


});

</script>
<script type="text/javascript">
  function zoomToLocate()
  {
  navigator.geolocation.getCurrentPosition(function(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
 map.flyTo([lat,lng], 13)
});
  }
  function zoomToView(){
  map.flyTo([11.1271, 78.6569], 7);
}
</script>
<script>
 

              L.control.scale().addTo(map);

              // add north arrow control to map
// Add the north arrow image to the map
 // Change the right position
// Create the image element
var img = document.createElement('img');
img.src = 'north.jpeg';
img.style.width = '41px'; // Set the width of the image
img.style.height = '41px'; // Set the height of the image

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


/*var button1 = L.control({position: 'topleft'});
button1.onAdd = function (map) {
  var div1 = L.DomUtil.create('div', 'my-button');
  div1.innerHTML = '<button onclick="showHospital()"><img src="temple.jpeg" style="width: 25px; height: 30px; alt="Find hospitals"></button>';
  return div1;
  };
  button1.addTo(map);*/



   function showTemple(){
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
          iconUrl: 'om.png',
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
            var markert=L.marker([element.lat, element.lon], { icon: templeIcon }).addTo(map).bindPopup(element.tags.name);
              var templeLocation = L.layerGroup([markert]);
 
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


<script>
  document.getElementById("display").addEventListener("submit", function(event) {
    event.preventDefault(); // prevent the form from submitting
    // perform any additional actions here, such as AJAX calls
  });
</script>

 



  </script>
<script>
  function drawPath(event) {
  event.preventDefault();
  new Promise((resolve, reject) => {
    navigator.geolocation.getCurrentPosition(resolve, reject);
  }).then(function(position) {
    var currentLatLng = L.latLng(position.coords.latitude, position.coords.longitude);
 var destLatLng= L.latLng([<?php echo $latitude; ?>, <?php echo $longitude; ?>])

    // Set the waypoints for the routing control
    var waypoints = [
      currentLatLng,
      destLatLng // Replace with your destination lat/lng from your database
    ];

    // Add the routing control to the map
    var routingControl = L.Routing.control({
      waypoints: waypoints
    });
    routingControl.addTo(map);
    $('#routing-control').append(routingControl.onAdd(map));

    // Add the markers to the map
    var currentMarker = L.marker(currentLatLng, {icon: redIcon}, { draggable: false }).addTo(map);
    var destMarker = L.marker(destLatLng, { draggable: false });
                destMarker.bindPopup('<?php echo $temple_namee; ?>').openPopup();
                destMarker.addTo(map);


    map.setView([11.1271, 78.6569], 7);
  }).catch(function(error) {
    console.error(error);
  });
}


  </script>
    <script type="text/javascript">
     var marker = null;
var hubLine = null;

function drawHubLine(event) {
  event.preventDefault()

     var drawpath = document.getElementById("drawpath");
  drawpath.style.display = "block";
        var drawpath1 = document.getElementById("search_results");
  drawpath1.style.display = "none";
 
    //remove previous marker and polyline if they exist
    //if (marker) {
    //    map.removeLayer(marker);
    //}
    //if (hubLine) {
    //    map.removeLayer(hubLine);
    //}
         var marker=L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]);
             marker.bindPopup('<?php echo $temple_namee; ?>').openPopup();

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
            html: + aerialDistance.toFixed(2) + ' kilometers.',
            iconSize: [300, 30],
            iconAnchor: [150, 0]
          });

          // create a marker for the label at the midpoint of the hub line
         var labelMarker = L.marker(hubLine.getCenter(), {icon: labelIcon}).addTo(map);
          labelMarker.bindPopup(<?php echo $temple_name; ?>);

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
<script>
    const selectOption = document.getElementById('select');
    const popupForm = document.getElementById('popup-form');

    selectOption.addEventListener('change', function() {
    if (this.value === 'other') {
            popupForm.style.display = 'block';
          } else {
            popupForm.style.display = 'none';
          }
        });
  </script>
</body>
<?php include 'footer.php';?>

</html>