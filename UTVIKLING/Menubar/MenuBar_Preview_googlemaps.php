
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/menubar.css">
  <link rel="stylesheet" href="../../css/filter_menu.css">
<style>

body {background-color: white;}

#container_main{
  position: absolute;
    top: 0%;
    left: 0%;
    width:100%;
    height: 100%
}

#menubar_container {
  position: absolute;
    top: 0%;
    left: 0%;
    width:100%;
    height: 170px;
    margin: 0;


}

#btttnrow_container {
    left: 65%;
    top: 85%;
    margin: 0;


  }

  #Cafe_Sara_Info{
    position: absolute;
    top: 25%;
    left: 25%;
    height: 50%;
    width: 50%;
    background-color: white;



  }

  #map {
          position: absolute;
          height: 100%;
          width: 100%;
        }

        #imgmap {
            position: absolute;
            top: 10%;
            left: 0%;
            width: 100%;
            height: 90%;

          }
          #kartet {
              position: absolute;
              top: 0%;
              left: 0%;
              width: 100%;
              height: 90%;
            }

          /* Henter inn posisjonene til alle de forskjellige nålene */
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

        $sql = "SELECT css_pososv FROM sted";
        $result = $conn->query($sql);
        $css_pososv = array();
        $i = 0;
        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                 $css_pososv[$i] = $row["css_pososv"];
                 $i++;
             }
        } else {
             echo "0 results";
        }
        $conn->close();
        $arrlength = count($css_pososv);
        for($x = 0; $x < $arrlength; $x++) {
            echo $css_pososv[$x];

        }
        ?>
          /* Her avsluttes innhentingen av alle posisjonen til de forskjellige nålene */
            #poi{
              position: absolute;
              height: 100%;
              width: 50%;
            }

</style>

</head>

<body>

<!--Liten advarsel om å snu telefonen -->
 <script> if(window.innerHeight > window.innerWidth){
  alert("Vend telefonen til landskapsmodus for å bruke denne siden!");
}

</script>
 <!-- Slutt på advarselen -->


  <div id="container_main">

  <div id="imgmap">
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
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
          restauranter: {
            icon: iconBase + 'poi_blue_min.png'
          },
          studiesteder: {
            icon: iconBase + 'poi_yellow_min.png'
          }
        };

        var features = [
          {
            position: new google.maps.LatLng(59.917634, 10.754037),
            type: 'utesteder'
          },  {
            position: new google.maps.LatLng(59.917128, 10.754842),
            type: 'restauranter'
          }, {
            position: new google.maps.LatLng(59.916214, 10.751923),
            type: 'studiesteder'
          }
        ];


        //DATABASEMAT
        var testmark = new google.maps.Marker({
          position: new google.maps.LatLng(59.916214, 10.750923),
          icon: icons['restauranter'].icon,
          map: map
        });

//DATABASEMAT


        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });


        });
        //DATABASEMAT
        google.maps.event.addDomListener(testmark, 'click', function() {
    window.location.href = '?cafesara';
});
        //DATABASEMAT
      }
    </script>


    </div>


  <!-- DATABASEMAT -->


  <?php
  if (strpos($_SERVER[REQUEST_URI], '?cafesara')) { // returns false if '?' isn't there
      //Has query params
echo "<div id=\"Cafe_Sara_Info\"> \n";
echo "<h1>\n";
echo "Cafe Sara\n";
echo "</h1>\n";
echo "</div>\n";
}
?>

  <!-- DATABASEMAT -->



 <form  method="post">
   <input type="hidden" name="txt" value="<?php if(isset($message)){ echo $message;}?>" >
  <div id="btttnrow_container">


  <div id="prtybutton_container">
  <input type="image" name="prtybutton" value="prtybutton" src="../../img/img_layout/layout_icons/ol.png" id="Prtybutton_icn"/>
  </div>



  <div id="stdybutton_container">
  <input type="image" name="stdybutton" value="stdybutton" src="../../img/img_layout/layout_icons/les.png" id="stdybutton_icn">
  </div>



  <div id="eatybutton_container">
  <input type="image" name="eatybutton" value="eatybutton" src="../../img/img_layout/layout_icons/burger.png" id="eatybutton_icn">
  </div>



  <div id="sprtybutton_container">
  <input type="image" name="sprtybutton" value="sprtybutton" src="../../img/img_layout/layout_icons/tren.png" id="sprtybutton_icn"/>
  </div>

  </div>
  </form>
  </div>
  <div id="menubar_container">

    <a href="#Barer">
    <div id="Bar_menu_element_bg">
      <h3 id="Menu_text">BARER</h3>
      <div id="Bar_menu_element_line">
      </div>
    </div>
    <div id="Hjem_menu_logo_bar_box">
      <img id="Hjem_menu_logo_wht" src="../../img/img_layout/layout_menubar/w_logo_wht.png"/>
    <img id="Hjem_menu_logo_bar" src="../../img/img_layout/layout_menubar/w_logo_prpl.png"/>
    </div>
  </a>

   <a href="#Restaurant">
    <div id="Restaurant_menu_element_bg">
      <h3 id="Menu_text">RESTAURANTER</h3>
      <div id="Restaurant_menu_element_line">
      </div>
    </div>
    <div id="Hjem_menu_logo_rest_box">
      <img id="Hjem_menu_logo_wht" src="../../img/img_layout/layout_menubar/w_logo_wht.png"/>
    <img id="Hjem_menu_logo_rest" src="../../img/img_layout/layout_menubar/w_logo_ble.png"/>
    </div>
  </a>

    <a href="#Hjem">
    <div id="Hjem_menu_element_bg"></div>
    <div id="Hjem_menu_element_extend">
      <div id="Hjem_Trapes_Farge"></div>
      <div id="Hjem_Linje_farge"></div>
      <div id="Hjem_Trapes_Hvit"></div>
      <div id="Hjem_Linje_Hoyre"></div>
      <div id="Hjem_Linje_hvit"></div>

    </div>
    <div id="Hjem_menu_element_border"></div>
    <div id="Hjem_menu_logo_box">
      <img id="Hjem_menu_logo" src="../../img/img_layout/layout_menubar/w_logo.png"/>
    </div>
  </a>

    <a href="#Studere">
    <div id="Studere_menu_element_bg">
      <h3 id="Menu_text">STUDERE</h3>
      <div id="Studere_menu_element_line">
      </div>
    </div>
    <div id="Hjem_menu_logo_stud_box">
      <img id="Hjem_menu_logo_wht" src="../../img/img_layout/layout_menubar/w_logo_wht.png"/>
    <img id="Hjem_menu_logo_stud" src="../../img/img_layout/layout_menubar/w_logo_ylw.png"/>
    </div>
  </a>

  <div id="Sok_menu_element_bg">
    <div id="search-box-wrapper">
        <input type="text" placeholder="Hvor vil du?" id="search-box-input">
        <input id="search-box-button" type="image" src="../../img/img_layout/layout_icons/search.png" />
    </div>
    <div id="Sok_menu_element_line"></div>
  </div>
  <div id="Hjem_menu_logo_sok_box">
    <img id="Hjem_menu_logo_wht" src="../../img/img_layout/layout_menubar/w_logo_wht.png"/>
  <img id="Hjem_menu_logo_sok" src="../../img/img_layout/layout_menubar/w_logo_grn.png"/>
  </div>

  </div>
  <div id="demo"> </div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeGfGxlzHanho4vezNe-XrqMl4seyw6tw&callback=initMap"
></script>

</body>
</html>
