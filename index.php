
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./css/menubar.css">
  <link rel="stylesheet" href="./css/filter_menu.css">
<style>
#map {
        position: absolute;
        height: 100%;
        width: 100%;
      }

      #container_main{
        position: absolute;
          top: 0%;
          left: 0%;
          width:100%;
          height: 200%;
      }

      #imgmap {
          position: absolute;
          top: 100%;
          left: 0%;
          width: 100%;
          height: 100%;

        }
        #kartet {
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 90%;
          }

body {background-color: white;
    overflow-x:hidden;
}

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
    right: 5%;
    top: 185%;
    margin: 0;

  }

  #Boks{
    position: absolute;
    box-shadow: 0 1vw 2vw rgba(0, 0, 0, 0.5);
    top: 125%;
    left: 40%;
    height: 50%;
    width: 20%;
    background-color: white;
    visibility: hidden;

  }

  #Spisested_Overskrift_Boks{
    position: absolute;
    background-color: #61B0C5;
    top:40%;
    height: 15%;
    width: 100%;
    visibility: hidden;
  }
  #Spisested_hurtiginfo_boks1{
    position: absolute;
    width:33.333333333333333333%;
    height: 15%;
    bottom: 0%;
    left:0%;
    background-color: #ff0000;
  }
  #Spisested_hurtiginfo_boks2{
    position: absolute;
    width:33.333333333333333333%;
    height: 15%;
    bottom: 0%;
    left:33.333333333333333333%;
    background-color: #00ff00;
  }
  #Spisested_hurtiginfo_boks3{
    position: absolute;
    width:33.333333333333333333%;
    height: 15%;
    bottom: 0%;
    left:66.666666666666%;
    background-color: #0000ff;
  }

  #Utested_Overskrift_Boks{
    position: absolute;
    background-color: #795682;
    top:40%;
    height: 15%;
    width: 100%;
    visibility: hidden;
  }
  #Studiested_Overskrift_Boks{
    position: absolute;
    background-color: #FFD269;
    top:40%;
    height: 15%;
    width: 100%;
    visibility: hidden;
  }

  #Boks_Overskrift{
   position: absolute;
   position: absolute;
   top: 37%;
   width: 100%;
   height: 15%;
  }
  #Txt_Overskift_Box{

    text-align: center;
    font-family: sans-serif;
    font-weight: 500;
    color: white;
  }
  #Boks_bilde{
    position: absolute;
    top: 0%;
    height: 40%;
    width: 100%;
  }
  #Boks_close{
    position: absolute;
    top:4%;
    right: 2%;
    height: 3vw;
    width: 3vw;
  }
  #sliderbox{

    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: #f1f1f1;
    background-image: url(http://byhusene.no/assets/img/barcode/Barcode_by_night.jpg);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
  }
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

//Start Restauranter
  $sql = "SELECT Css FROM UI WHERE Type = 'Spisested'";
  $result = $conn->query($sql);
  $CssR = array();
  $i = 0;
  if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $CssR[$i] = $row["Css"];
           $i++;
       }
  }
//Slutt Restaurant
//Start Utesteder
  $sql = "SELECT Css FROM UI WHERE Type = 'Utested'";
    $result = $conn->query($sql);
    $CssU = array();
    $i = 0;
    if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $CssU[$i] = $row["Css"];
             $i++;
         }
    }
//Slutt Utesteder
//Start Studiesteder
$sql = "SELECT Css FROM UI WHERE Type = 'Studiested'";
    $result = $conn->query($sql);
    $CssS = array();
    $i = 0;
    if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $CssS[$i] = $row["Css"];
             $i++;
         }
    }
  //Slutt Studiesteder
  $conn->close();


//Start url søk (Om den starter på dette vil den dukke opp)
  if (strpos($_SERVER[REQUEST_URI], '?IR')) {
  $arrlength = count($CssR);
  for($x = 0; $x < $arrlength; $x++) {
      echo $CssR[$x];
  }
}
  if (strpos($_SERVER[REQUEST_URI], '?IU')) {
  $arrlength = count($CssU);
  for($x = 0; $x < $arrlength; $x++) {
      echo $CssU[$x];
  }
}
  if (strpos($_SERVER[REQUEST_URI], '?IS')) {
    $arrlength = count($CssS);
    for($x = 0; $x < $arrlength; $x++) {
    echo $CssS[$x];
  }
}
//Stopp url søk
?>


  <?php
  if (strpos($_SERVER[REQUEST_URI], '?closeboks')) {
  echo "#Boks{";
  echo "visibility: hidden;";
  echo "}";
  }
  ?>





          /* Henter inn posisjonene til alle de forskjellige nålene */

          /* Her avsluttes innhentingen av alle posisjonen til de forskjellige nålene */


</style>

</head>

