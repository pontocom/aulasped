<html>
    <body>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            Nome: <input type="text" name ="nome">
            <input type="submit">
        </form>
    </body>
</html>
<?php
    if(isset($_REQUEST["nome"]))
        echo "Nome = ".$_REQUEST["nome"];
?>
