<?php
/**
 * Created by PhpStorm.
 * User: carlosserrao
 * Date: 28/03/14
 * Time: 10:03
 */

require_once('Utilizador.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$u = new Utilizador();

if($u->login($username, $password)) {
    header("Location: registerpessoa.php?idutilizador=".$u->getId());
}
else  echo 'Login inválido!!';


?>