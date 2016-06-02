<?php //The name of this file in this example is imgdata.php

  $url=$_GET['url'];

  $temp = getimagesize($url);

  if ($temp != false) {
    $img = file_get_contents($url);
    $fn = "./tempImages/".rand(0,100).".jpg";
    file_put_contents($fn,$img);
    echo "/assets/articles/kaleidoscope/".$fn;
  } else {
    echo "0";
  }
?>
