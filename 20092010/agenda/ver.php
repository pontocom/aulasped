<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

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

<table border="1">
    <tr>
        <td>Nome:</td>
        <td><?php echo $nome; ?></td>
    </tr>
    <tr>
        <td>Morada:</td>
        <td><?php echo $morada; ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <td>Telefone:</td>
        <td><?php echo $telefone; ?></td>
    </tr>
    <tr>
        <td>Fotografia:</td>
        <td><?php echo $foto; ?></td>
    </tr>
</table>

<?php

mysql_close($db);
?>

<a href="index.php">voltar</a>
