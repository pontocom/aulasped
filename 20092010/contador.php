<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(file_exists("contador.txt")) {
    $fp = fopen("contador.txt", "r");
    $conta = fgets($fp, 10);
    fclose($fp);

    echo "Acessos = ".$conta;
    
    $conta++;

    $fp = fopen("contador.txt", "w");
    fwrite($fp, $conta);
    fclose($fp);

} else {
    $fp = fopen("contador.txt", "w");
    fwrite($fp, "1");
    fclose($fp);
}

?>
