<?php
session_start();
include_once 'Contacts.php';

$contact = new Contacts();
$contact->set($_REQUEST['nome'], $_REQUEST['morada'], $_REQUEST['email'], $_SESSION['user_id']);

if($contact->save() != false) {
    header("Location: gestorContactos.php");
} else {
    die("Houve um problema a introduzir os valor na BD!");
}
?>