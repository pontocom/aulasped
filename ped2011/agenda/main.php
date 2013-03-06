<?php
session_start();

if(!isset ($_SESSION['loggedin']) || $_SESSION['loggedin']=="FALSE")
{
    header("Location: index.php");
}
else
{
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
      <table border="1" align="center">
          <thead>
              <tr>
                  <th>Foto</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th></th>
                  <th></th>
                  <th></th>
              </tr>
          </thead>
          <tbody>

<?php
    $con = mysql_connect("127.0.0.1", "zend", "") or die("Problemas na ligação à SGBD");
    mysql_select_db("agenda");
    $query = "SELECT * FROM agenda_info ORDER BY nome ASC";
    $rs = mysql_query($query, $con);

    $n=0;
    while(mysql_fetch_row($rs))
    {
?>
              <tr>
                  <td><img src="fotos/<?php echo mysql_result($rs, $n, "foto");?>" height="40"></td>
                  <td><?php echo mysql_result($rs, $n, "nome"); ?></td>
                  <td><?php echo mysql_result($rs, $n, "email"); ?></td>
                  <td><?php echo mysql_result($rs, $n, "telefone"); ?></td>
                  <td><a href="execute.php?oper=VER&id=<?php echo mysql_result($rs, $n, "id_entry"); ?>">Ver</a></td>
                  <td>
                  <?php
                    if($_SESSION['usertype']=="admin"){
                  ?>
                      <a href="execute.php?oper=APAGAR&id=
                  <?php
                    echo mysql_result($rs, $n, "id_entry");
                  ?>
                  ">Apagar</a>
                  <?php

                  }
                  ?>
                  </td>
                  <td>
                  <?php
                    if($_SESSION['usertype']=="admin" || $_SESSION['uid'] == mysql_result($rs, $n, "id_entry")){
                  ?>
                      <a href="execute.php?oper=ALTERAR&id=
                  <?php
                    echo mysql_result($rs, $n, "id_entry");
                  ?>
                      ">Alterar</a>
                  <?php

                  }
                  ?>
                  </td>
              </tr>
<?php
        $n++;
    }

    mysql_close($con);
?>
          </tbody>
      </table>
      <center>
      <form action="logout.php" method="post"><input type="submit" value="Logout"></form>
      </center>
  </body>
</html>
<?php
}
?>
