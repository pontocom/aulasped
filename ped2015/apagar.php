<?php
include_once 'Contacts.php';

$c=new Contacts();
$c->delete($_REQUEST['id']);

header("Location: contact.php");
?>