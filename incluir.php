<?php

require_once('comum.php');

$con = novaConexao();

if (count($_GET) > 0) {
    $sql = $con->prepare(''
            . 'INSERT INTO pessoas ('
            . 'nome, '
            . 'endereco, '
            . 'sexo, '
            . 'ativo) '
            . 'VALUES (?,?,?,?)');

    if (isset($_GET['ativo'])) {
        $ativo = 1;
    } else {
        $ativo = 0;
    }

    $sql->bind_param('sssi', $_GET['nome'], $_GET['endereco'], $_GET['sexo'], $ativo);



    if ($sql->execute()) {
        $msg = 'Deu certo!';
    } else {
        $msg = 'Não deu certo!';
    }

    header('location:index.php?msg=' . $msg);
}