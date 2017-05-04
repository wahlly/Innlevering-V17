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
              height: 100%;
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
            #poi{
              position: absolute;
              height: 100%;
              width: 50%;
            }

</style>

</head>

<body>
 <script> if(window.innerHeight > window.innerWidth){
  alert("Vend telefonen til landskapsmodus for å bruke denne siden!");
}
</script>
 
  <div id="container_main">

  <div id="imgmap">
    <img id="kartet" src="../../img/img_pictures/index_kart.png"/>
    </div>

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

    $sql = "SELECT html_unactive FROM sted";
    $result = $conn->query($sql);
    $html_unactive = array();
    $i = 0;
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $html_unactive[$i] = $row["html_unactive"];
           $i++;
       }
    } else {
       echo "0 results";
    }
    $conn->close();
    $arrlength = count($css_pososv);
    for($x = 0; $x < $arrlength; $x++) {
      echo $html_unactive[$x];

    }
    ?>

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


    //Spørring for prtybutton start
    $sql = "SELECT html_active FROM sted WHERE id = 1";
    $result = $conn->query($sql);
    $prtybutton = array();
    $i = 0;
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $prtybutton[$i] = $row["html_active"];
           $i++;
       }
    }
    //Spørring for prtybutton slutt


    //Spørring for stdybutton start
    $sql = "SELECT html_active FROM sted WHERE id != 1";
    $result = $conn->query($sql);
    $stdybutton = array();
    $i = 0;
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $stdybutton[$i] = $row["html_active"];
           $i++;
       }
    }
    //Spørring for stdybutton slutt


    //Spørring for eatybutton start
    $sql = "SELECT * FROM sted";
    $result = $conn->query($sql);
    $eatybutton = array();
    $i = 0;
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $eatybutton[$i] = $row["html_active"];
           $i++;
       }
    }
    //Spørring for eatybutton slutt

    //Spørring for sprtybutton start
    $sql = "SELECT html_unactive FROM sted";
    $result = $conn->query($sql);
    $sprtybutton = array();
    $i = 0;
    if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $sprtybutton[$i] = $row["html_unactive"];
           $i++;
       }
    }
    //Spørring for sprtybutton slutt


    $conn->close();

    ?>


    //Knapper Start
    <?php
    if(isset($_POST['prtybutton'])){
      $arrlength = count($prtybutton);
      for($x = 0; $x < $arrlength; $x++) {
        echo $prtybutton[$x];
      }
    }
    if(isset($_POST['stdybutton'])){
      $arrlength = count($stdybutton);
      for($x = 0; $x < $arrlength; $x++) {
        echo $stdybutton[$x];
      }
    }
    if(isset($_POST['eatybutton'])){
      $arrlength = count($eatybutton);
      for($x = 0; $x < $arrlength; $x++) {
        echo $eatybutton[$x];
      }
    }
    if(isset($_POST['sprtybutton'])){
      $arrlength = count($sprtybutton);
      for($x = 0; $x < $arrlength; $x++) {
        echo $sprtybutton[$x];
      }
    }
    ?>
    //Knapper Slutt


 <form  method="post">
   <input type="text" name="txt" value="<?php if(isset($message)){ echo $message;}?>" >
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
</div>
</body>
</html>
