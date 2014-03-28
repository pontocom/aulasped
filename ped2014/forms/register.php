<?php
/**
 * Created by PhpStorm.
 * User: carlosserrao
 * Date: 28/03/14
 * Time: 10:59
 */

require_once('Utilizador.php');

if(!isset($_REQUEST['username']) || $_REQUEST['username']=='') {
    header("Location: registershow.php?status_message="."Esqueceu-se de introduzir o username");
} else {
    if (!isset($_REQUEST['password']) || $_REQUEST['password']=='') {
        header("Location: registershow.php?status_message="."Esqueceu-se de introduzir a password");
    } else {
        if ($_REQUEST['password'] != $_REQUEST['repassword']) {
            header("Location: registershow.php?status_message="."As duas passwords não são iguais");
        } else {
            $u =new Utilizador();
            $u->set($_REQUEST['username'], $_REQUEST['password']);
            $u->save();

            header("Location: registershow.php?status_message="."Registo completo!");
        }
    }
}

?>