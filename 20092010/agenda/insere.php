<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$db = mysql_connect("127.0.0.1", "zend", "") or die("Não consegui ligar ao servidor de BD!!!");

mysql_select_db("agenda", $db);

$query = "INSERT INTO contacto (nome, morada, email, telefone, foto) VALUES ('".$_REQUEST['nome']."', '".$_REQUEST['morada']."', '".$_REQUEST['email']."', '".$_REQUEST['telefone']."', '".$_REQUEST['foto']."')";

///echo $query;

if(mysql_db_query("agenda", $query, $db)) {
    mysql_close($db);
    echo "<script>document.location='contacto.php'</script>";
} else {
    echo "Query Falhou!!!";
}
mysql_close($db);
?>
