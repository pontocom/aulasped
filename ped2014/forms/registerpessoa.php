<?php
if(!isset($_REQUEST['go']) || $_REQUEST['go']=='') {

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<form action="registerpessoa.php" method="POST">
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
           Email:
       </td>
        <td>
            <input type="text" name="email">
        </td>
    </tr>
    <tr>
        <td>
            Twitter:
        </td>
        <td>
            <input type="text" name="twitter">
        </td>
    </tr>
    <tr>
        <td>
            Facebook:
        </td>
        <td>
            <input type="text" name="facebook">
        </td>
    </tr>
    <tr>
        <td>

        </td>
        <td>
            <input type="hidden" name="idutilizador" value="<?php echo $_REQUEST['idutilizador'];?>">
            <input type="hidden" name="go" value="yes">
            <input type="submit" value="Register Profile">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php
                if(isset($_REQUEST['status_message']) || $_REQUEST['status_message']!='') {
                    echo $_REQUEST['status_message'];
                }
            ?>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<?php
} else {
    echo 'Estou aqui....';
    require_once('Pessoa.php');
    $p = new Pessoa();
    $p->set($_REQUEST['nome'], $_REQUEST['email'], $_REQUEST['twitter'], $_REQUEST['facebook'], $_REQUEST['idutilizador']);
    $p->save();
}
?>