<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>MyForm</title>
</head>
<body>
    <script type="text/javascript">
        function validarForm()
        {
            var nome = document.getElementById('nome').value;
            var morada = document.getElementById('morada').value;

            if (nome.length == 0) {
                alert('Precisa de introduzir o nome!');
            } else {
                if(morada.length == 0) {
                    alert('Precisa de introduzir a morada!');
                }
                else {
                    document.getElementById('myform').submit();
                }
            }
        }
    </script>
    <form action="myFormProcessa.php" id="myform" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="nome" id="nome" ></td>
            </tr>
            <tr>
                <td><label>Morada: </label></td>
                <td><textarea rows="4" cols="50" name="morada" id="morada"></textarea></td>
            </tr>
            <tr>
                <td>Foto:</td>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $_REQUEST['status']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" value="Enviar Dados" onclick="validarForm()"></td>
            </tr>
        </table>
    </form>
</body>
</html>