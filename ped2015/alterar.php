<?php
if(isset($_REQUEST['do']) && $_REQUEST['do']==1) {
    $db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD!!!");

    mysql_select_db("ped2015", $db);

    $q = "UPDATE contactos SET nome='".$_REQUEST['nome']."', email='".$_REQUEST['email']."', morada='".$_REQUEST['morada']."' WHERE id=".$_REQUEST['id'];

    if(mysql_query($q, $db) == false) {
        echo "Não consegui alterar os dados!";
    }

    mysql_close($db);
    header("Location: contact.php");
} else {
?>
    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
    $db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD!!!");

    mysql_select_db("ped2015", $db);

    $q = "SELECT * FROM contactos WHERE id=".$_REQUEST['id'];

    $rs = mysql_query($q, $db);

    mysql_fetch_row($rs);

    $nome = mysql_result($rs, 0, "nome");
    $email = mysql_result($rs, 0, "email");
    $morada = mysql_result($rs, 0, "morada");

    mysql_close($db);
    ?>

    <form action="alterar.php" method="post">
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="<?php echo $nome; ?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>Morada:</td>
                <td><textarea cols="40" rows="3" name="morada"><?php echo $morada; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                    <input type="hidden" name="do" value="1"></td>
                <td><input type="submit" value="Alterar Dados"></td>
            </tr>
        </table>
    </form>

    <br>
    <br>
    </body>
    </html>
<?php
}
?>
