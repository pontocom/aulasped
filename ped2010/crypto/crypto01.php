<?php

$password = crypt("mypassword");

echo $password;  // lw5mU6k1e6BsE (variable)

$password = crypt("mypassword", "mysalt");

echo $password; // myylAylKPNtmw (fixed)

?>
