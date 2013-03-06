<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$if = fopen("ficheiro.txt", "r");

$mvar = fread($if, filesize("ficheiro.txt"));

echo $mvar;

?>
