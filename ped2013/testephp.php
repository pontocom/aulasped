<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Teste PHP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <?php
            
            $valores_head = array("Número", "Nome", "Disciplina","Nota");
            
            $lista_alunos = array(
                array("10378", "Carlos Serrao", "Projeto Empresa Digital", "19"),
                array("10380", "Pedro Crespo", "Gestão de Sistemas de Informação", "20"),
                array("10381", "Ausenda Fonseca", "Matemática I", "10"),
            );
            
            //$navegacao = array("back" => "Voltar Atrás", 1 => "http://www.iscte.pt", "home" => "Voltar à Homepage", 2 => "testephp.php");
            $navegacao = array("back" => array("Voltar Atrás", "http://www.iscte.pt"), 
                               "home" => array("Voltar à Homepage", "testephp.php"));
            
            ?>
            
            <table border='1'>
                <tr>
                    <?php
                        foreach ($valores_head as $head)
                        {
                             echo '<td><b>'.$head.'</b></td>';
                        }
                    ?>
                </tr>
                <?php
                foreach ($lista_alunos as $aluno)
                {
                    echo '<tr>';
                    foreach ($aluno as $dados) {
                        echo '<td>'.$dados.'</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>
            
            <?php
            print_r($navegacao);
            var_dump($navegacao);
            ?>
            
            <a href='<?php echo $navegacao["back"][1]; ?>'><?php echo $navegacao["back"][0]; ?></a> |
            <a href='<?php echo $navegacao["home"][1]; ?>'><?php echo $navegacao['home'][0]; ?></a>
            
        </div>
    </body>
</html>
