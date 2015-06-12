<?php

if (isset($_GET['id'])) {
    require_once('comum.php');

    $con = novaConexao();

    $sql = $con->prepare('DELETE FROM pessoas WHERE ID = ?');

    $sql->bind_param('i', $_GET['id']);

    $sql->execute();
}
header('location:index.php?sucesso=' . $sucesso);
