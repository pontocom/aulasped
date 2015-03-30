<?php
include_once 'Account.php';
session_start();
if(isset($_REQUEST['logindo']) && $_REQUEST['logindo']==1) {
    $account = new Account();

    if($account->login($_REQUEST['username'], $_REQUEST['password'])==false) {
        header("Location: login.php");
    } else {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $account->getId();

        header("Location: gestorContactos.php");
    }

} else {
?>
<html>
<head>
    <title>Gestor de Contactos</title>
</head>
<body>
<form action="login.php" method="post">
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
