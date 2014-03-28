<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<script language="javascript">
    function validateAndSubmit()
    {
        var uname = document.getElementById('username').value;
        var pword = document.getElementById('password').value;
        var repword = document.getElementById('repassword').value;

        if(uname.length == 0 )
            alert('Não introduziu o username');
        else
            if(pword.length == 0)
                alert('Não introduziu o password');
            else
                if (pword != repword)
                    alert('As passwords são diferentes');
                else
                    document.getElementById('registerForm').submit();
    }
</script>

<form action="register.php" method="POST" id="registerForm">
<table>
    <tr>
        <td>
            Username:
        </td>
        <td>
            <input type="text" name="username" id="username">
        </td>
    </tr>
    <tr>
       <td>
           Password:


       </td>
        <td>
            <input type="password" name="password" id="password">
        </td>
    </tr>
    <tr>
        <td>
            Re-type Password:

        </td>
        <td>
            <input type="password" name="repassword" id="repassword">

        </td>
    </tr>
    <tr>
        <td>

        </td>
        <td>
            <!-- <input type="submit" value="Register New User"> -->
            <input type="button" value="Registar" onclick="validateAndSubmit()">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php
                if(isset($_REQUEST['status_message']) || $_REQUEST['status_message']!='') {
                    echo $_REQUEST['status_message'];
                }
            ?>
        </td>
    </tr>
</table>
</form>
</body>
</html>