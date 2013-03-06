<html>
    <body>
        <p align="center"><font size="+5" color="red"><b>iAgenda</b></font></p>
<?php
if(!isset($_REQUEST['op']))
{
?>
        <form action="login.php" method="POST">
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
                    <td><input type="submit" value="Enter"></td>
                </tr>
            </table>
        </form>
        <p align="center"><a href="index.php?op=reg">registo de novo utilizador</a></p>
        <p align="center"><a href="index.php?op=rec">recuperar a password</a></p>
        <p align="center">
            <?php
            if(isset($_REQUEST['status'])) echo $_REQUEST['status'];
            ?>
        </p>
<?php
}

if(isset($_REQUEST['op']) && $_REQUEST['op']=="reg")
{
?>
        <form action="registo.php" method="POST">
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
                    <td>Retype Password:</td>
                    <td><input type="password" name="repassword"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Enter"></td>
                </tr>
            </table>
        </form>
<?php
}
if(isset($_REQUEST['op']) && $_REQUEST['op']=="rec")
{
?>
        <form action="recuperar.php" method="POST">
            <table align="center">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="do" value="now"></td>
                    <td><input type="submit" value="Enter"></td>
                </tr>
            </table>
        </form>
<?php
}
?>  
    </body>
</html>
<?php
?>
