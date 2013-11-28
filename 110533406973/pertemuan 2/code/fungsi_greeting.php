<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang:"en" lang="en">

<head>
  <title>Fungsi Greeting</title>
</head>

<body>

<?php
  function greeting() {
    $date = date ("H : i");
      if ($date>=00 and $date<11) {
        echo "Selamat Pagi"; } 
	  else if ($date>=11 and $date<15) {
        echo "Selamat Siang"; } 
      else if ($date>=15 and $date<18) {
        echo "Selamat Sore:)"; } 
	  else if ($date>=18 and $date<=23) {
        echo "Selamat Malam"; }
	  else echo "Waktu salah"; }
?>

<?php
  greeting();
?>
</body>
</html>