<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <title>Studie</title>

    <style>
      #container_m {
        position: absolute;
        top: 20%;
        left: 0;
        width: 100%;
        height: 100%;
      }

      .container_box{
        position: absolute;
        height: 40%;
        width: 35%;

      }

      #cardwrap{
        position: relative;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
        height: 20vw;
        width: 35vw;
        float: left;
        margin: 3vw;
        margin-left: 8.8%;

      }

      #card_imag{
        position: relative;
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
      <div id="container_m">


        <div class="container_box">

        </div>

        <?php



        $arraylength = count($studieSIM);
        for ($i = 0; $i < $arraylength; $i++) {
          echo "<div id=\"cardwrap\">\n";
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
        ?>

      </div>


        <div id="footer">

        </div>

      </div>



</body>
</html>
