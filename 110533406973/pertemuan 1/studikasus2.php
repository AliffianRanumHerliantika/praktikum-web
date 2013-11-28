<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/x-icon" href="favicon.png">
        <title>Make Matriks with PHP</title>
    </head>
    <body bgcolor="#ADFF2F">
    <center>
    <h1>..:: Membuat MATRIKS dengan PHP ::..</h1>
    <table>
        <form method="get">
        <tr>        
        <td> Input rows <br><br></td>
        <td>: <input type="text" size="15" name="baris"><br><br></td>
        </tr>
        <tr>
        <td> Input coloumns<br><br> </td>
        <td>: <input type="text" size="15" name="kolom"><br><br></td>
        </tr>
        <tr>
        <td></td>
        <td align="right"> <input type="submit" value="Generate"></td>
        </tr>
        </form>
        </table>
        <br>
        <?php
            $baris = $_GET["baris"];
            $kolom = $_GET["kolom"];
           
            function generate($baris, $kolom){
                $cell = 0;
               
                echo "<table border='2' cellpadding='10'>";
               
                for($i = 0; $i < $baris; $i++){
                    echo "<tr>";
                        for($j = 0; $j < $kolom; $j++){
                            ++$cell;
                            echo "<td>$cell</td>";
                        }
                    echo "</tr>";
                }
               
                echo "</table>";
            }
           
            if(isset($baris) AND isset($kolom)){
                generate($baris, $kolom);
            }
        ?>
        </center>
    </body>
</html>