<html>
    <head></head>
    <body>
        <form action="insere.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>Morada:</td>
                    <td><textarea name="morada" rows="4" cols="40"></textarea></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><input type="text" name="telefone"></td>
                </tr>
                <tr>
                    <td>Fotografia:</td>
                    <td><input type="file" name="foto"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
        <table border="1">
            <tr>
                <td>Nome</td><td>Morada</td><td>Email</td><td>Telefone</td><td></td><td></td><td></td>

            </tr>
        <?php
        $db = mysql_connect("127.0.0.1", "zend", "") or die("Não consegui ligar ao servidor de BD!!!");

        mysql_select_db("agenda", $db);

        $query = "SELECT * FROM contacto";

        ///echo $query;

        $rs = mysql_db_query("agenda", $query, $db);

        $n = 0;
        while(mysql_fetch_row($rs)) {
            $id = mysql_result($rs, $n, "id");
            $nome = mysql_result($rs, $n, "nome");
            $morada = mysql_result($rs, $n, "morada");
            $email = mysql_result($rs, $n, "email");
            $telefone = mysql_result($rs, $n, "telefone");
            $foto = mysql_result($rs, $n, "foto");
            
            echo "<tr><td>".$nome."</td><td>"
            .$morada."</td><td>"
            .$email."</td><td>"
            .$telefone."</td><td>"
            .$foto."</td><td><a href=\"ver.php?id=".$id
            ."\">ver</a></td><td><a href=\"alterar.php?id=".$id
            ."\">alterar</a></td><td><a href=\"apagar.php?id=".$id
            ."\">apagar</a></td></tr>";
            $n++;
        }

        mysql_close($db);
        ?>
        </table>
    </body>
</html>