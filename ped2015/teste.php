<html>
    <head>
        <title>Teste de PHP</title>
    </head>
    <body bgcolor="#faebd7">
         <?php
            for($n=1; $n<10; $n++) {
         ?>
         <font size="<?php echo $n;?>"><?php echo $n;?></font><br>
         <?php
            }
         ?>
    </body>
</html>
