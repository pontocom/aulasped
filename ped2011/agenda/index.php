<?php
session_start();

if($_SESSION['loggedin']=="TRUE")
{
    header("Location: main.php");
}
else
{
?>
<html>
    <body>
        <form action="login.php" method="POST">
            <table border="1" align="center">
                <tr><td>Login:</td><td><input type="text" name="login"></td></tr>
                <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
                <tr><td></td><td><input type="submit" value="Entrar"></td></tr>
                <tr><td></td><td><font color="red"><?php echo $_REQUEST['message']; ?></font></td></tr>
            </table>
        </form>
        <center>
            <a href="register.php">Registe-se!</a>
        </center>
    </body>
</html>
<?php
}
?>