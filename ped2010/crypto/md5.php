<?php
    $valueToHash = "This string represents the value that will be hashed
by the function. This will result in a rather small
value, of 128 bits long, the hash.";

    $hash = md5($valueToHash);

    echo $hash; // 858dd947e90c11fd280fd93321059792

    $hash = md5($valueToHash, true);

    echo $hash; // non-printable result (bit by bit)



    $fileToHash = "./mypicture.jpg";

    $hash = md5_file($fileToHash); 

    echo $hash; // 45b82a4b4fa69e14baebb98e3534db76

    $hash = md5_file($fileToHash, true); // non-printable result (bit by bit raw)

    echo $hash; // non-printable result (bit by bit raw)
    echo bin2hex($hash); // equal

?>
