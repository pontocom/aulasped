<?php
session_start();
if($_SESSION['loggedin']!="ON") header("Location:index.php");
?>
<html>
    <head>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">        
    <title>iAgenda</title>
    </head>
    <body background="#ddffee">
        <a href="logout.php">LOGOUT</a>
        <form action="main.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Nome:
                    </td>
                    <td>
                        <input type="text" name="nome">
                    </td>
                </tr>
                <tr>
                    <td>
                        Morada:
                    </td>
                    <td>
                        <textarea rows="4" cols="40" name="morada"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="text" name="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefone:
                    </td>
                    <td>
                        <input type="text" name="telefone">
                    </td>
                </tr>
                <tr>
                    <td>
                        Foto:
                    </td>
                    <td>
                        <input type="file" name="file" id="file">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="hidden" name="do" value="now">
                        <input type="submit" value="Acrescentar Entrada">
                    </td>
                </tr>
            </table>
        </form>

<?php
if(isset($_REQUEST['do']) && $_REQUEST['do']=="now")
{
    // processar upload de imagem
    
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["ficheiro"]["error"] . "<br />";
        exit;
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"],"fotos/" . $_FILES["file"]["name"]);
    }
    
    $db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

    if(!mysql_selectdb("iagenda", $db))
    {
        echo 'Não consegui seleccionar a BD!';
        exit;
    }
    
    $query = "INSERT INTO agenda VALUES ('".md5($_REQUEST['email'])."', '".$_REQUEST['nome']."', '".$_REQUEST['morada']."', '".$_REQUEST['email']."', '".$_REQUEST['telefone']."', '".$_FILES["file"]["name"]."', '".$_SESSION['userid']."')";
   
    if(!mysql_query($query, $db))
    {
        mysql_close($db);
        echo 'Não consegui introduzir os dados!';
        exit;
    }
    
    mysql_close($db);
}   
?>

        
        <?php
            if(isset($_REQUEST['status']))
                echo "<p>".$_REQUEST['status']."</p>";
        ?>

        <table border="1">
            <tr>
                <td>Foto</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Telefone</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
<?php
    $db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

    if(!mysql_selectdb("iagenda", $db))
    {
        echo 'Não consegui seleccionar a BD!';
        exit;
    }
    
    $query = "SELECT * FROM agenda WHERE id_user = '".$_SESSION['userid']."'";
    
    $rs = mysql_query($query, $db);
        
    $n=0;
    while(mysql_fetch_row($rs))
    {
        echo '<tr>';
        echo '<td><img src="fotos/'.mysql_result($rs, $n, "foto").'" width=50></td>';
        echo '<td>'.mysql_result($rs, $n, "nome").'</td>';
        echo '<td>'.mysql_result($rs, $n, "email").'</td>';
        echo '<td>'.mysql_result($rs, $n, "telefone").'</td>';
        echo '<td><a href="crud.php?id='.mysql_result($rs, $n, "id").'&op=v">ver</a></td>';
        echo '<td><a href="crud.php?id='.mysql_result($rs, $n, "id").'&op=a">apagar</a></td>';
        echo '<td><a href="crud.php?id='.mysql_result($rs, $n, "id").'&op=m">modificar</a></td>';
        echo '</tr>';
        $n++;
    }
    
    mysql_close($db);

?>
        </table>
    </body>
</html>
