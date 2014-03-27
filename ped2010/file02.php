<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$fich = fopen("http://www.iscte.pt", "r");

while(!feof($fich)){
    $iscte .= fgets($fich, 1024);
}

echo $iscte;
?>
