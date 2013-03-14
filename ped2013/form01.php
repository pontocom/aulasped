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
    <form action="formProcess.php" method="post" enctype="multipart/form-data" id="meuform">
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
                <td></td>
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