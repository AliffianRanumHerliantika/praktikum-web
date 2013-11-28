<html>
<head>
        <title>Tugas Praktikum</title>
</head>
<body><h3> Seleksi Header Tabel</h3>
<?php
require_once("koneksi.php");

$sql="SELECT * FROM mahasiswa";
$sort_type=isset($_GET['sort'])?$_GET['sort']:"asc";
if (isset($_GET['type'])&&$_GET['type']=="nama") {
        $type="nama";
}
else
{
        $type="alamat";
}
if (!isset($_GET['sort'])||(isset($_GET['sort'])&&$_GET['sort']=="asc")) {
        $sort_type="asc";
}
elseif (isset($_GET['sort'])&&$_GET['sort']=="desc")
{
        $sort_type="desc";
}
        if($type=="nama"){
        if (isset($_GET['sort']) && $_GET['sort']=='asc') {
                        $sort_type="desc";
                }
                else if (isset($_GET['sort']) && $_GET['sort']=='desc') {
                        $sort_type="asc";
                }
        }
        else{
                if (isset($_GET['sort']) && $_GET['sort']=='asc') {
                        $sort_type="desc";
                }
                else if (isset($_GET['sort']) && $_GET['sort']=='desc') {
                        $sort_type="asc";
                }
        }

        $type=isset($_GET['type'])?$_GET['type']:"nama";

        $sql.=" order by ".$type." ".$sort_type." ";
        echo $sql;
$res=mysql_query($sql);
if ($res) {
        if (mysql_num_rows($res)) {
                
                ?>

<table border=1 cellpadding=5 cellspacing=1 style="background-color:#0000FF" style="border:dashed" bordercolor="#000000">
<tr style="background-color:#9999FF"><th>#</th>
<th width=100 style="background-color:#00FF00">NIM</th>
<th width=150 style="background-color:#00FF00"><a href="?type=nama&sort=<?php echo $sort_type; ?>">Nama</a></th>
<th style="background-color:#9999FF" ><a href="?type=alamat&sort=<?php echo $sort_type; ?>" >Alamat</a></th>
</tr>
<?php


                $i=1;
                while($row=mysql_fetch_row($res)){
                        ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row[0]; ?></td>
<td><?php echo $row[1]; ?></td>
<td><?php echo $row[2]; ?></td>
</tr>
<?php
                        $i++;
                }
                ?>
</table>
<?php
        }else
        {
                echo "Data yang Anda Cari Tidak Dapat Ditemukan";
        }
        mysql_close();
}
 ?>
</body>
</html>