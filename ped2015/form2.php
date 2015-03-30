<?php
echo "Username: ".$_REQUEST['username'];
echo "Password: ".$_REQUEST['password'];

if($_FILES["file"]["error"] !=0 ){
    echo "Erro no upload do ficheiro";
} else {
    move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/".$_FILES["file"]["name"]);
}
?>