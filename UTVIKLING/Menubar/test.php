<?php
if(isset($_POST["sub"])) {
  $Navn = $_POST["navn"];
  $googlemaps = $_POST["googlemaps"];
  $simplename = $_POST["simplename"];
  $imagepath = $_POST["imagepath"];
  $typer = $_POST["typer"];
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



$conn->close();
}
?>




<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <title>Login</title>
</head>
<body>
  <form name="input" action="" method="post">
    <label for="navn">navn:</label>
  </br>
  <input type="text" value="<?= $_POST["navn"] ?>" id="navn" name="navn" />
</br>
    <label for="googlemaps">googlemaps:</label>
  </br>
  <input type="text" value="<?= $_POST["googlemaps"] ?>" id="googlemaps" name="googlemaps" />
</br>
    <label for="simplename">simplename:</label>
  </br>
  <input type="text" value="<?= $_POST["simplename"] ?>" id="simplename" name="simplename" />
</br>
    <label for="imagepath">imagepath:</label>
  </br>
  <input type="text" value="<?= $_POST["imagepath"] ?>" id="imagepath" name="imagepath" />
</br>
    <label for="typer">Studiested= ST Restaurant = SP Utested= UT</label>
  </br>
  <input type="text" value="<?= $_POST["typer"] ?>" id="typer" name="typer" />
</br>
    <input type="submit" value="Home" name="sub" />
    <?php echo "$Navn, $googlemaps, $simplename, $imagepath, $typer";?>
  </form>
  <a href="?IR"> <h3>LAST OPP </h3> </a>
</body>
</html>
