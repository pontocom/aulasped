<?php
	$toBeSigned = "This is some data that is going to be signed!!!";
		
	// get the private-key from the keyfile (where it is stored)
    $fp = fopen("./mykey.pem", "r");
    $keypair = fread($fp, 10000);
    fclose($fp);

	// the private key is retrieved    
    $privateKey = openssl_pkey_get_private($keypair);
    
    $signature = null;

	// sign the data using RSA with SHA1 hash algorithm
	openssl_sign($toBeSigned, $signature, $privateKey);
	
	echo "Signature = ".bin2hex($signature)."\n";
	
	$originalData = "This is some data that is going to be signed!!!";

	$signatureToVerify = $signature;
	
	// read a certificate from a file and import it
    
	$fp = fopen("./mycert.pem", "r");
	$mycert = fread($fp, 15000);
	fclose($fp);
    
	$x509mycert = openssl_x509_read($mycert);
	
	// export the certificate to a string
	openssl_x509_export($x509mycert, $sx509);

	// get the public-key from the certificate
	$publicKey = openssl_pkey_get_public($sx509);
	
	// verify the signature
	if(openssl_verify($originalData, $signatureToVerify, $publicKey) == true) {
		echo "Valid Signature";
	} else {
		echo "Invalid Signature";
	}
?>