<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href='//fonts.googleapis.com/css?family=Just Another Hand' rel='stylesheet'>
    <link rel="stylesheet" href="../css/kategori.css"

    <title>Studie</title>
<style>
    #footer_container{
      bottom: -50%;
    }

    #Studere_menu_element_line  { background-color: #E3E6EA;}
    #Studere_menu_element_bg {background-color:  #FFD269;}
    #Menu_text_s { color: white;}
</style>


</head>
<body>
      <?php include '../assets/connection.php' ?>
      <?php


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



      <div id="container_m">




        <?php



        $arraylength = count($studieSIM);
        for ($i = 0; $i < $arraylength; $i++) {
          $studieNAVS = strtoupper($studieNAV[$i]);
          echo "<a href=\"/pages/infoside.php?simplename=$studieSIM[$i]\"a>\n";
          echo "<div id=\"cardwrap\">\n";
          echo "<p id=\"mere\">LES MER</p>\n";
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

<?php require '../assets/menubar.php' ?>
<?php require '../assets/footer.php' ?>


</body>
</html>
