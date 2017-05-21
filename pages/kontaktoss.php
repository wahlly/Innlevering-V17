<!DOCTYPE html>
<html lang="nb">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/menubar.css">
    <link rel="stylesheet" href="../css/filter_menu.css">
    <link href='//fonts.googleapis.com/css?family=Just Another Hand' rel='stylesheet'>

    <title>Kontakt oss</title>
    <style>
      #container_main{
        position: absolute;
        height: 200%;
        width: 100%;
        left: 0;
        top: 0;
      }

      #container_campus{
        position: absolute;
        height: 100%;
        width: 100%;
        background-color: yellow;
      }

      #omOss{
        position: absolute;
        height: 100%;
        width: 100%;
        background-color: green;
      }



    </style>

</head>
<body>
      <?php include '../assets/connection.php' ?>
          <div id="container_main">
            <div id="container_campus">
              <div class="campus" id="fjerdingen">

              </div>
            </div>


            <div id="omOss">
              <a name="oss"></a>
            </div>
          </div>

          </div>

      <?php require '../assets/menubar.php' ?>


</body>
</html>
