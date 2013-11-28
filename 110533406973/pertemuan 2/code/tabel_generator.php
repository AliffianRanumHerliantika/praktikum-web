<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang:"en" lang="en">
<head>
<title>Hasil Generate Tabel</title>
</head>
<body>
  <?php
$rows = 1;
$columns = 1;
$cells = 1;
?>
  
  <?php $rows = (int) $_POST["JumlahRow"]; ?>
  <?php $columns = (int) $_POST["JumlahColum"]; ?> 
  <?php $cells = (int) $_POST["JumlahCell"]; ?>
  
  <strong>Kamu Memilih</strong> <?php echo $rows; ?> <em>rows,</em><br />
  <strong>Kamu Memilih</strong> <?php echo $columns; ?> <em>columns,</em><br />
  <strong>Dan Anda Membutuhkan</strong> <?php echo $cells; ?> <em>cells,</em><br />
  <br />
  <br />
  <?php
    $width = $columns * 75;
    echo "<table width=".$width." border=1>";
    $rw = 0;
    $cel = 1;
    while ($rw < $rows && $cel <= $cells) 
    {
        echo "<tr>";
        $cl = 0;
        while ($cl < $columns) 
        {
            if ($cel <= $cells) 
            {
                echo "<td><div align=center>".$cel."</div></td>";
                $cel++;
            }
            $cl++;
        }
        echo "</tr>";
        $rw++;
    }
    echo "</table>";
?>
</div>
</body>
</html>