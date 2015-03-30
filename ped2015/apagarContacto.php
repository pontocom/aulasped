<?php
$db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD");

mysql_select_db("ped2015", $db);

$q = "DELETE FROM contacts WHERE id=".$_REQUEST['id'];

if(mysql_query($q, $db) != false) {
    mysql_close($db);
    header("Location: gestorContactos.php");
} else {
    die("Houve um problema a apagar os valores na BD!");
}
?>