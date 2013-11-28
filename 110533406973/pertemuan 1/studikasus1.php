<!DOCTYPE html>
<html lang="en">
<head>
    <title>Studi Kasus 1</title>
</head>

<body>
<center>

<h1>

<?php
function greeting()
{
$date = date ("H : i");
if ($date>=00 and $date<11) {
    echo "Selamat Pagi... :)";
} else if ($date>=11 and $date<15) {
    echo "Selamat Siang... :)";
} else if ($date>=15 and $date<18) {
    echo "Selamat Sore... :)";
} else if ($date>=18 and $date<23) {
    echo "Selamat Malam... :)";
}else echo "Waktu salah)";
}
?>

<?php
greeting();
?>
<br>
</h1>

<h3> Sekarang adalah

<?php
//Array Hari
    $array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
    $hari = $array_hari[date("N")];
//Format Tanggal
    $tanggal = date ("d");
//Array Bulan
    $array_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $bulan = $array_bulan[date("n")];
//Format Tahun
    $tahun = date("Y");
//Menampilkan hari dan tanggal
    echo "hari $hari, $tanggal - $bulan - $tahun";
?>
<br>

Saat ini waktu menunjukkan pukul
<?php
//penulisan waktu
    $date = date ("H : i");
    echo "$date WIB";
?>
</h3>

</body>
</html>