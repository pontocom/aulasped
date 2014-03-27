<?php
session_start();

$db = mysql_connect("127.0.0.1", "root", "") or die("Erro: Nao foi possivel ligar ao servidor de base de dados");

mysql_select_db("mydb", $db);

$q = "SELECT * FROM utilizador WHERE username='".$_REQUEST['username']."' AND password='".md5($_REQUEST['password'])."'";

$rs = mysql_query($q, $db);

if(($r=mysql_fetch_row($rs)))
{
    $_SESSION['loggedin'] = true;
    $_SESSION['idutilizador'] = $r[0];

    mysql_close($db);

    header('Location: contacto.php');
} else {
    $_SESSION['loggedin'] = false;

    mysql_close($db);

    header('Location: index.php?status='.'Credenciais incorretas!');

}

mysql_close($db);
?>