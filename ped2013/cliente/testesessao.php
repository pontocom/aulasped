<?php
/**
 * Created by JetBrains PhpStorm.
 * User: carlosserrao
 * Date: 3/21/13
 * Time: 11:31 AM
 * To change this template use File | Settings | File Templates.
 */
session_start();

$_SESSION['myvariable'] = 23;
$_SESSION['var2'] = 'o meu nome';

$_SESSION['vararray'] = array (1, 2, 3, "xpto", 4);

echo $_SESSION['myvariable'];

//unset($_SESSION['myvariable']);

session_destroy();

?>