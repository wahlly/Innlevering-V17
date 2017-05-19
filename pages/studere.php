<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <title>Studie</title>

    <style>
      #container_m {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }

<<<<<<< HEAD
=======
      #cardwrap{

        position: absolute;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
        height: 40%;
        width: 35%;
      }
>>>>>>> parent of 6a1e75c... Posisjonering kategorikort

      #card_imag{
        position: absolute;
        width: 100%;
        height: 100%;
        /*z-index: -1; **/
      }

      #infowrap {
        position: absolute;
        height: 35%;
        width: 100%;
        bottom: 0;
      }

      #mer {
        position: absolute;
        left: 0;
        height: 100%;
        width: 20%;
        background-color: #795682;
        text-align: center;
        font-family: sans-serif;
      }

      #detalj{
        color: white;
      }

      #navnbox{
        position: absolute;
        right: 0;
        height: 100%;
        width: 80%;
        background: linear-gradient(to left, rgba(255,255,255,0), rgba(255,255,255,1));
        background-color: white;
      }

      #pa{
        position: absolute;
        left: 10%;
        margin: auto;
        top: 25%;
        font-family: sans-serif;
        font-size: 3vw;
      }
      #footer {
        position: absolute;
        width: 100%;
        height: 20%;
        top: 140%;
        border-top: solid grey 1px;

      }


    </style>
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

      $sql = "SELECT simplename, Navn, image_path
      FROM sted";
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

      <div id="container_m">
        <?php require '../assets/menubar.php' ?>

        <?php


<<<<<<< HEAD
=======

>>>>>>> parent of 6a1e75c... Posisjonering kategorikort
        $arraylength = count($studieSIM);
        for ($i = 0; $i < $arraylength; $i++) {
          echo "<div id=\"cardwrap$i\">\n";
          echo "                <img id=\"card_imag\" src=\"$studieIMG[$i]\"/>\n";
          echo "                <div id=\"infowrap\">\n";
          echo "                    <div id=\"mer\">\n";
          echo "                      <p id=\"detalj\">Detaljer</p>\n";
          echo "                    </div>\n";
          echo "                    <div id=\"navnbox\">\n";
          echo "                      <p id=\"pa\">$studieNAV[$i]</p>\n";
          echo "                    </div>\n";
          echo "\n";
          echo "                </div>\n";
          echo "\n";
          echo "          </div>\n";
        }
<<<<<<< HEAD

        ?>

=======
        ?>


>>>>>>> parent of 6a1e75c... Posisjonering kategorikort


        <div id="footer"></div>

      </div>



</body>
</html>
