<?php
	// read a certificate from a file and import it
    
	$fp = fopen("./mycert.pem", "r");
	$mycert = fread($fp, 15000);
	fclose($fp);
    
	$x509mycert = openssl_x509_read($mycert);
	
	// export the certificate to a string
	openssl_x509_export($x509mycert, $sx509);
	
	// to cipher
	$toCipher = "This is the string of data that is going to be ciphered";
	
	// get the public-key component from the certificate
	$publicKey = openssl_get_publickey($sx509);
	
	// cipher data with the public-key
	openssl_public_encrypt($toCipher, $cipherData, $publicKey);
	
	echo "Cipherdata = ".bin2hex($cipherData)."\n";
	
	// get the private-key from the keyfile (where it is stored)
    $fp = fopen("./mykey.pem", "r");
    $keypair = fread($fp, 10000);
    fclose($fp);

	// the private key is retrieved    
    $privateKey = openssl_pkey_get_private($keypair);

	// decipher the data with the corresponding private-key
	openssl_private_decrypt($cipherData, $clearText, $privateKey);
	
	echo "Result = ".$clearText."\n";
	
?>