<body>

  <div id="sliderbox">
    <h1 style="position:absolute; top:35%; left:2.5%; color:#eeeeee; font-family:sans-serif; font-size:5em; text-shadow: 3px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Finn interessante steder i nærheten</h1>
    <a href="#kartet">
    <div style="z-index:1; position:absolute; top:73%; left:46%; color:white; opacity:0.7; font-family:sans-serif;"> <h2>VIS KART</h2> </div>
  </a>
    <a href="#kartet">
    <img src="./img/img_layout/layout_icons/pil.png" style=" z-index:1; position:absolute; top:80%; left:46%; width:8%;"></div>
    </a>



  <div id="container_main">

  <div id="imgmap">
    <a name="kartet"></a>
    <div id="map"></div>
    <?php require './assets/googlemaps.php' ?>



    </div>

    <?php
    $simplename1 = $_GET['simplename'];
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

    $sql = "SELECT * FROM sted WHERE simplename = '$simplename1'";
    $result = $conn->query($sql);
    $i = 0;
    if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $boks_navn = $row["Navn"];
         $boks_image = $row["image_path"];

     }
    } else {
     echo "0 results";
    }

    ?>
<div id="Boks">
  <div id="Spisested_Overskrift_Boks"></div>
  <div id="Spisested_hurtiginfo_boks1"></div>
  <div id="Spisested_hurtiginfo_boks2"></div>
  <div id="Spisested_hurtiginfo_boks3"></div>
  <div id="Studiested_Overskrift_Boks"></div>
  <div id="Utested_Overskrift_Boks"></div>
 <div id="Boks_Overskrift"><h1 id="Txt_Overskift_Box"><?php echo $boks_navn ?></h1></div>
 <img id="Boks_bilde" src="<?php echo $boks_image?>"/>
<?php



if (strpos($_SERVER[REQUEST_URI], '?IR')) {
  echo "<a href=\"?closeIR#kartet\">\n";
}
elseif (strpos($_SERVER[REQUEST_URI], '?IS')) {
  echo "<a href=\"?closeIS#kartet\">\n";
}
elseif (strpos($_SERVER[REQUEST_URI], '?IU')) {
  echo "<a href=\"?closeIU#kartet\">\n";
}
else{
  echo "<a href=\"?closeII#kartet\">\n";
}
?>
<img id="Boks_close" src="./img/img_layout/layout_icons/close.png">
</a>

</div>





  <div id="btttnrow_container">


  <div id="prtybutton_container">
    <a href="?closeIU#kartet">
  <img src="./img/img_layout/layout_icons/ol.png" id="Prtybutton_icn" />
</a>
  </div>


  <div id="stdybutton_container">
    <a href="?closeIS#kartet">
  <img src="./img/img_layout/layout_icons/les.png" id="stdybutton_icn">
  </div>



  <div id="eatybutton_container">
    <a href="?closeIR#kartet">
  <img src="./img/img_layout/layout_icons/burger.png" id="eatybutton_icn">
  </div>



  <div id="sprtybutton_container">
    <a href="?closeII#kartet">
  <img src="./img/img_layout/layout_icons/tren.png" id="sprtybutton_icn"/>
  </div>

  </div>

  </div>
  <div id="menubar_container">

    <a href="#Barer">
    <div id="Bar_menu_element_bg">
      <h3 id="Menu_text">BARER</h3>
      <div id="Bar_menu_element_line">
      </div>
    </div>
    <div id="Hjem_menu_logo_bar_box">
      <img id="Hjem_menu_logo_wht" src="./img/img_layout/layout_menubar/w_logo_wht.png"/>
    <img id="Hjem_menu_logo_bar" src="./img/img_layout/layout_menubar/w_logo_prpl.png"/>
    </div>
  </a>

   <a href="#Restaurant">
    <div id="Restaurant_menu_element_bg">
      <h3 id="Menu_text">RESTAURANTER</h3>
      <div id="Restaurant_menu_element_line">
      </div>
    </div>
    <div id="Hjem_menu_logo_rest_box">
      <img id="Hjem_menu_logo_wht" src="./img/img_layout/layout_menubar/w_logo_wht.png"/>
    <img id="Hjem_menu_logo_rest" src="./img/img_layout/layout_menubar/w_logo_ble.png"/>
    </div>
  </a>


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
      <a href="<?php echo$_SERVER['REQUEST_URI']?>">
      <img id="Hjem_menu_logo" src="./img/img_layout/layout_menubar/w_logo.png"/>
      </a>
    </div>


    <a href="#Studere">
    <div id="Studere_menu_element_bg">
      <h3 id="Menu_text">STUDERE</h3>
      <div id="Studere_menu_element_line">
      </div>
    </div>
    <div id="Hjem_menu_logo_stud_box">
      <img id="Hjem_menu_logo_wht" src="./img/img_layout/layout_menubar/w_logo_wht.png"/>
    <img id="Hjem_menu_logo_stud" src="./img/img_layout/layout_menubar/w_logo_ylw.png"/>
    </div>
  </a>

  <div id="Sok_menu_element_bg">
    <div id="search-box-wrapper">
        <input type="text" placeholder="Hvor vil du?" id="search-box-input">
        <input id="search-box-button" type="image" src="./img/img_layout/layout_icons/search.png" />
    </div>
    <div id="Sok_menu_element_line"></div>
  </div>
  <div id="Hjem_menu_logo_sok_box">
    <img id="Hjem_menu_logo_wht" src="./img/img_layout/layout_menubar/w_logo_wht.png"/>
  <img id="Hjem_menu_logo_sok" src="./img/img_layout/layout_menubar/w_logo_grn.png"/>
  </div>

  </div>
  <div id="demo"> </div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeGfGxlzHanho4vezNe-XrqMl4seyw6tw&callback=initMap"
></script>
</body>
</html>
