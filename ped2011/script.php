<?php

if($_REQUEST['password']=="")
    echo "ERRO: ESQUECEU-SE DE INTRODUZIR A PASSWORD";
if(strlen($_REQUEST['password'])<8)
    echo "ERRO: PASSWORD MUITO CURTA!!!";
else
    echo "PERFEITO: PASSWORD ACEITE!";

?>
