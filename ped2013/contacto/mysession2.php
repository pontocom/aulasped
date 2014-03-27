<?php
session_start();

echo $_SESSION['username'];

unset($_SESSION['username']);

session_destroy();

?>