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

      #card_container {
        background-color: #f2f2f2;
        position: absolute;
        margin-left: 10%;
        top: 30%;
        width: 80%;
        height: 100%;
      }

      #footer {
        position: absolute;
        width: 100%;
        height: 20%;
        top: 140%;
        border-top: solid grey 1px;

      }

      .card{
        position: absolute;
        margin: auto;
        width: 20%;
        height: 35%;
        background-color: blue;
      }
    </style>
</head>
<body>
      <div id="container_m">
        <?php require '../assets/menubar.php' ?>

        <div id="card_container">
          <div class="card" id="card1"></div>
          <div class="card" id="card2"></div>
          <div class="card" id="card3"></div>
          <div class="card" id="card4"></div>
          </div>

        </div>

        <div id="footer"></div>

      </div>



</body>
</html>
