<script>
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: new google.maps.LatLng(59.917376, 10.756401),
    mapTypeId: 'roadmap'
  });
  var myStyles =[
{
"featureType": "administrative",
"elementType": "geometry",
"stylers": [
{
  "visibility": "off"
}
]
},
{
"featureType": "poi",
"stylers": [
{
  "visibility": "off"
}
]
},
{
"featureType": "road",
"elementType": "labels.icon",
"stylers": [
{
  "visibility": "off"
}
]
},
{
"featureType": "transit",
"stylers": [
{
  "visibility": "off"
}
]
}
];
  map.setOptions({
    draggable: true,
    panControl: false,
    disableDefaultUI: true,
    styles: myStyles
  });

  var iconBase = '../../img/img_layout/layout_icons/';
  var icons = {
    utesteder: {
      icon: iconBase + 'poi_purple_min.png'
    },
    spisesteder: {
      icon: iconBase + 'poi_blue_min.png'
    },
    studiesteder: {
      icon: iconBase + 'poi_yellow_min.png'
    }
  };




  //DATABASEMAT
  <?php
  $servername = "martinwahlberg.no.mysql";
  $username = "martinwahlberg_no_westerdals_";
  $password = "westerdals123";
  $dbname = "martinwahlberg_no_westerdals_";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT googlemaps FROM sted";
  $result = $conn->query($sql);
  $googlemaps = array();
  $i = 0;
  if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $googlemaps[$i] = $row["googlemaps"];
         $i++;
     }
  } else {
     echo "0 results";
  }
  $conn->close();
  $arrlength = count($googlemaps);
  for($x = 0; $x < $arrlength; $x++) {
    echo $googlemaps[$x];

  }
  ?>

//DATABASEMAT


  // Create markers.

  //DATABASEMAT

  <?php
$servername = "martinwahlberg.no.mysql";
$username = "martinwahlberg_no_westerdals_";
$password = "westerdals123";
$dbname = "martinwahlberg_no_westerdals_";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT marker FROM sted";
$result = $conn->query($sql);
$marker = array();
$i = 0;
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $marker[$i] = $row["marker"];
       $i++;
   }
} else {
   echo "0 results";
}
$conn->close();
$arrlength = count($marker);
for($x = 0; $x < $arrlength; $x++) {
  echo $marker[$x];

}
?>
//DATABASEMAT

  //DATABASEMAT
}
</script>
