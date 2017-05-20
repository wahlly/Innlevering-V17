<script>
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: new google.maps.LatLng(59.917376, 10.756401),
    mapTypeId: 'roadmap'
  });

  var allowedBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(59.899227, 10.701060),
  new google.maps.LatLng(59.925699, 10.777372)
);
// Listen for the dragend event
  google.maps.event.addListener(map, 'dragend', function() {
    if (allowedBounds.contains(map.getCenter())) return;

    // Out of bounds - Move the map back within the bounds

    var c = map.getCenter(),
        x = c.lng(),
        y = c.lat(),
        maxX = allowedBounds.getNorthEast().lng(),
        maxY = allowedBounds.getNorthEast().lat(),
        minX = allowedBounds.getSouthWest().lng(),
        minY = allowedBounds.getSouthWest().lat();

    if (x < minX) x = minX;
    if (x > maxX) x = maxX;
    if (y < minY) y = minY;
    if (y > maxY) y = maxY;

    map.setCenter(new google.maps.LatLng(y, x));
  });

  // Limit the zoom level
  google.maps.event.addListener(map, 'zoom_changed', function() {
    if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
  });

  var myStyles =[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
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
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
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
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#c3e99b"
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
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
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
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
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#7699da"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
];
  map.setOptions({
    draggable: true,
    panControl: false,
    disableDefaultUI: true,
    styles: myStyles,
    minZoom: 14,
    zoomControl: true,
    scrollwheel: false

  });

  var iconBase = '../../img/img_layout/layout_icons/';
  var icons = {
    utesteder: {
      icon: iconBase + 'poi_purple_min.png'
    },
    spisesteder: {
      icon: iconBase + 'poi_blue_min.png'
    },
    informasjon: {
      icon: iconBase + 'poi_red_min.png'
    },
    studiesteder: {
      icon: iconBase + 'poi_yellow_min.png'
    },
    skole: {
      icon: iconBase + 'poi_skole_poi.png'
    }
  };




  //DATABASEMAT
<?php include './assets/connection.php' ?>
  <?php

//Henter spisesteds lokasjoner
  $sql = "SELECT simplename, googlemaps
  FROM spisested
  INNER JOIN sted ON spisested.Plass_Id = sted.Id";
  $result = $conn->query($sql);
  $googlemapsSPG = array();
  $googlemapsSPS = array();
  $i = 0;
  if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $googlemapsSPG[$i] = $row["googlemaps"];
         $googlemapsSPS[$i] = $row["simplename"];
         $i++;
     }
  }
  //Slutt Henter spisesteds lokasjoner

//Henter studiested lokasjoner
  $sql = "SELECT simplename, googlemaps
  FROM studiested
  INNER JOIN sted ON studiested.Studie_id = sted.Id";
  $result = $conn->query($sql);
  $googlemapsSTG = array();
  $googlemapsSTS = array();
  $i = 0;
  if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $googlemapsSTG[$i] = $row["googlemaps"];
         $googlemapsSTS[$i] = $row["simplename"];
         $i++;
     }
  }
  //Slutt Henter studiested lokasjoner

  //Henter utesteds lokasjoner
    $sql = "SELECT simplename, googlemaps
    FROM utested
    INNER JOIN sted ON utested.Ute_id = sted.Id";
    $result = $conn->query($sql);
    $googlemapsUTG = array();
    $googlemapsUTS = array();
    $i = 0;
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $googlemapsUTG[$i] = $row["googlemaps"];
           $googlemapsUTS[$i] = $row["simplename"];
           $i++;
       }
    }
    //Slutt Henter spisesteds lokasjoner

    //Henter utesteds lokasjoner
      $sql = "SELECT simplename, googlemaps
      FROM sted";
      $result = $conn->query($sql);
      $googlemapsING = array();
      $googlemapsINS = array();
      $i = 0;
      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $googlemapsING[$i] = $row["googlemaps"];
             $googlemapsINS[$i] = $row["simplename"];
             $i++;
         }
      }
      //Slutt Henter spisesteds lokasjoner

  $conn->close();
  if(strpos($_SERVER[REQUEST_URI], '?IR') || (strpos($_SERVER[REQUEST_URI], '?closeIR')) ){
$arrlength = count($googlemapsSPG);
  for($x = 0; $x < $arrlength; $x++) {
echo "var SP$googlemapsSPS[$x] = new google.maps.Marker({\n";
echo "      position: new google.maps.LatLng(\n";
echo $googlemapsSPG[$x];
echo "      ),\n";
echo "      icon: icons['spisesteder'].icon,\n";
echo "      map: map\n";
echo "    });\n";

  }
}


