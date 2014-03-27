<html>

<head>
</head>


<script language="javascript">
    function verResultados()
    {

        var origem =  document.getElementById("origem").value;
        var destino = document.getElementById("destino").value;
        var troca = document.getElementById("troca").value;

        if(troca.length < 1 || origem.length < 1 || destino.length < 1)
        {
            alert("P.f. preencha todos os campos.");
        } else {
            document.location='http://maps.google.com/maps?saddr=' + origem + '&daddr=' + destino;
        }
    }
</script>

<body>


<form id="meuform" method="POST">
    Origem: <input id="origem" type="text" name="origem" value="" /><br />
    Destino: <input id="destino" type="text" name="destino" value="" />
    Hora de chegada: <input id="hora_chegada" type="text" name="hora_chegada" value="" /><br />
    <br />
    Até quantas vezes aceita trocar de transporte?  <input id="troca" style="width: 30px; height: 23px;" type="text" /><br />
    <br />
    Ver resultados por:
    <br />
    <input onclick="verResultados()" type="button" value="Preço" />
    <input onclick="verResultados()" type="button" value="Tempo de viagem" />
    <br />
    <br />
</form>


    <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.pt/?ie=UTF8&amp;t=m&amp;ll=38.74016,-9.152126&amp;spn=0.064269,0.109863&amp;z=13&amp;output=embed"></iframe><br /><small><a href="https://maps.google.pt/?ie=UTF8&amp;t=m&amp;ll=38.74016,-9.152126&amp;spn=0.064269,0.109863&amp;z=13&amp;source=embed" style="color:#0000FF;text-align:left">Ver mapa maior</a></small>



</body>

</html>
