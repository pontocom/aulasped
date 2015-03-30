<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("Location: login.php");
}
?>
<html>
<head>
    <title>Gestor de Contactos</title>
</head>
<body>
<a href="logout.php">Logout</a>

<form action="addContacto.php" method="post">
    <table>
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome"></td>
        </tr>
        <tr>
            <td>Morada:</td>
            <td><textarea cols="40" rows="3" name="morada"></textarea></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Foto:</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Adicionar Contacto"></td>
        </tr>
    </table>
</form>

<br>

<?php
include_once 'Contacts.php';
$contact = new Contacts();
$listing = $contact->listall($_SESSION['user_id']);
?>

<table cellspacing="5" cellpadding="5">
    <tr bgcolor="#faebd7">
        <td>Nome</td>
        <td>Morada</td>
        <td>Email</td>
        <td>Foto</td>
        <td></td>
        <td></td>
    </tr>

<?php

foreach($listing as $c) {
    echo '<tr>';
    echo '<td>'.$c['nome'].'</td>';
    echo '<td>'.$c['morada'].'</td>';
    echo '<td>'.$c['email'].'</td>';
    echo '<td></td>';
    echo '<td><a href="apagarContacto.php?id='.$c['id'].'">apagar</a></td>';
    echo '<td><a href="alterarContacto.php?id='.$c['id'].'">alterar</a></td>';
    echo '</tr>';

}
?>

</table>

</body>
</html>