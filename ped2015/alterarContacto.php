<?php
if(isset($_REQUEST['do']) && $_REQUEST['do']==1) {
    $db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD");

    mysql_select_db("ped2015", $db);

    $q = "UPDATE contacts SET nome='".$_REQUEST['nome']."', morada='".$_REQUEST['morada']."', email='".$_REQUEST['email']."' WHERE id=".$_REQUEST['id'];

    mysql_query($q, $db);

    header("Location: gestorContactos.php");
} else {
$db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD");

mysql_select_db("ped2015", $db);

$q = "SELECT * FROM contacts WHERE id=".$_REQUEST['id'];


$rs = mysql_query($q, $db);

?>

<form action="alterarContacto.php" method="post">
    <table>
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome" value="<?php echo mysql_result($rs, 0,"nome"); ?>"></td>
        </tr>
        <tr>
            <td>Morada:</td>
            <td><textarea cols="40" rows="3" name="morada"><?php echo mysql_result($rs, 0,"morada"); ?></textarea></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="<?php echo mysql_result($rs, 0,"email"); ?>"></td>
        </tr>
        <tr>
            <td>Foto:</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="do" value="1">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
            </td>
            <td><input type="submit" value="Alterar Contacto"></td>
        </tr>
    </table>
</form>

<?php
mysql_close($db);
}
?>
