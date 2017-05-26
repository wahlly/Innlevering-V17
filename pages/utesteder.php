<!DOCTYPE html>
<html lang="nb">
<head>
    <title>Utesteder - WesterFind</title>
    <link rel="shortcut icon" href="http://tek.westerdals.no/~andtro16/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://tek.westerdals.no/~andtro16/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/menubar.css">
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/filter_menu.css">
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/footer.css">
    <link href='//fonts.googleapis.com/css?family=Just Another Hand' rel='stylesheet'>
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/kategori.css"


    


</head>
<body>
      <?php include '../assets/connection.php' ?>
      <?php


      $sql = "SELECT simplename, utested.Navn, image_path
      FROM utested
      INNER JOIN sted ON utested.Ute_id = sted.Id";
      $result = $conn->query($sql);
      $uteSIM = array();
      $uteNAV = array();
      $uteIMG = array();
      $i = 0;
      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $uteSIM[$i] = $row["simplename"];
             $uteNAV[$i] = $row["Navn"];
             $uteIMG[$i] = $row["image_path"];
             $i++;
         }
      }
       ?>



      <div id="container_m">




        <?php



        $arraylength = count($uteSIM);
        for ($i = 0; $i < $arraylength; $i++) {
          $uteNAVS = strtoupper($uteNAV[$i]);
          echo "<a href=\"http://tek.westerdals.no/~andtro16/pages/infoside.php?simplename=$uteSIM[$i]\"a>\n";
          echo "<div id=\"cardwrap\">\n";
          echo "<p id=\"mere\">LES MER</p>\n";
          echo "                <img id=\"card_imag\" src=\"$uteIMG[$i]\"/>\n";
          echo "                <div id=\"infowrap\">\n";
          echo "                    <div id=\"mer\">\n";
          echo "                      <p id=\"detalj\"></p>\n";
          echo "                    </div>\n";
          echo "                    <div id=\"navnbox\">\n";
          echo "                      <p id=\"pa\" >$uteNAVS</p>\n";
          echo "                    </div>\n";
          echo "\n";
          echo "                </div>\n";
          echo "\n";
          echo "          </div>\n";
          echo "</a>\n";
        }
        ?>

      </div>

<?php require '../assets/menubar.php' ?>
<?php require '../assets/footer.php' ?>


</body>
</html>
