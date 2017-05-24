<?php header('Content-Type: text/html; charset=ISO-8859-1'); ?>

<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <title>Cafe Sara</title>

    <style>

      #container_main{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;

      }
      #container_innhold{
        position: absolute;
        top:2%;
        width: 60%;
        height: 100%;
        left:20%;
        background-color: #fcfcfc;
        z-index: -1;


      }
      #event_img{
        z-index: -1;
        position: absolute;
        top: 9%;
        width: 100%;
        height: 50%;
        overflow: hidden;
        left:0%;
      }

      #info_img {
        position: absolute;
        width: 100%;
      }

      #title {
        position: absolute;
        top: 55%;
        text-align: center;
        width: 66.6666667%;
        height: 20%;
        font-family: sans-serif;
        font-size: 2.7vw;
        color: black;
        border-bottom: solid black 2px;

        left:16.666665%;
      }

      #textbox {
        position: absolute;
        top: 75%;
        width: 100%;
        height: 20%;
        text-align: center;
        font-size: 1.2vw;
        font-family: sans-serif;
        font-weight: 300;
        color: #565656;

      }

      #db_box{
        position: absolute;
        width: 100%;
        height: 30%;
        top:100%;
        border-top: solid 1px #f1f1f1;
        border-left: solid 1px #f1f1f1;

      }

      .infoline{
        width: 100%;
        height: 33.333%;
        background-color: #fafafa;
      }

      #line1 {

      }

      #line2 {
      }

      #line3{

      }

      #footer {
        position: absolute;
        width: 100%;
        height: 20%;
        top: 140%;
        border-top: solid grey 1px;

      }

      .infoline_box {
        position: absolute;
        text-align: center;
        width: 33.333%;
        height: 33.333%;
      }

      #box1 {
        left: 0%;
      }

      #box2 {
        left: 33.333%;
      }

      #box3 {
        left: 66.666%;
      }

      #tbl {
        width: 100%;
        height: 100%;
        //størrelse på celler
      }



    </style>



</head>
<body>


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

        <?php require '../assets/menubar.php' ?>

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



      <!---Bruke tabell her istedet --->
      <?php

        if ($vegetar != NULL) {
          $spisested = array();
          $spisested[0] = "<tr>\n";
          $spisested[1] = "<th> Vegetar </br> $vegetar </th>\n";
          $spisested[2] = "<th> <img src=\"$prisniva\"/></th>\n";
          $spisested[3] = "<th> Levering </br> $levering </th>\n";
          $spisested[4] = "</tr>\n";
        };

        if ($wifi != NULL) {
          $studie = array();
          $studie[0] = "<tr>\n";
          $studie[1] = "<th> Wifi </br> $wifi </th>\n";
          $studie[2] = "<th> Strømuttak </br> $strom </th>\n";
          $studie[3] = "<th> Pris kaffe </br> $kaffe </th>\n";
          $studie[4] = "</tr>\n";
        };

        if ($alder != NULL) {
          $baar = array();
          $baar[0] = "<tr>\n";
          $baar[1] = "<th> Aldersgrense </br> $alder </th>\n";
          $baar[2] = "<th> Ølpris </br> $olpris </th>\n";
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

<?php require '../assets/footer.php' ?>
</body>
</html>
