<?php
if(isset($_REQUEST['status']) && $_REQUEST['status']=='go') {
    // fazer query UPDATE
    $db = mysql_connect("127.0.0.1", "zend", "") or die("Não consegui ligar ao servidor de BD!!!");

    mysql_select_db("agenda", $db);
    
    $query = "UPDATE contacto SET nome = '".$_REQUEST['nome']."', morada='".$_REQUEST['morada']."', email='".$_REQUEST['email']."', telefone='".$_REQUEST['telefone']."' WHERE id = ".$_REQUEST['id'];

    if(mysql_db_query("agenda", $query, $db)) {
        mysql_close($db);
        echo "<script>document.location='index.php'</script>";
    } else {
        echo "Query Falhou!!!";
    }
    mysql_close($db);
} else {
    $db = mysql_connect("127.0.0.1", "zend", "") or die("Não consegui ligar ao servidor de BD!!!");

    mysql_select_db("agenda", $db);

    $query = "SELECT * FROM contacto WHERE id = ".$_REQUEST['id'];
///echo $query;

    $rs = mysql_db_query("agenda", $query, $db);

    $nome = mysql_result($rs, 0, "nome");
    $morada = mysql_result($rs, 0, "morada");
    $email = mysql_result($rs, 0, "email");
    $telefone = mysql_result($rs, 0, "telefone");
    $foto = mysql_result($rs, 0, "foto");

    ?>

<html>
    <head></head>
    <body>
        <form action="alterar.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                        <input type="text" name="nome" value="<?php echo $nome; ?>"></td>
                </tr>
                <tr>
                    <td>Morada:</td>
                    <td><textarea name="morada" rows="4" cols="40"><?php echo $morada; ?></textarea></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><input type="text" name="telefone" value="<?php echo $telefone; ?>"></td>
                </tr>
                <tr>
                    <td>Fotografia:</td>
                    <td><input type="file" name="foto"><input type="hidden" name="status" value="go"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Alterar"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
    <?php
}
?>