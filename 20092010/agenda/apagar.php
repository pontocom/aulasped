<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$db = mysql_connect("127.0.0.1", "zend", "") or die("Não consegui ligar ao servidor de BD!!!");

mysql_select_db("agenda", $db);

$query = "DELETE FROM contacto WHERE id = ".$_REQUEST['id'];

///echo $query;

if(mysql_db_query("agenda", $query, $db)) {
    mysql_close($db);
    echo "<script>document.location='index.php'</script>";
} else {
    echo "Query Falhou!!!";
}
mysql_close($db);
?>
