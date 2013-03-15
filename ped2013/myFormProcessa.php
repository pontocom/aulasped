<?php
    if($_FILES['file']['error'] != 0 ){
        echo 'Nao conegui carregar o ficheiro!';
    } else {
        if(!move_uploaded_file($_FILES['file']['tmp_name'], "./myfiles/".$_FILES['file']['name']))
        {
            echo 'Não consegui mover o ficheiro!';
        }
?>
<table>
    <tr>
        <td>Nome: </td>
        <td><?php echo $_REQUEST['nome']; ?></td>
    </tr>
    <tr>
        <td>Morada:</td>
        <td><?php echo $_REQUEST['morada']; ?></td>
    </tr>
    <tr>
        <td>Foto:</td>
        <td><img src="myfiles/<?php echo $_FILES['file']['name'];?>"></td>
    </tr>
</table>
<?php
    }
?>

