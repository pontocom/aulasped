<?php
session_start();
if(!isset($_REQUEST['go']) || $_REQUEST['go']!='yes') {
?>
<html>
<head></head>
<body>
	<form action="login.php" method="POST">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="uname"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="pword"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="register.php">Register</a></td>
			</tr>
			<tr>
				<td></td>
				<input type="hidden" name="go" value="yes">
				<td><input type="submit" value="Login"></td>
			</tr>
            <tr>
                <td></td>
                <td>
                    <?php
                        if(isset($_REQUEST['status'])) {
                            echo $_REQUEST['status'];
                        }
                    ?>
                </td>
            </tr>
		</table>
	</form>
</body>
</html>
<?php
} else {
	if($_REQUEST['uname'] == '') {
		echo "You miss the username";
	} elseif($_REQUEST['pword'] == '') {
		echo "You miss the password";
	} else {
		// process login

        require_once('User.class.php');
        $u = new User();
        if($u->login($_REQUEST['uname'], $_REQUEST['pword'])) {
            $_SESSION['loggedin'] = true;
            header('Location: main.php');
        } else {
            header('Location: login.php?status='.'Invalid Login');
        }
	}
}
?>