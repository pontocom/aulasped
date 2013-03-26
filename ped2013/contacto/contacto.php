<?php
session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true)
    header('Location: index.php');
?>
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
        <a href="logout.php">logout</a>
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
                    <td><?php if(isset($_REQUEST['status'])) echo $_REQUEST['status']; ?></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="op" value="c"></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
        <hr>
        
        <table border="1">
            <tr>
                <td>Nome</td>
                <td>Morada</td>
                <td>Foto</td>
                <td></td>
                <td></td>
            </tr>

<?php
$db = mysql_connect("127.0.0.1", "root", "") or die("Erro: Nao foi possivel ligar ao servidor de base de dados");

mysql_select_db("mydb", $db);

$q = "SELECT * FROM contacto WHERE idutilizador=".$_SESSION['idutilizador'];

$rs = mysql_query($q, $db);
//$a = mysql_fetch_row($rs);

while(($a = mysql_fetch_row($rs))){
    echo '<tr>';
    echo '<td>'.$a[1].'</td>';
    echo '<td>'.$a[2].'</td>';
    echo '<td>'.$a[3].'</td>';
    echo '<td><a href="crud.php?op=d&id='.$a[0].'">apagar</a></td>';
    echo '<td><a href="crud.php?op=u&id='.$a[0].'">alterar</a></td>';
    echo '</tr>';
}

mysql_close($db);
?>

        </table>
    </body>
</html>
