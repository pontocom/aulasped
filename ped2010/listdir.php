<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$var = scandir(getcwd());
foreach($var as $tvar) {
    echo $tvar."<br>";
}

?>
