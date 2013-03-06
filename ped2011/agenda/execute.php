<?php
include_once('User.php');

if($_REQUEST['oper']=="VER")
{
    // criar tabela HTML
    // ligar ao servidor de BD
    $con = mysql_connect("127.0.0.1", "zend", "") or die('Não consegui ligar ao SGBD!!!');

    // seleccionar a BD
    mysql_select_db("agenda");

    // construir a query
    $query = "SELECT * FROM agenda_info WHERE id_entry = ".$_REQUEST['id'];

    $rs = mysql_query($query, $con);

?>
<table align="center" border="1">
    <tr>
        <td>Nome:</td>
        <td><?php echo mysql_result($rs, 0, "nome"); ?></td>
    </tr>
    <tr>
        <td>Morada:</td>
        <td><?php echo mysql_result($rs, 0, "morada"); ?></td>
    </tr>
    <tr>
        <td>Telefone:</td>
        <td><?php echo mysql_result($rs, 0, "telefone"); ?></td>
    </tr>
    <tr>
        <td>E-mail:</td>
        <td><?php echo mysql_result($rs, 0, "email"); ?></td>
    </tr>
    <tr>
        <td>Foto:</td>
        <td><img src="fotos/<?php echo mysql_result($rs, 0, "foto"); ?>"></td>
    </tr>
</table>
      <p align="center"><a href="index.php">Home</a></p>

<?php
    mysql_close($con);
}

// apagar registos
if($_REQUEST['oper']=="APAGAR")
{
    // ligar ao servidor de BD
    $con = mysql_connect("127.0.0.1", "zend", "") or die('Não consegui ligar ao SGBD!!!');

    // seleccionar a BD
    mysql_select_db("agenda");

    // construir a query
    $query = "DELETE FROM agenda_info WHERE id_entry = ".$_REQUEST['id'];
    echo $query;

    if(!mysql_query($query, $con))
    {
        mysql_close($con);
        echo "ERRO AO EXECUTAR A APAGAR!!!";
    } else {
        mysql_close($con);
        header('Location: main.php');
    }
}

if($_REQUEST['oper']=="ALTERAR")
{
    // criar tabela HTML
    // ligar ao servidor de BD
    $con = mysql_connect("127.0.0.1", "zend", "") or die('Não consegui ligar ao SGBD!!!');

    // seleccionar a BD
    mysql_select_db("agenda");

    // construir a query
    $query = "SELECT * FROM agenda_info WHERE id_entry = ".$_REQUEST['id'];

    $rs = mysql_query($query, $con);

?>
      <form action="execute.php" method="POST" enctype="multipart/form-data">
      <table border="0" align="center">
          <thead>
              <tr>
                  <th></th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Nome</td>                  
                  <td><input type="hidden" name="oper" value="ALTERARDO">
                      <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
                      <input type="text" name="nome" size="40" value="<?php echo mysql_result($rs, 0, "nome"); ?>"></td>
              </tr>
              <tr>
                  <td>Morada</td>
                  <td><textarea name="morada" cols="40" rows="4"><?php echo mysql_result($rs, 0, "morada"); ?></textarea></td>
              </tr>
              <tr>
                  <td>Contacto Telef&oacute;nico</td>
                  <td><input type="text" name="ctelefone" size="12" value="<?php echo mysql_result($rs, 0, "telefone"); ?>"></td>
              </tr>
              <tr>
                  <td>E-mail</td>
                  <td><input type="text" name="email" size="25" value="<?php echo mysql_result($rs, 0, "email"); ?>"></td>
              </tr>
              <tr>
                  <td>Foto:</td>
                  <td><input type="file" name="file" id="file"></td>
              </tr>
              <tr>
                  <td></td>
                  <td><input type="submit" value="Alterar"></td>
              </tr>
          </tbody>
      </table>
      </form>
<?php
    mysql_close($con);

}


if($_REQUEST['oper']=="ALTERARDO")
{
    // executar a alteração na BD
    // ligar ao servidor de BD
    $con = mysql_connect("127.0.0.1", "zend", "") or die('Não consegui ligar ao SGBD!!!');

    // seleccionar a BD
    mysql_select_db("agenda");

    // construir a query
    $query = "UPDATE agenda_info SET nome='".$_REQUEST['nome']."', morada='".$_REQUEST['morada']."', telefone='".$_REQUEST['ctelefone']."', email='".$_REQUEST['email']."' WHERE id_entry =".$_REQUEST['id'];

    if(!mysql_query($query, $con))
    {
        mysql_close($con);
        echo "ERRO AO EXECUTAR A ALTERAÇÃO!!!";
    } else {
        mysql_close($con);
        header('Location: main.php');
    }

}

// introduzir registos
if(!isset($_REQUEST['oper']))
{
    if($_REQUEST['login']=='')
    {
        header("Location: register.php?message=Nao introduziu o login");
        exit;
    } else {
        if($_REQUEST['pwd'] == '')
        {
            header("Location: register.php?message=Nao introduziu a password!");
            exit;
        } else
        {
            if($_REQUEST['pwd'] != $_REQUEST['rpwd'])
            {
                header("Location: register.php?message=As passwords nao coincidem!");
                exit;
            } else {
                if($_FILES['file']['error'] != 0)
                {
                    echo "Ocorreu um erro na transferencia do ficheiro!!!";
            ?>
                  <a href="index.php">OK</a>
            <?php
                    } else {
                        move_uploaded_file($_FILES['file']['tmp_name'], "fotos/".$_FILES['file']['name']);
                }

                // ligar ao servidor de BD
                /*$con = mysql_connect("127.0.0.1", "zend", "") or die('Não consegui ligar ao SGBD!!!');

                // seleccionar a BD
                mysql_select_db("agenda");

                // construir a query
                $query = "INSERT INTO agenda_info (nome, morada, email, telefone, foto, login, pwd, isadmin) VALUES ('".$_REQUEST['nome']."', '".$_REQUEST['morada']."', '".$_REQUEST['email']."', '".$_REQUEST['ctelefone']."', '".$_FILES['file']['name']."', '".$_REQUEST['login']."', '".md5($_REQUEST['pwd'])."', 0)";

                if(!mysql_query($query, $con))
                {
                    mysql_close($con);
                    echo "ERRO AO EXECUTAR A QUERY!!!";
                } else {
                    mysql_close($con);
                    header('Location: register.php?message=Registo foi concluido com sucesso!');
                }*/

                $user = new User();
                $user->newUser($_REQUEST['login'], $_REQUEST['pwd'], $_REQUEST['nome'], $_REQUEST['morada'], $_REQUEST['email'], $_REQUEST['ctelefone'], $_FILES['file']['name']);
                $user->close();

                header('Location: register.php?message=Registo foi concluido com sucesso!');

            }
        }
    }
}
?>
