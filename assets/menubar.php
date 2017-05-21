
<style>


#menubar_container {
  position: absolute;
    top: 0%;
    left: 0%;
    width:100%;
    height: 170px;
    margin: 0;
}

</style>
<?php include './connection.php' ?>
<?php
if(isset($_POST["sub"])) {
  $sokeord = $_POST["sokeord"];
}
if ($sokeord != null) {
  $sql = "SELECT simplename FROM sted WHERE Navn LIKE  '%$sokeord%' LIMIT 0 , 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $sokeresultat = $row["simplename"];
     }



}
}
?>

<div id="menubar_container">

  <a href="/pages/utesteder.php">
  <div id="Bar_menu_element_bg">
    <h3 id="Menu_text"> UTESTEDER</h3>
    <div id="Bar_menu_element_line">
    </div>
  </div>
  <div id="Hjem_menu_logo_bar_box">
    <img id="Hjem_menu_logo_wht" src="../img/img_layout/layout_menubar/w_logo_wht.png"/>
  <img id="Hjem_menu_logo_bar" src="../img/img_layout/layout_menubar/w_logo_prpl.png"/>
  </div>
</a>

<a href="/pages/restaurant.php">
  <div id="Restaurant_menu_element_bg">
    <h3 id="Menu_text">RESTAURANTER</h3>
    <div id="Restaurant_menu_element_line">
    </div>
  </div>
  <div id="Hjem_menu_logo_rest_box">
    <img id="Hjem_menu_logo_wht" src="../img/img_layout/layout_menubar/w_logo_wht.png"/>
  <img id="Hjem_menu_logo_rest" src="../img/img_layout/layout_menubar/w_logo_ble.png"/>
  </div>
</a>

  <a href="/index.php">
  <div id="Hjem_menu_element_bg"></div>
  <div id="Hjem_menu_element_extend">
    <div id="Hjem_Trapes_Farge"></div>
    <div id="Hjem_Linje_farge"></div>
    <div id="Hjem_Trapes_Hvit"></div>
    <div id="Hjem_Linje_Hoyre"></div>
    <div id="Hjem_Linje_hvit"></div>
  </div>

  <div id="Hjem_menu_element_border"></div>
  <div id="Hjem_menu_logo_box">
    <img id="Hjem_menu_logo" src="../img/img_layout/layout_menubar/w_logo.png"/>
  </div>
</a>

  <a href="/pages/studere.php">
  <div id="Studere_menu_element_bg">
    <h3 id="Menu_text">STUDERE</h3>
    <div id="Studere_menu_element_line">
    </div>
  </div>
  <div id="Hjem_menu_logo_stud_box">
    <img id="Hjem_menu_logo_wht" src="../img/img_layout/layout_menubar/w_logo_wht.png"/>
  <img id="Hjem_menu_logo_stud" src="../img/img_layout/layout_menubar/w_logo_ylw.png"/>
  </div>
</a>

<div id="Sok_menu_element_bg">
  <div id="search-box-wrapper">
      <form name="input" action="" method="post">
      <input type="text" placeholder="Hvor vil du?" id="search-box-input" value="<?= $_POST["sokeord"] ?>" name="sokeord">
      <input id="search-box-button" type="image" src="../img/img_layout/layout_icons/search.png" type="submit" value="Home" name="sub" />
    </form>
  </div>
  <div id="Sok_menu_element_line"></div>
</div>
<div id="Hjem_menu_logo_sok_box">
  <img id="Hjem_menu_logo_wht" src="../img/img_layout/layout_menubar/w_logo_wht.png"/>
<img id="Hjem_menu_logo_sok" src="../img/img_layout/layout_menubar/w_logo_grn.png"/>
</div>
<?php
if ($sokeord != null) {
if ($sokeresultat != null) {
  echo "<script type=\"text/javascript\">\n";
  echo "window.location.href=\"/pages/infoside.php?simplename=$sokeresultat\";\n";
  echo "</script>";
}
else{
  echo "<script>\n";
echo "    alert(\"Ingen Resultater\");\n";
echo "</script>\n";
}
}
 ?>
</div>
