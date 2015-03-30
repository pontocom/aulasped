<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="contactos.php" method="post">
    <table>
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Morada:</td>
            <td><textarea cols="40" rows="3" name="morada"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Enviar Dados"></td>
        </tr>
    </table>
    </form>

    <br>
    <br>

    <table cellpadding="3" cellspacing="3">
        <tr bgcolor="black">
            <td><font color="#f5f5dc">Nome</font></td>
            <td><font color="#f5f5dc">Email</font></td>
            <td><font color="#f5f5dc">Morada</font></td>
            <td></td>
            <td></td>
        </tr>
        <?php

$db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD!!!");

mysql_select_db("ped2015", $db);

$q = "SELECT * FROM contactos";

$rs = mysql_query($q, $db);

        $n=0;
        while(mysql_fetch_row($rs))
        {
            echo "<tr>";
            echo "<td>".mysql_result($rs, $n, "nome")."</td>";
            echo "<td>".mysql_result($rs, $n, "email")."</td>";
            echo "<td>".mysql_result($rs, $n, "morada")."</td>";
            echo "<td><a href='apagar.php?id=".mysql_result($rs, $n, "id")."'>apagar</a></td>";
            echo "<td><a href='alterar.php?id=".mysql_result($rs, $n, "id")."'>alterar</a></td>";
            echo "</tr>";
            $n++;
        }

mysql_close($db);
        ?>
    </table>
</body>
</html>