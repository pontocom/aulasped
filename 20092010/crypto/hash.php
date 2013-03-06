<?php

$valueToHash = "This is the string that I whish to hash!!!!";

$hash = mhash(MHASH_SHA256, $valueToHash);
echo bin2hex($hash)."\n"; //4f207ea02a04decaeca45aafd0a78e96d75ab382f0c6f5b3f1a12a24e1707d16

?>
