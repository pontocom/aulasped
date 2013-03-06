<?php
if ($_REQUEST['username'] == "" || $_REQUEST['password'] == "" || $_REQUEST['repassword'] == "") {
    echo "Os campos nao estao todos preenchidos!";
} else {
    if ($_REQUEST['password'] != $_REQUEST['repassword']) {
        echo "As passwords nao coincidem!";
    } else {
        $db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

        if (!mysql_selectdb("iagenda", $db)) {
            echo 'Não consegui seleccionar a BD!';
            exit;
        }

        $query = "INSERT INTO utilizador VALUES ('".md5($_REQUEST['username'])."', '" . $_REQUEST['username'] . "', '" . md5($_REQUEST['password']) . "', '".$_REQUEST['email']."')";

        if (!mysql_query($query, $db)) {
            mysql_close($db);
            echo 'Não consegui introduzir os dados!';
            exit;
        }

        mysql_close($db);
    }
}
?>
