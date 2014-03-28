<?php
if(!isset($_REQUEST['go']) || $_REQUEST['go']!='yes') {
?>
<html>
<head></head>
<body>
	<form action="register.php" method="POST">
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
				<td>Re-type password:</td>
				<td><input type="password" name="rpword"></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Twitter:</td>
				<td><input type="text" name="twitter"></td>
			</tr>
			<tr>
				<td>Facebook:</td>
				<td><input type="text" name="facebook"></td>
			</tr>
			<tr>
				<td></td>
				<input type="hidden" name="go" value="yes">
				<td><input type="submit" value="Register"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
} else {
	require_once('User.class.php');
	require_once('Person.class.php');

	$u = new User();
	$p = new Person();
	
	$u->set($_REQUEST['uname'], $_REQUEST['pword']);
	if(!$u->save()) echo "Error on user creation!";
    $last = $u->getLastId();

    $p->set($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['twitter'], $_REQUEST['facebook'], $last);
    if(!$p->save()) echo "Error on person creation";

}
?>