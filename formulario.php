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

<script language="Javascript">
    function validarNumero()
    {
        var num = document.getElementById("num").value;
        if(num.length < 9)
        {
            alert('Numero Inválido!!!');
        } else
        {
            document.myform.submit();
        }
    }
</script>

  <body>
      <form action="script.php" name="myform" method="POST" enctype="multipart/form-data">
          Nome: <input type="text" name="nome"><br>
          Morada :
          <textarea name="morada" rows="4" cols="50"></textarea><br>
          Documento de identificação<br>
          <select name="docid">
               <option value="BI">Bilhete de Identidade
               <option value="NIF" selected>Cartão de Contribuinte
               <option value="CC">Carta de Condução
          </select><br>
          Número: <input type="text" name="num" id="num"><br>
          Data de Nascimento:
          <select name="dian">
<?
    for($n=1; $n<=31; $n++)
    {
        echo '<option value="'.$n.'">'.$n;
    }
?>
          </select>
          <select name="mesn">
<?
    $mes = array(1=>"Janeiro","Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");


    for($n=1; $n<=12; $n++)
    {
        echo '<option value="'.$n.'">'.$mes[$n];
    }
?>
          </select>
          <select name="anon">
<?
    for($n=1900; $n<=2009; $n++)
    {
        echo '<option value="'.$n.'">'.$n;
    }
?>
          </select><br>
          Foto: <input type="file" name="file"><br>
          <input type="button" value="Enviar Dados" onclick="javascript:validarNumero()">
      </form>
  </body>
</html>
