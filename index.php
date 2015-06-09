<?php
//echo '<pre>';
//var_dump($_GET);
//echo '</pre>';


$con = new mysqli('127.0.0.1', 'root', '', 'lp22015');

$sql = $con->prepare('INSERT INTO pessoa('
.'nome,'
.'endereco,'
.'sexo,'
.'ativo )'
. ' VALUES (?, ?, ?, ? )');

if(isset($_GET['ativo'])){
    $ativo = 1;
}else{
    $ativo = 0;
}

$sql->bind_param('sssi',$_GET['nome'],$_GET['endereco'],$_GET['sexo'],$_GET['ativo']);


if($sql->execute()){
    echo '<h2>sucesso</h2>';
    
}else{
    echo '<pre>';
    var_dump($sql->error_list);
    echo '</pre>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de pessoas</title>
        <meta charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="GET" action="index.php">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" id="input-nome" class="form-control" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Endereço</label>
                            <div class="col-sm-10">
                                <input type="text" name="endereco" id="input-endereco" class="form-control" placeholder="Endereço">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sexo</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input name="sexo" type="radio" value="m" id="opt-masc"> Masculino
                                </label>
                                <label class="radio-inline">
                                    <input name="sexo" type="radio" value="f" id="opt-fem"> Feminino
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="ativo" checked> Ativo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-success" id="btn-enviar" type="submit" >Inserir</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h5>Listagem de pessoas</h5>
                </div>
            </div>
        </div>
        <script>
            $('#btn-enviar').click(function () {
var valido = true;
if ($('#input-nome').val() == '') {
    valido = false;
    alert('Preencha o nome');
}
if ($('#input-endereco').val() == '') {
    valido = false;
    alert('Preencha o endereço');
}
if (!$('#opt-masc').is(':checked') &&!$('#opt-fem').is(':checked')) {
    valido = false;
    alert('Escolha um sexo');
}

return valido;
})
</script>
</body>
</html>