

<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <link rel="stylesheet" href="../css/infoside.css"

</head>
<body>
<?php include '../assets/connection.php' ?>

  <?php
      $simplename1 = $_GET['simplename'];

      $sql = "SELECT * FROM sted WHERE simplename = '$simplename1'";
      $result = $conn->query($sql);
      $i = 0;
      if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $code = $row["Id"];
           $infonavn = $row["Navn"];
           $imgsti = $row["image_path"];
           $beskrivelse = $row["beskrivelse"];
           $i++;

       }
      }

        $sql = "SELECT * FROM spisested WHERE Plass_Id = '$code'";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $prisniva = $row["Prisniva"];
             $vegetar = $row["Vegetar"];
             $levering = $row["Levering"];
             $i++;
       }
      }

        $sql = "SELECT * FROM studiested WHERE Studie_id = '$code'";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $strom = $row["Stromuttak"];
             $wifi = $row["Wifi"];
             $kaffe = $row["KaffePris"];
             $i++;
       }
      }

        $sql = "SELECT * FROM utested WHERE Ute_id = '$code'";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $olpril = $row["OlPris"];
             $alder = $row["Aldersgrense"];
             $i++;
       }
      }

      ?>

      <div id"container_main">
      <div id="container_innhold">

        <div id="title">
          <h1><?php echo $infonavn ?><h1>
        </div>
        <div id="textbox">
          <p><?php echo $beskrivelse ?></p>
        </div>
        <div id="event_img">
            <img id="info_img" src="<?php echo "$imgsti" ?>"/>
        </div>

        <?php

          if ($vegetar != NULL) {
            $spisested = array();
            $spisested[0] = "<tr>\n";
            $spisested[1] = "<th> <img src=\"$vegetar\"/></th>\n";
            $spisested[2] = "<th> <img src=\"$prisniva\"/></th>\n";
            $spisested[3] = "<th> Levering: </br> $levering </th>\n";
            $spisested[4] = "</tr>\n";
          };

          if ($wifi != NULL) {
            $studie = array();
            $studie[0] = "<tr>\n";
            $studie[1] = "<th> <img src=\"$wifi\"/></th>\n";
            $studie[2] = "<th> <img src=\"$strom\"/></th>\n";
            $studie[3] = "<th> Pris kaffe: </br> $kaffe </th>\n";
            $studie[4] = "</tr>\n";
          };

          if ($alder != NULL) {
            $baar = array();
            $baar[0] = "<tr>\n";
            $baar[1] = "<th> Aldersgrense: </br> $alder </th>\n";
            $baar[2] = "<th> Ølpris: </br> $olpris </th>\n";
            $baar[3] = "</tr>\n";
          };

         ?>

        <div id="db_box">
          <table id="tbl">
            <?php
            $arrlength = count($spisested);
             for($x = 0; $x < $arrlength; $x++) {
               echo $spisested[$x];
             }

             $arrlength = count($studie);
              for($x = 0; $x < $arrlength; $x++) {
                echo $studie[$x];
              }

              $arrlength = count($baar);
               for($x = 0; $x < $arrlength; $x++) {
                 echo $baar[$x];
               }
             ?>
          </table>
        </div>

      </div>
    </div>
<?php require '../assets/menubar.php' ?>
<?php require '../assets/footer.php' ?>

</body>
  <title><?php echo "$infonavn" ?></title>
</html>
