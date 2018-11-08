<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
 
<script>
a = 0;
function addPeticion(){
        a++;
        var div = document.createElement('div');
        div.setAttribute('class', 'form-inline');
            div.innerHTML = '<div style="clear:both" class="peticion_'+a+' col-md-offset-1 col-md-5"><input class="form-control" name="o1[]"  type="number"/></div><div class="peticion_'+a+' col-md-2""><input class="form-control" name="o1[]"  type="number"/></div>';
            document.getElementById('peticiones').appendChild(div);
            document.getElementById('peticiones').appendChild(div);
}
</script>
 
 
</head>
 
<body>
<div class="container">
    <h3>Peticiones</h3><br/><br/>
    <form action="elevadorEfectoSec.php" id="formulario" method="get">
    <div class="row">
        <div class="col-md-offset-1 col-md-2"><label>Piso actual</label></div>
        <div class="col-md-5"><input class="form-control" name="actual" type="number"/></div>
    </div><br/><br/>
    <div class="row">
        <div class="col-md-offset-1 col-md-5"><label>Origen</label></div>
        <div class="col-md-4"><label>Destino</label></div>
        <div class="col-md-1"><input type="button" class="btn btn-success" id="add_peticion()" onClick="addPeticion()" value="+" /></div>
    </div><br/>
    <div class="row" id="peticiones">
    </div><br/>
    <button type="submit" class="btn btn-success btn-block">Enviar</button>
    </form>
</div>
 
</body>
</html>