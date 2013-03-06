<html>
    <head></head>
    <body>
    <table border="1">
        <tr>
            <!-- header -->
            <td colspan="2" width="100%"><font color="red" size="+10">A minha p&aacute;gina pessoal!!!</font></td>
        </tr>
        <tr>
            <!-- opcoes do menu -->
            <td width="20%"><b>Menu</b><br>
                <a href="index.php?op=1">Home</a><br>
                <a href="index.php?op=2">Fotos</a><br>
                <a href="index.php?op=3">Blog</a><br>
                <a href="index.php?op=4">CV</a><br>
                <a href="index.php?op=5">Contacto</a><br>
            </td>
            <!-- conteudo -->
            <td>
                <?php
                if(!isset($_REQUEST['op'])) include_once 'opcao1.php';
                else
                {
                    if($_REQUEST['op']<1 || $_REQUEST['op']>5)
                        include_once 'opcao1.php';
                    else
                        include_once 'opcao'.$_REQUEST['op'].'.php';
                }
                ?>
            </td>
        </tr>
    </table>
    </body>
</html>