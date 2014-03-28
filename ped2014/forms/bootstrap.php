<?php
/**
 * Created by PhpStorm.
 * User: carlosserrao
 * Date: 28/03/14
 * Time: 10:24
 */

$sql = "INSERT INTO utilizador (uname, pword) VALUES ('admin', '".sha1('admin')."')";

$db = mysql_connect('127.0.0.1', 'root', '') or die('Nao consegui ligar à BD!!!');

mysql_select_db('ped2014', $db);

$rs = mysql_query($sql, $db);
if($rs == false) echo 'Falhou a query!!!';

mysql_close($db);

?>