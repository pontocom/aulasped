<?php
include_once 'Contacts.php';
$c= new Contacts();

$c->set($_REQUEST['nome'], $_REQUEST['morada'], $_REQUEST['email']);
$c->save();

header("Location: gestorContactos.php");
?>