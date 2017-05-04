



  <!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>

  <?php
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

$sql = "SELECT * FROM sted";
$result = $conn->query($sql);
$css_pososv = array();
$i = 0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $css_pososv[$i] = $row["Navn"];
         $i++;
     }
} else {
     echo "0 results";
}
$conn->close();
$arrlength = count($css_pososv);
for($x = 0; $x < $arrlength; $x++) {
    echo $css_pososv[$x];
    echo "<br>";
}
?>


</body>
</html>
