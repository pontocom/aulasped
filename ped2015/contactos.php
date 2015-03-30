<?php
$db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD!!!");

mysql_select_db("ped2015", $db);

$q = "INSERT INTO contactos (nome, email, morada) VALUES ('".$_REQUEST['nome']."', '".$_REQUEST['email']."', '".$_REQUEST['morada']."')";

if(mysql_query($q, $db) == false) {
    echo "Não consegui introduzir os dados!";
}

mysql_close($db);

header("Location: contact.php");
?>