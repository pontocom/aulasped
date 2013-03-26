<?php
session_start();
if($_SESSION['loggedin']!="ON") header("Location:contacto.php");

$db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

if (!mysql_selectdb("iagenda", $db)) {
    echo 'Não consegui seleccionar a BD!';
    exit;
}

if ($_REQUEST['op'] == 'a') {
    $q = "SELECT foto FROM agenda WHERE id='".$_REQUEST['id']."' AND id_user='".$_SESSION['userid']."'";
    $rs = mysql_query($q, $db);
    mysql_fetch_row($rs);
    
    $f="fotos/".mysql_result($rs,0,"foto");
    
    unlink($f);
    
    $query = "DELETE FROM agenda WHERE id='" . $_REQUEST['id'] . "' AND id_user='".$_SESSION['userid']."'";

    $status = '';
    if (!mysql_query($query, $db)) {
        $status = 'Erro ao apagar o registo!!!';
    }

    $status = 'Registo eliminado!!!';

    mysql_close($db);

    header("Location: main.php?status=" . $status);
}

if ($_REQUEST['op'] == 'v') {
    $query = "SELECT * FROM agenda WHERE id='" . $_REQUEST['id'] . "' AND id_user = '".$_SESSION['userid']."'";
    //echo $query;

    $rs = mysql_query($query, $db);

    mysql_fetch_row($rs);
    ?>
    <table>
        <tr>
            <td>
                Nome:
            </td>
            <td>
    <?php
    echo mysql_result($rs, 0, "nome");
    ?>
            </td>
        </tr>
        <tr>
            <td>
                Morada:
            </td>
            <td>
    <?php
    echo mysql_result($rs, 0, "morada");
    ?>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
    <?php
    echo mysql_result($rs, 0, "email");
    ?>
            </td>
        </tr>
        <tr>
            <td>
                Telefone:
            </td>
            <td>
    <?php
    echo mysql_result($rs, 0, "telefone");
    ?>
            </td>
        </tr>
        <tr>
            <td>
                Foto:
            </td>
            <td><img src="fotos/<?php echo mysql_result($rs, 0, "foto");?>">
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <a href="main.php">voltar</a>
            </td>
        </tr>
    </table>
    <?php
}

if($_REQUEST['op']=="m")
{
    $query = "SELECT * FROM agenda WHERE id='".$_REQUEST['id']."' AND id_user='".$_SESSION['userid']."'";
    $rs = mysql_query($query, $db);

    mysql_fetch_row($rs);    
?>
        <form action="crud.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Nome:
                    </td>
                    <td>
                        <input type="text" name="nome" value="<?php echo mysql_result($rs, 0, "nome"); ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Morada:
                    </td>
                    <td>
                        <textarea rows="4" cols="40" name="morada"><?php echo mysql_result($rs,0,"morada"); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="text" name="email" value="<?php echo mysql_result($rs,0,"email"); ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefone:
                    </td>
                    <td>
                        <input type="text" name="telefone" value="<?php echo mysql_result($rs,0,"telefone"); ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Foto:
                    </td>
                    <td>
                        <img src="fotos/<?php echo mysql_result($rs,0,"foto"); ?>"><br>
                        Nova imagem: <input type="file" name="nfile" id="nfile">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo mysql_result($rs,0,"id"); ?>">
                        <input type="hidden" name="do" value="now">
                        <input type="submit" value="Alterar Dados">
                    </td>
                </tr>
            </table>
        </form>
    
<?php    
}

if(isset($_REQUEST['do']) && $_REQUEST['do']=="now")
{
    // processar upload da nova imagem
    
    if($_FILES['nfile']['name']!="")
    {
        if ($_FILES["nfile"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["nfile"]["error"] . "<br />";
            exit;
        }
        else
        {
            move_uploaded_file($_FILES["nfile"]["tmp_name"],"fotos/" . $_FILES["nfile"]["name"]);
        }
    }
    
    // apagar a foto antiga
    $q = "SELECT foto FROM agenda WHERE id='".$_REQUEST['id']."' AND id_user='".$_SESSION['userid']."'";
    $rs = mysql_query($q, $db);
    mysql_fetch_row($rs);
    
    if($_FILES['nfile']['name']!="")
    {
        $f="fotos/".mysql_result($rs,0,"foto");

        unlink($f);
        $query = "UPDATE agenda SET nome='".$_REQUEST['nome']."', morada ='".$_REQUEST['morada']."', email='".$_REQUEST['email']."', telefone='".$_REQUEST['telefone']."', foto='".$_FILES["nfile"]["name"]."' WHERE id='".$_REQUEST['id']."' AND id_user='".$_SESSION['userid']."'";   
    }
    else
    {
        $query = "UPDATE agenda SET nome='".$_REQUEST['nome']."', morada ='".$_REQUEST['morada']."', email='".$_REQUEST['email']."', telefone='".$_REQUEST['telefone']."' WHERE id='".$_REQUEST['id']."' AND id_user='".$_SESSION['userid']."'";   
    }
    
    
    $status = "";
    if(mysql_query($query, $db)){
        mysql_close($db);
        $status = '<font color="green">Registo alterado com sucesso!</font>';
        header("Location: main.php?status=".$status);
    } else {
        mysql_close($db);
        $status = '<font color="red">Problemas a alterar o registo!</font>';
        header("Location: main.php?status=".$status);
    }
}

mysql_close($db);
?>
