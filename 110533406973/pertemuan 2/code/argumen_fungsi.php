<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang:"en" lang="en">
<head>
  <title>Definisi fungsi/prosedur</title>
</head>
<body>

<?php

/**
 * Mencetak string
 * $teks nilai string
 * $bold adalah argumen opsional
 */
function print_teks($teks, $bold = true) {
	echo $bold ? '<b>' .$teks. '</b>' : $teks;
}

print_teks('Indonesiaku');
// Mencetak dengan huruf tebal

print_teks('Indonesiaku', false);
// Mencetak dengan huruf reguler
?>
</body>
</html>