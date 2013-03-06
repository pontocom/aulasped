<?php
    /**
     * this example shows how to load a key pair from a file
     */
    
    $fp = fopen("./mykey.pem", "r");
    
    $skey = fread($fp, 10000);
    
    fclose($fp);
    
    $keypair = openssl_pkey_get_private($skey);
    
    var_dump($keypair);
?>