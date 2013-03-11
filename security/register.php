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
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="login"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="action" value="doRegister"></td>
                        <td><input type="submit" value="Register"></td>
                    </tr>
                </table>
            </form>
            <?php
            if(isset($_REQUEST['action']) && $_REQUEST['action']=='doRegister'){
                $sql = "INSERT INTO users (username, password) VALUES ('".$_REQUEST['login']."' , '".$_REQUEST['password']."')";
                echo $sql;
                
                $db = mysql_connect('127.0.0.1', 'root', '') or die('Could not open connection to database!');
                mysql_selectdb('demo', $db);
                
                if(!mysql_query($sql, $db)){
                    mysql_close($db);
                    die('Could not inser data in database!');
                }
                
                mysql_close($db);
            }
            ?>
            
        </div>
    </body>
</html>
