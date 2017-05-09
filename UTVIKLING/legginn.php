<?php
if(isset($_POST["sub"])) {
  $Navn = $_POST["navn"];
  $googlemaps = $_POST["googlemaps"];
  $simplename = $_POST["simplename"];
  $imagepath = $_POST["imagepath"];
  $typeSP = $_POST["typeSP"];
  $typeST = $_POST["typeST"];
  $typeUT = $_POST["typeUT"];
}

if ($Navn != null) {

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

$sql = "INSERT INTO sted (Navn, simplename, googlemaps, image_path)
VALUES ('$Navn', '$simplename', '$googlemaps', '$imagepath')";

if ($conn->query($sql) === TRUE) {
    echo "$Navn record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


if ($typeSP != null) {

  $sql = "SELECT * FROM sted WHERE Navn = '$Navn'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $Id = $row["Id"];
   }
}
$sql = "INSERT INTO spisested (Navn, Plass_Id)
VALUES ('$Navn', '$Id')";
if ($conn->query($sql) === TRUE) {
    echo " $Navn spisested created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

if ($typeST != null) {

  $sql = "SELECT * FROM sted WHERE Navn = '$Navn'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $Id = $row["Id"];
   }
}
$sql = "INSERT INTO studiested (Navn, Studie_id)
VALUES ('$Navn', '$Id')";
if ($conn->query($sql) === TRUE) {
    echo " $Navn studiested created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


if ($typeUT != null) {

  $sql = "SELECT * FROM sted WHERE Navn = '$Navn'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $Id = $row["Id"];
   }
}
$sql = "INSERT INTO utested (Navn, Ute_id)
VALUES ('$Navn', '$Id')";
if ($conn->query($sql) === TRUE) {
    echo " $Navn utested created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
}
?>




<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <title>Legg inn steder</title>
</head>
<body>
  <form name="input" action="" method="post">
    <label for="navn">Visningsnavn:</label>
  </br>
  <input type="text" value="<?= $_POST["navn"] ?>" id="navn" name="navn" />
</br>
    <label for="googlemaps">googlemaps: Bredde og lengdegrad i dette formatet: 59.919833, 10.759307 Finner de på google </label>
  </br>
  <input type="text" value="<?= $_POST["googlemaps"] ?>" id="googlemaps" name="googlemaps" />
</br>
    <label for="simplename">simplename: Enkelt navn uten mellomrom og øer og æer og åer osv</label>
  </br>
  <input type="text" value="<?= $_POST["simplename"] ?>" id="simplename" name="simplename" />
</br>
    <label for="imagepath">imagepath: ../../img/img_pictures/restaurant.jpg om du ikke har no</label>
  </br>
  <input type="text" value="<?= $_POST["imagepath"] ?>" id="imagepath" name="imagepath" />
</br>
<label for="typeST">Her er det mulig å skrive JA i flere </br>Skriv JA om det er Studiested ingenting vis ikke</label>
</br>
<input type="text" value="<?= $_POST["typeST"] ?>" id="typeST" name="typeST" />
</br>
<label for="typeSP">Skriv JA om det er Spisested ingenting vis ikke</label>
  </br>
  <input type="text" value="<?= $_POST["typeSP"] ?>" id="typeSP" name="typeSP" />
</br>
<label for="typeUT">Skriv JA om det er Utested ingenting vis ikke</label>
  </br>
  <input type="text" value="<?= $_POST["typeUT"] ?>" id="typeUT" name="typeUT" />
</br>
    <input type="submit" value="Home" name="sub" />
    <?php echo "$Navn, $googlemaps, $simplename, $imagepath, $typer";?>
  </form>
</body>
</html>
