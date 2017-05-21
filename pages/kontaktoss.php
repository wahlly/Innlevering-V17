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
        left: 0%;
        top: 0%;
        position: absolute;
        height: 200%;
        width: 100%;
        background-color: white;
      }

      #container_campus{
        position: absolute;
        top: 5%;
        left: 0%;
        height: 45%;
        width: 100%;
      }

      .campus {
        position: absolute;
        top: 20%;
        height: 70%;
        width: 20%;
        text-align: center;
        background-color: white;
        border: solid white 1vw;

      }

      h1{
       font-family: sans-serif;
       font-size: 2vw;
      }

      h2{
        font-family: sans-serif;
      }

      p{
        font-family: sans-serif;
      }

      #fjerdingen{
        left: 6.665%;
      }

      #brenneriveien{
        left: 39%;

      }
      #vulkan{
        left: 69.999%;
      }

      #kilde{
        font-size: 0.5em;
      }

      .apningstider {
        position: absolute;
        bottom: 0%;
        height: 40%;
        width: 100%;
        text-align: center;
        background: white;
      }


      #omOss{
        position: absolute;
        top: 50%;
        left: 0%;
        height: 50%;
        width: 100%;
      }

      #ossWrap{
        position: absolute;
        top: 10%;
        left: 10%;
        height: 80%;
        width: 80%;
      }

      .card{
        position: absolute;
        height: 50%;
        width: 40%;
        background: -webkit-linear-gradient(40deg, #ff7365, #fc8b80);
        background: linear-gradient(50deg, #ff7365, #fc8b80);
        text-align: center;
      }

      h5{
        font-family: sans-serif;
        font-size: 7em;
        color: white;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
      }

      h4{
        font-family: sans-serif;
        font-size: 2em;
        color: white;
      }

      .navn{
        position: absolute;
        bottom: -15.5%;
        left: 20%;
      }

      #letter{
        position: absolute;
        top: 10%;
        left: 2%;
      }

      #navnul{
        left: 17.5%;
      }

      #Ullerikke{
        left: 60%;
        background: -webkit-linear-gradient(40deg, #61b0c5, #7cc2d3);
        background: linear-gradient(50deg, #61b0c5, #7cc2d3);
      }




    </style>

</head>
<body>
      <?php include '../assets/connection.php' ?>
          <div id="container_main">
            <div id="container_campus">

              <div class="campus" id="fjerdingen">
                <h1>Campus Fjerdingen</h1>
                <p>Campus Fjerdingen er fyllt med studenter fra ulike fagfelt,
                  som fra Avdelingene kunstfag, kommunikasjon, teknologi og ledelse.
                  I tillegg til funksjonelle klasserom, har bygningen derfor studioer,
                  spesialrom og øvingslokaler for musikkproduksjon, lys for scene,
                  populærmusikk og programmering. De administrative avdelingene våre,
                  studieavdelingen, markedsavdelingen og administrasjonen,
                  holder også til her.</p>
                  <p id="kilde"> -Hentet fra https://www.westerdals.no/hoyskolens-campus/ </p>
                    <div class="apningstider">
                      <h2>Åpningstider</h2>
                      <p>Mandag - Fredag: 07:30-24:00</p>
                      <p>Lørdag: 10:00-23:00</p>
                      <p>Søndag: 10:00-23:00</p>
                    </div>
              </div>
              <div class="campus" id="brenneriveien">
                <h1>Brenneriveien</h1>
                <p>Campus Vulkan er også pusset opp. Her holder store deler av
                  avdelingen Film, TV og spill til, sammen med skuespillstudentene.
                  Bygget ligger vis-á-vis studentenes eget treningssenter Atletica,
                  og ikke langt unna Oslos kulinariske smeltedigel Mathallen.</p>
                <p id="kilde"> -Hentet fra https://www.westerdals.no/hoyskolens-campus/ </p>

                    <div class="apningstider">
                      <h2>Åpningstider</h2>
                      <p>Mandag - Fredag: 07:30-24:00</p>
                      <p>Lørdag: 10:00-23:00</p>
                      <p>Søndag: 10:00-23:00</p>
                    </div>
              </div>
              <div class="campus" id="vulkan">
                <h1>Vulkan</h1>
                <p>I Brenneriveien i Oslo, kun et steinkast unna Campus Vulkan,
                  ligger Campus Brenneriveien. Her holder våre studenter fra maske-
                  og hårdesign, samt deler av Avdeling for film, TV og spill, til.
                  Om dagen kryr det av kunstneriske sjeler, og om kvelden er det
                  et yrende natteliv.</p>
                <p id="kilde"> -Hentet fra https://www.westerdals.no/hoyskolens-campus/ </p>
                    <div class="apningstider">
                      <h2>Åpningstider</h2>
                      <p>Mandag - Fredag: 08:00-22:00</p>
                      <p>Lørdag: 10:00-18:00</p>
                      <p>Søndag: 10:00-20:00</p>
                    </div>
              </div>

            </div>



            <div id="omOss">
              <a name="oss"></a>
                <div id="ossWrap">
                  <div class="card" id="Martin">
                    <div id="letter">
                    <h5>M</h5>
                  </div>
                    <div class="navn">
                    <h4>ARTIN WAHLBERG</h4>
                  </div>
                  </div>

                  <div class="card" id="Ullerikke">
                    <div id="letter">
                    <h5>U</h5>
                  </div>
                    <div class="navn" id="navnul">
                    <h4>LLERIKKE SVENNE</h4>
                  </div>
                  </div>
                </div>
            </div>
          </div>

          </div>

      <?php require '../assets/menubar.php' ?>


</body>
</html>
