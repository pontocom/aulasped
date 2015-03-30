<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 13/03/15
 * Time: 10:11
 */


echo $_REQUEST['username'];
echo $_REQUEST['password'];

print_r($_FILES["file"]);

if($_FILES["file"]["error"] != 0) {
    echo "Erro no upload do ficheiro!!!";
} else {
    move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/".$_FILES["file"]["name"]);
}

?>