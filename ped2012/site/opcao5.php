<script>
function validar()
{
    var n = document.getElementById("nome").value;
    var e = document.getElementById("email").value;
    
    if(n.length == 0) alert('Não colocou nada no nome!');
    else if(e.length == 0) alert('Não colocou nada no email!');
    else document.getElementById("myform").submit();
}
</script>

<?php
if(isset($_REQUEST['do']) && $_REQUEST['do']=="now")
{
    echo 'Ol&aacute;, caro '.$_REQUEST['nome'].'!!!! Seja bem vindo ao meu site pessoal!!!<br>';
    echo 'O seu email ('.$_REQUEST['email'].') foi registado!';
}
else
{
?>
<form action="index.php?op=5" method="POST" id="myform">
    Nome: <input type="text" name="nome" id="nome"><br>
    E-mail: <input type="text" name="email" id="email"><br>
    <input type="hidden" name="do" value="now">
    <input type="button" value="Submeter" onClick="validar()">
</form>
<?php
}
?>