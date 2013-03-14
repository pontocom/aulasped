<?php
if(!isset($_REQUEST['do']) && $_REQUEST['do']!='process')
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Formulario 01</title>
</head>
<body>
    <script type="text/javascript">
        function validarForm(){
            var nome = document.getElementById('nome').value;
            var morada = document.getElementById('morada').value;

            if(nome.length == 0)
            {
                alert("Deve preencher o nome!!!");
            } else {
                if(morada.length == 0)
                {
                    alert("Deve preencher o nome!!!");
                }
                else {
                    document.getElementById("meuform").submit();
                }
            }
        }
    </script>
    <form action="form02.php" method="post" enctype="multipart/form-data" id="meuform">
        <table>
            <tr>
                <td>
                    <label>Nome: </label>
                </td>
                <td>
                    <input type="text" name="nome" id="nome">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Morada:</label>
                </td>
                <td>
                    <textarea rows="4" cols="40" name="morada" id="morada"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Foto:</label>
                </td>
                <td>
                    <input type="file" name="file">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="do" value="process"></td>
                <td>
                    <?php
                        echo $_REQUEST['status'];
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" value="Enviar Dados" onclick="validarForm()"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
} else {
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
    header("Location: form02.php?status=".'Não foi possível receber o ficheiro!');
} else {
    if(!move_uploaded_file($_FILES['file']['tmp_name'], "./upload/".$_FILES['file']['name']))
    {
        header("Location: form02.php?status=".'Lamentamos mas não foi possível escrever o ficheiro!');
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
}
?>