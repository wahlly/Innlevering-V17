<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <title>Cafe Sara</title>

    <style>
      #info_conteiner{
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
      }

      #event_img{
        position: absolute;
        margin-left: 19.5%;
        top: 9%;
        width: 60%;
        height: 50%;
        z-index: -1;
        overflow: hidden;
      }

      #info_img {
        position: absolute;
        width: 100%;
      }

      #title {
        position: absolute;
        margin-left: 30%;
        top: 55%;
        text-align: center;
        width: 40%;
        height: 20%;
        font-family: sans-serif;
        font-size: 2.7vw;
        color: black;
        border-bottom: solid black 2px;
      }

      #textbox {
        position: absolute;
        margin-left: 19.5%;
        top: 75%;
        width: 60%;
        height: 20%;
        text-align: center;
        font-size: 1.2vw;
        font-family: sans-serif;
        font-weight: 300;
        color: #565656;
      }

      #db_box{
        position: absolute;
        width: 60%;
        height: 30%;
        top:100%;
        margin-left: 19.5%;
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

      <div id"info_conteiner">
      <?php require '../assets/menubar.php' ?>
      <div id="event_img">
          <img id="info_img" src="<?php echo "$imgsti" ?>"/>
      </div>
      <div id="title">
        <h1><?php echo $infonavn ?><h1>
      </div>
      <div id="textbox">
        <p>Café Sara er en kombinert kafé/restaurant og bar med matservering.</p>
          <p>De åpnet dørene første gang i 1989 og har servert god mat og drikke i over 20 år.
          Café Sara har et godt utvalg i drikke, øl, vin, meksikansk, grill, pizza, småretter som tilfredsstiller mangt og mange.
          Om sommeren er det en hyggelig bakgård, om vinteren en koselig peis.
          Café Sara ligger sentralt i Oslo, på hjørnet av Torggata og Hausmannsgata i Oslo</p>
      </div>



      <div id="db_box">
        <div class="infoline" id="line1">
            <div class="infoline_box" id="box1">
              <p>Prisnivå:</br><?php echo "$prisniva" ?></p>
            </div>
            <div class="infoline_box" id="box2">
              <p>Vegetarvennelig:</br><?php echo "$vegetar" ?></p>
            </div>
            <div class="infoline_box" id="box3">
              <p>Levering:</br><?php echo "$levering" ?></p>
            </div>
        </div>
        <div class="infoline" id="line2">
          <div class="infoline_box" id="box1">
            <p>Strømuttak:</br><?php echo "$strom" ?></p>
          </div>
          <div class="infoline_box" id="box2">
            <p>Wifi:</br><?php echo "$wifi" ?></p>
          </div>
          <div class="infoline_box" id="box3">
            <p>Pris kaffe:</br><?php echo "$kaffe" ?></p>
          </div>
        </div>
        <div class="infoline" id="line3">
          <div class="infoline_box" id="box1">
            <p>Ølpris:</br><?php echo "$olpril" ?></p>
          </div>
          <div class="infoline_box" id="box2">
            <p>Aldersgrense:</br><?php echo "$alder" ?></p>
          </div>
          <div class="infoline_box" id="box3">
          </div>
        </div>
      </div>
      <div id="footer"></div>
    </div>



</body>
</html>
