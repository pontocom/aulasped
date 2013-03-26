<?php
/**
 * Created by JetBrains PhpStorm.
 * User: carlosserrao
 * Date: 3/21/13
 * Time: 9:55 AM
 * To change this template use File | Settings | File Templates.
 */

if(isset($_REQUEST['op']) && $_REQUEST['op']=="delete"){
    $db = mysql_connect("127.0.0.1", "root", "") or die("Nao consegui ligar à BD");

    mysql_select_db("mydb", $db);

    $q = "DELETE FROM cliente WHERE idcliente = ".$_REQUEST['id'];

    if(mysql_query($q, $db))
    {
        mysql_close($db);
        header('Location: contacto.php');
    }
    else
    {
        mysql_close($db);
        header('Location: contacto.php?error='.'Erro, não consegui apagar cliente!!!');
    }
}

if(isset($_REQUEST['op']) && $_REQUEST['op']=="update"){
    $db = mysql_connect("127.0.0.1", "root", "") or die("Nao consegui ligar à BD");

    mysql_select_db("mydb", $db);

    $q = "SELECT * FROM cliente WHERE idcliente = ".$_REQUEST['id'];

    $rs = mysql_query($q, $db);

    $r=mysql_fetch_row($rs);

?>
    <form action="crud.php" method="post">
        <table>
            <tr>
                <td>
                    <lable>Nome do Cliente:</lable>
                </td>
                <td>
                    <input type="text" name="nome" value="<?php echo $r[1]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Morada:</lable>
                </td>
                <td>
                    <textarea rows="4" cols="50" name="morada"><?php echo $r[2]; ?></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="op" value="updatenow"></td>
                <td><input type="hidden" name="id" value="<?php echo $r[0]; ?>"></td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" value="Alterar Cliente">
                </td>
            </tr>
        </table>
    </form>

    <?php

    mysql_close($db);
}

if(isset($_REQUEST['op']) && $_REQUEST['op']=="create")
{
    $db = mysql_connect("127.0.0.1", "root", "") or die("Nao consegui ligar à BD");

    mysql_select_db("mydb", $db);

    $q = "INSERT INTO cliente (nome, morada) VALUES ('".$_REQUEST['nome']."', '".$_REQUEST['morada']."')";

    if(mysql_query($q, $db))
    {
        mysql_close($db);
        header('Location: contacto.php');
    }
    else
    {
        mysql_close($db);
        header('Location: contacto.php?error='.'Erro, não consegui introduzir cliente!!!');
    }
}

if(isset($_REQUEST['op']) && $_REQUEST['op']=="updatenow")
{
    $db = mysql_connect("127.0.0.1", "root", "") or die("Nao consegui ligar à BD");

    mysql_select_db("mydb", $db);

    $q = "UPDATE cliente SET nome = '".$_REQUEST['nome']."', morada ='".$_REQUEST['morada']."' WHERE idcliente=".$_REQUEST['id'];

    if(mysql_query($q, $db))
    {
        mysql_close($db);
        header('Location: contacto.php?error='.'Cliente alterado com sucesso');
    }
    else
    {
        mysql_close($db);
        header('Location: contacto.php?error='.'Erro, não consegui alterar o cliente!!!');
    }
}
?>