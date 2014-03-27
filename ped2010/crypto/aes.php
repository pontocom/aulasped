<?php

	$IV = "abababababababab"; // 16 bytes, 128 bits
	$key = "0011223344556677";  // 16 bytes, 128 bits
	
	
	$dataToCipher = "This is the data we wish to maintain secret from a third party.";
	
	$cipher = mcrypt_cbc(MCRYPT_RIJNDAEL_128, $key, $dataToCipher, MCRYPT_ENCRYPT, $IV);
	
	echo "cipher = ".bin2hex($cipher)."\n";
	//cipher = f1a7c09036fef74207828f13cd136c61bb8a5e3bca7cef408d705113039ead2abc327624c2a574ad0d105a42a169e687a2478e3577081821be8327209963a18d
	
	
	$dataToDecipher = $cipher;
	
	$decipher = mcrypt_cbc(MCRYPT_RIJNDAEL_128, $key, $dataToDecipher, MCRYPT_DECRYPT, $IV);

	echo "decipher = ".$decipher."\n";
	//decipher = This is the data we wish to maintain secret from a third party.
?>