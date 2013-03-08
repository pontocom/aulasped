<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <?php
            include_once 'diversos.php';
            
            
            $cabecalho = array("Número", "Nome", "Nota", "Ano Lectivo");
            
            $lista_alunos = array(
                array(10378, "Carlos Serrao", 19, "1996"),
                array(10378, "Carlos Serrao", 19, "2013"),
                array(10378, "Carlos Serrao", 19, "1998"),
                array(10378, "Carlos Serrao", 19),
                array(10378, "Carlos Serrao", 19),
                array(10378, "Carlos Serrao", 19),
                array(10378, "Carlos Serrao", 19),
                array(10378, "Carlos Serrao", 19),
                array(10378, "Carlos Serrao", 19)
            );
            
            $cabecalhoCompras = array("#", "Produto");
            $listaCompras = array(
                array("3", "Pacotes de Leite")
            );

            escreveDados($cabecalho, $lista_alunos);
            escreveDados($cabecalhoCompras, $listaCompras);
            ?>

        </div>
    </body>
</html>
