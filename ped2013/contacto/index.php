<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>CONTACT MANAGER</title>
</head>
<body>
<center><h1>CONTACT MANAGER</h1></center>

<?php
if(isset($_REQUEST['do']) && $_REQUEST['do']=="registration")
{
?>
<form action="registration.php" method="post">
    <table align="center">
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome"></td>
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><?php if(isset($_REQUEST['status'])) echo $_REQUEST['status']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="registo"></td>
        </tr>
    </table>
</form>
<?php
} else {
?>
    <form action="login.php" method="post">
        <table align="center">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><?php if(isset($_REQUEST['status'])) echo $_REQUEST['status']; ?></td>
            </tr>
            <tr>
                <td><a href="index.php?do=registration">Registar novo utilizador</a></td>
                <td><input type="submit" value="login"></td>
            </tr>
        </table>
    </form>
<?php
}
?>
</body>
</html>
