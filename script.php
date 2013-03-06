<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo 'Nome: '.$_REQUEST['nome'].'<br>';
echo 'Morada: '.$_REQUEST['morada'].'<br>';
echo 'Documento: '.$_REQUEST['docid'].'<br>';
echo 'Número: '.$_REQUEST['num'].'<br>';

if($_FILES['file']['error'] > 0)
{
    echo 'Ocorreu um erro no upload da foto!!!';
}
else
{
    echo 'Nome: '.$_FILES["file"]["name"];

    if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
        echo $_FILES["file"]["name"] . " já existe. ";
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
        echo "Armazenado em: " . "upload/" . $_FILES["file"]["name"];
    }
}

?>
