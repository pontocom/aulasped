<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$db = mysql_connect("127.0.0.1", "root", "") or die("Erro: Nao foi possivel ligar ao servidor de base de dados");

mysql_select_db("mydb", $db);

$q = "INSERT INTO contacto (nome, morada, foto) VALUES ('".$_REQUEST['nome']."', '".$_REQUEST['morada']."', ' ')";

echo $q;

if(mysql_query($q, $db))
{
    //echo 'Query executada com sucesso!';
    
    mysql_close($db);

    header('Location: index.php');
}

mysql_close($db);

?>
