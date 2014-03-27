<?php
$db = mysql_connect("127.0.0.1", "root", "") or die("Erro: Nao foi possivel ligar ao servidor de base de dados");

mysql_select_db("mydb", $db);

$q = "INSERT INTO utilizador (username, password, nome) VALUES ('".$_REQUEST['username']."', '".md5($_REQUEST['password'])."', '".$_REQUEST['nome']."')";

if(mysql_query($q, $db))
{
    mysql_close($db);

    header('Location: index.php?status='.'Registo inserido!');
} else {
    mysql_close($db);

    header('Location: index.php?do=registration&status='.'Nao foi possivel inserir registo!');

}

mysql_close($db);
?>