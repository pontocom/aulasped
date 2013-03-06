<?php
session_start();

$db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

if (!mysql_selectdb("iagenda", $db)) {
    echo 'Não consegui seleccionar a BD!';
    exit;
}

$query = "SELECT * FROM utilizador WHERE username='" . $_REQUEST['username'] . "' AND password = '".md5($_REQUEST['password'])."'";

$rs = mysql_query($query, $db);

if(mysql_fetch_row($rs))
{
    mysql_close($db);
    $_SESSION['loggedin'] = "ON";
    
    $_SESSION['userid'] = mysql_result($rs, 0, 'id');
    
    header("Location: main.php");
}
else
{
    mysql_close($db);
    $status = "Dados de autenticação inválidos!";
    header("Location: index.php?status=".htmlspecialchars($status));
}

?>
