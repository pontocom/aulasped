<?php
	$CONFIGURATION['configargs'] = array(
	    "private_key_bits" => 2048
    );

	// read the keypair from the file
    $fp = fopen("./mykey.pem", "r");
    $skey = fread($fp, 10000);
    fclose($fp);
    
    // create the keypair object
    $keypair = openssl_pkey_get_private($skey);

    // some DN data for the new certificate
    $dndata = array("countryName" => 'PT', 
    				"stateOrProvinceName" => 'Lisboa', 
    				"localityName" => 'Lisboa', 
    				"organizationName" => 'OWASP', 
    				"organizationalUnitName" => 'OWASP.PT', 
    				"commonName" => 'OWASP.PT', 
    				"emailAddress" => 'carlos.serrao@owasp.org'
    				);
    
    // create a new certificate signing request
    $csr = openssl_csr_new($dndata, $keypair, $CONFIGURATION['configargs']);

    // after, the CSR needs to be signed (self-signed in this case)
    $x509certificate = openssl_csr_sign($csr, null, $keypair, 365, $CONFIGURATION['configargs']);
    
    // export the X.509 certificate
    openssl_x509_export($x509certificate, $sx509);
    
    echo $sx509;
    
    // parse the ceriticate and display it
    
    print_r(openssl_x509_parse($x509certificate));
    
    // export the X.509 certificate to a file
    
    openssl_x509_export_to_file($x509certificate, "./mycert.pem");
?>