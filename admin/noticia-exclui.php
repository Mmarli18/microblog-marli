<?php

require_once "../inc/cabecalho-admin.php";
require_once "../inc/funcoes-noticias.php";

verificaAcesso();

$idNoticia = (int)$_GET['id'];

$idUsuario = $_SESSION['id'];

$tipoUsuario = $_SESSION['tipo'];

excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);

header("location:noticias.php");
