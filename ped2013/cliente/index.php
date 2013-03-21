<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Gestao de Clientes</title>
</head>
<body>
<form action="crud.php" method="post">
    <table>
        <tr>
            <td>
                <lable>Nome do Cliente:</lable>
            </td>
            <td>
                <input type="text" name="nome">
            </td>
        </tr>
        <tr>
            <td>
                <lable>Morada:</lable>
            </td>
            <td>
                <textarea rows="4" cols="50" name="morada"></textarea>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="op" value="create"></td>
            <td><?php if(isset($_REQUEST['error'])) echo $_REQUEST['error']; ?></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" value="Introduzir Cliente">
            </td>
        </tr>
    </table>
</form>

<tablE border=1>
    <tr>
        <td>Id #</td>
        <td>Nome</td>
        <td>Morada</td>
        <td></td>
        <td></td>
    </tr>
    <?php
        $db = mysql_connect("127.0.0.1", "root", "") or die("Nao consegui ligar à BD");

        mysql_select_db("mydb", $db);

        $q = "SELECT * FROM cliente";

        $rs = mysql_query($q, $db);

        while(($r=mysql_fetch_row($rs)))
        {
            echo '<tr>';

            foreach($r as $d){
                echo '<td>'.$d.'</td>';
            }

            echo '<td><a href="crud.php?op=delete&id='.$r[0].'">apagar</a></td>';
            echo '<td><a href="crud.php?op=update&id='.$r[0].'">alterar</a></td>';

            echo '</tr>';
        }

        mysql_close($db);
    ?>
</tablE>
</body>
</html>