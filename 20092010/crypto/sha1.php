<?php
    $valueToHash = "This string represents the value that will be hashed
by the function. This will result in a rather small
value, of 160 bits long, the hash.";

    $hash = sha1($valueToHash);

    echo $hash; // 205ff2ae43242a774495a719be33dd95acbf15c7

    $hash = sha1($valueToHash, true);

    echo $hash; // non-printable result (bit by bit, raw)
    echo bin2hex($hash); // equal = 205ff2ae43242a774495a719be33dd95acbf15c7


    echo "\n\n";


    $fileToHash = "./mypicture.jpg";

    $hash = sha1_file($fileToHash);

    echo $hash; // 7316bf9f2182172b96b987f22bbccdb8bfdd8a0a

    $hash = sha1_file($fileToHash, true); 

    echo $hash; // non-printable result (bit by bit raw)
    echo bin2hex($hash); // equal = 7316bf9f2182172b96b987f22bbccdb8bfdd8a0a

?>
