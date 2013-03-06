<?php
session_start();

if($_REQUEST['login']=='')
{
    header("Location: index.php?message=Nao introduziu o login!");
}
else
{
    if($_REQUEST['password']=='')
    {
        header("Location: index.php?message=Nao introduziu a password!");
    }
    else
    {
        $con = mysql_connect("127.0.0.1", "zend", "") or die('Naoo consegui ligar ao SGBD!!!');

        // seleccionar a BD
        mysql_select_db("agenda");

        // construir a query
        $query = "SELECT * FROM agenda_info WHERE login = '".$_REQUEST['login']."' AND pwd = '".md5($_REQUEST['password'])."'";

        $rs = mysql_query($query, $con);

        if(mysql_num_rows($rs) != 0)
        {
            $_SESSION['loggedin'] = "TRUE";

            $isadmin = mysql_result($rs, 0, "isadmin");

            $_SESSION['uid'] = mysql_result($rs, 0, "id_entry");

            if($isadmin == 1)
            {
                $_SESSION['usertype'] = "admin";
            } else {
                $_SESSION['usertype'] = "user";
            }
            mysql_close($con);
            header("Location: main.php");
        } else {
            mysql_close($con);
            $_SESSION['loggedin'] = "FALSE";
            header("Location: index.php?message='Login incorrecto!!!'");
        }

    }
}

/*
if($_REQUEST['login']=="user" && $_REQUEST['password']=="xpto")
{
    $_SESSION['loggedin'] = "TRUE";
    $_SESSION['usertype'] = "user";
    header("Location: main.php");
}
else
{
    if($_REQUEST['login']=="admin" && $_REQUEST['password']=="admin")
    {
        $_SESSION['loggedin'] = "TRUE";
        $_SESSION['usertype'] = "admin";
        header("Location: main.php");
    }
    else
    {
        $_SESSION['loggedin'] = "FALSE";
        header("Location: index.php?message='Login incorrecto!!!'");
    }
}*/

?>
