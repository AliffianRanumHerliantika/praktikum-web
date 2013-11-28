<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang:"en" lang="en">

<head>
  <title>Generator Tabel</title>
</head>

<body>
<div align="center">
<?php
  $rows = 1;
  $cols = 1;
  $cells = 1;
?>

<?php $rows = 2; ?>
<?php $columns = 3; ?>
<?php $cells = 12; ?>

<?php
  echo "<table width=250 height=250 border=1>";
  $row = 0;
  $cell = 1;
  while ($cell <= $cells) {
    echo "<tr>";
    $column = 0;
	while ($column < $columns) {
	  if ($cell <= $cells) {
		echo "<td><div align=center>".$cell."</div></td>";
		$cell++;
	  }
	  $column++;
	}
	echo "</tr>";
	$row++;
  }
  echo "</table>";
?>
</div>
</body>
</html>