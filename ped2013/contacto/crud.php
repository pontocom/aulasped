<?php
session_start();
$db = mysql_connect("127.0.0.1", "root", "") or die("Erro: Nao foi possivel ligar ao servidor de base de dados");

mysql_select_db("mydb", $db);

if(isset($_REQUEST['op']) && $_REQUEST['op']=='d')
{
    $q = "DELETE FROM contacto WHERE idcontacto=".$_REQUEST['id'];

    if(mysql_query($q, $db))
    {
        mysql_close($db);

        header('Location: contacto.php?status='.'Registo apagado!');
    } else {
        mysql_close($db);

        header('Location: contacto.php?status='.'Nao foi possivel apagar!');

    }
    mysql_close($db);
}

if(isset($_REQUEST['op']) && $_REQUEST['op']=='u')
{
    $q = "SELECT * FROM contacto WHERE idcontacto=".$_REQUEST['id'];

    $rs = mysql_query($q, $db);

    $r = mysql_fetch_row($rs);
?>
    <form action="crud.php" method="post">
        <table>
            <tr>
                <td>Nome: </td>
                <td><input type="text" name="nome" value="<?php echo $r[1]; ?>"></td>
            </tr>
            <tr>
                <td>Morada: </td>
                <td><textarea rows="4" cols="40" name="morada"><?php echo $r[2]; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"</td>
            </tr>
            <tr>
                <td><input type="hidden" name="op" value="udo"></td>
                <td><input type="submit" value="Alterar"></td>
            </tr>
        </table>
    </form>
<?php

    mysql_close($db);
}

if(isset($_REQUEST['op']) && $_REQUEST['op']=='udo')
{
    $q = "UPDATE contacto SET nome = '".$_REQUEST['nome']."', morada='".$_REQUEST['morada']."' WHERE idcontacto = ".$_REQUEST['id'];

    if(mysql_query($q, $db))
    {
        mysql_close($db);

        header('Location: contacto.php?status='.'Registo alterado!');
    } else {
        mysql_close($db);

        header('Location: contacto.php?status='.'Nao foi possivel alterar registo!');

    }

    mysql_close($db);
}

if(isset($_REQUEST['op']) && $_REQUEST['op']=='c')
{
    $q = "INSERT INTO contacto (nome, morada, foto, idutilizador) VALUES ('".$_REQUEST['nome']."', '".$_REQUEST['morada']."', ' ', ".$_SESSION['idutilizador'].")";

    if(mysql_query($q, $db))
    {
        mysql_close($db);

        header('Location: contacto.php?status='.'Registo inserido!');
    } else {
        mysql_close($db);

        header('Location: contacto.php?status='.'Nao foi possivel inserir registo!');

    }

    mysql_close($db);
}

?>
