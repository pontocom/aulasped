<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($_FILES["file"]["error"] > 0){
    echo "Ocorreu um erro a fazer o upload do ficheiro =>".$_FILES["file"]["error"];
} else {
    echo "Nome => ".$_FILES["file"]["name"]."<br>";
    echo "Tipo => ".$_FILES["file"]["type"]."<br>";
    echo "Tamanho => ".$_FILES["file"]["size"]."<br>";
    echo "Nome Temp => ".$_FILES["file"]["tmp_name"]."<br>";

    if(move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$_FILES["file"]["name"])){
        echo "Ficheiro carregado com sucesso!";
    } else {
        echo "Erro ao fazer o upload!!!!";
    }
}
?>
