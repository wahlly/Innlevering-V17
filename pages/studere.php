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

      #cardwrap{

        position: absolute;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
        height: 40%;
        width: 35%;
      }

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
      }

      #pa{
        position: absolute;
        left: 10%;
        margin: auto;
        top: 20%;
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


      <div id="container_m">
        <?php require '../assets/menubar.php' ?>

          <div id="cardwrap">
                <img id="card_imag" src="../../img/img_pictures/restaurant.jpg"/>
                <div id="infowrap">
                    <div id="mer">
                      <p id="detalj">Detaljer</p>
                    </div>
                    <div id="navnbox">
                      <p id="pa">Cafe Sara</p>
                    </div>

                </div>

          </div>


        <div id="footer"></div>

      </div>



</body>
</html>
