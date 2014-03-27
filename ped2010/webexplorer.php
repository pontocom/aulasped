<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($_GET['dir']) || $_GET['dir']=='')
    $dh = opendir(getcwd());
else
    $dh = opendir($_GET['dir']);

// lista e mostra as directorias

while($entry = readdir($dh)){
    if($entry == '.') continue;
    if($entry == '..') {
        echo '<a href="webexplorer.php?dir='.$entry.'">[up]</a><br>';
        continue;
    }

    if(is_dir($entry)){
        var_dump(is_dir($entry));
        echo '<a  href="webexplorer.php?dir='.$entry.'">'.$entry.'</a><br>';
        continue;
    }
    echo $entry."<br>";
}

closedir($dh);

?>
