<?php



$variabelvenstre = 10;
$variabeltopp = 25;

$arraylength = count($studieSIM);
for ($i = 0; $i < $arraylength; $i++) {


  echo "  #cardwrap$i{\n";
echo "\n";
echo "        position: absolute;\n";
echo "        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);\n";
echo "        height: 40%;\n";
echo "        width: 35%;\n";

  if($variabelvenstre = 10) {
    echo "        left:$variabelvenstre%;\n";
    echo "        top:$variabeltopp%;\n";
    $variabelvenstre = 55;
  }

  elseif($variabelvenstre = 55){
    echo "        left:$variabelvenstre%;\n";
    echo "        top:$variabeltopp%;\n";
  $variabelvenstre = 10;
  $variabelhøyde = ($variabelhøyde + 45);
  }


  echo "      }\n";
}

?>
