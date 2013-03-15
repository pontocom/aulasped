<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="crud.php" method="post">
            <table>
                <tr>
                    <td>Nome: </td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>Morada: </td>
                    <td><textarea rows="4" cols="40" name="morada"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
        <hr>
        
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Morada</td>
                <td>Foto</td>
            </tr>

<?php
$db = mysql_connect("127.0.0.1", "root", "") or die("Erro: Nao foi possivel ligar ao servidor de base de dados");

mysql_select_db("mydb", $db);

$q = "SELECT * FROM contacto";

$rs = mysql_query($q, $db);
//$a = mysql_fetch_row($rs);

while(($a = mysql_fetch_row($rs))){
    echo '<tr>';
    foreach($a as $data)
        echo '<td>'.$data.'</td>';
    echo '</tr>';
}

mysql_close($db);
?>

        </table>
    </body>
</html>
