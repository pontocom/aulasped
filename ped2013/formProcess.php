<?php
/**
 * Created by JetBrains PhpStorm.
 * User: carlosserrao
 * Date: 3/14/13
 * Time: 10:00 AM
 * To change this template use File | Settings | File Templates.
 */

$nome = $_REQUEST['nome'];
$morada = $_REQUEST['morada'];

//print_r($_FILES['file']);

if($_FILES['file']['error'] != 0){
    header("Location: form01.php?status=".'Não foi possível receber o ficheiro!');
} else {
    if(!move_uploaded_file($_FILES['file']['tmp_name'], "./upload/".$_FILES['file']['name']))
    {
        header("Location: form01.php?status=".'Lamentamos mas não foi possível escrever o ficheiro!');
    } else {
        ?>
        <table border=1>
        <tr>
            <td>
                Nome
            </td>
            <td>
                <?php echo $nome; ?>
            </td>
        </tr>
        <tr>
            <td>
                Morada
            </td>
            <td>
                <?php echo $morada; ?>
            </td>
        </tr>
            <tr>
                <td>
                    Imagem:
                </td>
                <td>
                    <img src="upload/<?php echo $_FILES['file']['name']; ?>">
                </td>
            </tr>
        </table>
<?php
    }
}

/*
if ($nome == ''){
    header("Location: form01.php?status=".'O campo \'nome\' deve estar preenchido!!!');
} else {
    if($morada == ''){
        header("Location: form01.php?status=".'O campo \'morada\' deve estar preenchido!!!');
    }
    else {
*/

//    }
//}

