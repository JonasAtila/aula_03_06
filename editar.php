<?php

if (isset($_POST['id'])) {
    require_once('comum.php');

    $con = novaConexao();

    $sql = $con->prepare('SELECT id, nome, endereco, sexo, ativo FROM pessoas WHERE ID = ?');

    $sql->bind_param('i', $_POST['id']);

    $sql->execute();

    $sql->bind_result($id, $nome, $endereco, $sexo, $ativo);

    $sql->fetch();

    $resposta = array(
        'id' => $id,
        'nome' => $nome,
        'endereco' => $endereco,
        'sexo' => $sexo,
        'ativo' => (int)$ativo,
    );     
    
    echo json_encode($resposta);

}
