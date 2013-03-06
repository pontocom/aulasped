<form action="index.php?op=2" method="POST" enctype="multipart/form-data">
    Foto: <input type="file" id="file" name="file"><br>
    <input type="hidden" name="do" value="now">
    <input type="submit" value="Carregar foto!!!">    
</form>

<?php
if(isset($_REQUEST['do']) && $_REQUEST['do']=="now")
{
    if($_FILES['file']['error'] != 0)
    {
        echo 'Ocorreu um erro no carregamento do ficheiro!';
    }
    else
    {
        if(!move_uploaded_file($_FILES['file']['tmp_name'], 'fotos/'.$_FILES['file']['name']))
            echo "erro a mover o ficheiro!!!";
    }
}
?>

<?php
$dir = opendir("./fotos");

while($file = readdir($dir))
{
    if(filetype($file)!="dir")
        echo '<img src="fotos/'.$file.'"><br>';
}

closedir($dir);
?>

