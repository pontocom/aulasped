<?php
session_start();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_destroy();
header("Location: index.php?message=Volte sempre!");
?>