elseif(strpos($_SERVER[REQUEST_URI], '?IS') || (strpos($_SERVER[REQUEST_URI], '?closeIS')) ){
  $arrlength = count($googlemapsSTG);
  for($x = 0; $x < $arrlength; $x++) {
    echo "var ST$googlemapsSTS[$x] = new google.maps.Marker({\n";
    echo "      position: new google.maps.LatLng(\n";
    echo $googlemapsSTG[$x];
    echo "      ),\n";
    echo "      icon: icons['studiesteder'].icon,\n";
    echo "      map: map\n";
    echo "    });\n";
  }
}
elseif(strpos($_SERVER[REQUEST_URI], '?IU') || (strpos($_SERVER[REQUEST_URI], '?closeIU')) ){
  $arrlength = count($googlemapsUTG);
  for($x = 0; $x < $arrlength; $x++) {

    echo "var UT$googlemapsUTS[$x] = new google.maps.Marker({\n";
    echo "      position: new google.maps.LatLng(\n";
    echo $googlemapsUTG[$x];
    echo "      ),\n";
    echo "      icon: icons['utesteder'].icon,\n";
    echo "      map: map\n";
    echo "    });\n";

  }
}
elseif(isset($_POST['sprtybutton'])){
  $arrlength = count($googlemapsING);
  for($x = 0; $x < $arrlength; $x++) {

    echo "var IN$googlemapsINS[$x] = new google.maps.Marker({\n";
    echo "      position: new google.maps.LatLng(\n";
    echo $googlemapsING[$x];
    echo "      ),\n";
    echo "      icon: icons['informasjon'].icon,\n";
    echo "      map: map\n";
    echo "    });\n";

  }
}
else{
  $arrlength = count($googlemapsING);
  for($x = 0; $x < $arrlength; $x++) {

    echo "var IN$googlemapsINS[$x] = new google.maps.Marker({\n";
    echo "      position: new google.maps.LatLng(\n";
    echo $googlemapsING[$x];
    echo "      ),\n";
    echo "      icon: icons['informasjon'].icon,\n";
    echo "      map: map\n";
    echo "    });\n";

  }
}
  ?>
var fjerdingen = new google.maps.Marker({
position: new google.maps.LatLng(59.916237, 10.760186),
icon: icons['skole'].icon,
map: map
});

var vulkan = new google.maps.Marker({
position: new google.maps.LatLng(59.923320, 10.752175),
icon: icons['skole'].icon,
map: map
});


//DATABASEMAT


  // Create markers.

  //DATABASEMAT
<?php include './assets/connection.php' ?>
  <?php

//Gjør spisested markørene klikkbare
$sql = "SELECT simplename
FROM spisested
INNER JOIN sted ON spisested.Plass_Id = sted.Id";
$result = $conn->query($sql);
$markerSP = array();
$i = 0;
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $markerSP[$i] = $row["simplename"];
       $i++;
   }
}
//Slutt Gjør spisested markørene klikkbare

//Gjør studiested markørene klikkbare
$sql = "SELECT simplename
FROM studiested
INNER JOIN sted ON studiested.Studie_id = sted.Id";
$result = $conn->query($sql);
$markerST = array();
$i = 0;
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $markerST[$i] = $row["simplename"];
       $i++;
   }
}
//Slutt Gjør studiested markørene klikkbare

//Gjør utested markørene klikkbare
$sql = "SELECT simplename
FROM utested
INNER JOIN sted ON utested.Ute_id = sted.Id";
$result = $conn->query($sql);
$markerUT = array();
$i = 0;
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $markerUT[$i] = $row["simplename"];
       $i++;
   }
}
//Slutt Gjør utested markørene klikkbare
//Gjør informasjon markørene klikkbare
$sql = "SELECT simplename
FROM sted";
$result = $conn->query($sql);
$markerIN = array();
$i = 0;
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $markerIN[$i] = $row["simplename"];
       $i++;
   }
}
//Slutt Gjør informasjon markørene klikkbare

$conn->close();

  if(strpos($_SERVER[REQUEST_URI], '?IR') || (strpos($_SERVER[REQUEST_URI], '?closeIR')) ){
$arrlength = count($markerSP);
for($x = 0; $x < $arrlength; $x++) {
echo "google.maps.event.addDomListener(SP$markerSP[$x], 'click', function() {\n";
echo "window.location.href = '?IR=SP&simplename=$markerSP[$x]#kartet';\n";
echo "});\n";
}
}
elseif(strpos($_SERVER[REQUEST_URI], '?IS') || (strpos($_SERVER[REQUEST_URI], '?closeIS')) ){
$arrlength = count($markerST);
for($x = 0; $x < $arrlength; $x++) {
echo "google.maps.event.addDomListener(ST$markerST[$x], 'click', function() {\n";
echo "window.location.href = '?IS=ST&simplename=$markerST[$x]#kartet';\n";
echo "});\n";
}
}
elseif(strpos($_SERVER[REQUEST_URI], '?IU') || (strpos($_SERVER[REQUEST_URI], '?closeIU')) ){
$arrlength = count($markerUT);
for($x = 0; $x < $arrlength; $x++) {
echo "google.maps.event.addDomListener(UT$markerUT[$x], 'click', function() {\n";
echo "window.location.href = '?IU=UT&simplename=$markerUT[$x]#kartet';\n";
echo "});\n";
}
}
elseif(isset($_POST['sprtybutton'])){
$arrlength = count($markerIN);
for($x = 0; $x < $arrlength; $x++) {
echo "google.maps.event.addDomListener(IN$markerIN[$x], 'click', function() {\n";
echo "window.location.href = '?II=IN&simplename=$markerIN[$x]#kartet';\n";
echo "});\n";
}
}
else{
$arrlength = count($markerIN);
for($x = 0; $x < $arrlength; $x++) {
echo "google.maps.event.addDomListener(IN$markerIN[$x], 'click', function() {\n";
echo "window.location.href = '../../pages/infoside.php?simplename=$markerIN[$x]';\n";
echo "});\n";
}
}

?>
//DATABASEMAT

  //DATABASEMAT
}
</script>
