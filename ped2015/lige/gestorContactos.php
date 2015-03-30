<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: index.php");
}
?>
<html>
<head>
    <title>Gestor de Contactos</title>
</head>
<body>
<a href="logout.php">Logout</a>

<h1>Bem vindo utilizador: <?php echo $_SESSION['username']; ?></h1>

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
$c = new Contacts();

$value = $c->listall($_SESSION['iduser']);

print_r($value);
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

foreach($value as $ct) {
    echo '<tr>';
    echo '<td>'.$ct['nome'].'</td>';
    echo '<td>'.$ct['morada'].'</td>';
    echo '<td>'.$ct['email'].'</td>';
    echo '<td></td>';
    echo '<td><a href="apagarContacto.php?id='.$ct['id'].'">apagar</a></td>';
    echo '<td><a href="alterarContacto.php?id='.$ct['id'].'">alterar</a></td>';
    echo '</tr>';

}
?>

</table>

</body>
</html>