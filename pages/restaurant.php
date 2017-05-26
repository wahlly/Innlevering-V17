<!DOCTYPE html>
<html lang="nb">
<head>
    <title>Restaurant - WesterFind</title>
    <link rel="shortcut icon" href="http://tek.westerdals.no/~andtro16/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://tek.westerdals.no/~andtro16/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/menubar.css">
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/filter_menu.css">
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/footer.css">
    <link href='//fonts.googleapis.com/css?family=Just Another Hand' rel='stylesheet'>
    <link rel="stylesheet" href="http://tek.westerdals.no/~andtro16/css/kategori.css"

    

    <style>

        #Restaurant_menu_element_line  { background-color: #E3E6EA;}
        #Restaurant_menu_element_bg {background-color:  #61B0C5;}
        #Menu_text_r { color: white;}
    </style>

</head>
<body>
      <?php include '../assets/connection.php' ?>
      <?php


      $sql = "SELECT simplename, spisested.Navn, image_path
      FROM spisested
      INNER JOIN sted ON spisested.Plass_Id = sted.Id";
      $result = $conn->query($sql);
      $spiseSIM = array();
      $spiseNAV = array();
      $spiseIMG = array();
      $i = 0;
      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $spiseSIM[$i] = $row["simplename"];
             $spiseNAV[$i] = $row["Navn"];
             $spiseIMG[$i] = $row["image_path"];
             $i++;
         }
      }
       ?>



      <div id="container_m">




        <?php



        $arraylength = count($spiseSIM);
        for ($i = 0; $i < $arraylength; $i++) {
          $spiseNAVS = strtoupper($spiseNAV[$i]);
          echo "<a href=\"http://tek.westerdals.no/~andtro16/pages/infoside.php?simplename=$spiseSIM[$i]\"a>\n";
          echo "<div id=\"cardwrap\">\n";
          echo "<p id=\"mere\">LES MER</p>\n";
          echo "                <img id=\"card_imag\" src=\"$spiseIMG[$i]\"/>\n";
          echo "                <div id=\"infowrap\">\n";
          echo "                    <div id=\"mer\">\n";
          echo "                      <p id=\"detalj\"></p>\n";
          echo "                    </div>\n";
          echo "                    <div id=\"navnbox\">\n";
          echo "                      <p id=\"pa\" >$spiseNAVS</p>\n";
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
