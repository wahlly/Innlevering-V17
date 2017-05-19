<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <link href='//fonts.googleapis.com/css?family=Just Another Hand' rel='stylesheet'>
    <link rel="stylesheet" href="../css/infoside.css"

    <title>Studie</title>


</head>
<body>

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

      $sql = "SELECT simplename, studiested.Navn, image_path
FROM studiested
INNER JOIN sted ON studiested.Studie_id = sted.Id";
      $result = $conn->query($sql);
      $studieSIM = array();
      $studieNAV = array();
      $studieIMG = array();
      $i = 0;
      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $studieSIM[$i] = $row["simplename"];
             $studieNAV[$i] = $row["Navn"];
             $studieIMG[$i] = $row["image_path"];
             $i++;
         }
      }
       ?>

       <?php require '../assets/menubar.php' ?>
<div id="conainer_hoved">
      <div id="container_m">




        <?php



        $arraylength = count($studieSIM);
        for ($i = 0; $i < $arraylength; $i++) {
          $studieNAVS = strtoupper($studieNAV[$i]);
          echo "<a href=\"/pages/infoside.php?simplename=$studieSIM[$i]\"a>\n";
          echo "<div id=\"cardwrap\">\n";
          echo "                <img id=\"card_imag\" src=\"$studieIMG[$i]\"/>\n";
          echo "                <div id=\"infowrap\">\n";
          echo "                    <div id=\"mer\">\n";
          echo "                      <p id=\"detalj\"></p>\n";
          echo "                    </div>\n";
          echo "                    <div id=\"navnbox\">\n";
          echo "                      <p id=\"pa\" >$studieNAVS</p>\n";
          echo "                    </div>\n";
          echo "\n";
          echo "                </div>\n";
          echo "\n";
          echo "          </div>\n";
          echo "</a>\n";
        }
        ?>

      </div>




      </div>

<?php require '../assets/menubar.php' ?>

</body>
</html>
