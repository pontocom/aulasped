<?php
if(isset($_REQUEST['va']) && isset($_REQUEST['vb']))
    echo $_REQUEST['va'] + $_REQUEST['vb'];
else
    echo "0";
?>