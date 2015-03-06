<?php
function writeQuadrado($a, $c) {
    for($n=1; $n<$a; $n++) {
        echo "<tr>";
        for($i=1; $i<$c; $i++) {
            echo "<td><font size=$n>$n</font><font size=$i>$i</font></td>";
        }
        echo "</tr>";
    }
}
?>