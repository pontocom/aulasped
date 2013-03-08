<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function escreveDados($cab, $dados)
{
    echo '<table border=\'1\'>';
    echo '<tr>';
    foreach($cab as $head){
        echo '<td>'.$head.'</td>';
    }
    echo '</tr>';
    foreach($dados as $aluno){
        echo '<tr>';
        foreach ($aluno as $valor)
        {
            echo '<td>'.$valor.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';    
}
?>
