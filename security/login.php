<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div style="width:270px;height:150px;position:absolute;left:50%;top:50%;margin:-75px 0 0 -135px;">
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>Login: </td>
                        <td><input type="text" name="login"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="action" value="doLogin"></td>
                        <td><input type="submit" value="Login"></td>
                    </tr>
                </table>
                <p>You need to register? <a href="register.php">Click here</a>!</p>
            </form>
            <?php
            if(isset($_REQUEST['action']) && $_REQUEST['action']=='doLogin'){
                $sql = "SELECT * FROM users WHERE username='".$_REQUEST['login']."' AND password='".$_REQUEST['password']."'";
                echo $sql.'<br>';
                
                $db = mysql_connect('127.0.0.1', 'root', '') or die('Could not open connection to database!');
                mysql_selectdb('demo', $db);
                
                $rs = mysql_query($sql, $db);
                
                if(!$rs){
                    mysql_close($db);
                    die('Wrong user or password!');
                }
                else
                {
                    echo 'User and password are correct!!!<br>';
                    $a = mysql_fetch_array($rs);
                    print_r($a);
                }
                
                mysql_close($db);
            }
            ?>
        </div>
    </body>
</html>
