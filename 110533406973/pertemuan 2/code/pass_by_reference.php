<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
  <title>Pass By reference</title> 
</head> 
<body> 
<?php
function jumlah(&$nilai) {
    $nilai++;
}

$input=5;
jumlah($input);
echo $input;
?>

</body>
</html>
