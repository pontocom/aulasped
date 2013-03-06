<html>
    <body>
    <form action="execute.php" method="POST" enctype="multipart/form-data">
      <table border="0" align="center">
          <thead>
              <tr>
                  <th></th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Username</td>
                  <td><input type="text" name="login" size="40"></td>
              </tr>
              <tr>
                  <td>Password</td>
                  <td><input type="password" name="pwd" size="40"></td>
              </tr>
              <tr>
                  <td>Re-escreva a password:</td>
                  <td><input type="password" name="rpwd" size="40"></td>
              </tr>
              <tr>
                  <td>Nome</td>
                  <td><input type="text" name="nome" size="40"></td>
              </tr>
              <tr>
                  <td>Morada</td>
                  <td><textarea name="morada" cols="40" rows="4"></textarea></td>
              </tr>
              <tr>
                  <td>Contacto Telef&oacute;nico</td>
                  <td><input type="text" name="ctelefone" size="12"></td>
              </tr>
              <tr>
                  <td>E-mail</td>
                  <td><input type="text" name="email" size="25"></td>
              </tr>
              <tr>
                  <td>Foto:</td>
                  <td><input type="file" name="file" id="file"></td>
              </tr>
              <tr>
                  <td></td>
                  <td><input type="submit" value="Enviar dados..."></td>
              </tr>
              <tr>
                  <td></td>
                  <td><?php echo $_REQUEST['message']; ?></td>
              </tr>
          </tbody>
      </table>
      </form>
        <center><a href="index.php">Login</a></center>
    </body>
</html>
