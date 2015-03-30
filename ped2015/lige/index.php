<?php
session_start();
include_once 'Account.php';
if(isset($_REQUEST['logindo']) && $_REQUEST['logindo']==1) {
    $a = new Account();
    if($a->login($_REQUEST['username'], $_REQUEST['password']) == true) {
        $_SESSION['iduser'] = $a->getId();
        $_SESSION['username'] = $a->getUsername();
        $_SESSION['loggedin'] = true;
        header("Location: gestorContactos.php");
    } else {
        header("Location: index.php");
    }
} else {
?>
<html>
<head>
    <title>Gestor de Contactos</title>
</head>
<body>
<form action="index.php" method="post">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="logindo" value="1"></td>
            <td><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>
</body>
<?php
}
?>
