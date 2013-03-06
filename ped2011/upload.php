<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

print_r($_FILES['file']);

if($_FILES['file']['error'] != 0)
{
    echo "Ocorreu um erro na transferencia do ficheiro!!!";
    exit;
} else {
    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name']);
    echo "Ficheiro ".$_FILES['file']['name']." carregado com sucesso!!!";
}



/*
if ($_FILES["file"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["ficheiro"]["error"] . "<br />";
}
else
{
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Tipo: " . $_FILES["file"]["type"] . "<br />";
    echo "Tamanho: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
        echo $_FILES["file"]["name"] . " já existe. ";
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
        echo "Armazenado em: " . "upload/" . $_FILES["file"]["name"];
    }
}*/
?>
