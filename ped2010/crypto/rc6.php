<?php

	$key = "0011223";  // 7 bytes, 56 bits
	
	
	$dataToCipher = "This is the data we wish to maintain secret from a third party.";
	
	$cipher = mcrypt_cbc(MCRYPT_3DES, $key, $dataToCipher, MCRYPT_ENCRYPT);
	
	echo "cipher = ".bin2hex($cipher)."\n";
	//cipher = f71ce0f9afe33c72d500aa690ea890d604710f0961299f2219de6504b40af50e990279e673f8da353c59753b46ccf2a7c71a13c7fe3473ac0e400b97cf06bbcc
	
	$dataToDecipher = $cipher;
	
	$decipher = mcrypt_cbc(MCRYPT_3DES, $key, $dataToDecipher, MCRYPT_DECRYPT);

	echo "decipher = ".$decipher."\n";
	//decipher = This is the data we wish to maintain secret from a third party.
?>